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
		}
?>