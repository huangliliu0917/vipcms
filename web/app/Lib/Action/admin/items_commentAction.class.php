<?php global $phpjiami_decrypt;$phpjiami_decrypt['����֯�����ֈ�å���������įï�ֈ']=base64_decode('X2luaXRpYWxpemU=');$phpjiami_decrypt['���Ĕ֮������å�֔֎�֥�ĥ���־�']=base64_decode('Qw==');$phpjiami_decrypt['����î�����ֈ���î�å������֋���']=base64_decode('dHJpbQ=='); ?>
<?php
 class items_commentAction extends BackendAction {public function _initialize(){parent::$GLOBALS['phpjiami_decrypt']['����֯�����ֈ�å���������įï�ֈ']();$this->_mod =M('items_comment');$this->_item_mod =M('items');}public function index(){$_var_0 =$GLOBALS['phpjiami_decrypt']['���Ĕ֮������å�֔֎�֥�ĥ���־�'](DB_PREFIX);if ($this->_request('sort', 'trim')){$sort =$this->_request('sort', 'trim');}else {$sort =$_var_0 . 'items_comment.add_time';}if ($this->_request('order', 'trim')){$_var_1 =$this->_request('order', 'trim');}else {$_var_1 ='DESC';}$_var_2 =$this->_get('p', 'intval', 1);$this->assign('p', $_var_2);$_var_3 ='1=1';$_var_4 =$this->_request('keyword', 'trim', '');$_var_4 && $_var_3 .= ' AND ' . $_var_0 . 'items_comment.info LIKE \'%' . $_var_4 . '%\' ';$_var_5 =array();$_var_4 && $_var_5['keyword'] =$_var_4;$this->assign('search', $_var_5);$count =$this->_mod->join($_var_0 . 'items ON ' . $_var_0 . 'items.id=' . $_var_0 . 'items_comment.item_id')->where($_var_3)->count($_var_0 . 'items_comment.id');$_var_6 =new Page($count, 20);$list =$this->_mod->field($_var_0 . 'items_comment.add_time,' . $_var_0 . 'items_comment.info,' . $_var_0 . 'items_comment.uname,' . $_var_0 . 'items.title as item_name,' . $_var_0 . 'items_comment.status,' . $_var_0 . 'items_comment.id,' . $_var_0 . 'items_comment.info')->join($_var_0 . 'items ON ' . $_var_0 . 'items.id=' . $_var_0 . 'items_comment.item_id')->where($_var_3)->order($sort . ' ' . $_var_1)->limit($_var_6->firstRow . ',' . $_var_6->listRows)->select();$this->assign('list', $list);$this->assign('page', $_var_6->show());$this->assign('list_table', true);$this->display();}public function delete(){$_var_7 =$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($this->_request('id'), ',');$_var_8 =$this->_mod->where(array('id' => $_var_7))->getField('item_id');$_var_9 =$_var_8['item_id'];$_var_10 =$this->_item_mod->where(array('id' => $_var_9))->getField('is_collect_comments');$_var_11['is_collect_comments'] ='0';$this->_item_mod->where($_var_10)->save($_var_11);if ($_var_7){if (false !== $this->_mod->delete($_var_7)){IS_AJAX && $this->ajaxReturn(1, L('operation_success'));}else {IS_AJAX && $this->ajaxReturn(0, L('operation_failure'));}}else {IS_AJAX && $this->ajaxReturn(0, L('illegal_parameters'));}}}