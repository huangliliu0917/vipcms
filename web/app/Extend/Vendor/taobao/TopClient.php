<?php

//

class TopClient
{
	public $appkey;
	public $secretKey;
	public $gatewayUrl = "http://gw.api.taobao.com/router/rest";
	public $format = "json";
	public $connectTimeout;
	public $readTimeout;
	public $checkRequest = true;
	protected $signMethod = "md5";
	protected $apiVersion = "2.0";
	protected $sdkVersion = "top-sdk-php-20150308";
	public $_CachePath = FTX_DATA_PATH;
	public $_method = "";

	protected function generateSign($params)
	{
		ksort($params);
		$stringToBeSigned = $this->secretKey;
		foreach ($params as $k => $v) {
			if ("@" != substr($v, 0, 1)) {
				$stringToBeSigned .= "$k$v";
			}
		}
		unset($k, $v);
		$stringToBeSigned .= $this->secretKey;
		return strtoupper(md5($stringToBeSigned));
	}

	public function saveCacheData($id, $result)
	{
		$idkey = substr($id, 0, 2);
		if (!is_dir($this->_CachePath)) {
			mkdir($this->_CachePath);
		}
		if (!is_dir($this->_CachePath . $this->_method)) {
			mkdir($this->_CachePath . $this->_method);
		}
		if (!is_dir($this->_CachePath . $this->_method . '/' . $idkey)) {
			mkdir($this->_CachePath . $this->_method . '/' . $idkey);
		}
		$filepath = $this->_CachePath . $this->_method . '/' . $idkey;
		if (is_dir($filepath)) {
			$filename = $filepath . '/' . $id . '.cache';
			@file_put_contents($filename, $result);
		}
	}

	public function getCacheData($id)
	{
		$idkey = substr($id, 0, 2);
		$filename = $this->_CachePath . $this->_method . '/' . $idkey . '/' . $id . '.cache';
		if (file_exists($filename)) {
			return @file_get_contents($filename);
		}
		return false;
	}

