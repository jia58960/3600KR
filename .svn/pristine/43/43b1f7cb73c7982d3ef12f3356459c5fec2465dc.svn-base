<?php
class Content {
	
	private $N=null;
	
	private $Art=null;
	
	private $Id=null;
	
	private $Para=null;

	public function __construct($id){
		$this->N=M('Navigation');
		$this->Art=M('Article a');
		$this->Para=M('Paragraph');
		$this->Id=$this->Idtransfer($id);
	}
	
	//转换到应跳转的id
	/* 
		如果点击的是二级导航，直接跳到对应的二级导航页面
		如果点击的是一级导航，先查文章表里有没有该一级导航对应的文章（这里不用去判断这个一级导航是文章还是列表）
			若有就跳到这个一级导航页面，即显示该一级导航对应的文章
			若无就跳到这个一级导航下的默认排在第一个的二级导航的页面
	*/
	private function Idtransfer($id){
		
		if(empty($id)){
			return false;
		}else{
			$condition['id']=$id;
			$res=$this->N->field('level')->where($condition)->find();
			
			if(intval($res['level'])!==1){
				return $id;
			}else{
				$ccond['nav_id']=$id;
				$isem=$this->Art->where($ccond)->field('id')->find();
				if(empty($isem['id'])){
					$cond['fid']=$condition['id'];
					$sub=$this->N->field('id')->where($cond)->order('sort')->find();
					return $sub['id'];
				}else{
					return $id;
				}
			}
		}
	}
	
	public function getId(){
		return $this->Id;
	}
	
	//判断是否有文章列表
	private function isArtList(){
		$condition['id']=$this->Id;
		$res=$this->N->where($condition)->find();
		
		if(empty($res['list'])){
			return false;
		}else{
			return true;
		}
	}
	
	//获取模板
	//列表则获取列表模板，文章则获取文章模板
	public function getTpl(){
		if($this->isArtList()){
			return 'Content:index';
		}else{
			return 'Content:detail';
		}
		
	}
	
	//获取内容
	//列表则获取列表内容，文章则获取文章内容
	public function getDeContent(){
		if($this->isArtList()){
			return $this->getList();
		}else{
			return $this->getArt();
		}
	}
	//获取列表
	//包含列表的id，标题，发表时间（应该还有内容的截取，url地址）
	private function getList(){
		import("@.ORG.Page"); 
		$condition['nav_id']=$this->Id;
		$count  = $this->Art->where($condition)->count();    //计算总数
        $Page = new Page($count, 5);
		$list=$this->Art->where($condition)->order('sort')->limit($Page->firstRow. ',' . $Page->listRows)->field('id,title,time')->select();
		foreach($list as $val){
			$con['aid']=$val['id'];
			$val['content']=$this->Para->where($con)->getField('content');
			$artlist[]=$val;
		}
		$Page->parameter  = 'detail/'.$this->Id;
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();	
		
		$condition['hot_news'] = 1; 
		$hotNews =$this->Art->where($condition)->order('time desc')->limit(5)->field('id,title,content')->select();
		return $newslist=array('list'=>$artlist,'hot'=>$hotNews,'pager'=>$page);
	}
	
	
	//获取菜单文章-（针对菜单只有一篇文章的情况）
	//根据需求在加上对应要获取的内容。
	private function getArt(){
		$condition['nav_id']=$this->Id;
		$Art=$this->Art->field('id,title,time')->where($condition)->find();
		$con['aid']=$Art['id'];
		$Art['para']=$this->Para->where($con)->field('title,content,img')->select();
		$lastNews = $this->getLastNews();
		return $content=array('artdetail'=>$Art,'hot'=>$lastNews);
	}
	//获取文章详细内容
	public function getArtDetail(){
		$condition['id']=$this->Id;
		$Art=$this->Art->field('id,title,time')->where($condition)->find();
		$con['aid']=$Art['id'];
		$Art['para']=$this->Para->where($con)->field('title,content,img')->select();
		$lastNews = $this->getLastNews();
		return $content=array('artdetail'=>$Art,'hot'=>$lastNews);
	}
	
