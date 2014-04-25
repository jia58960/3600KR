<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index(){
		load('extend');
		
		//获取完整导航数据
		$menu=new Menu;
		$nav=$menu->getMenu();
		//var_dump($nav);
		//die;
		$this->assign('menu',$nav);
		
		//获取主页显示的数据
		$cont = new Content();
		$index = $cont->indexContent();
		
		$this->assign('about',$index['about']);
		$this->assign('service1',$index['service1']);
		$this->assign('service2',$index['service2']);
		$this->assign('choose',$index['choose']);
        

		//走进金瑞亿
		$id=1;
		//获取当前一级列表数据
		$name=$menu->getLoneMenuName($id);
		$this->assign('Lone',$name);
		
		//获取二级列表数据
		$list=$menu->getList($id);
		$this->assign('subList',$list);
		
		//获取内容
		$content=new Content($id);
		
		$tid=$content->getId();
		$this->assign('currentId',$tid);
		
		//获取点击导航后的路径数组
		$navarr=$content->getNavPath();
		$this->assign('navarr',$navarr);
		
		$tpl=$content->getTpl();
		$cont=$content->getDeContent();
		
		$this->assign('content',$cont['artdetail']);
		$this->assign('hot',$cont['hot']);
		

		//服务模式
		$id=2;
		//获取当前一级列表数据
		$name=$menu->getLoneMenuName($id);
		$this->assign('Lone2',$name);
		
		//获取二级列表数据
		$list=$menu->getList($id);
		$this->assign('subList2',$list);
		
		//获取内容
		$content=new Content($id);
		
		$tid=$content->getId();
		$this->assign('currentId2',$tid);
		
		//获取点击导航后的路径数组
		$navarr=$content->getNavPath();
		$this->assign('navarr2',$navarr);
		
		$tpl=$content->getTpl();
		$cont2=$content->getDeContent();
		
		$this->assign('content2',$cont2['artdetail']);
		$this->assign('hot2',$cont2['hot']);

		//服务模式
		$id=16;
		//获取当前一级列表数据
		$name=$menu->getLoneMenuName($id);
		$this->assign('Lone3',$name);
		
		//获取二级列表数据
		$list=$menu->getList($id);
		$this->assign('subList3',$list);
		
		//获取内容
		$content=new Content($id);
		
		$tid=$content->getId();
		$this->assign('currentId3',$tid);
		
		//获取点击导航后的路径数组
		$navarr=$content->getNavPath();
		$this->assign('navarr3',$navarr);
		
		$tpl=$content->getTpl();
		$cont3=$content->getDeContent();
		
		$this->assign('list',$cont3['list']);
		$this->assign('page',$cont3['pager']);


		$this->display();

    }
	
	public function content(){
		load('extend');
		//$id=$_GET['detail'];
		$id=1;
		
		//获取完整导航数据
		$menu=new Menu;
		$nav=$menu->getMenu();
		$this->assign('menu',$nav);
		
		//获取当前一级列表数据
		$name=$menu->getLoneMenuName($id);
		$this->assign('Lone',$name);
		
		//获取二级列表数据
		$list=$menu->getList($id);
		$this->assign('subList',$list);
		
		//获取内容
		$content=new Content($id);
		
		$tid=$content->getId();
		$this->assign('currentId',$tid);
		
		//获取点击导航后的路径数组
		$navarr=$content->getNavPath();
		$this->assign('navarr',$navarr);
		
		$tpl=$content->getTpl();
		$cont=$content->getDeContent();
		if($tpl =='Content:index'){
			$this->assign('list',$cont['list']);
			$this->assign('hotNews',$cont['hot']);
			$this->assign('page',$cont['pager']);
			
		}else{
			$this->assign('content',$cont['artdetail']);
			$this->assign('hot',$cont['hot']);
		}
		dump($tpl);
		//exit;
		$this->display($tpl);
	}
	
	public function article(){
		load('extend');
		$id=$_GET['detail'];
		
		//获取完整导航数据
		$menu=new Menu;
		$nav=$menu->getMenu();
		$this->assign('menu',$nav);
		
		
		//获取当前一级列表数据
		$name=$menu->getLoneMenuName($id);
		$this->assign('Lone',$name);
		
		//获取二级列表数据
		$list=$menu->getList($id);
		$this->assign('subList',$list);
		
		//获取内容
		$content = new Content($id);
		
		//获取点击文章后的路径数组
		$nav_arr = $content->getArticleNavPath($id);
		$this->assign('navarr',$nav_arr);
		
		$articleArr = $content->getArtDetail();
		$this->assign('content',$articleArr['artdetail']);
		$this->assign('hot',$articleArr['hot']);
		$this->display("Content:detail");
	}
	
}