<?php global $phpjiami_decrypt;$phpjiami_decrypt['�����֮�į���������������þ�Ĕ��']=base64_decode('ZGF0ZQ==');$phpjiami_decrypt['��������î�֎�å��È������������']=base64_decode('cmFuZA=='); ?>
<?php
 class score_orderModel extends Model {protected $_auto =array (array('add_time','time',1,'function'), array('order_sn','get_sn',1,'callback'), );public function get_sn(){return $GLOBALS['phpjiami_decrypt']['�����֮�į���������������þ�Ĕ��']('YmdHis').$GLOBALS['phpjiami_decrypt']['��������î�֎�å��È������������'](10, 99);}}