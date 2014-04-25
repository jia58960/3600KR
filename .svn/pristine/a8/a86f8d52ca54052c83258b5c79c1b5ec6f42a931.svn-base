<?php 
	class ArticleModel extends Model {
		protected $_validate = array(
        array('title', 'require', '标题是必须的！', 1),//1为必须验证
        array('content', 'require', '内容是必须写'),
    );
		protected $_auto = array(
			array('time', 'time', self::MODEL_INSERT, 'function')
			);
		}
?>