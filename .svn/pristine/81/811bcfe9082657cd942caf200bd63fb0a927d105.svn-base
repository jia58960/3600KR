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
	/* 如果点击的是二级导航，直接跳到对应的二级导航页面
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
		//echo $this->N->getLastSql();
        //dump($res);
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
		$count  = $this->Art->where($condition)->count();    //计算分类下总数

        $weekCountTimeStap = time()-604800;
        $weeklyNewCount = $this->Art->where("nav_id = $this->Id and time >= $weekCountTimeStap ")->count(); //计算该分类下周新增总数

        $Page = new Page($count, 10);

		$list=$this->Art->where($condition)->order('time desc')->limit($Page->firstRow. ',' . $Page->listRows)->field('id,title,time')->select();

		foreach($list as $val){
			$con['aid']=$val['id'];
			$val['content']=$this->Para->where($con)->getField('content');
            $val['img']=$this->Para->where($con)->getField('img');
			$artlist[]=$val;
		}
		//$Page->parameter  = 'detail/'.$this->Id;

        $Page->setConfig('first', '<');
        $Page->setConfig('last', '>');
        $Page->setConfig('theme','<ul>%upPage% %downPage% %prePage% %nextPage%</ul>');
        $page = $Page->show();	

        $weekCondition['hot_news'] = 2;
        $weekCondition['nav_id']=$this->Id;


        //一周热点 最近7天内的热点文章
        $weekHot = $this->Art->where("hot_news = 2 and nav_id = $this->Id  and time>= $weekCountTimeStap")->order('time desc')->limit(12)->field('id,title,time')->select(); //周热点限制在12条
        //echo $this->Art->getLastSql();
        //exit;
        foreach($weekHot as $weekVal){
            $weekCon['aid']=$weekVal['id'];
            $weekVal['content']=$this->Para->where($weekCon)->getField('content');
            $weekVal['img']=$this->Para->where($weekCon)->getField('img');
            $weeklyArtlist[]=$weekVal;
        }

		return $newslist=array('list'=>$artlist,'weeklyHot'=>$weeklyArtlist,'pager'=>$page,'count'=>$count,'weekNewCount'=>$weeklyNewCount);
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
		$Art['para']=$this->Para->where($con)->field('content,img')->find();

		return $content=array('artdetail'=>$Art);
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

		$lastNews =$this->Art->field('id,title')->where($navmap)->order('time desc')->limit(5)->select();

		foreach($lastNews as $val ){
			$con['aid']=$val['id'];
            $img = $this->Para->where($con)->getField('img');
            $val['img']=$img;
			$lastArl[]=$val;
		}
		return $lastArl;
	}

    //首页的5篇首要文章
	public function indexContent(){	
		$hot_main['home_page']=1;
		$hot2['home_page']=2;
		$hot3['home_page']=3;
        $hot4['home_page']=4;
        $hot5['home_page']=5;

		$contentHotMain=$this->Art->field('a.id,a.title,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($hot_main)->order('time desc')->find();
		$contentHot2=$this->Art->field('a.id,a.title,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($hot2)->order('time desc')->find();
        $contentHot3=$this->Art->field('a.id,a.title,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($hot3)->order('time desc')->find();
        $contentHot4=$this->Art->field('a.id,a.title,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($hot4)->order('time desc')->find();
        $contentHot5=$this->Art->field('a.id,a.title,p.content,p.img')->join("kr_paragraph p on a.id =p.aid ")->where($hot5)->order('time desc')->find();
		//return $contentService;
		return $content=array('hot_main'=>$contentHotMain,'hot2'=>$contentHot2,'hot3'=>$contentHot3,'hot4'=>$contentHot4,'hot5'=>$contentHot5);
	
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

  		$Page = new Page($count, 10);
		$list = $this->Art->field("a.*,n.nav_name,n.level")->order('time desc')->join("kr_navigation n on a.nav_id = n.id")->limit($Page->firstRow. ',' . $Page->listRows)->select();
		//echo $this->Art->getLastSql();exit;
		//$list['nav_id']=19;
		//$Page->parameter  = 'detail/'.$this->Id;
        $Page->setConfig('theme','<ul>%upPage%  %downPage%  %first%  %prePage%  %linkPage%  %nextPage% %end% </ul>');
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