<?php global $phpjiami_decrypt;$phpjiami_decrypt['����������Ë������������������Î']=base64_decode('c3RydG90aW1l');$phpjiami_decrypt['�����֮�į���������������þ�Ĕ��']=base64_decode('ZGF0ZQ=='); ?>
<?php
 class signModel extends Model {protected $_auto =array (array('sign_count',1), array('last_date','today_time',1,'callback'), );public function today_time(){return $GLOBALS['phpjiami_decrypt']['����������Ë������������������Î']($GLOBALS['phpjiami_decrypt']['�����֮�į���������������þ�Ĕ��']('Ymd'));}}