<?php global $phpjiami_decrypt;$phpjiami_decrypt['�֯������֎��֮��ľ��֋�î������']=base64_decode('Y291bnQ=');$phpjiami_decrypt['����֎֔�Ô�å������Ô���þֈ���']=base64_decode('YXJyYXlfcmFuZA==');$phpjiami_decrypt['���֯֎����������ֈ�Ď����������']=base64_decode('aW50dmFs'); ?>
<?php
class indexAction extends FrontAction {public function _initialize(){parent::_initialize();}public function index(){$rands=array();$random=array();$file='tody_tuijian';if(!S($file)){$today=get_contents($this->apiurl.'api/indexpro?id=1');$todayarr=json_decode($today,true);$tuijianlist=$todayarr['data'];S($file,$tuijianlist,60*60);}$tuijianlist=S($file);if($tuijianlist){if($GLOBALS['phpjiami_decrypt']['�֯������֎��֮��ľ��֋�î������']($tuijianlist)<7){$rands=$tuijianlist;}else {$random=$GLOBALS['phpjiami_decrypt']['����֎֔�Ô�å������Ô���þֈ���']($tuijianlist,6);if($random){foreach($random as $item){$rands[]=$tuijianlist[$item];}}}}if($rands){foreach($rands as $k=>$item){$rands[$k]['id']=$this->_idtohash($item['id']);$rands[$k]['price_youhuiquan']=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($item['price_youhuiquan']);}}$this->assign('tody_tuijian',$rands);$this->assign('datalist',$datalist);$this->assign('wap_num',C('wapper'));$this->assign('nav_curr', 'index');$this->_config_seo(C('ftx_seo_config.index'));if($this->ismobile){$this->js_arr =array('/tkjidicms/wap/js/swiper.min.js', '/tkjidicms/wap/js/swiper.js', '/tkjidicms/wap/js/jquery-3.2.1.min.js', );$this->css_arr =array('/tkjidicms/wap/css/index.css', '/tkjidicms/wap/css/swiper.min.css', );$this->assign('js_arr',$this->js_arr);$this->assign('css_arr',$this->css_arr);$banner=$this->getbanner(14,10);}else {$banner=$this->getbanner(8,10);}$this->assign('banner',$banner);$this->display();}public function ajax(){$page=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������'](I('page'));$mixprice=0;$maxprice=0;$mixsales=0;$maxsales=0;$q='';if(C('ftx_index_mix_price')>0 && C('ftx_index_max_price')>0){$mixprice=C('ftx_index_mix_price');$maxprice=C('ftx_index_max_price');}else {if(C('ftx_index_mix_price')>0){$mixprice=C('ftx_index_mix_price');}if(C('ftx_index_max_price')>0){$maxprice=C('ftx_index_max_price');}}if(C('ftx_index_mix_volume')>0 && C('ftx_index_max_volume')>0){$mixsales=C('ftx_index_mix_volume');$maxsales=C('ftx_index_max_volume');}else {if(C('ftx_index_mix_volume')>0){$mixsales=C('ftx_index_mix_volume');}if(C('ftx_index_max_volume')>0){$maxsales=C('ftx_index_max_volume');}}$file="index_pro_ajax_".$page;if(!S($file)){$q.='mixprice='.$mixprice.'&maxprice='.$maxprice.'&mixsales='.$mixsales.'&maxsales='.$maxsales;$data=get_contents($this->apiurl.'api/indexpro?id=3&per='.C('wapper').'&q='.$q.'&p='.$page);$dataarr=json_decode($data,true);$datalist=$dataarr['data'];S($file,$datalist,2*60);}$datalist=S($file);if($datalist){foreach($datalist as $k=>$item){$datalist[$k]['id']=$this->_idtohash($item['id']);$datalist[$k]['price_youhuiquan']=$GLOBALS['phpjiami_decrypt']['���֯֎����������ֈ�Ď����������']($item['price_youhuiquan']);$datalist[$k]['thumb']=changepic($item['thumb'],'item');$datalist[$k]['tmall']=($item[tmall]==1)?1:0;}$this->ajaxReturn('200','1',$datalist);}else {$this->ajaxReturn('201','0');}}}?>