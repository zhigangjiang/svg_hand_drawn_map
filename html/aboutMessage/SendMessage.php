<?php
header("Content-type: text/html; charset=utf-8"); 
session_start();

include '../../phpFile/conSql.php';
$link_id=conSql();

//include '../../phpFile/creatTable.php';
//creatTable($link_id);

$title=$_GET["title"];
$content=$_GET["content"];
if(!session_is_registered("accounts")){ //判断当前会话变量是否注册
	//session_register("accounts");    //注册变量
	$Id='访客';//如果未注册则使用访客
}else{
	$Id=$_SESSION['accounts'];		
}
$result = mysql_query("SELECT * FROM Message order by Nu desc limit 1");
$row = mysql_fetch_array($result);
$Nu = $row['Nu']+1;//获取当前留言最大的Nu(主键)然后加1以防止主键重复
//echo $Nu;
$sql_new_l="INSERT INTO Message (Nu ,Title, Id, Time, Message) VALUES ('". $Nu ."','". $title ."','" . $Id ."','".date("Y/m/d")."  ".date("H:i:s")."', '".$content."')";
mysql_query($sql_new_l);
//echo "新建记录：".$sql_new_l."</br>";

include 'showList.php';
showList();

mysql_close($link_id);
?>