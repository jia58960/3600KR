<?php
class Article {

    private $Para = null;
    private $Art = null;
    private $Nav = null;

    public function __construct(){
        $this->Art=M('Article a');
        $this->Para=M('Paragraph');
        $this->Nav=M('Navigation');
    }

    //全局热门文章
    public function getHotArticle(){
        $conditionHot['hot_news'] = 1;
        //热门文章
        $hotNews = $this->Art->where($conditionHot)->order('time desc')->limit(6)->field('id,title,time')->select();
        foreach($hotNews as $hotVal){
            $hotCon['aid']=$hotVal['id'];
            $hotVal['content']=$this->Para->where($hotCon)->getField('content');
            $hotVal['img']=$this->Para->where($hotCon)->getField('img');

            $hotArtlist[]=$hotVal;
        }
        return $hotArtlist;
    }

    //获取整站文件按时间降序排 -放首页
    public function getArticles(){
        import("@.ORG.Page");

        $count  = $this->Art->count();    //计算分类下总数用以分页

        $Page = new Page($count, 10);

        $list=$this->Art->order('time desc')->limit($Page->firstRow. ',' . $Page->listRows)->field('id,nav_id,title,time')->select();
        foreach($list as $val){
            $con['aid']=$val['id'];
            $val['content']=$this->Para->where($con)->getField('content');
            $val['img']=$this->Para->where($con)->getField('img');

            $field='id,nav_name,sub_color,english';
            $navId = $val['nav_id'];
            $val['nav']=$this->Nav->field($field)->where("id = $navId ")->find();

            $artlist[]=$val;
        }

        //dump($artlist);exit;
        $Page->setConfig('first', '<');
        $Page->setConfig('last', '>');
        $Page->setConfig('theme','<ul>%upPage% %downPage%</ul>');
        $page = $Page->show();

        return $allArticle = array('list'=>$artlist,'page'=>$page);

    }

    //全局最新文章
    public function getNewlyArticle() {
        $timeStamp = time() - 86400;
        //最新文章
        $newHot = $this->Art->where("time >= $timeStamp")->order('time desc')->limit(12)->field('id,title,time')->select(); //周热点限制在12条
        foreach($newHot as $newVal){
            $newCon['aid']=$newVal['id'];
            $newVal['content']=$this->Para->where($newCon)->getField('content');
            $newVal['img']=$this->Para->where($newCon)->getField('img');
            $newlyArtlist[]=$newVal;
        }
        return $newlyArtlist;
    }

    //全局今日新增文章数及文章详细
    public function getDailyArticle(){
        $timeStamp = time() - 86400;
        $count = $this->Art->where("time >= $timeStamp")->count();    //计算分类下总数

        $list = $this->Art->where("time >= $timeStamp")->select();
        foreach($list as $val){
            $field='id,nav_name,sub_color,english';
            $navId = $val['nav_id'];
            $val['nav']=$this->Nav->field($field)->where("id = $navId ")->find();

            $dailyList[] = $val;
        }
        //dump($dailyList);exit;
        return $result = array('count'=>$count,'data'=>$dailyList);
    }
}
?>