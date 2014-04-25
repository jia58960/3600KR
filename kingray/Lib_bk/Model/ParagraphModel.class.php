<?php
class ParagraphModel extends Model{
	protected $_map=array(
	);
	
	protected $_validate=array(
		array('content','require','请输入用户名',1),
	);
	
	protected $_auto=array(
		array('creat_time','time',1,'function')
	);




}




?>