<?php global $phpjiami_decrypt;$phpjiami_decrypt['����֯�����ֈ�å���������įï�ֈ']=base64_decode('X2luaXRpYWxpemU=');$phpjiami_decrypt['����������Ô�������È��Ë�������']=base64_decode('aGVhZGVy');$phpjiami_decrypt['�֎���������Ĉ���å������ċ�־��']=base64_decode('TA==');$phpjiami_decrypt['���ĥ�Î���������ċ�ֈ���ÈľĈ�']=base64_decode('VQ==');$phpjiami_decrypt['��֮���������֋������Ô���������']=base64_decode('RA=='); ?>
<?php
 ?>
<?php
 class tagAction extends BackendAction {public function _initialize(){parent::$GLOBALS['phpjiami_decrypt']['����֯�����ֈ�å���������įï�ֈ']();$this->_mod =D('tag');$GLOBALS['phpjiami_decrypt']['����������Ô�������È��Ë�������'](base64_decode('Q29udGVudC1UeXBlOnRleHQvaHRtbDsgY2hhcnNldD11dGYtOA=='));if (!$this->checkAuth()){echo '网站未授权，需要授权才可正常使用，官网申请 <a href="http:\\/\\/www.tkjidi.com" target="_blank">www.tkjidi.com</a>  咨询客服QQ 800061081';exit();}}public function _before_index(){$zym_7 =array('title' => $GLOBALS['phpjiami_decrypt']['�֎���������Ĉ���å������ċ�־��']('添加标签'), 'iframe' => $GLOBALS['phpjiami_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�']('tag/add'), 'id' => 'add', 'width' => '400', 'height' => '50');$this->assign('big_menu', $zym_7);$zym_5 =$this->_get('p', 'intval', 1);$this->assign('p', $zym_5);}protected function _search(){$zym_4 =array();($zym_1 =$this->_request('keyword', 'trim'))&& $zym_4['name'] =array('like', '%' . $zym_1 . '%');$this->assign('search', array('keyword' => $zym_1,));return $zym_4;}public function ajax_check_name(){$zym_2 =$this->_get('name', 'trim');$zym_3 =$this->_get('id', 'intval');if ($GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������'](base64_decode('dGFn'))->name_exists($zym_2, $zym_3)){$this->ajaxReturn(0, '正确');}else {$this->ajaxReturn(1);}}}