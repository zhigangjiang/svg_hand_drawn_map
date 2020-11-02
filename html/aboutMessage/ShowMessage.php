<?php
header("Content-type: text/html; charset=utf-8"); 
session_start();

include '../../phpFile/conSql.php';
$link_id=conSql();

include 'showList.php';
showList();

mysql_close($link_id);
?>
