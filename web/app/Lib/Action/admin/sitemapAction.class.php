<?php global $phpjiami_decrypt;$phpjiami_decrypt['����������Ô�������È��Ë�������']=base64_decode('aGVhZGVy');$phpjiami_decrypt['��ċ��þ��È�������������֯���å']=base64_decode('aHRtbHNwZWNpYWxjaGFycw==');$phpjiami_decrypt['�����֮�į���������������þ�Ĕ��']=base64_decode('ZGF0ZQ==');$phpjiami_decrypt['����ï�������î��Ď���֋ï����֋']=base64_decode('dGltZQ==');$phpjiami_decrypt['����֮���å���������������������']=base64_decode('ZmlsZV9wdXRfY29udGVudHM=');$phpjiami_decrypt['�������Ë�֥�������������֯ֈ���']=base64_decode('c29ydA==');$phpjiami_decrypt['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']=base64_decode('aW1wbG9kZQ==');$phpjiami_decrypt['���֯�����Ë�����Ďֈ�þ��������']=base64_decode('c2hhMQ==');$phpjiami_decrypt['��ËîÔ֋����������������������']=base64_decode('c3RycG9z');$phpjiami_decrypt['����Ĉ�����������ĥ�����־��Î��']=base64_decode('ZmlsZV9nZXRfY29udGVudHM='); ?>
<?php
class sitemapAction extends BackendAction {public function _initialize(){parent::_initialize();$GLOBALS['phpjiami_decrypt']['����������Ô�������È��Ë�������']('Content-Type:text/html; charset=utf-8');if (!$this->checkAuth()){echo '网站未授权，需要授权才可正常使用，官网申请 <a href="http:\\/\\/www.tkjidi.com" target="_blank">www.tkjidi.com</a>  咨询客服QQ 800061081';exit();}$apiurl='http://newapi.tkjidi.com/';$imgdri='http://cmspic.judacdn.com/tkjidi/upload/images/';$this->assign('apiurl',$apiurl);$this->assign('imgdri',$imgdri);}protected function _idtohash($id){$hashids =new Hashids('tkjidicms',10);$idstr =$hashids->encode($id);return $idstr;}public function index(){$this->display();}public function set_sitemap(){$_var_0 =I('open');C('sitemap', $_var_0);}public function sitemap(){$data=get_contents($this->apiurl.'api/vipprolist?per=100&p=1');$datalist=json_decode($data,true);$_var_1=$datalist['data'];$classfile="classlist";if(!S($classfile)){$_var_0=get_contents($this->apiurl.'api/vipclass');$_var_0a=json_decode($_var_0,true);$clist=$_var_0a['data'];S($classfile,$clist,60*60*24);}$_var_2=S($classfile);$_var_3 =D('sitemap')->get_article();$_var_4 =C('ftx_site_url');$_var_5 ='<urlset xmlns=\'http://www.sitemaps.org/schemas/sitemap/0.9\'>';$_var_5 .= '<url>';$_var_5 .= '<loc>' . $GLOBALS['phpjiami_decrypt']['��ċ��þ��È�������������֯���å']($_var_4). '</loc>';$_var_5 .= '<changefreq>weekly</changefreq>';$_var_5 .= '<lastmod>' . $GLOBALS['phpjiami_decrypt']['�����֮�į���������������þ�Ĕ��'](DATE_ATOM, $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()). '</lastmod>';$_var_5 .= '<priority>1</priority>';$_var_5 .= '</url>';if ($_var_2){foreach ($_var_2 as $_var_6 => $_var_7){$_var_5 .= '<url>';$_var_5 .= '<loc>' . $GLOBALS['phpjiami_decrypt']['��ċ��þ��È�������������֯���å']($_var_4 . 'index.php?m=quan&a=index&cate_id=' . $_var_7['id']). '</loc>';$_var_5 .= '<changefreq>daily</changefreq>';$_var_5 .= '<lastmod>' . $GLOBALS['phpjiami_decrypt']['�����֮�į���������������þ�Ĕ��'](DATE_ATOM, $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()). '</lastmod>';$_var_5 .= '<priority>0.9</priority>';$_var_5 .= '</url>';}}if ($_var_3){foreach ($_var_3 as $_var_8 => $_var_9){$_var_5 .= '<url>';$_var_5 .= '<loc>' . $GLOBALS['phpjiami_decrypt']['��ċ��þ��È�������������֯���å']($_var_4 . 'index.php?m=article&a=read&id=' . $_var_9['id']). '</loc>';$_var_5 .= '<changefreq>daily</changefreq>';$_var_5 .= '<lastmod>' . $GLOBALS['phpjiami_decrypt']['�����֮�į���������������þ�Ĕ��'](DATE_ATOM, $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()). '</lastmod>';$_var_5 .= '<priority>0.9</priority>';$_var_5 .= '</url>';}}if ($_var_1){foreach ($_var_1 as $_var_10 => $_var_11){$_var_5 .= '<url>';$_var_5 .= '<loc>' . $GLOBALS['phpjiami_decrypt']['��ċ��þ��È�������������֯���å']($_var_4 . 'index.php?m=pro&a=show&id=' . $this->_idtohash($_var_11['id'])). '</loc>';$_var_5 .= '<changefreq>daily</changefreq>';$_var_5 .= '<lastmod>' . $GLOBALS['phpjiami_decrypt']['�����֮�į���������������þ�Ĕ��'](DATE_ATOM, $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()). '</lastmod>';$_var_5 .= '<priority>0.9</priority>';$_var_5 .= '</url>';}}$_var_5 .= '</urlset>';$GLOBALS['phpjiami_decrypt']['����֮���å���������������������']($_SERVER['DOCUMENT_ROOT'] . '/sitemap.xml', $_var_5);$_var_12 =array('state' => 1, 'msg' => '更新站点地图完成');echo json_encode($_var_12);}}function get_contents($url){if(empty($url)){return "";}else {$timestamp=''.$GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']().'';$nonce=GetRandStr(4);$client ='vipcms';$key ='tkjidi';$tmpArr =array($client,$key,$timestamp,$nonce);$GLOBALS['phpjiami_decrypt']['�������Ë�֥�������������֯ֈ���']($tmpArr);$string =$GLOBALS['phpjiami_decrypt']['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']($tmpArr);$signature =$GLOBALS['phpjiami_decrypt']['���֯�����Ë�����Ďֈ�þ��������']($string);if($GLOBALS['phpjiami_decrypt']['��ËîÔ֋����������������������']($url,"?")!==false){$url.='&sign='.$signature.'&timestamp='.$timestamp.'&nonce='.$nonce;}else {$url.='?sign='.$signature.'&timestamp='.$timestamp.'&nonce='.$nonce;}return $GLOBALS['phpjiami_decrypt']['����Ĉ�����������ĥ�����־��Î��']($url);}}?>
