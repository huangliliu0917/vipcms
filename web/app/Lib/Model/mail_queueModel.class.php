<?php global $phpjiami_decrypt;$phpjiami_decrypt['������������Ĕ���������ċî�֋��']=base64_decode('Z2V0X2luc3RhbmNl'); ?>
<?php
 class mail_queueModel extends Model {private $_max_err =3;private $_send_lock =30;public function clear(){$this->where(array('err_num'=>array('gt', $this->_max_err)))->delete();}public function send($limit =5){$this->clear();$mails =$this->where(array('lock_expiry'=>array('lt', time())))->order('priority DESC,id,err_num')->limit($limit)->select();if (!$mails)return false;$qids =array();foreach ($mails as $_mail){$qids[] =$_mail['id'];}$this->where(array('id'=>array('in', $qids)))->save(array('err_num' => array('exp', 'err_num+1'), 'lock_expiry' => array('exp', 'lock_expiry+' . $this->_send_lock), ));$mailer =mailer::$GLOBALS['phpjiami_decrypt']['������������Ĕ���������ċî�֋��']();foreach ($mails as $_mail){if ($mailer->send($_mail['mail_to'], $_mail['mail_subject'], $_mail['mail_body'])){$this->delete($_mail['id']);}else {}}}}