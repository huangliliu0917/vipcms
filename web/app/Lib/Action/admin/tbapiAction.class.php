<?php global $phpjiami_decrypt;$phpjiami_decrypt['����ĮË�������Î�����֮��î��å']=base64_decode('dmVuZG9y');$phpjiami_decrypt['����������į����֯����֮��������']=base64_decode('VmVuZG9y');$phpjiami_decrypt['����֯�����ֈ�å���������įï�ֈ']=base64_decode('X2luaXRpYWxpemU=');$phpjiami_decrypt['ïï�����������þ���Į�Ĕ��Î���']=base64_decode('TQ==');$phpjiami_decrypt['����������Ô�������È��Ë�������']=base64_decode('aGVhZGVy');$phpjiami_decrypt['֎���֯���־�ľ��ï���Ĕ����Ď��']=base64_decode('Rg==');$phpjiami_decrypt['����î�����ֈ���î�å������֋���']=base64_decode('dHJpbQ==');$phpjiami_decrypt['���������֔֋����Ď�֋��È������']=base64_decode('ZnVuY3Rpb25fZXhpc3Rz');$phpjiami_decrypt['����������î��������î����ĥ����']=base64_decode('SQ==');$phpjiami_decrypt['����ï�������î��Ď���֋ï����֋']=base64_decode('dGltZQ==');$phpjiami_decrypt['־��������ï������Ë��Į���ċË�']=base64_decode('c3RyaXBfdGFncw==');$phpjiami_decrypt['��֮���������֋������Ô���������']=base64_decode('RA==');$phpjiami_decrypt['�î���֋����֥���������������å�']=base64_decode('b2JqdG9hcnI=');$phpjiami_decrypt['��������î�֎�å��È������������']=base64_decode('cmFuZA==');$phpjiami_decrypt['���ï��ï���ÔÎ���å������ċ���']=base64_decode('cm91bmQ=');$phpjiami_decrypt['�������Ď����į����������È�����']=base64_decode('ZA==');$phpjiami_decrypt['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�']=base64_decode('aW1wbG9kZQ==');$phpjiami_decrypt['���Ĕ֮������å�֔֎�֥�ĥ���־�']=base64_decode('Qw==');$phpjiami_decrypt['������֔È��Į���������ï�֔�ֈ�']=base64_decode('bGVmdHRpbWU='); ?>
<?php
 $GLOBALS['phpjiami_decrypt']['����ĮË�������Î�����֮��î��å'](base64_decode('VGFvYmFvdG9wLlRvcENsaWVudA=='));$GLOBALS['phpjiami_decrypt']['����ĮË�������Î�����֮��î��å'](base64_decode('VGFvYmFvdG9wLlJlcXVlc3RDaGVja1V0aWw='));$GLOBALS['phpjiami_decrypt']['����ĮË�������Î�����֮��î��å'](base64_decode('VGFvYmFvdG9wLlJlc3VsdFNldA=='));$GLOBALS['phpjiami_decrypt']['����������į����֯����֮��������'](base64_decode('VGFvYmFvdG9wLnJlcXVlc3QuVGJrSXRlbUdldFJlcXVlc3Q='));class tbapiAction extends BackendAction {public function _initialize(){parent::$GLOBALS['phpjiami_decrypt']['����֯�����ֈ�å���������įï�ֈ']();$this->_mod =D('tbapi');$this->_cate_mod =D('items_cate');$items_site =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('items_site')->where(array('code' => 'taobao'))->getField('config');$this->_tbconfig =unserialize($items_site);$GLOBALS['phpjiami_decrypt']['����������Ô�������È��Ë�������'](base64_decode('Q29udGVudC1UeXBlOnRleHQvaHRtbDsgY2hhcnNldD11dGYtOA=='));if (!$this->checkAuth()){echo '网站未授权，需要授权才可正常使用，官网申请 <a href="http:\\/\\/www.tkjidi.com" target="_blank">www.tkjidi.com</a>  咨询客服QQ 800061081';exit();}}public function _before_index(){$big_menu =array('title' => '<div style="position: fixed;bottom:10px;right: 0px;"></div>',);$this->assign('big_menu', $big_menu);$res =$this->_cate_mod->field('id,name')->select();$cate_list =array();foreach ($res as $val){$cate_list[$val['id']] =$val['name'];}$this->assign('cate_list', $cate_list);$tbapi_collect_data =$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('tbapi_collect_data');$this->assign('tbapi_collect_data', $tbapi_collect_data);$this->sort ='ordid ASC,';$this->order ='last_time DESC';}public function add(){if (IS_POST){$name =$this->_post('name', 'trim');$q =$this->_post('q', 'trim');$cat =$this->_post('cat', 'trim');$start_price =$this->_post('start_price', 'trim');$end_price =$this->_post('end_price', 'trim');$itemloc =$this->_post('itemloc', 'trim');$start_tk_rate =$this->_post('start_tk_rate', 'trim');$end_tk_rate =$this->_post('end_tk_rate', 'trim');$is_tmall =$this->_post('is_tmall', 'trim');$is_overseas =$this->_post('is_overseas', 'trim');$cate_id =$this->_post('cate_id', 'trim');$page =$this->_post('page', 'trim');$page_size =$this->_post('page_size', 'trim');$sort =$this->_post('sort', 'trim');$sex =$this->_post('sex', 'trim');if (!$name || !$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($name)){$this->error('请给采集器取个名字，以便区分');}if (!$cate_id || !$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($cate_id)){$this->error('请选择商品入库分类');}if ($start_price > $end_price){$this->error('最低价格不能高于最高价格');}if (!$q || !$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($q)){$this->error('请填写要采集的关键词。');}if ($page < 1 || $page > 100){$this->error('每页采集数量请填写1-100之间的整数');}if ($start_tk_rate < 10 && $end_tk_rate > 10000){$this->error('佣金比率请填写10-10000之间的整数');}if ($start_tk_rate > $end_tk_rate){$this->error('最低佣金比率不能高于最高佣金比率。');}$data['name'] =$name;$data['sex'] =$sex;$data['sort'] =$sort;$data['q'] =$q;$data['start_tk_rate'] =$start_tk_rate;$data['end_tk_rate'] =$end_tk_rate;$data['start_price'] =$start_price;$data['end_price'] =$end_price;$data['is_tmall'] =$is_tmall;$data['is_overseas'] =$is_overseas;$data['itemloc'] =$itemloc;$data['cat'] =$cat;$data['cate_id'] =$cate_id;$data['page'] =$page;$data['page_size'] =$page_size;$this->_mod->create($data);$item_id =$this->_mod->add();$this->success('添加成功！');}}public function edit(){if (IS_POST){$id =$this->_post('id', 'trim');$name =$this->_post('name', 'trim');$q =$this->_post('q', 'trim');$cat =$this->_post('cat', 'trim');$start_price =$this->_post('start_price', 'trim');$end_price =$this->_post('end_price', 'trim');$itemloc =$this->_post('itemloc', 'trim');$start_tk_rate =$this->_post('start_tk_rate', 'trim');$end_tk_rate =$this->_post('end_tk_rate', 'trim');$is_tmall =$this->_post('is_tmall', 'trim');$is_overseas =$this->_post('is_overseas', 'trim');$cate_id =$this->_post('cate_id', 'trim');$page =$this->_post('page', 'trim');$page_size =$this->_post('page_size', 'trim');$sort =$this->_post('sort', 'trim');$sex =$this->_post('sex', 'trim');if (!$name || !$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($name)){$this->error('请给采集器取个名字，以便区分');}if (!$cate_id || !$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($cate_id)){$this->error('请选择商品入库分类');}if ($start_price > $end_price){$this->error('最低价格不能高于最高价格');}if (!$q || !$GLOBALS['phpjiami_decrypt']['����î�����ֈ���î�å������֋���']($q)){$this->error('请填写要采集的关键词。');}if ($start_tk_rate < 10 && $end_tk_rate > 10000){$this->error('佣金比率请填写10-10000之间的整数');}if ($page < 1 || $page > 100){$this->error('每页采集数量请填写1-100之间的整数');}if ($start_tk_rate > $end_tk_rate){$this->error('最低佣金比率不能高于最高佣金比率。');}$data['name'] =$name;$data['sex'] =$sex;$data['sort'] =$sort;$data['q'] =$q;$data['start_tk_rate'] =$start_tk_rate;$data['end_tk_rate'] =$end_tk_rate;$data['start_price'] =$start_price;$data['end_price'] =$end_price;$data['is_tmall'] =$is_tmall;$data['is_overseas'] =$is_overseas;$data['itemloc'] =$itemloc;$data['cat'] =$cat;$data['cate_id'] =$cate_id;$data['page'] =$page;$data['page_size'] =$page_size;$this->_mod->where(array('id' => $id))->save($data);$this->success(L('operation_success'));}else {$id =$this->_get('id', 'intval');$item =$this->_mod->where(array('id' => $id))->find();$spid =$this->_cate_mod->where(array('id' => $item['cate_id']))->getField('spid');if ($spid == 0){$spid =$item['cate_id'];}else {$spid .= $item['cate_id'];}$this->assign('selected_ids', $spid);$this->assign('info', $item);$orig_list =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('items_orig')->select();$this->assign('orig_list', $orig_list);if (!$GLOBALS['phpjiami_decrypt']['���������֔֋����Ď�֋��È������'](base64_decode('Y3VybF9nZXRpbmZv'))){$this->error(L('curl_not_open'));}$this->display();}}public function add_do(){if (!$GLOBALS['phpjiami_decrypt']['���������֔֋����Ď�֋��È������']('curl_getinfo')){$this->error(L('curl_not_open'));}$this->display();}public function collect(){$id =$GLOBALS['phpjiami_decrypt']['����������î��������î����ĥ����']('id', '', 'intval');$auto =$GLOBALS['phpjiami_decrypt']['����������î��������î����ĥ����']('auto', 0, 'intval');$p =$this->_get('p', 'intval', 1);if ($auto){$rid =$GLOBALS['phpjiami_decrypt']['����������î��������î����ĥ����']('rid', 0, 'intval');$tbapi_collect_data['rid'] =$rid;$tbapi_collect_data['p'] =$p;$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dGJhcGlfY29sbGVjdF9kYXRh'), $tbapi_collect_data);if (false === $GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dGJhcGlfdGltZQ=='))){$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dGJhcGlfdGltZQ=='), $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']());}if (!$rid){$where['status'] =1;$tbapi =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('tbapi')->where($where)->order('ordid asc')->select();$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dGJhcGk='), $tbapi);$rid =0;}$tbapi =$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('tbapi');$date =$tbapi[$rid];if (!$date){$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('totalcoll', NULL);$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dGJhcGlfdGltZQ=='), NULL);$this->ajaxReturn(0, '一键全自动已经采集完成！请返回，谢谢');}if ($p > $date['page']){$p =1;$rid =$rid + 1;$date =$tbapi[$rid];if (!$date){$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('totalcoll', NULL);$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dGJhcGlfdGltZQ=='), NULL);$this->ajaxReturn(0, '一键全自动已经采集完成！请返回，谢谢');}}$np =$p + 1;$result_data =$this->taobao_collect($date, $p);$this->assign('result_data', $result_data);$msg['title'] ='一键全自动采集';$msg['np'] =$np;$msg['rid'] =$rid;$this->assign('date', $date);$this->assign('tbapi_count', count($tbapi));$this->assign('rids', $rid + 1);$resp =$this->fetch('auto_collect');$this->ajaxReturn(1, $msg, $resp);}else {$date =$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('tbapi')->where(array('id' => $id))->find();$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('cm9ib3Rfc2V0dGluZw=='), $date);}if ($date){if ($p > $date['page']){$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('totalcoll', NULL);$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dGJhcGlfdGltZQ=='), NULL);$this->ajaxReturn(0, '已经采集完成' . $date['page'] . '页！请返回，谢谢');}$result_data =$this->taobao_collect($date, $p);$this->assign('result_data', $result_data);$resp =$this->fetch('collect');$this->ajaxReturn(1, '', $resp);}else {$this->ajaxReturn(0, 'error');}}private function _ajax_tb_publish_insert($item){$item['title'] =$GLOBALS['phpjiami_decrypt']['־��������ï������Ë��Į���ċË�']($item['title']);$result =$GLOBALS['phpjiami_decrypt']['��֮���������֋������Ô���������']('items')->ajax_tb_publish($item);return $result;}public function taobao_collect($date, $p){$GLOBALS['phpjiami_decrypt']['ïï�����������þ���Į�Ĕ��Î���']('tbapi')->where(array('id' => $date['id']))->save(array('last_page' => $p, 'last_time' => time()));if (false === $totalcoll =$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('totalcoll')){$totalcoll =0;}if (false === $tbapi_item =$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('tbapi_time')){$tbapi_item =$GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']();$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dGJhcGlfdGltZQ=='), $GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']());}if ($date){$info['q'] =$date['q'];$info['cat'] =$date['cat'];$info['cate_id'] =$date['cate_id'];$info['start_price'] =$date['start_price'];$info['end_price'] =$date['end_price'];$info['itemloc'] =$date['itemloc'];$info['start_tk_rate'] =$date['start_tk_rate'];$info['end_tk_rate'] =$date['end_tk_rate'];$info['is_tmall'] =$date['is_tmall'];$info['is_overseas'] =$date['is_overseas'];$info['page'] =$date['page'];$info['sort'] =$date['sort'];$info['page_size'] =$date['page_size'];}$p =$this->_get('p', 'intval', 1);if ($p > $info['page']){$this->redirect('tbapi/index');}$TopClient =new TopClient;$TopClient->appkey =$this->_tbconfig['app_key'];$TopClient->secretKey =$this->_tbconfig['app_secret'];if (!$this->_tbconfig['app_key']){$this->ajaxReturn(0, '请设置淘宝appkey');}$TbkItemGetRequest =new TbkItemGetRequest;$TbkItemGetRequest->setFields('num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url,volume,seller_id,nick');$info['q'] && $TbkItemGetRequest->setQ($info['q']);$info['cat'] && $TbkItemGetRequest->setCat($info['cat']);$info['itemloc'] && $TbkItemGetRequest->setItemloc($info['itemloc']);$info['sort'] && $TbkItemGetRequest->setSort($info['sort']);$info['is_tmall'] && $TbkItemGetRequest->setIsTmall($info['is_tmall']);$info['is_overseas'] && $TbkItemGetRequest->setIsOverseas($info['is_overseas']);$info['start_price'] && $TbkItemGetRequest->setStartPrice($info['start_price']);$info['end_price'] && $TbkItemGetRequest->setEndPrice($info['end_price']);$info['start_tk_rate'] && $TbkItemGetRequest->setStartTkRate($info['start_tk_rate']);$info['end_tk_rate'] && $TbkItemGetRequest->setEndTkRate($info['end_tk_rate']);$info['page_size'] && $TbkItemGetRequest->setPageSize($info['page_size']);$TbkItemGetRequest->setPageNo($p);$TbkItemGetRequest->setPlatform(1);$resp =$TopClient->execute($TbkItemGetRequest);$source =$GLOBALS['phpjiami_decrypt']['�î���֋����֥���������������å�']($resp);if ($source){for ($i =0;$i < $date['page_size'];$i++){$title =$source['results']['n_tbk_item'][$i]['title'];$num_iid =$source['results']['n_tbk_item'][$i]['num_iid'];$pic_url =$source['results']['n_tbk_item'][$i]['pict_url'];$price =$source['results']['n_tbk_item'][$i]['reserve_price'];$coupon_price =$source['results']['n_tbk_item'][$i]['zk_final_price'];$cu =$source['results']['n_tbk_item'][$i]['provcity'];$item_url =$source['results']['n_tbk_item'][$i]['item_url'];$volume =$source['results']['n_tbk_item'][$i]['volume'];$sellerId =$source['results']['n_tbk_item'][$i]['seller_id'];$nick =$source['results']['n_tbk_item'][$i]['nick'];$user_type =$source['results']['n_tbk_item'][$i]['user_type'];if ($user_type == 1){$shop_type ='B';}else {$shop_type ='C';}if (!$volume){$volume =$GLOBALS['phpjiami_decrypt']['��������î�֎�å��È������������'](100, 999);}$likes =$GLOBALS['phpjiami_decrypt']['��������î�֎�å��È������������'](99, 9999);$zkou =$GLOBALS['phpjiami_decrypt']['���ï��ï���ÔÎ���å������ċ���'](($coupon_price / $price)* 10, 1);$coupon_rate =$zkou * 1000;$tag =$GLOBALS['phpjiami_decrypt']['�������Ď����į����������È�����']('items')->get_tags_by_title($title);$tags =$GLOBALS['phpjiami_decrypt']['�����Ĉ�־���Ĉ�֎���֥��ľ��Ď�'](',', $tag);$coupon_add_time =$GLOBALS['phpjiami_decrypt']['���Ĕ֮������å�֔֎�֥�ĥ���־�']('ftx_coupon_add_time');if ($coupon_add_time){$times =(int)($GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()+ $coupon_add_time * 3600);}else {$times =(int)($GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()+ 72 * 86400);}$itemarray['shop_type'] =$shop_type;$itemarray['tags'] =$tags;$itemarray['likes'] =$likes;if (!$date['sex']){$date['sex'] ='0';}$itemarray['sex'] =$date['sex'];$itemarray['coupon_rate'] =$coupon_rate;$itemarray['title'] =$title;if ($sellerId){$itemarray['sellerId'] =$sellerId;}if ($nick){$itemarray['nick'] =$nick;}$itemarray['volume'] =$volume;$itemarray['num_iid'] =$num_iid;$itemarray['price'] =$price;$itemarray['coupon_price'] =$coupon_price;$itemarray['pic_url'] =$pic_url;$itemarray['item_url'] =$item_url;$itemarray['cu'] =$cu;$itemarray['cate_id'] =$date['cate_id'];$itemarray['coupon_end_time'] =$times;$itemarray['coupon_start_time'] =$GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']();if ($title && $pic_url && $num_iid){$result['item_list'][] =$itemarray;}}}else {$result['msg'] ='采集结束！请返回!';}$taobaoke_item_list =$result['item_list'];$taobaoke_item_list && $GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('taobaoke_item_list', $taobaoke_item_list);$coll =0;$thiscount =0;foreach ($taobaoke_item_list as $key => $val){$res =$this->_ajax_tb_publish_insert($val);if ($res > 0){$coll++;$totalcoll++;}$thiscount++;}$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('dG90YWxjb2xs'), $totalcoll);$result_data['p'] =$p;$result_data['msg'] =$msg;$result_data['coll'] =$coll;$result_data['totalcoll'] =$totalcoll;$result_data['totalnum'] =$totalnum;$result_data['thiscount'] =$thiscount;$result_data['times'] =$GLOBALS['phpjiami_decrypt']['������֔È��Į���������ï�֔�ֈ�']($GLOBALS['phpjiami_decrypt']['����ï�������î��Ď���֋ï����֋']()- $tbapi_item);return $result_data;}}