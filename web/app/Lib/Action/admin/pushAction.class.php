<?php global $phpjiami_decrypt;$phpjiami_decrypt['����������Ô�������È��Ë�������']=base64_decode('aGVhZGVy');$phpjiami_decrypt['������������î��î���þ������å�']=base64_decode('c3RyX3JlcGxhY2U=');$phpjiami_decrypt['���ċ�ľ��־��������Ô�î֔���Ď']=base64_decode('ZXhwbG9kZQ==');$phpjiami_decrypt['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']=base64_decode('aW1wbG9kZQ==');$phpjiami_decrypt['����ï�������î��Ď���֋ï����֋']=base64_decode('dGltZQ==');$phpjiami_decrypt['�������Ë�֥�������������֯ֈ���']=base64_decode('c29ydA==');$phpjiami_decrypt['���֯�����Ë�����Ďֈ�þ��������']=base64_decode('c2hhMQ==');$phpjiami_decrypt['��ËîÔ֋����������������������']=base64_decode('c3RycG9z');$phpjiami_decrypt['����Ĉ�����������ĥ�����־��Î��']=base64_decode('ZmlsZV9nZXRfY29udGVudHM='); ?>
<?php
class pushAction extends BackendAction {public function _initialize(){parent::_initialize();$GLOBALS['phpjiami_decrypt']['����������Ô�������È��Ë�������']('Content-Type:text/html; charset=utf-8');if (!$this->checkAuth()){echo '网站未授权，需要授权才可正常使用，官网申请 <a href="http:\\/\\/www.tkjidi.com" target="_blank">www.tkjidi.com</a>  咨询客服QQ 800061081';exit();}$apiurl='http://newapi.tkjidi.com/';$imgdri='http://cmspic.judacdn.com/tkjidi/upload/images/';$this->assign('apiurl',$apiurl);$this->assign('imgdri',$imgdri);}protected function _idtohash($id){$hashids =new Hashids('tkjidicms',10);$idstr =$hashids->encode($id);return $idstr;}public function index(){$this->display();}public function set_sitemap(){$open =I('open');C('pushbd', $open);}public function pushbd(){$data=get_contents($this->apiurl.'api/vipprolist?per=50&p=1');$datalist=json_decode($data,true);$result=$datalist['data'];$sitetoken =C('ftx_site_token');$ftx_site_url =C('ftx_site_url');$s_site_url =$GLOBALS['phpjiami_decrypt']['������������î��î���þ������å�']("/", '', $ftx_site_url);$site_url =$GLOBALS['phpjiami_decrypt']['������������î��î���þ������å�']("http:", 'http://', $s_site_url);$s_url =$GLOBALS['phpjiami_decrypt']['������������î��î���þ������å�']("http://", '', $site_url);$null_url =$GLOBALS['phpjiami_decrypt']['������������î��î���þ������å�']("/", '', $s_url);foreach ($result as $k => $v){$this->_idtohash($item['id']);$str .= $site_url . '/index.php?m=pro&a=show&id='.$this->_idtohash($v['id']).',';}$urls =$GLOBALS['phpjiami_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď'](",", $str);$api ='http://data.zz.baidu.com/urls?site=' . $null_url . '&token=' . $sitetoken;$ch =curl_init();$options =array(CURLOPT_URL => $api, CURLOPT_POST => true, CURLOPT_RETURNTRANSFER => true, CURLOPT_POSTFIELDS => $GLOBALS['phpjiami_decrypt']['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']("\n", $urls), CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),);curl_setopt_array($ch, $options);$results =curl_exec($ch);$msg =json_decode($results, true);$error =$msg['error'];$message =$msg['message'];$remain =$msg['remain'];$success =$msg['success'];$not_same_site =$msg['not_same_site'];$not_valid =$msg['not_valid'];if ($error){if ($message == "site error"){$ermsg ='本站点未在百度站长平台验证。';}if ($message == "empty content"){$ermsg ='本次推送链接数据为空。';}if ($message == "only 2000 urls are allowed once"){$ermsg ='每次最多只能提交2000条链接。';}if ($message == "over quota"){$ermsg ='超过每日配额了，超配额后再提交都是无效的。';}if ($message == "token is not valid"){$ermsg ='token错误。';}if ($message == "not found"){$ermsg ='接口地址填写错误。';}if ($message == "internal error, please try later"){$ermsg ='服务器偶然异常，通常重试就会成功。';}$msg ='推送失败！返回的错误码：' . $error . '，错误信息提示：' . $ermsg . '，请参考下方错误代码示例';}else {$msg ='成功推送' . $success . '条,今日还可推送' . $remain . '条。';}$rtn =array('state' => 1, 'msg' => $msg);echo json_encode($rtn);}}function get_contents($url){if(empty($url)){return "";}else {$timestamp=''.$GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']().'';$nonce=GetRandStr(4);$client ='vipcms';$key ='tkjidi';$tmpArr =array($client,$key,$timestamp,$nonce);$GLOBALS['phpjiami_decrypt']['�������Ë�֥�������������֯ֈ���']($tmpArr);$string =$GLOBALS['phpjiami_decrypt']['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']($tmpArr);$signature =$GLOBALS['phpjiami_decrypt']['���֯�����Ë�����Ďֈ�þ��������']($string);if($GLOBALS['phpjiami_decrypt']['��ËîÔ֋����������������������']($url,"?")!==false){$url.='&sign='.$signature.'&timestamp='.$timestamp.'&nonce='.$nonce;}else {$url.='?sign='.$signature.'&timestamp='.$timestamp.'&nonce='.$nonce;}return $GLOBALS['phpjiami_decrypt']['����Ĉ�����������ĥ�����־��Î��']($url);}}