	public function curl($url, $postFields = null)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_FAILONERROR, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if ($this->readTimeout) {
			curl_setopt($ch, CURLOPT_TIMEOUT, $this->readTimeout);
		}
		if ($this->connectTimeout) {
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $this->connectTimeout);
		}
		if (strlen($url) > 5 && strtolower(substr($url, 0, 5)) == "https") {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		}
		if (is_array($postFields) && 0 < count($postFields)) {
			$postBodyString = "";
			$postMultipart = false;
			foreach ($postFields as $k => $v) {
				if ("@" != substr($v, 0, 1)) {
					$postBodyString .= "$k=" . urlencode($v) . "&";
				} else {
					$postMultipart = true;
				}
			}
			unset($k, $v);
			curl_setopt($ch, CURLOPT_POST, true);
			if ($postMultipart) {
				curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
			} else {
				$header = array("content-type: application/x-www-form-urlencoded; charset=UTF-8");
				curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
				curl_setopt($ch, CURLOPT_POSTFIELDS, substr($postBodyString, 0, -1));
			}
		}
		$reponse = curl_exec($ch);
		if (curl_errno($ch)) {
			throw new Exception(curl_error($ch), 0);
		} else {
			$httpStatusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
			if (200 !== $httpStatusCode) {
				throw new Exception($reponse, $httpStatusCode);
			}
		}
		curl_close($ch);
		return $reponse;
	}

	protected function logCommunicationError($apiName, $requestUrl, $errorCode, $responseTxt)
	{
		$localIp = isset($_SERVER["SERVER_ADDR"]) ? $_SERVER["SERVER_ADDR"] : "CLI";
		$logger = new TopLogger;
		$logger->conf["log_file"] = $this->_CachePath . "ftxia/top_comm_err_" . $this->appkey . "_" . date("Y-m-d") . ".log";
		$logger->conf["separator"] = "^_^";
		$logData = array(date("Y-m-d H:i:s"), $apiName, $this->appkey, $localIp, PHP_OS, $this->sdkVersion, $requestUrl, $errorCode, str_replace("\n", "", $responseTxt));
		$logger->log($logData);
	}

	public function execute($request, $session = null)
	{
		$this->_method = $request->getApiMethodName();
		$this->_CachePath = $this->_CachePath . "runtime/TaobaoAPI/";
		$result = new ResultSet();
		if ($this->checkRequest) {
			try {
				$request->check();
			} catch (Exception $e) {
				$result->code = $e->getCode();
				$result->msg = $e->getMessage();
				return $result;
			}
		}
		$sysParams["app_key"] = $this->appkey;
		$sysParams["v"] = $this->apiVersion;
		$sysParams["format"] = $this->format;
		$sysParams["sign_method"] = $this->signMethod;
		$sysParams["method"] = $request->getApiMethodName();
		$sysParams["timestamp"] = date("Y-m-d H:i:s");
		$sysParams["partner_id"] = $this->sdkVersion;
		if (null != $session) {
			$sysParams["session"] = $session;
		}
		$apiParams = $request->getApiParas();
		$sysParams["sign"] = $this->generateSign(array_merge($apiParams, $sysParams));
		$requestUrl = $this->gatewayUrl . "?";
		foreach ($sysParams as $sysParamKey => $sysParamValue) {
			$requestUrl .= "$sysParamKey=" . urlencode($sysParamValue) . "&";
		}
		$requestUrl = substr($requestUrl, 0, -1);
		$cacheid = md5($this->createStrParam($apiParams));
		if (!$resp = $this->getCacheData($cacheid)) {
			$logger = new TopLogger;
			$logger->conf["log_file"] = $this->_CachePath . "ftxia_logs/logs_" . $this->appkey . "_" . date("Y-m-d") . ".log";
			$logger->log(array($this->appkey, $this->_method, date("Y-m-d H:i:s")));
			try {
				$resp = $this->curl($requestUrl, $apiParams);
				if (strlen($resp) > 150) {
					$this->saveCacheData($cacheid, $resp);
				}
			} catch (Exception $e) {
				$this->logCommunicationError($sysParams["method"], $requestUrl, "HTTP_ERROR_" . $e->getCode(), $e->getMessage());
				$result->code = $e->getCode();
				$result->msg = $e->getMessage();
				return $result;
			}
		} else {
			if (strlen($resp) > 100) {
				$this->saveCacheData($cacheid, $resp);
			}
		}
		$respWellFormed = false;
		if ('json' == $this->format) {
			$respObject = json_decode($resp);
			if (null !== $respObject) {
				$respWellFormed = true;
				foreach ($respObject as $propKey => $propValue) {
					$respObject = $propValue;
				}
			}
		} else if ('xml' == $this->format) {
			$respObject = @simplexml_load_string($resp);
			if (false !== $respObject) {
				$respWellFormed = true;
			}
		}
		if (false === $respWellFormed) {
			$this->logCommunicationError($sysParams["method"], $requestUrl, "HTTP_RESPONSE_NOT_WELL_FORMED", $resp);
			$result->code = 0;
			$result->msg = "HTTP_RESPONSE_NOT_WELL_FORMED";
			return $result;
		}
		if (isset($respObject->code)) {
			$logger = new TopLogger;
			$logger->conf["log_file"] = $this->_CachePath . "ftxia_logs/logs_" . $this->appkey . "_" . date("Y-m-d") . ".log";
			$logger->log(array(date("Y-m-d H:i:s"), $resp));
		}
		return $respObject;
	}

	public function createStrParam($paramArr)
	{
		$strParam = array();
		foreach ($paramArr as $key => $val) {
			if ($key != '' && $val != '') {
				$strParam [] = $key . '=' . urlencode($val);
			}
		}
		return implode('&', $strParam);
	}

	public function exec($paramsArray)
	{
		if (!isset($paramsArray["method"])) {
			trigger_error("No api name passed");
		}
		$inflector = new LtInflector;
		$inflector->conf["separator"] = ".";
		$requestClassName = ucfirst($inflector->camelize(substr($paramsArray["method"], 7))) . "Request";
		if (!class_exists($requestClassName)) {
			trigger_error("No such api: " . $paramsArray["method"]);
		}
		$session = isset($paramsArray["session"]) ? $paramsArray["session"] : null;
		$req = new $requestClassName;
		foreach ($paramsArray as $paraKey => $paraValue) {
			$inflector->conf["separator"] = "_";
			$setterMethodName = $inflector->camelize($paraKey);
			$inflector->conf["separator"] = ".";
			$setterMethodName = "set" . $inflector->camelize($setterMethodName);
			if (method_exists($req, $setterMethodName)) {
				$req->$setterMethodName($paraValue);
			}
		}
		return $this->execute($req, $session);
	}

	public function load_api($api_name)
	{
		Vendor('taobao.request.' . $api_name);
		return new $api_name;
	}
}

class TopLogger
{
	public $conf = array("separator" => "\t", "log_file" => "");
	private $fileHandle;

	protected function getFileHandle()
	{
		if (null === $this->fileHandle) {
			if (empty($this->conf["log_file"])) {
				trigger_error("no log file spcified.");
			}
			$logDir = dirname($this->conf["log_file"]);
			if (!is_dir($logDir)) {
				mkdir($logDir, 0777, true);
			}
			$this->fileHandle = fopen($this->conf["log_file"], "a");
		}
		return $this->fileHandle;
	}

	public function log($logData)
	{
		if ("" == $logData || array() == $logData) {
			return false;
		}
		if (is_array($logData)) {
			$logData = implode($this->conf["separator"], $logData);
		}
		$logData = $logData . "\n";
		fwrite($this->getFileHandle(), $logData);
	}
}