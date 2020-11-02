<?php

function conSql(){
	$servername = "127.0.0.1";
	$username = "root";
	$password = "123456";
	 
	$link_id=mysql_connect($servername,$username,$password);
	if(!$link_id){
		echo "连接数据库出错"."</br>";
	}
	else{
		echo "连接数据库成功"."</br>";
	}
	mysql_select_db("wodeditu");//选择数据库 不能新建数据库 可能设置权限
	return $link_id;
}
?>
