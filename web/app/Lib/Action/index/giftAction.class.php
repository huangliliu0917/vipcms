<?php global $phpjiami_decrypt;$phpjiami_decrypt['���֯֎����������ֈ�Ď����������']=base64_decode('aW50dmFs');$phpjiami_decrypt['������������î��î���þ������å�']=base64_decode('c3RyX3JlcGxhY2U=');$phpjiami_decrypt['����ÈåÈ֎������������È������']=base64_decode('YXJyYXlfcG9w');$phpjiami_decrypt['���ċ�ľ��־��������Ô�î֔���Ď']=base64_decode('ZXhwbG9kZQ==');$phpjiami_decrypt['�����֮�į���������������þ�Ĕ��']=base64_decode('ZGF0ZQ==');$phpjiami_decrypt['�֯������֎��֮��ľ��֋�î������']=base64_decode('Y291bnQ=');$phpjiami_decrypt['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']=base64_decode('aW1wbG9kZQ==');$phpjiami_decrypt['����ï�������î��Ď���֋ï����֋']=base64_decode('dGltZQ=='); ?>
<?php
 class giftAction extends FrontAction {public function _initialize(){parent::_initialize();$info =$this->visitor->get();$info=M('user')->find($info['id']);$this->assign('info', $info);$this->assign('nav_curr', 'gift');if (false === $cate_list =F('score_item_cate_list')){$cate_list =D('score_item_cate')->cate_cache();}$this->assign('cate_list', $cate_list);$setting=C('ftx_score_rule');$this->assign('setting',$setting);}public function index(){$sort =I('sort', 'new', 'trim');switch ($sort){case 'hot': $sort_order ='ordid ASC ,buy_num DESC,id DESC';break;case 'new': $sort_order ='ordid ASC ,id DESC';break;default: $sort_order ='ordid ASC ,id DESC';}$where =array('pass' => '1');$score_item =M('score_item');$count =$score_item->where($where)->count('id');$pager =$this->_pager($count, 20);$item_list=array();$item_list =$score_item->where($where)->order($sort_order)->limit($pager->firstRow . ',' . $pager->listRows)->select();if($item_list){foreach($item_list as $k=>$item){$count_order=M('score_order')->where('item_id='.$item['id'].' and status in(0,1)')->count('id');$item_list[$k]['order_count']=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($count_order);}}$this->assign('item_list', $item_list);$this->assign('page_bar', $pager->fshow());$this->assign('sort', $sort);$this->js_arr =array('/tkjidicms/wap/js/jquery-3.2.1.min.js', '/tkjidicms/wap/js/loaddata.js', );$this->css_arr =array('/tkjidicms/wap/css/mall.css', );$this->assign('js_arr',$this->js_arr);$this->assign('css_arr',$this->css_arr);$this->assign('page_title','积分商城');$this->_config_seo(C('ftx_seo_config.gift_index'));$this->display('index');}public function ajax(){$sort =I('sort', 'new', 'trim');switch ($sort){case 'hot': $sort_order ='ordid ASC ,buy_num DESC,id DESC';break;case 'new': $sort_order ='ordid ASC ,id DESC';break;default: $sort_order ='ordid ASC ,id DESC';}$page=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������'](I('page'));$per=C('wapper');$where =array('pass' => '1');$score_item =M('score_item');$item_list=array();$item_list =$score_item->where($where)->order($sort_order)->limit((($page-1)*$per),$per)->select();if($item_list){foreach($item_list as $k=>$item){$count_order=M('score_order')->where('item_id='.$item['id'].' and status in(0,1)')->count('id');$item_list[$k]['order_count']=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($count_order);$item_list[$k]['thumb']=attach($GLOBALS['phpjiami_decrypt']['������������î��î���þ������å�']('_s.'.$GLOBALS['phpjiami_decrypt']['����ÈåÈ֎������������È������']($GLOBALS['phpjiami_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď']('.', $item['img'])), '_b.'.$GLOBALS['phpjiami_decrypt']['����ÈåÈ֎������������È������']($GLOBALS['phpjiami_decrypt']['���ċ�ľ��־��������Ô�î֔���Ď']('.', $item['img'])), $item['img']), 'score_item');$item_list[$k]['time1']=$GLOBALS['phpjiami_decrypt']['�����֮�į���������������þ�Ĕ��']("Y.m.d",$item['end_time']);$item_list[$k]['time2']=$GLOBALS['phpjiami_decrypt']['�����֮�į���������������þ�Ĕ��']("H:i:",$item['end_time'])."00";}}$datalist=$item_list;if($datalist){if($GLOBALS['phpjiami_decrypt']['�֯������֎��֮��ľ��֋�î������']($datalist<C('wapper')))$this->ajaxReturn('200','0',$datalist);else $this->ajaxReturn('200','1',$datalist);}else {$this->ajaxReturn('201','0');}}public function cate(){$cid =I('cid', '', 'intval');$sort =I('sort', 'hot', 'trim');switch ($sort){case 'hot': $sort_order ='ordid ASC ,buy_num DESC,id DESC';break;case 'new': $sort_order ='ordid ASC ,id DESC';break;}$cname =D('score_item_cate')->get_name($cid);$where =array('status' => '1');$cid && $where['cate_id'] =$cid;$score_item =M('score_item');$count =$score_item->where($where)->count('id');$pager =$this->_pager($count, 20);$item_list =$score_item->where($where)->order($sort_order)->limit($pager->firstRow . ',' . $pager->listRows)->select();$this->assign('item_list', $item_list);$this->assign('page_bar', $pager->fshow());$this->assign('cid', $cid);$this->assign('sort', $sort);$this->assign('cname', $cname);$this->_config_seo(C('ftx_seo_config.gift'), array('cate_name' => $cname,));$this->display('index');}public function lists($cid){$sort =I('sort', 'hot', 'trim');switch ($sort){case 'hot': $sort_order ='ordid ASC ,buy_num DESC,id DESC';break;case 'new': $sort_order ='ordid ASC ,id DESC';break;}$cname =D('score_item_cate')->get_name($cid);$where =array('status' => '1');$cid && $where['cate_id'] =$cid;$score_item =M('score_item');$count =$score_item->where($where)->count('id');$pager =$this->_pager($count, 20);$item_list =$score_item->where($where)->order($sort_order)->limit($pager->firstRow . ',' . $pager->listRows)->select();$this->assign('item_list', $item_list);$this->assign('page_bar', $pager->fshow());$this->assign('cid', $cid);$this->assign('sort', $sort);$this->assign('cname', $cname);$this->_config_seo(C('ftx_seo_config.gift'), array('cate_name' => $cname,));$this->display('index');}public function detail(){$id =I('id', '', 'intval');!$id && $this->_404();$item_mod =M('score_item');$item =$item_mod->field('id,title,img,score,stock,user_num,price,coupon_price,num_iid,start_time,end_time,buy_num,desc,info')->find($id);$count_order=M('score_order')->where('item_id='.$item['id'].' and status in(0,1)')->count('id');$item['order_count']=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($count_order);$tag =D('items')->get_tags_by_title($item['title']);$tags =$GLOBALS['phpjiami_decrypt']['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�'](',', $tag);$this->assign('item', $item);$this->assign('info', $item);$this->assign('help',M('help')->where('id=11')->getField('info'));$this->js_arr =array('/tkjidicms/wap/js/jquery-3.2.1.min.js', );$this->css_arr =array('/tkjidicms/wap/css/exchangeDetail.css', );$this->assign('js_arr',$this->js_arr);$this->assign('css_arr',$this->css_arr);$this->_config_seo(C('ftx_seo_config.gift_item'), array('title' => $item['title'], 'tags' => $tags, 'desc' => $item['info'],));$this->display();}public function ec(){!$this->visitor->is_login && $this->ajaxReturn(0, L('login_please'));$id =I('id', '', 'intval');$num =I('num', 1, 'intval');if (!$id || !$num)$this->ajaxReturn(0, L('invalid_item'));$item_mod =M('score_item');$user_mod =M('user');$order_mod =D('score_order');$uid =$this->visitor->info['id'];$uname =$this->visitor->info['username'];$item =$item_mod->find($id);!$item && $this->ajaxReturn(0, L('invalid_item'));!$item['stock'] && $this->ajaxReturn(0, L('no_stock'));if ($item['start_time'] > $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()){$this->ajaxReturn(0, L('no_start'));}if ($item['end_time'] < $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()){$this->ajaxReturn(0, L('ending'));}$user_score =$user_mod->where(array('id' => $uid))->getField('score');if ($user_score < $item['score']){$this->ajaxReturn(0, L('no_score'));}$eced_num =$order_mod->where(array('uid' => $uid, 'item_id' => $item['id']))->sum('item_num');if ($item['user_num'] && $eced_num + $num > $item['user_num']){$this->ajaxReturn(0, sprintf(L('ec_user_maxnum'), $item['user_num']));}$this->assign('item', $item);$info =$this->visitor->get();$addressinfo=M('address')->where('user_id='.$info['id'])->find();$this->assign('addressinfo',$addressinfo);$this->assign('info', $info);$resp =$this->fetch('dialog:gift_address');$this->ajaxReturn(2, '兑换 - ' . $item['title'], $resp);}public function ecwap(){!$this->visitor->is_login && $this->ajaxReturn(0, '<a href="'.U('user/login').'">'.L('login_please').'</a>');$id =I('id', '', 'intval');$num =I('num', 1, 'intval');if (!$id || !$num)$this->ajaxReturn(0, L('invalid_item'));$address=M('address')->where('user_id='.$this->visitor->info['id'])->find();if(empty($address)){$this->ajaxReturn(10, '<a href="'.U('user/addresslist').'">去设置</a>');}$item_mod =M('score_item');$user_mod =M('user');$order_mod =D('score_order');$uid =$this->visitor->info['id'];$uname =$this->visitor->info['username'];$item =$item_mod->find($id);!$item && $this->ajaxReturn(0, L('invalid_item'));!$item['stock'] && $this->ajaxReturn(0, L('no_stock'));if ($item['start_time'] > $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()){$this->ajaxReturn(0, L('no_start'));}if ($item['end_time'] < $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()){$this->ajaxReturn(0, L('ending'));}$user_score =$user_mod->where(array('id' => $uid))->getField('score');if ($user_score < $item['score']){$this->ajaxReturn(0, L('no_score'));}$eced_num =$order_mod->where(array('uid' => $uid, 'item_id' => $item['id']))->sum('item_num');if ($item['user_num'] && $eced_num + $num > $item['user_num']){$this->ajaxReturn(0, sprintf(L('ec_user_maxnum'), $item['user_num']));}else {$this->address($id,$taobao_id,$num,$address['realname'],$address['address'],'','',$address['mobile'],$address['province'],$address['city'],$address['area'],$address['id']);}}public function daifu(){!$this->visitor->is_login && $this->ajaxReturn(0, L('login_please'));$id =I('id', '', 'intval');$url =I('url', '', 'trim');$item_mod =M('score_item');$user_mod =M('user');$order_mod =D('score_order');$uid =$this->visitor->info['id'];$uname =$this->visitor->info['username'];if (!$url){$this->ajaxReturn(0, L('daifu_message'));}$item =$item_mod->find($id);!$item && $this->ajaxReturn(0, L('invalid_item'));$order_score =$item['score'];$data =array('uid' => $uid, 'uname' => $uname, 'item_id' => $item['id'], 'item_name' => $item['title'], 'item_num' => '1', 'url' => $url, 'order_score' => $order_score,);if (false === $order_mod->create($data)){$this->ajaxReturn(0, L('ec_failed'));}$order_id =$order_mod->add();$user_mod->where(array('id' => $uid))->setDec('score', $order_score);$score_log_mod =D('score_log');$score_log_mod->create(array('uid' => $uid, 'uname' => $uname, 'action' => 'gift', 'score' => $order_score * -1,));$score_log_mod->add();$item_mod->save(array('id' => $item['id'], 'stock' => $item['stock'] - 1, 'buy_num' => $item['buy_num'] + 1,));$this->ajaxReturn(1, L('ec_success'));}public function address($id='',$iid='',$num='',$realname='',$address='',$email='',$resp1='',$mobile='',$province='',$city='',$area='',$addressid=''){!$this->visitor->is_login && $this->ajaxReturn(0, L('login_please'));$item_mod =M('score_item');$order_mod =M('score_order');$user_mod =M('user');$id =$id?$id:I('id', '', 'intval');$iid =$iid?$iid:I('iid', '', 'intval');$num =$num?$num:I('num', '', 'intval');$realname =$realname?$realname:I('realname', '', 'trim');$address =$address?$address:I('address', '', 'trim');$email =$email?$email:I('email', '', 'trim');$resp1 =$resp1?$resp1:I('qq', '', 'trim');$mobile =$mobile?$mobile:I('mobile', '', 'trim');$province =$province?$province:I('cho_Province', '', 'trim');$city =$city?$city:I('cho_City', '', 'trim');$area =$area?$area:I('cho_Area', '', 'trim');$addressid=$addressid?$addressid:I('addressid', '', 'intval');$addressid=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($addressid);if (!$address && (!$id || !$realname || !$address || !$mobile || !$address)){$this->ajaxReturn(0, L('please_input_address_info'));}$uid =$this->visitor->info['id'];$uname =$this->visitor->info['username'];$item =$item_mod->find($id);!$item && $this->ajaxReturn(0, '商品不存在！');!$item['stock'] && $this->ajaxReturn(0, '商品已经被抢完了！');$user_score =$user_mod->where(array('id' => $uid))->getField('score');$user_score < $item['score'] && $this->ajaxReturn(0, '积分不够了！');$order_score =$num * $item['score'];if ($user_score < $order_score){$this->ajaxReturn(0, L('no_score'));}$eced_num =$order_mod->where(array('uid' => $uid, 'item_id' => $item['id']))->sum('item_num');if ($item['user_num'] && $eced_num + $num > $item['user_num']){$this->ajaxReturn(0, '此商品每人限兑' . $item['user_num'] . '件！');}$order_score =$num * $item['score'];$data =array('uid' => $uid, 'uname' => $uname, 'item_id' => $item['id'], 'item_name' => $item['title'], 'item_num' => $num, 'iid' => $iid, 'realname' => $realname, 'address' => $address, 'email' => $email, 'qq' => $resp1, 'mobile' => $mobile, 'order_score' => $order_score, 'add_time' => $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋'](),'province'=>$province,'city'=>$city,'area'=>$area,);if (false === $order_mod->create($data)){$this->ajaxReturn(0, L('ec_failed'));}$order_id =$order_mod->add();if($order_id){if(empty($addressid)){$data['mobile']=$mobile;$data['realname']=$realname;$data['address']=$address;$data['province']=$province;$data['city']=$city;$data['area']=$area;$data['user_id']=$uid;M('address')->add($data);}$user_mod->where(array('id' => $uid))->setDec('score', $order_score);$score_log_mod =D('score_log');$score_log_mod->create(array('uid' => $uid, 'uname' => $uname, 'action' => 'gift', 'score' => $order_score * -1,));$score_log_mod->add();$item_mod->save(array('id' => $item['id'], 'stock' => $item['stock'] - 1, 'buy_num' => $item['buy_num'] + 1,));$msg =M('msg');$msg->create(array('fuid' => 0, 'fname' => 'SYSTEM', 'tuid' => $uid, 'tname' => $uname, 'info' => ' 您申请的积分兑换商品：' . $item['title'] . ' 、兑换数量：' . $num . '、消耗积分：' . $order_score . '。请等待系统审核，审核通过后会发货，谢谢!', 'add_time' => time(),));$msg->add();}$this->ajaxReturn(1, '恭喜您，兑换成功！请等待发货');}public function rule(){$info =M('article_page')->find(6);$this->assign('info', $info);$this->_config_seo();$this->display();}}