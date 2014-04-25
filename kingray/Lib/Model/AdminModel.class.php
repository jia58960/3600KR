<?php 
	class AdminModel extends Model {
		protected $_map = array(
			'admin_name'=>'name',
			'admin_pas'=>'password'
		);
		protected $_validate = array(
			array('name','require','请输入用户名',1),
			array('password','require','密码是必须的',1),
			
		);
		protected $_auto = array(
			array('password','md5',1,'function')
		);
	}
?>