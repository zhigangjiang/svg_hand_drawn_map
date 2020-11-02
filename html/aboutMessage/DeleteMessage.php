<?php
header("Content-type: text/html; charset=utf-8"); 
session_start();
if(!session_is_registered("accounts")){ //判断当前会话变量是否注册
	//session_register("accounts");    //注册变量
	$Id='访客';//如果未注册则使用访客
}else{
	$Id=$_SESSION['accounts'];		
}

include '../../phpFile/conSql.php';
$link_id=conSql();

$Nu = $_GET["Nu"];

//删除记录 访客留言谁都可以删
$sqlDelete = "DELETE FROM Message WHERE Nu=$Nu AND ( Id = '访客' OR Id = '".$Id."')";
//echo $sqlDelete;
if(mysql_query( $sqlDelete )){
	//echo "1";
}else{
	echo "删除失败";
	echo mysql_error();
}


include 'showList.php';
showList();


mysql_close($link_id);
?>