<?php
header("Content-type: text/html; charset=utf-8"); 

$accounts="'".$_GET["accounts"]."'";
$email="'".$_GET["email"]."'";
if(strstr($_GET["accounts"],"'"))
{
	//防止非法输入
    echo "-1";
	return;
}
$servername = "my2467976.xincache1.cn";
$username = "my2467976";
$password = "jzg599154";
 
$link_id=mysql_connect($servername,$username,$password);
if(!$link_id){
//	echo "连接数据库出错"."</br>";
echo '-1';
}
else{
//	echo "连接数据库成功"."</br>";
}
//////////////////////////////////////////////////////////////////////////////
mysql_select_db("my2467976");//选择数据库 不能新建数据库 可能设置权限

//////////////////////////////////////////////////////////////////////////////

$sql="SELECT * FROM User WHERE Accounts=".$accounts;
//echo $sql;
$result = mysql_query($sql); 

	if($row = mysql_fetch_array($result)){ 
		//echo "已经存在".$accounts;
		//echo "** ".$row['Accounts']." **";
		//echo $row['Date'];
		echo '1';
	}else{
		echo '0';
	}


mysql_close($link_id);
?>