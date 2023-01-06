<?php
	session_start();
	$con=mysqli_connect("sql104.epizy.com","epiz_31974009","aAG6orZpjaMh9VG","epiz_31974009_users");
	define('SERVER_PATH',$_SERVER['DOCUMENT_ROOT'].'/php/epiz_31974009_users/');
	define('SITE_PATH','http://sql104.epizy.com/php/epiz_31974009_users/');
	define('PRODUCT_IMAGE_SERVER_PATH',SERVER_PATH.'media/product/');
	define('PRODUCT_IMAGE_SITE_PATH',SITE_PATH.'media/product/');
?>