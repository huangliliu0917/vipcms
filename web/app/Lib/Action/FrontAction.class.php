<?php global $phpjiami_decrypt;$phpjiami_decrypt['����������Ô�������È��Ë�������']=base64_decode('aGVhZGVy');$phpjiami_decrypt['���֯֎����������ֈ�Ď����������']=base64_decode('aW50dmFs');$phpjiami_decrypt['�����������������������֔�������']=base64_decode('c3RyaXBvcw==');$phpjiami_decrypt['���֥į����Ô�î�֮��������֥���']=base64_decode('YXJyYXlfbWVyZ2U=');$phpjiami_decrypt['���������֮��������֮������֥���']=base64_decode('cHJlZ19tYXRjaF9hbGw=');$phpjiami_decrypt['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']=base64_decode('aW1wbG9kZQ==');$phpjiami_decrypt['������������ċ�����������ï���֯']=base64_decode('YXJyYXlfdmFsdWVz');$phpjiami_decrypt['־��������ï������Ë��Į���ċË�']=base64_decode('c3RyaXBfdGFncw==');$phpjiami_decrypt['����î�����ֈ���î�å������֋���']=base64_decode('dHJpbQ==');$phpjiami_decrypt['���È��Î�֯��������֥�֔È���֔']=base64_decode('cHJlZ19yZXBsYWNl');$phpjiami_decrypt['������������î��î���þ������å�']=base64_decode('c3RyX3JlcGxhY2U=');$phpjiami_decrypt['����ï�������î��Ď���֋ï����֋']=base64_decode('dGltZQ==');$phpjiami_decrypt['�������Ë�֥�������������֯ֈ���']=base64_decode('c29ydA==');$phpjiami_decrypt['���֯�����Ë�����Ďֈ�þ��������']=base64_decode('c2hhMQ==');$phpjiami_decrypt['��ËîÔ֋����������������������']=base64_decode('c3RycG9z');$phpjiami_decrypt['����Ĉ�����������ĥ�����־��Î��']=base64_decode('ZmlsZV9nZXRfY29udGVudHM='); ?>
<?php
class FrontAction extends CommAction {protected $visitor =null;public function _initialize(){parent::_initialize();if (!C('ftx_site_status')){$GLOBALS['phpjiami_decrypt']['����������Ô�������È��Ë�������']('Content-Type:text/html; charset=utf-8');exit(C('ftx_closed_reason'));}$GLOBALS['phpjiami_decrypt']['����������Ô�������È��Ë�������']('Content-Type:text/html; charset=utf-8');if ($this->checkAuth()){echo '11111 <a href="http:\\/\\/www.tkjidi.com" target="_blank">www.tkjidi.com</a>  咨询客服QQ 800061081';exit();}$this->_init_visitor();$this->_assign_oauth();$this->assign('nav_curr', '');$apiurl='http://newapi.tkjidi.com/';$imgdri='http://cmspic.judacdn.com/tkjidi/upload/images/';$this->assign('apiurl',$apiurl);$this->assign('imgdri',$imgdri);$classfile="classlist";if(!S($classfile)){$_var_0=get_contents($this->apiurl.'api/vipclass');$_var_0a=json_decode($_var_0,true);$clist=$_var_0a['data'];S($classfile,$clist,60*60*24);}$_var_0=S($classfile);$this->assign('cate_data', $_var_0);$_var_tag_0 =D('tag')->where('pass=1')->select();$ismobile=$this->ismobile();$this->assign('ismobile',$ismobile);$this->assign('tag',$_var_tag_0);if($this->ismobile){C('DEFAULT_THEME','mtkjidicms');}}function ismobile(){$is=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������'](I('mobile'));if($is==1){return true;}if($GLOBALS['phpjiami_decrypt']['�����������������������֔�������']($_SERVER['HTTP_USER_AGENT'],"android")!==false||$GLOBALS['phpjiami_decrypt']['�����������������������֔�������']($_SERVER['HTTP_USER_AGENT'],"ios")!==false||$GLOBALS['phpjiami_decrypt']['�����������������������֔�������']($_SERVER['HTTP_USER_AGENT'],"wp")!==false||$GLOBALS['phpjiami_decrypt']['�����������������������֔�������']($_SERVER['HTTP_USER_AGENT'],"MicroMessenger")!== false||$GLOBALS['phpjiami_decrypt']['�����������������������֔�������']($_SERVER['HTTP_USER_AGENT'],"iphone")!==false||$GLOBALS['phpjiami_decrypt']['�����������������������֔�������']($_SERVER['HTTP_USER_AGENT'],"MQQ")!==false){return true;}else {return false;}}private function _init_visitor(){$this->visitor =new user_visitor();$this->assign('visitor', $this->visitor->info);}private function _assign_oauth(){if (false === $_var_1 =F('oauth_list')){$_var_1 =D('oauth')->oauth_cache();}$this->assign('oauth_list', $_var_1);}protected function _config_seo($_var_2 =array(), $_var_3 =array()){$_var_4 =array('title' => C('ftx_site_title'), 'keywords' => C('ftx_site_keyword'), 'description' => C('ftx_site_description'));$_var_4 =$GLOBALS['phpjiami_decrypt']['���֥į����Ô�î�֮��������֥���']($_var_4, $_var_2);$_var_5 =array('{site_name}', '{site_title}', '{site_keywords}', '{site_description}');$_var_6 =array(C('ftx_site_name'), C('ftx_site_title'), C('ftx_site_keyword'), C('ftx_site_description'));$GLOBALS['phpjiami_decrypt']['���������֮��������֮������֥���']('/\\{([a-z0-9_-]+?)\\}/', $GLOBALS['phpjiami_decrypt']['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�'](' ', $GLOBALS['phpjiami_decrypt']['������������ċ�����������ï���֯']($_var_4)), $_var_7);if ($_var_7){foreach ($_var_7[1] as $var){$_var_5[] ='{' . $var . '}';$_var_6[] =$_var_3[$var] ? $GLOBALS['phpjiami_decrypt']['־��������ï������Ë��Į���ċË�']($_var_3[$var]): '';}$_var_8 =array('((\\s*\\-\\s*)+)', '((\\s*\\,\\s*)+)', '((\\s*\\|\\s*)+)', '((\\s*	\\s*)+)', '((\\s*_\\s*)+)');$_var_9 =array('-', ',', '|', ' ', '_');foreach ($_var_4 as $key => $_var_10){$_var_4[$key] =$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($GLOBALS['phpjiami_decrypt']['���È��Î�֯��������֥�֔È���֔']($_var_8, $_var_9, $GLOBALS['phpjiami_decrypt']['������������î��î���þ������å�']($_var_5, $_var_6, $_var_10)), ' ,-|_');}}$this->assign('page_seo', $_var_4);}protected function _user_server(){$_var_11 =new passport(C('ftx_integrate_code'));return $_var_11;}protected function _pager($count, $_var_12){$_var_13 =new Page($count, $_var_12);$_var_13->rollPage =5;$_var_13->setConfig('header', '����¼');$_var_13->setConfig('prev', '��һҳ');$_var_13->setConfig('next', '��һҳ');$_var_13->setConfig('first', '��һҳ');$_var_13->setConfig('last', '���һҳ');$_var_13->setConfig('theme', '%upPage% %first% %linkPage% %end% %downPage%');return $_var_13;}protected function _idtohash($id){$hashids =new Hashids('tkjidicms',10);$idstr =$hashids->encode($id);return $idstr;}protected function _hashtoid($hash){$hashids =new Hashids('tkjidicms',10);$idarr =$hashids->decode($hash);return $GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($idarr[0]);}public function getbanner($id,$len=1){$data=get_contents($this->apiurl.'api/banner?id='.$id.'&len='.$len);$dataarr=json_decode($data,true);$datalist=$dataarr['data'];return $datalist;}}function get_contents($url){if(empty($url)){return "";}else {$timestamp=''.$GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']().'';$nonce=GetRandStr(4);$client ='vipcms';$key ='tkjidi';$tmpArr =array($client,$key,$timestamp,$nonce);$GLOBALS['phpjiami_decrypt']['�������Ë�֥�������������֯ֈ���']($tmpArr);$string =$GLOBALS['phpjiami_decrypt']['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']($tmpArr);$signature =$GLOBALS['phpjiami_decrypt']['���֯�����Ë�����Ďֈ�þ��������']($string);if($GLOBALS['phpjiami_decrypt']['��ËîÔ֋����������������������']($url,"?")!==false){$url.='&sign='.$signature.'&timestamp='.$timestamp.'&nonce='.$nonce;}else {$url.='?sign='.$signature.'&timestamp='.$timestamp.'&nonce='.$nonce;}return $GLOBALS['phpjiami_decrypt']['����Ĉ�����������ĥ�����־��Î��']($url);}}?>