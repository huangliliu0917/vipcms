<?php global $phpjiami_decrypt;$phpjiami_decrypt['����֯�����ֈ�å���������įï�ֈ']=base64_decode('X2luaXRpYWxpemU=');$phpjiami_decrypt['���ĥ�Î���������ċ�ֈ���ÈľĈ�']=base64_decode('VQ==');$phpjiami_decrypt['ïï�����������þ���Į�Ĕ��Î���']=base64_decode('TQ==');$phpjiami_decrypt['����î�����ֈ���î�å������֋���']=base64_decode('dHJpbQ==');$phpjiami_decrypt['���ċ�ľ��־��������Ô�î֔���Ď']=base64_decode('ZXhwbG9kZQ==');$phpjiami_decrypt['ċ�֯��Ô�֮���������֥�î������']=base64_decode('bWQ1');$phpjiami_decrypt['�ï������ï�����î������į������']=base64_decode('YXZhdGFyX2Rpcg==');$phpjiami_decrypt['���Ĕ֮������å�֔֎�֥�ĥ���־�']=base64_decode('Qw==');$phpjiami_decrypt['ï�î��������־֎�������������î']=base64_decode('dW5saW5r');$phpjiami_decrypt['���È��þ�Ë־��֯�ċ���į��־��']=base64_decode('aXNfZGly');$phpjiami_decrypt['���֯Ë��ֈ���������î����������']=base64_decode('bWtkaXI=');$phpjiami_decrypt['���Ď�ĥ��֯ï��������þ��Ëֈ��']=base64_decode('dGh1bWI=');$phpjiami_decrypt['����ï�������î��Ď���֋ï����֋']=base64_decode('dGltZQ=='); ?>
<?php
 class userAction extends BackendAction {public function _initialize(){parent::$GLOBALS['phpjiami_decrypt']['����֯�����ֈ�å���������įï�ֈ']();$this->_mod =D('user');$this->_score_log_mod =D('score_log');}protected function _search(){$map =array();if ($keyword =$this->_request('keyword', 'trim')){$map['_string'] ="username like '%" . $keyword . "%' OR email like '%" . $keyword . "%'";}$this->assign('search', array('keyword' => $keyword,));return $map;}public function _before_index(){$big_menu =array('title' => '添加会员', 'iframe' => $GLOBALS['phpjiami_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�']('user/add'), 'id' => 'add', 'width' => '500', 'height' => '330');$this->assign('big_menu', $big_menu);}public function index(){$list =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('user')->where('login_type = 1')->order('reg_time desc')->select();$this->assign('list', $list);$this->display();}public function seller(){$list =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('user')->where('login_type = 2')->order('reg_time desc')->select();$big_menu =array('title' => '添加商家', 'iframe' => $GLOBALS['phpjiami_decrypt']['���ĥ�Î���������ċ�ֈ���ÈľĈ�']('user/add'), 'id' => 'add', 'width' => '500', 'height' => '330');$this->assign('list', $list);$this->assign('big_menu', $big_menu);$this->display();}public function _before_insert($data){if (($data['password'] != '')&& ($GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($data['password'])!= '')){$data['password'] =$data['password'];}else {unset($data['password']);}$birthday =$this->_post('birthday', 'trim');if ($birthday){$birthday =$GLOBALS['phpjiami_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď']('-', $birthday);$data['byear'] =$birthday[0];$data['bmonth'] =$birthday[1];$data['bday'] =$birthday[2];}return $data;}public function _after_insert($id){$img =$this->_post('img', 'trim');$this->user_thumb($id, $img);}public function _before_update($data){if (($data['password'] != '')&& ($GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($data['password'])!= '')){$data['password'] =$GLOBALS['phpjiami_decrypt']['ċ�֯��Ô�֮���������֥�î������']($data['password']);}else {unset($data['password']);}$birthday =$this->_post('birthday', 'trim');if ($birthday){$birthday =$GLOBALS['phpjiami_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď']('-', $birthday);$data['byear'] =$birthday[0];$data['bmonth'] =$birthday[1];$data['bday'] =$birthday[2];}return $data;}public function _after_update($id){$img =$this->_post('img', 'trim');if ($img){$this->user_thumb($id, $img);}}public function user_thumb($id, $img){$img_path =$GLOBALS['phpjiami_decrypt']['�ï������ï�����î������į������']($id);$avatar_size =$GLOBALS['phpjiami_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď'](',', $GLOBALS['phpjiami_decrypt']['���Ĕ֮������å�֔֎�֥�ĥ���־�']('ftx_avatar_size'));$paths =$GLOBALS['phpjiami_decrypt']['���Ĕ֮������å�֔֎�֥�ĥ���־�']('ftx_attach_path');foreach ($avatar_size as $size){if ($paths . 'avatar/' . $img_path . '/' . $GLOBALS['phpjiami_decrypt']['ċ�֯��Ô�֮���������֥�î������']($id). '_' . $size . '.jpg'){@$GLOBALS['phpjiami_decrypt']['ï�î��������־֎�������������î']($paths . 'avatar/' . $img_path . '/' . $GLOBALS['phpjiami_decrypt']['ċ�֯��Ô�֮���������֥�î������']($id). '_' . $size . '.jpg');}!$GLOBALS['phpjiami_decrypt']['���È��þ�Ë־��֯�ċ���į��־��']($paths . 'avatar/' . $img_path)&& $GLOBALS['phpjiami_decrypt']['���֯Ë��ֈ���������î����������']($paths . 'avatar/' . $img_path, 0777, true);Image::$GLOBALS['phpjiami_decrypt']['���Ď�ĥ��֯ï��������þ��Ëֈ��']($paths . 'avatar/temp/' . $img, $paths . 'avatar/' . $img_path . '/' . $GLOBALS['phpjiami_decrypt']['ċ�֯��Ô�֮���������֥�î������']($id). '_' . $size . '.jpg', '', $size, $size, true);}@$GLOBALS['phpjiami_decrypt']['ï�î��������־֎�������������î']($paths . 'avatar/temp/' . $img);}public function ajax_upload_imgs(){if (!empty($_FILES['img']['name'])){$result =$this->_upload($_FILES['img'], 'avatar/temp/');if ($result['error']){$this->error($result['info']);}else {$data['img'] =$result['info'][0]['savename'];$this->ajaxReturn(1, L('operation_success'), $data['img']);}}else {$this->ajaxReturn(0, L('illegal_parameters'));}}public function add_money(){if (IS_POST){$id =$this->_post('id', 'intval');$addmoney =$this->_post('addmoney', 'intval');$user =$this->_mod->where(array('id' => $id))->find();$money_data =array('money' => array('exp', '`money`+' . $addmoney));$this->_mod->where(array('id' => $id))->setField($money_data);$finance['uid'] =$id;$finance['money'] =$addmoney;$finance['memo'] ='管理员充值';$finance['add_time'] =$GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']();$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���'](base64_decode('ZmluYW5jZQ=='))->add($finance);$msg_mod =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('msg');$msg_mod->create(array('fuid' => 0, 'fname' => 'SYSTEM', 'tuid' => $id, 'tname' => $user['username'], 'info' => '管理员充值' . $addmoney . '元', 'add_time' => time(),));$msg_mod->add();$this->ajaxReturn(1, '充值成功！', 'success', 'add_score');}else {$id =$this->_get('id', 'intval');$info =$this->_mod->where(array('id' => $id))->find();$this->assign('info', $info);$resp =$this->fetch('add_money');$this->ajaxReturn(1, '', $resp);}}public function add_score(){if (IS_POST){$id =$this->_post('id', 'intval');$jinbi =$this->_post('jinbi', 'intval');$action =$this->_post('action', 'trim');$user =$this->_mod->where(array('id' => $id))->find();$score_data =array('score' => array('exp', '`score`+' . $jinbi));$this->_mod->where(array('id' => $id))->setField($score_data);$score_log_data['uid'] =$id;$score_log_data['uname'] =$user['username'];$score_log_data['action'] =$action;$score_log_data['score'] =$jinbi;$this->_score_log_mod->create($score_log_data);$this->_score_log_mod->add();$msg_mod =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('msg');$msg_mod->create(array('fuid' => 0, 'fname' => 'SYSTEM', 'tuid' => $id, 'tname' => $user['username'], 'info' => $action . ' - 增加积分：' . $jinbi, 'add_time' => time(),));$msg_mod->add();$this->ajaxReturn(1, '赠送成功！', 'success', 'add_score');}else {$id =$this->_get('id', 'intval');$info =$this->_mod->where(array('id' => $id))->find();$this->assign('info', $info);$resp =$this->fetch('add_score');$this->ajaxReturn(1, '', $resp);}}public function ajax_check_name(){$name =$this->_get('username', 'trim');$id =$this->_get('id', 'intval');if ($this->_mod->name_exists($name, $id)){$this->ajaxReturn(0, '该会员已经存在');}else {$this->ajaxReturn();}}public function ajax_check_email(){$name =$this->_get('email', 'trim');$id =$this->_get('id', 'intval');if ($this->_mod->email_exists($name, $id)){$this->ajaxReturn(0, '该邮箱已经存在');}else {$this->ajaxReturn();}}}