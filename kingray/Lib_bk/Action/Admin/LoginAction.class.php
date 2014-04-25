<?php 
	class LoginAction extends Action {
		public function index(){
			if(!isset($_SESSION['admin'])||empty($_SESSION['admin'])){
			$this->display();
		}
		else{
			$this->redirect('Index/index');
		}
			}
			
		public function checkLogin(){
		
			$ad=D('Admin');
			$list=$ad->create();
			if($list){
				$admin=M('Admin');
	
				$where=$list;	
				//dump($where);exit;
				$alist=$admin->where($where)->find();
				if(empty($alist))
					$this->error('用户名或密码错误');
				else{			
					//	生成session
					$_SESSION['admin']['uid']=$alist['id'];
					$_SESSION['admin']['uname']=$alist['name'];
					
					$this->success('登陆成功','__GROUP__/Index/index');
				}
			}
			else{
				$this->error($ad->getError());
			}
		}

		}
?>
