<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index(){
		load('extend');
		
		//获取完整导航数据
		$menu=new Menu;
		$nav=$menu->getMenu();
		//var_dump($nav);
		$this->assign('menu',$nav);

        $hotNav = $menu->getHotNav();//获取首页左边栏热门导航
        $this->assign('hotNav',$hotNav);
		
		//获取主页显示的数据
		$cont = new Content();
		$index = $cont->indexContent();
		
		$this->assign('hot_main',$index['hot_main']);
		$this->assign('hot2',$index['hot2']);
		$this->assign('hot3',$index['hot3']);
		$this->assign('hot4',$index['hot4']);
		$this->assign('hot5',$index['hot5']);




        //获取整站数据按时间降序排列
        $Art = new Article;
        $articles = $Art->getArticles();
        $hotArticle = $Art->getHotArticle();

        $this->assign('list',$articles['list']);
        $this->assign('page',$articles['page']);
        $this->assign('hot',$hotArticle);

        //dump($articles['list']);
		//exit;
        $this->display();
    }


	public function content() {
		load('extend');
		$id=$_GET['detail'];

		//获取完整导航数据
		$menu=new Menu;
		$nav=$menu->getMenu();
		$this->assign('menu',$nav);
        $navInfo = $menu->getNavInfo($id);


        //获取热门文章与最新文章
        $nhArticle=new Article;
        $hotArticle = $nhArticle->getHotArticle();
        $newlyArticle = $nhArticle->getNewlyArticle();
        $dailyData = $nhArticle->getDailyArticle();

		
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
        //dump($navarr);


		
		$tpl=$content->getTpl();
		$cont=$content->getDeContent();
		if($tpl =='Content:index'){
			$this->assign('list',$cont['list']);
			$this->assign('hot',$hotArticle); //全局热点资讯
			$this->assign('page',$cont['pager']); //翻页
            $this->assign('week',$cont['weeklyHot']); //本类别下一周热点
            $this->assign('newly',$newlyArticle); //全局最新资讯
            $this->assign('count',$cont['count']);//当前分类下资讯总数
            $this->assign('weekCount',$cont['weekNewCount']); //当前分类下周新增资讯总数
            $this->assign('navInfo',$navInfo); //当前分类详细信息
            $this->assign('dailyCount',$dailyData['count']);
            $this->assign('dailyArticle',$dailyData['data']);
            //dump($cont['hot']);
            //dump($cont['count']);
            //exit;
		}else{
			$this->assign('content',$cont['artdetail']);
            //dump($cont['artdetail']);
            //exit;
			$this->assign('hot',$cont['hot']);
			}

		$this->display($tpl);
	}
	
	public function article(){
		load('extend');
		$id=$_GET['detail'];
		
		//获取完整导航数据
		$menu=new Menu;
		$nav=$menu->getMenu();
		$this->assign('menu',$nav);

        $Art = new Article;
        $hotArticle = $Art->getHotArticle();
        $newlyArticle = $Art->getNewlyArticle();
        $dailyData = $Art->getDailyArticle();
		
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
        //dump($articleArr['artdetail']);
        //exit;
		$this->assign('hot',$hotArticle);
        $this->assign('newly',$newlyArticle);
        $this->assign('dailyCount',$dailyData['count']);
        $this->assign('dailyArticle',$dailyData['data']);

        //dump($articleArr['hot']);
        //exit;
		$this->display("Content:detail");
	}
	
}