<?php
class IndexAction extends Action {
    public function index(){
		if(!isset($_SESSION['admin'])||empty($_SESSION['admin'])){
			$this->redirect('Login/index');
		}
		else{
		$this->display();
		}
    }
}
?>