	//获取整站最新的5篇文章放在文章详情的右侧
	private function getLastNews(){
		$map['fid']=array('in','2,16');
		$nav=$this->N->field('id')->where($map)->select();
		$navid='';
		foreach($nav as $val){
			$navid.=$val['id'].',';
		}
		$navw=substr($navid,0,-1);
		$navmap['nav_id']=array('in',$navw);
		//$lastArl['nav']=$navw;
		$lastNews =$this->Art->field('id,title')->where($navmap)->order('time desc')->limit(5)->select();
		foreach($lastNews as $val ){
			$con['aid']=$val['id'];
			$content=$this->Para->where($con)->getField('content');
			if(empty($content)){
				$content=$this->Para->where($con)->getField('title');
			}
			$val['content']=$content;
			$lastArl[]=$val;
		}
		return $lastArl;
	}
	//添加内容
	/*
		$post=array(
			'nav_id'='',
			'title'='',
			'content'='',
		);
	*/
	public function indexContent(){	
		$about['home_page']=1;
		$service1['home_page']=2;
		$service2['home_page']=4;
		$choose['home_page']=3;
		$contentAbout=$this->Art->field('a.id,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($about)->order('time desc')->find();
		$contentService1=$this->Art->field('a.id,a.title,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($service1)->order('time desc')->find();
		$contentService2=$this->Art->field('a.id,a.title,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($service2)->order('time desc')->find();
		$contentChoose=$this->Art->field('a.id,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($choose)->order('time desc')->find();
		//return $contentService;
		return $content=array('about'=>$contentAbout,'service1'=>$contentService1,'choose'=>$contentChoose,'service2'=>$contentService2);
	
	}
	
	//获取点击导航后的路径数组
	public function getNavPath($navid){
		if(empty($navid)){
			$con['id']=$this->Id;
		}else{
			$con['id']=$navid;
		}
		$arr=array();
		$res=$this->N->where($con)->field('fid')->find();
		if(empty($res['fid'])){
			$navone=$this->N->where($con)->field('nav_name,id')->find();
			$nav['name']=$navone['nav_name'];
			$nav['url']=U('Index/content?detail='.$navone['id']);
			$arr[]=$nav;
			
		}else{
			$co['id']=$res['fid'];
			$nav[]=$this->N->where($co)->field('nav_name,id')->find();
			$nav[]=$this->N->where($con)->field('nav_name,id')->find();
			foreach($nav as $val){
				$n['name']=$val['nav_name'];
				$n['url']=U('Index/content?detail='.$val['id']);
				$arr[]=$n;
			}
		}
		return $arr;
	}

	//获取点击文章后的路径数组
	public function getArticleNavPath($artId){
		$con['id']=$artId;
		$navid=$this->Art->where($con)->field('nav_id')->find();
		$arr=$this->getNavPath($navid['nav_id']);
		$art=$this->Art->where($con)->field('id,title')->find();
		$val['name']=$art['title'];
		$val['url']=U('Index/article?detail='.$art['id']);
		array_push($arr,$val);
		return $arr;
		
	}
	
	/*--后台功能方法--*/
	public function adminArticle(){
		import("@.ORG.Page"); 
		$count  = $this->Art->count();    //计算总数
  		$Page = new Page($count, 8);
		$list = $this->Art->field("a.*,n.nav_name,n.level")->join("kr_navigation n on a.nav_id = n.id")->limit($Page->firstRow. ',' . $Page->listRows)->select();
		//echo $this->Art->getLastSql();
		//$list['nav_id']=19;
		//$Page->parameter  = 'detail/'.$this->Id;
        $Page->setConfig('first', '<<');
        $Page->setConfig('last', '>>');
        $page = $Page->show();	
		
		return $ArticleArr=array('artList'=>$list,'pager'=>$page);
		}
	
	//后台管理文章
	public function adminArtDetail($id){
		if(!empty($id)){
		$condition['id']=$id;
		$artDetail = $this->Art->where($condition)->select();
		if($artDetail!==false){
			return $artDetail;
			}else{
				return '没有数据';
				}
		}else{
			return false;
			}
		}

}

?>