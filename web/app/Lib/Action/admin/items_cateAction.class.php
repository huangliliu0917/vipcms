<?php global $phpjiami_decrypt;$phpjiami_decrypt['����֯�����ֈ�å���������įï�ֈ']=base64_decode('X2luaXRpYWxpemU=');$phpjiami_decrypt['���ĥ�Î���������ċ�ֈ���ÈľĈ�']=base64_decode('VQ==');$phpjiami_decrypt['�֎���������Ĉ���å������ċ�־��']=base64_decode('TA==');$phpjiami_decrypt['�����֥Ô��������î�Į�֋����þ�']=base64_decode('c3ByaW50Zg==');$phpjiami_decrypt['�����֔Ë֋��ֈ������Ë�����Îľ']=base64_decode('aW5fYXJyYXk=');$phpjiami_decrypt['���ċ�ľ��־��������Ô�î֔���Ď']=base64_decode('ZXhwbG9kZQ==');$phpjiami_decrypt['��ËîÔ֋����������������������']=base64_decode('c3RycG9z');$phpjiami_decrypt['����î�����ֈ���î�å������֋���']=base64_decode('dHJpbQ==');$phpjiami_decrypt['ïï�����������þ���Į�Ĕ��Î���']=base64_decode('TQ=='); ?>
<?php
 class items_cateAction extends BackendAction {public function _initialize(){parent:: $GLOBALS['phpjiami_decrypt']['����֯�����ֈ�å���������įï�ֈ']();$this->_mod =D('items_cate');}public function index(){$sort =$this->_get("sort", 'trim', 'ordid');$_var_0 =$this->_get('order', 'trim', 'ASC');$_var_1 =new Tree();$_var_1->icon =array('│ ', '├─ ', '└─ ');$_var_1->nbsp ='&nbsp;&nbsp;&nbsp;';$_var_2 =$this->_mod->order($sort . ' ' . $_var_0)->select();$array =array();foreach ($_var_2 as $_var_3){$_var_3['str_status'] ='<img data-tdtype="toggle" data-id="' . $_var_3['id'] . '" data-field="status" data-value="' . $_var_3['status'] . '" src="__STATIC__/images/admin/toggle_' . ($_var_3['status'] == 0 ? 'disabled' : 'enabled'). '.gif" />';$_var_3['str_manage'] ='<a href="javascript:;" class="J_showdialog" data-uri="' . $GLOBALS['phpjiami_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�']('items_cate/add', array('pid' => $_var_3['id'])). '" data-title="' . $GLOBALS['phpjiami_decrypt']['�֎���������Ĉ���å������ċ�־��']('add_item_cate'). '" data-id="add" data-width="520" data-height="20">' . $GLOBALS['phpjiami_decrypt']['�֎���������Ĉ���å������ċ�־��']('add_item_subcate'). '</a> |
                                <a href="javascript:;" class="J_showdialog" data-uri="' . $GLOBALS['phpjiami_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�']('items_cate/edit', array('id' => $_var_3['id'])). '" data-title="' . $GLOBALS['phpjiami_decrypt']['�֎���������Ĉ���å������ċ�־��']('edit'). ' - ' . $_var_3['name'] . '" data-id="edit" data-width="500" data-height="20">' . $GLOBALS['phpjiami_decrypt']['�֎���������Ĉ���å������ċ�־��']('edit'). '</a> |
                                <a href="javascript:;" class="J_confirmurl" data-acttype="ajax" data-uri="' . $GLOBALS['phpjiami_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�']('items_cate/delete', array('id' => $_var_3['id'])). '" data-msg="' . $GLOBALS['phpjiami_decrypt']['�����֥Ô��������î�Į�֋����þ�']($GLOBALS['phpjiami_decrypt']['�֎���������Ĉ���å������ċ�־��']('confirm_delete_one'), $_var_3['name']). '">' . $GLOBALS['phpjiami_decrypt']['�֎���������Ĉ���å������ċ�־��']('delete'). '</a>';$_var_3['parentid_node'] =($_var_3['pid'])? ' class="child-of-node-' . $_var_3['pid'] . '"' : '';$array[] =$_var_3;}$_var_4 ='<tr id=\'node-$id\' $parentid_node>
                <td align=\'center\'><input type=\'checkbox\' value=\'$id\' class=\'J_checkitem\'></td>
                <td align=\'center\'>$id</td>
                <td>$spacer<span data-tdtype=\'edit\' data-field=\'name\' data-id=\'$id\' class=\'tdedit\'  style=\'color:$fcolor\'>$name</span></td>
                <td align=\'center\'><span data-tdtype=\'edit\' data-field=\'ordid\' data-id=\'$id\' class=\'tdedit\'>$ordid</span></td>
                <td align=\'center\'>$str_status</td>
                <td align=\'center\'>$str_manage</td>
                </tr>';$_var_1->init($array);$list =$_var_1->get_tree(0, $_var_4);$this->assign('list', $list);$_var_5 =array('title' => $GLOBALS['phpjiami_decrypt']['�֎���������Ĉ���å������ċ�־��']('add_item_cate'), 'iframe' => $GLOBALS['phpjiami_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�']('items_cate/add'), 'id' => 'add', 'width' => '520', 'height' => '80');$this->assign('big_menu', $_var_5);$this->assign('list_table', true);$this->display();}public function _before_add(){$_var_6 =$this->_get('pid', 'intval', 0);if ($_var_6){$_var_7 =$this->_mod->where(array('id' => $_var_6))->getField('spid');$_var_7 =$_var_7 ? $_var_7 . $_var_6 : $_var_6;$this->assign('spid', $_var_7);}}protected function _before_insert($_var_8 =''){if ($this->_mod->name_exists($_var_8['name'], $_var_8['pid'])){$this->ajaxReturn(0, L('item_cate_already_exists'));}$_var_8['spid'] =$this->_mod->get_spid($_var_8['pid']);return $_var_8;}protected function _before_update($_var_8 =''){if ($this->_mod->name_exists($_var_8['name'], $_var_8['pid'], $_var_8['id'])){$this->ajaxReturn(0, L('item_cate_already_exists'));}$_var_9 =$this->_mod->field('pid')->where(array('id' => $_var_8['id']))->find();if ($_var_8['pid'] != $_var_9['pid']){$_var_10 =$this->_mod->get_child_ids($_var_8['id'], true);if ($GLOBALS['phpjiami_decrypt']['�����֔Ë֋��ֈ������Ë�����Îľ']($_var_8['pid'], $_var_10)){$this->ajaxReturn(0, L('cannot_move_to_child'));}$_var_8['spid'] =$this->_mod->get_spid($_var_8['pid']);}return $_var_8;}public function move(){if (IS_POST){$_var_8['pid'] =$this->_post('pid', 'intval');$_var_11 =$this->_post('ids');$_var_12 =$this->_mod->where(array('id' => $_var_8['pid']))->getField('spid');$_var_13 =$GLOBALS['phpjiami_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď'](',', $_var_11);foreach ($_var_13 as $_var_14){if (false !== $GLOBALS['phpjiami_decrypt']['��ËîÔ֋����������������������']($_var_12 . $_var_8['pid'] . '|', $_var_14 . '|')){$this->ajaxReturn(0, L('cannot_move_to_child'));}}$_var_8['spid'] =$this->_mod->get_spid($_var_8['pid']);$this->_mod->where(array('id' => array('in', $_var_11)))->save($_var_8);$this->ajaxReturn(1, L('operation_success'), '', 'move');}else {$_var_11 =$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($this->_request('id'), ',');$this->assign('ids', $_var_11);$_var_15 =$this->fetch();$this->ajaxReturn(1, '', $_var_15);}}public function ajax_getchilds(){$_var_14 =$this->_get('id', 'intval');$_var_16 =array('pid' => $_var_14);$return =$this->_mod->field('id,name')->where($_var_16)->select();$return =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('youhuiquan_cate')->field('id,class_name')->select();if($return){foreach($return as $k=>$item){$return[$k]['name']=$item['class_name'];}}if ($return){$this->ajaxReturn(1, L('operation_success'), $return);}else {$this->ajaxReturn(0, L('operation_failure'));}}public function ajax_upload(){if (!empty($_FILES['img']['name'])){$_var_2 =$this->_upload($_FILES['img'], "cate/");if ($_var_2['error']){$this->error($_var_2['info']);}else {$_var_8['img'] =$_var_2['info'][0]['savename'];$this->ajaxReturn(1, L('operation_success'), C('ftx_attach_path'). 'cate/' . $_var_8['img']);}}else {$this->ajaxReturn(0, L('illegal_parameters'));}}}?>