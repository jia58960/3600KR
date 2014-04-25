<?php 
	class NavigationAction extends Action {
		
		private function getMenuList(){
			$menu=new Menu;
			return $nav=$menu->getMenu();
			}
		
		public function add(){
			
			$nav = $this->getMenuList();
			$this->assign('menu',$nav);
			//dump($nav);
			$this->display();
			}
		public function addNavProcess(){
			$nav = new NavigationModel();
				if ($vo = $nav->create()) {
					//dump($vo);exit;
					$list = $nav->add();
				if ($list !== false) {
					$this->success('数据保存成功！');
				} else {
					$this->error('数据写入错误！');
				}
			   } else {
				$this->error($nav->getError());
				}
			}
			
		public function edit(){
			$nav = $this->getMenuList();
			$this->assign('menu',$nav);
			$this->display();
			}
		public function deleteNavProcess(){
			$id = $_POST['id'];
			//echo $id;exit;
			if (!empty($id)) {
            $Form = M("navigation");
            $result = $Form->delete($id);
            if (false !== $result) {
                $this->success('删除成功！');
            } else {
                $this->error('删除出错！');
            }
            } else {
                $this->error('ID错误！');
            }
        }
		public function renameNavProcess(){
			$id = $_POST['id'];
			$name=$_POST['nav_name'];
			 if (!empty($id)) {
            $Form = M("navigation");
			$data['id']=$id;
			$data['nav_name']=$name;
            $vo=$Form->save($data); 
            if ($vo) {
                 $this->success('更名成功！');
            } else {
                $this->error('数据不存在！');
            }
        } else {
            $this->error('数据不存在！');
        }
			}

        //获取paragraph表中的段落数据
        public function getNavDetail(){
            $navID = $_POST['navID'];
            if(isset($navID)){
                $condition['id']=$navID;
                $N = M("Navigation");
                $paraArr=$N->where($condition)->find();
                if(!empty($paraArr)){
                    $this->ajaxReturn($paraArr, '表单数据保存成功！', 1);
                }else{
                    $this->ajaxReturn(0,'返回数据错误',0);
                }

            }else{
                return false;
            }
        }

        public function otherNavProcess(){
            $id = $_POST['id'];
            //echo $id;exit;
            if (!empty($id)) {
                $data[''] =
                $Form = M("Navigation");
                $data['id']=$id;
                $data['nav_color']=$_POST['nav_color'];
                $data['sub_color']=$_POST['sub_color'];
                $data['head_title']=$_POST['head_title'];
                $data['english']=$_POST['english'];
                $result = $Form->save($data);
                if (false !== $result) {
                    $this->success('编辑成功！');
                } else {
                    $this->error('编辑出错！');
                }
            } else {
                $this->error('导航ID错误！');
            }
        }


    }
?>