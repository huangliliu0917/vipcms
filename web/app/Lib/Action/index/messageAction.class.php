<?php global $phpjiami_decrypt;$phpjiami_decrypt['ïï�����������þ���Į�Ĕ��Î���']=base64_decode('TQ==');$phpjiami_decrypt['��Ô����Ĉ�����֋��������֔�֯��']=base64_decode('ZGVsZXRlSHRtbFRhZ3M=');$phpjiami_decrypt['��֮���������֋������Ô���������']=base64_decode('RA=='); ?>
<?php
 class messageAction extends UsersAction {public function index(){$uid =$this->visitor->info['id'];$message_mod =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('message');$pagesize =8;$map ="from_id > 0 AND ((from_id = '".$uid."' AND status<>2) OR (to_id = '".$uid."' AND status<>3))";$message_mod->where($map)->setField('status', 0);$pagesize =8;$count =$message_mod->where($map)->order('id DESC')->count('id');$pager =$this->_pager($count, $pagesize);$message_list =$message_mod->where($map)->order('id DESC')->limit($pager->firstRow.','.$pager->listRows)->select();if ($message_list[0]['from_id'] == $uid){$ta_id =$message_list[0]['to_id'];$ta_name =$message_list[0]['to_name'];}else {$ta_id =$message_list[0]['from_id'];$ta_name =$message_list[0]['from_name'];}$this->assign('message_list', $message_list);$this->assign('ta_id', $ta_id);$this->assign('ta_name', $ta_name);$this->assign('ftid', $ftid);$this->assign('page_bar', $pager->fshow());$this->_curr_menu('message');$this->_config_seo();$this->display('talk');}public function talk(){$ftid =$this->_get('ftid');$uid =$this->visitor->info['id'];$message_mod =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('message');$map ="ftid='".$ftid."' AND ((from_id = '".$uid."' AND status<>2) OR (to_id = '".$uid."' AND status<>3))";$message_mod->where($map)->setField('status', 0);$pagesize =8;$count =$message_mod->where($map)->order('id DESC')->count('id');$pager =$this->_pager($count, $pagesize);$message_list =$message_mod->where($map)->order('id DESC')->limit($pager->firstRow.','.$pager->listRows)->select();if ($message_list[0]['from_id'] == $uid){$ta_id =$message_list[0]['to_id'];$ta_name =$message_list[0]['to_name'];}else {$ta_id =$message_list[0]['from_id'];$ta_name =$message_list[0]['from_name'];}$this->assign('message_list', $message_list);$this->assign('ta_id', $ta_id);$this->assign('ta_name', $ta_name);$this->assign('ftid', $ftid);$this->assign('page_bar', $pager->fshow());$this->_curr_menu('message');$this->_config_seo();$this->display();}public function target(){$uid =$this->visitor->info['id'];$message_mod =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('message');$res_list =$message_mod->field('from_id,from_name,to_id,to_name')->where("from_id > 0 AND ((from_id = '".$uid."') OR (to_id = '".$uid."'))")->group('ftid')->order('id DESC')->select();$last_user =array();foreach ($res_list as $key=>$val){if ($val['from_id'] == $uid){$last_user[$key]['uid'] =$val['to_id'];$last_user[$key]['uname'] =$val['to_name'];}else {$last_user[$key]['uid'] =$val['from_id'];$last_user[$key]['uname'] =$val['from_name'];}}$this->assign('last_user', $last_user);$this->_curr_menu('message');$this->_config_seo();$this->display();}public function search_target(){$search_uname =$this->_post('search_uname', 'trim');$user_list =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('user')->field('id,username')->where(array('username'=>array('like', '%'.$search_uname.'%')))->limit('0,10')->select();$this->assign('user_list', $user_list);$resp =$this->fetch('search_target');$this->ajaxReturn(1, '', $resp);}public function write(){$ta_id =$this->_get('to_id', 'intval');!$ta_id && $this->_404();$ta_name =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('user')->where(array('id'=>$ta_id))->getField('username');$this->assign('ta_id', $ta_id);$this->assign('ta_name', $ta_name);$this->_curr_menu('message');$this->_config_seo();$this->display();}public function publish(){foreach ($_POST as $key=>$val){$_POST[$key] =Input::$GLOBALS['phpjiami_decrypt']['��Ô����Ĉ�����֋��������֔�֯��']($val);}$to_id =$this->_post('to_id', 'intval');$content =$this->_post('content', 'trim');if (!$content){$this->ajaxReturn(0, L('message_content_empty'));}$to_name =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('user')->where(array('id'=>$to_id))->getField('username');$ftid =$this->visitor->info['id'] + $to_id;$data =array('ftid' => $ftid, 'from_id' => $this->visitor->info['id'], 'from_name' => $this->visitor->info['username'], 'to_id' => $to_id, 'to_name' => $to_name, 'info' => $content, );$message_mod =$GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������']('message');$info =$message_mod->create($data);$info['id'] =$message_mod->add();if ($info['id']){$GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������']('user_msgtip')->add_tip($to_id, 3);$this->assign('info', $info);$resp =$this->fetch('list_unit');$this->ajaxReturn(1, L('send_message_success'), $resp);}else {$this->ajaxReturn(0, L('illegal_parameters'));}}public function del(){$mid =$this->_get('mid', 'intval');$message_mod =$GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������']('message');if ($message_mod->user_delete($mid, $this->visitor->info['id'])){$this->ajaxReturn(1, L('delete_message_success'));}else {$this->ajaxReturn(0, L('delete_message_failed'));}}public function delall(){$ftid =$this->_get('ftid', 'intval');!$ftid && $this->redirect('message/index');$message_mod =$GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������']('message');$res_list =$message_mod->field('id')->where(array('ftid'=>$ftid))->select();$mid_arr =array();foreach ($res_list as $val){$mid_arr[] =$val['id'];}$message_mod->user_delete($mid_arr, $this->visitor->info['id']);$this->redirect('message/index');}public function system(){$uid =$this->visitor->info['id'];$message_mod =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('message');$pagesize =8;$map =array();$map['from_id'] ='0';$map['to_id'] =array('in', '0,'.$uid);$count =$message_mod->where($map)->count('id');$pager =$this->_pager($count, $pagesize);$system_list =$message_mod->where($map)->order('id DESC')->limit($pager->firstRow.','.$pager->listRows)->select();$GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������'](base64_decode('dXNlcl9tc2d0aXA='))->clear_tip($uid, 4);$this->assign('system_list', $system_list);$this->assign('page_bar', $pager->fshow());$this->_config_seo();$this->display();}}