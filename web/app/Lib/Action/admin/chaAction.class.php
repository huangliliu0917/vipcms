<?php global $phpjiami_decrypt;$phpjiami_decrypt['����֯�����ֈ�å���������įï�ֈ']=base64_decode('X2luaXRpYWxpemU=');$phpjiami_decrypt['����������Ô�������È��Ë�������']=base64_decode('aGVhZGVy');$phpjiami_decrypt['ïï�����������þ���Į�Ĕ��Î���']=base64_decode('TQ==');$phpjiami_decrypt['����������î��������î����ĥ����']=base64_decode('SQ==');$phpjiami_decrypt['����������Ë������������������Î']=base64_decode('c3RydG90aW1l');$phpjiami_decrypt['֎���֯���־�ľ��ï���Ĕ����Ď��']=base64_decode('Rg==');$phpjiami_decrypt['���֯֎����������ֈ�Ď����������']=base64_decode('aW50dmFs');$phpjiami_decrypt['����Ĉ�����������ĥ�����־��Î��']=base64_decode('ZmlsZV9nZXRfY29udGVudHM=');$phpjiami_decrypt['��ËîÔ֋����������������������']=base64_decode('c3RycG9z'); ?>
<?php
 class chaAction extends BackendAction {public function _initialize(){parent::$GLOBALS['phpjiami_decrypt']['����֯�����ֈ�å���������įï�ֈ']();$this->_mod =D('robots');$this->_cate_mod =D('youhuiquan_cate');$GLOBALS['phpjiami_decrypt']['����������Ô�������È��Ë�������'](base64_decode('Q29udGVudC1UeXBlOnRleHQvaHRtbDsgY2hhcnNldD11dGYtOA=='));if (!$this->checkAuth()){echo '网站未授权，需要授权才可正常使用，官网申请 <a href="http:\\/\\/www.tkjidi.com" target="_blank">www.tkjidi.com</a>  咨询客服QQ 800061081';exit();}}public function item_check(){$big_menu =array('title' => '<div style="position: fixed;bottom:30px;right: 0px;"></div>',);$this->assign('big_menu', $big_menu);$res =$this->_cate_mod->field('id,name')->select();$cate_list =array();foreach ($res as $val){$cate_list[$val['id']] =$val['name'];}$this->assign('cate_list', $cate_list);$map =array();$map['pass'] =0;$map['status'] ='0';$count =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('youhuiquan')->where($map)->count('id');$pager =new Page($count, 20);$select =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('youhuiquan')->where($map)->order('id DESC');$select->limit($pager->firstRow . ',' . $pager->listRows);$page =$pager->show();$this->assign('page', $page);$listarr =$select->select();$lists =array();foreach ($listarr as $key => $val){$lists[$key] =$val;}$this->assign('list', $lists);$this->display();}public function setting(){if (IS_POST){$cate_id =$this->_post('cate_id', 'trim');$fid =$this->_post('fid', 'trim');$eid =$this->_post('eid', 'trim');$shop_type =$this->_post('shop_type', 'trim');$step =$GLOBALS['phpjiami_decrypt']['����������î��������î����ĥ����']('step', 1, 'intval');$sec =$GLOBALS['phpjiami_decrypt']['����������î��������î����ĥ����']('sec', 0, 'intval');$coupon_start_time =$GLOBALS['phpjiami_decrypt']['����������Ë������������������Î']($_POST['coupon_start_time']);$coupon_end_time =$GLOBALS['phpjiami_decrypt']['����������Ë������������������Î']($_POST['coupon_end_time']);$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('Y2hhX3NldHRpbmc='), array(base64_decode('Y2F0ZV9pZA==') => $cate_id, 'step' => $step, 'sec' => $sec, 'tmall' => $shop_type, 'fid' => $fid, 'eid' => $eid, 'coupon_start_time' => $coupon_start_time, 'coupon_end_time' => $coupon_end_time,));$this->item_checks();}}public function item_checks(){$this->item_mod =M('youhuiquan');if (false === $setting =$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('cha_setting')){$this->ajaxReturn(0, L('illegal_parameters'));}$p =$this->_get('p', 'intval', 1);$sec =$setting['sec'];$fid =$setting['fid'];$eid =$setting['eid'];$step =$setting['step'];$start =$setting['coupon_start_time'];$end =$setting['coupon_end_time'];if(!empty($start)&&!empty($end)){$where['end_time'] =array(array('egt', $start), array('elt', $end));}elseif(!empty($start)){$where['end_time'] =array(array('egt', $start));}elseif(!empty($end)){$where['end_time'] =array(array('elt', $end));}if($setting['tmall']!=""){$where['tmall'] =$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($setting['tmall']);}if($fid&&$eid){$where['id'] =array(array('egt', $fid), array('elt', $eid));}elseif($fid){$where['id'] =array(array('egt', $fid));}elseif($eid){$where['id'] =array(array('elt', $eid));}$cid =$setting['cate_id'];if ($cid){$where['cate_id'] =$cid;}if (false === $itemcheckdata =$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('itemcheck')){$itemcheckdata['this_good'] =0;$itemcheckdata['this_bad'] =0;$itemcheckdata['that_good'] =0;$itemcheckdata['that_bad'] =0;$itemcheckdata['total'] =0;$itemcheckdata['not_total'] =0;$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('aXRlbWNoZWNr'), $itemcheckdata);}if (false === $bad_item =$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('bad_item')){$bad_item =array();$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('YmFkX2l0ZW0='), $bad_item);}$itemcheckdata['this_good'] =0;$itemcheckdata['this_bad'] =0;$where['pass'] ='1';$page_size =$step;$startp =($p - 1)* $page_size;$startp =$startp - $itemcheckdata['that_bad'];$CheckItemCount =$this->item_mod->where($where)->count('id');$itemcheckdata['not_total'] =$CheckItemCount;$order ='id asc ';$items_list =$this->item_mod->field('id,taobao_id,tmall,price_youhui')->where($where)->order($order)->limit($startp, $page_size)->select();if ($items_list){}else {$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('itemcheck', false);$this->ajaxReturn(0, '更新完成，谢谢！');}if ($step == 1){foreach ($items_list as $k => $v){$url ='http://hws.m.taobao.com/cache/wdetail/5.0/?id=' . $v['taobao_id'];$ch =curl_init();curl_setopt($ch, CURLOPT_URL, $url);curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);curl_setopt($ch, CURLOPT_MAXREDIRS, 2);$texts =curl_exec($ch);curl_close($ch);if (!$texts){$texts =$GLOBALS['phpjiami_decrypt']['����Ĉ�����������ĥ�����־��Î��']($url);}$ja =json_decode($texts, true);$fo =array();$nm =json_decode($ja['data']['apiStack'][0]['value'], true);$fo['errorMessage'] =$nm['data']['itemControl']['unitControl']['errorMessage'];$check =$fo['errorMessage'];$status=0;if ($check == '已下架'){$check ='unsale';}elseif ($check == '卖光了'){$check ='unsale';}elseif ($check == '当前区域卖光了'){$check ='unsale';}elseif ($GLOBALS['phpjiami_decrypt']['��ËîÔ֋����������������������']($texts, '宝贝不存在')){$check ='unsale';}else {$check ='sale';$status=1;}if($status==0){$this->item_mod->where('id='.$v['id'])->save(array('pass' => 0, 'status' => 0));$bad_item =$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('bad_item');$bad_item[] =$v['num_iid'];$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('YmFkX2l0ZW0='), $bad_item);$itemcheckdata['this_bad'] =$itemcheckdata['this_bad'] + 1;$itemcheckdata['that_bad'] =$itemcheckdata['that_bad'] + 1;}else {$itemcheckdata['this_good'] =$itemcheckdata['this_good'] + 1;$itemcheckdata['that_good'] =$itemcheckdata['that_good'] + 1;}$itemcheckdata['total'] =$itemcheckdata['total'] + 1;}}$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('aXRlbWNoZWNr'), $itemcheckdata);$msg['title'] ='下架检测';$msg['p'] =$p + 1;$msg['end'] =$end;$msg['start'] =$start;$msg['step'] =$step;$this->assign('item', $itemcheckdata);$resp =$this->fetch('ajax_itemcheck');$this->ajaxReturn(1, $msg, $resp);}}