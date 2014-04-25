<?php
class Menu {
	
	private $N=null;
	private $Art=null;
	public function __construct(){
		$this->N=M('Navigation');
		$this->Art=M('Article');
	}
	
	//获取完整导航信息
	public function getMenu(){
		$menu=array();
		$menu['nav']=$this->getNav();
		$menu['homeurl']=U('Index/index');
		return $menu;
	}

	//获取导航列表
	private function getNav($fid){
		if(empty($fid)){
			$condition['fid']=0;
		}else{
			$condition['fid']=$fid;
		}
		$field='id,nav_name';
		$list=$this->N->field($field)->where($condition)->order('sort')->select();
		if($list!==false){
			$i=0;
			$nav=array();
			foreach($list as $val){
				$val['url']=U('Index/content?detail='.$val['id']);
				$nav[$i]=$val;
				$nav[$i]['sub']=$this->getNav($val['id']);
				$i++;
			}
			return $nav;
		}else{
			return false;
		}
	}
	
	//获得导航的数组---针对点击的ID为navID
	public function getNavArr($id){
		$condition['id']=$id;
		$navArr = $this->N->where($condition)->getField('path');
		if(empty($navArr)){
			$navName[]= $this->N->where($condition)->field('nav_name,id')->select();
			return $navName;
			}else{
				$navArr = explode('-',$navArr);
				unset($navArr[0]);
				foreach($navArr as $value){
				
				$state['id']=$value;
				$navName[]= $this->N->where($state)->field('nav_name,id')->select();
				
			}
			$navName[]= $this->N->where($condition)->field('nav_name,id')->select();
			
			return $navName;
			}
		}
	
	
	
	
	//获取当前二级导航列表信息
	public function getList($id){
		if(empty($id)){
			return false;
		}
		else{
			$field='id,nav_name';
			$list=array();
			$condition['fid']=$this->getCurrentLone($id);
			//return $condition['fid'];
			$res=$this->N->field($field)->where($condition)->order('sort')->select();
			foreach($res as $val){
				$val['url']=U('Index/content?detail='.$val['id']);
				$list[]=$val;
			}
			return $list;
		}
	}
	
	
	//获取当前一级导航信息
	public function getLoneMenuName($id){
		if(empty($id)){
			return false;
		}else{
			$Lone=$this->getCurrentLone($id);
			//return $Lone;
			return $this->getListInfo($Lone);
		}
	}
	
	//获取当前列表的一级导航id
	private function getCurrentLone($id){
		if(empty($id)){
			return '无ID传过来';
		}else{
			$getId['id']=$id;
			$isNavId=$this->N->where($getId)->find();
			if(empty($isNavId)){
				$id = $this->Art->where($getId)->getField('nav_id');
				}
			//return $id;
			$condition['id']=$id;
			$fres=$this->N->field('id,fid')->where($condition)->find();
			if($fres!==false){
				if(empty($fres['fid'])){
					$cid=$fres['id'];
				}else{
					$cid=$fres['fid'];
				}
				return $cid;
			}else{
				return 'error!';
				}
		}
	}
	
	//获取列表名与地址
	private function getListInfo($id){
		if(empty($id)){
			return false;
		}else{
			$condition['id']=$id;
		}
		$field='id,fid,nav_name';
		$res=$this->N->where($condition)->field($field)->find();
		if($res!==false){
			$pathone['name']=$res['nav_name'];
			$pathone['url']=U('Index/content?detail='.$res['id']);
			return $pathone;
		}else{
			return false;
		}
	}
	
	//添加导航菜单
	/* $post=array(
		'name'=>'',
		'list'=>'',
		'fid'=>'',
	); */
	public function addNav($post){
		if(empty($post['name'])){
			return false;
		}else{
			$data['nav_name']=$post['name'];
			$data['list']=$post['list'];
			if(empty($post['fid'])){
				$data['fid']=0;
				$data['level']=1;
				$res=$this->N->add($data);
				return $res; 
			}else{
				$condition['fid']=$post['fid'];
				$le=$this->N->where($condition)->field('level')->find();
				$data['level']=$le['level']+1;
				$data['fid']=$post['fid'];
				$res=$this->N->add($data);
				return $res;
			}
		}
	}
	

}
?>