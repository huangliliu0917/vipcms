<?php global $phpjiami_decrypt;$phpjiami_decrypt['���Ĕ֮������å�֔֎�֥�ĥ���־�']=base64_decode('Qw==');$phpjiami_decrypt['�Ë�������֮�����֋Î���������È']=base64_decode('Uw==');$phpjiami_decrypt['֎���֯���־�ľ��ï���Ĕ����Ď��']=base64_decode('Rg=='); ?>
<?php
class brand_cateModel extends Model {public function get_spid($pid){if (!$pid){return 0;}$pspid =$this->where(array('id'=>$pid))->getField('spid');if ($pspid){$spid =$pspid . $pid . '|';}else {$spid =$pid . '|';}return $spid;}public function get_cats(){$map=array('pid'=>0);$map['status']=1;$id_arr =$this->where($map)->select();$array =array();foreach ($id_arr as $val){$array[$val['id']] =$val;}return $array;}public function get_child_ids($id, $with_self=false){if($GLOBALS['phpjiami_decrypt']['���Ĕ֮������å�֔֎�֥�ĥ���־�']('ftx_site_cache')){$file ='get_child_ids_'.$id;if(false === $array =$GLOBALS['phpjiami_decrypt']['�Ë�������֮�����֋Î���������È']($file)){$spid =$this->where(array('id'=>$id))->getField('spid');$spid =$spid ? $spid .= $id .'|' : $id .'|';$id_arr =$this->field('id')->where(array('spid'=>array('like', $spid.'%')))->select();$array =array();foreach ($id_arr as $val){$array[] =$val['id'];}$GLOBALS['phpjiami_decrypt']['�Ë�������֮�����֋Î���������È']($file,$array);}}else{$spid =$this->where(array('id'=>$id))->getField('spid');$spid =$spid ? $spid .= $id .'|' : $id .'|';$id_arr =$this->field('id')->where(array('spid'=>array('like', $spid.'%')))->select();$array =array();foreach ($id_arr as $val){$array[] =$val['id'];}}$with_self && $array[] =$id;return $array;}public function name_exists($name, $pid, $id=0){$where ="name='" . $name . "' AND pid='" . $pid . "' AND id<>'" . $id . "'";$result =$this->where($where)->count('id');if ($result){return true;}else {return false;}}public function cate_cache(){$artcate_list =array();$cate_data =$this->field('id,pid,name')->where('status=1')->order('ordid')->select();foreach ($cate_data as $val){if ($val['pid'] == '0'){$artcate_list['p'][$val['id']] =$val;}else {$artcate_list['s'][$val['pid']][] =$val;}}$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��'](base64_decode('YXJ0Y2F0ZV9saXN0'), $artcate_list);return $artcate_list;}protected function _before_write(&$data){$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('artcate_list', NULL);}protected function _after_delete($data, $options){$GLOBALS['phpjiami_decrypt']['֎���֯���־�ľ��ï���Ĕ����Ď��']('artcate_list', NULL);}}