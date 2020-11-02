<?php
function creatTable($link_id){
	$sql_new = "CREATE TABLE Message (Title varchar(30),Id varchar(30),Time varchar(30),Message varchar(100))";

	if (mysql_query($sql_new,$link_id)){
		echo "新建表：".$sql_new."成功</br>";
	}
	else if(mysql_error()=="Table 'Message' already exists"){
    	echo "已经存在Message表，无需建立"."</br>";
    }else{
		echo "其他错误"."</br>";
	 }
  }
?>