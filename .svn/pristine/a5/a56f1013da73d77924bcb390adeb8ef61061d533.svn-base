<?php
	//导入客户端判断，执行判断是在项目配置文件里
	//require('./iswap.php');
	$user_agent=$_SERVER['HTTP_USER_AGENT'];
	if(strpos($user_agent,'MSIE 8.0')||strpos($user_agent,'MSIE 7.0')||strpos($user_agent,'MSIE 6.0')){
		define('BROWSER',true);
	}else{
		define('BROWSER',false);
	}
	define('APP_NAME','kingray');
	define('APP_PATH','./kingray/');
	define('APP_DEBUG',true);
	require('./ThinkPHP/ThinkPHP.php');
?>