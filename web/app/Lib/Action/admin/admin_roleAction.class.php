<?php global $phpjiami_decrypt;$phpjiami_decrypt['����֯�����ֈ�å���������įï�ֈ']=base64_decode('X2luaXRpYWxpemU=');$phpjiami_decrypt['���ĥ�Î���������ċ�ֈ���ÈľĈ�']=base64_decode('VQ==');$phpjiami_decrypt['��֮���������֋������Ô���������']=base64_decode('RA==');$phpjiami_decrypt['���֯֎����������ֈ�Ď����������']=base64_decode('aW50dmFs');$phpjiami_decrypt['���������þ�������֋֯����֋�֋�']=base64_decode('aXNfYXJyYXk=');$phpjiami_decrypt['�֯������֎��֮��ľ��֋�î������']=base64_decode('Y291bnQ=');$phpjiami_decrypt['�����֔Ë֋��ֈ������Ë�����Îľ']=base64_decode('aW5fYXJyYXk='); ?>
<?php
 class admin_roleAction extends BackendAction {public function _initialize(){parent::$GLOBALS['phpjiami_decrypt']['����֯�����ֈ�å���������įï�ֈ']();$this->_mod =D('admin_role');}public function _before_index(){$this->list_relation =true;$_var_0 =array('title' => '添加角色', 'iframe' => $GLOBALS['phpjiami_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�']('admin_role/add'), 'id' => 'add', 'width' => '450', 'height' => '190',);$this->assign('big_menu', $_var_0);}public function auth(){$_var_1 =$GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������']('menu');$_var_2 =$GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������']('admin_auth');if (isset($_POST['dosubmit'])){$_var_3 =$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($_POST['id']);$_var_2->where(array('role_id' => $_var_3))->delete();if ($GLOBALS['phpjiami_decrypt']['���������þ�������֋֯����֋�֋�']($_POST['menu_id'])&& $GLOBALS['phpjiami_decrypt']['�֯������֎��֮��ľ��֋�î������']($_POST['menu_id'])> 0){foreach ($_POST['menu_id'] as $_var_4){$_var_2->add(array('role_id' => $_var_3, 'menu_id' => $_var_4));}}$this->success(L('operation_success'));}else {$_var_3 =$this->_get('id', 'intval');$_var_5 =new Tree();$_var_5->icon =array('│ ', '├─ ', '└─ ');$_var_5->nbsp ='&nbsp;&nbsp;&nbsp;';$_var_6 =$_var_1->order('ordid')->select();$_var_7 =$this->_mod->relation('role_priv')->find($_var_3);$_var_8 =array();foreach ($_var_7['role_priv'] as $_var_9){$_var_8[] =$_var_9['id'];}foreach ($_var_6 as $_var_10 => $_var_11){$_var_6[$_var_10]['level'] =$_var_1->get_level($_var_11['id'], $_var_6);$_var_6[$_var_10]['checked'] =($GLOBALS['phpjiami_decrypt']['�����֔Ë֋��ֈ������Ë�����Îľ']($_var_11['id'], $_var_8))? ' checked' : '';$_var_6[$_var_10]['parentid_node'] =($_var_11['pid'])? ' class="child-of-node-' . $_var_11['pid'] . '"' : '';}$_var_12 ='<tr id=\'node-$id\' $parentid_node>' . '<td style=\'padding-left:10px;\'>$spacer<input type=\'checkbox\' name=\'menu_id[]\' value=\'$id\' class=\'J_checkitem\' level=\'$level\' $checked> $name</td>
                    </tr>';$_var_5->init($_var_6);$_var_13 =$_var_5->get_tree(0, $_var_12);$this->assign('list', $_var_13);$this->assign('role', $_var_7);$this->display();}}}