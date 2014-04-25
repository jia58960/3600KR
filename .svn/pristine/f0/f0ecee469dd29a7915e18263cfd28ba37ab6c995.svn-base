<?php 
	class ArticleAction extends Action {
		
		private function getMenuList(){
			$menu=new Menu;
			return $nav=$menu->getMenu();
			}
		
		public function upimg($path,$width='300',$height='150'){
			import("ORG.Net.UploadFile");
			$upload=new UploadFile();
			$upload->maxSize='2048000';
			$upload->savePath=$path;
			$upload->saveRule=uniqid;
			$upload->allowExts=array('jpg','jpeg','png','gif','bmp');
			//$upload->allowTypes=array('','','','','','');
			//	是否生成缩略图
			$upload->thumb=true;
			$upload->thumbMaxWidth=$width;
			$upload->thumbMaxHeight=$height;
			//	缩略图前缀
			$upload->thumbPrefix='a';
			//	是否删除原图
			$upload->thumbRemoveOrigin=true;
			//	调用上传方法
			if($upload->upload()){
				//	成功则返回对应信息用于之后的调用
				$info=$upload->getUploadFileInfo();
				return $info;
			}
			else{
				$this->error($upload->getErrorMsg());
			}
		}
		
		public function add(){
			$nav = $this->getMenuList();
			$this->assign('menu',$nav);
			$this->display();
			}
		public function edit(){
			load('extend');
			$cont = new Content();
			$articleArr = $cont->adminArticle();
	
			$this->assign('artArr',$articleArr['artList']);
			//dump($articleArr['artList']);exit;
			$this->assign('listPage',$articleArr['pager']);
			$this->display();
			
			}
		
		public function addArticleProcess(){
				$art =D("Article");
				if ($vo = $art->create()) {
						$list = $art->add();
					if ($list !== false) {
						$this->success('提交文章成功！');
					} else {
						$this->error('数据写入错误！');
					}
			   } else {
				$this->error($art->getError());
				}
			}
			
		public function editArticle(){
			$article = D("Article");
			$vo =$article->create();
		 if ($vo) {
			//dump($vo);
            $list = $article->save();
            if ($list !== false) {
               $this->success('文章更新成功！');
            } else {
               $this->error("没有更新任何数据!");
            }
        } else {
            return 'error';
        }
			
			}
			
		public function detail(){
			$nav = $this->getMenuList();
			$this->assign('menu',$nav);
			
			$id=$_GET['artID'];
			$cont = new Content();
			$artDetail =$cont->adminArtDetail($id);
			//dump($artDetail);
			$this->assign('artdetail',$artDetail);
			$this->display();
		}	
			
		public function deleteArticle(){
			$id=$_GET['artID'];
			$Art = M("Article"); // 实例化User对象
			$condition['id']=$id;
			$Art->where($condition)->delete(); 
			if($Art!==false){
				$this->success('删除文章成功！');
				}else{
					$this->success('删除文章失败！');
					}
		}
		
		//	添加段落
		public function addpara(){
			$para=array();
			if(!empty($_FILES['img']['name'])){
				$uppath='./Public/Uploads/img/';
				/* 
				$size=$_POST['size'];
				$width=substr($size,0,strpos($abc,'*'));
				$hieght=substr($abc,strpos($abc,'*')+1);
				
				
				
				*/
				$info=$this->upimg($uppath);
				$para['img']='a'.$info['0']['savename'];
			}else{
				$para['img']='';
			}
			$para['aid']=$_POST['aid'];
			$para['title']=$_POST['title'];
			$para['content']=$_POST['content'];
			if(empty($_POST['para_id'])){
				$para['create_time']=time();
				$pa=M('Paragraph');
				$res=$pa->add($para);
				if($res){
					$this->success('段落添加成功');
				}else{
					$this->error('段落添加失败');
				}
			}else{
				$para['id']=$_POST['para_id'];
				$pa=M('Paragraph');
				$res=$pa->save($para);
				$this->success('段落修改成功');
			}
			
		}
		
		//二级联动函数
		public function getTitleJson(){
			$bigid = $_GET["navId"]; 
			//echo $bigid;
			if(isset($bigid)){ 
				$condition['aid']=$bigid;
				$Art = M("Paragraph"); 
				$select=$Art->where($condition)->field('id,title')->select(); 
				if(!empty($select)){
				$select=json_encode($select); 
				//dump($select);exit();
				$this->ajaxReturn($select, '表单数据保存成功！', 1);				
				}else{
					$this->ajaxReturn(0,'该文章暂无段落',0);
					}
			} else{
				return false;
				}
			
			}
			
		//获取paragraph表中的段落数据
		public function getParaDetail(){
			$paraID = $_POST['paraID'];
			if(isset($paraID)){
				$condition['id']=$paraID;
				$Art = M("Paragraph"); 
				$paraArr=$Art->where($condition)->field('title,content,img')->select(); 
				if(!empty($paraArr)){			
					$this->ajaxReturn($paraArr, '表单数据保存成功！', 1);				
				}else{
					$this->ajaxReturn(0,'返回数据错误',0);
					}
				
				}else{
					return false;
					}
			}
		}
?>
