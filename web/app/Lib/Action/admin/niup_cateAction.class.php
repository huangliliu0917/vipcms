<?php global $phpjiami_decrypt;$phpjiami_decrypt['���Ô�������į�ֈ��֥���־������']=base64_decode('c2Vzc2lvbg==');$phpjiami_decrypt['����֯�����ֈ�å���������įï�ֈ']=base64_decode('X2luaXRpYWxpemU='); ?>
<?php
 class niup_cateAction extends BackendAction {public function _initialize(){$GLOBALS['phpjiami_decrypt']['���Ô�������į�ֈ��֥���־������']('[start]');parent::$GLOBALS['phpjiami_decrypt']['����֯�����ֈ�å���������įï�ֈ']();$this->_mod =D('niup_cate');}public function ajax_getchilds(){$id =$this->_get('id', 'intval');$map =array('pid' => $id);$return =$this->_mod->field('id,name')->where($map)->select();if ($return){$this->ajaxReturn(1, L('operation_success'), $return);}else {$this->ajaxReturn(0, L('operation_failure'));}}}