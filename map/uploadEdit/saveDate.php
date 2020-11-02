<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
    <title><?php echo $_POST["mapName"]  ?></title>
</head>
<body>
<?php
		//使用post传输数据
		$mapName=$_POST["mapName"];
		$initScale=$_POST["initScale"]; 
		$minScale=$_POST["minScale"]; 
		$maxScale=$_POST["maxScale"]; 
		$chgScale=$_POST["chgScale"]; 
		$referenceX=$_POST["referenceX"]; 
		$referenceY=$_POST["referenceY"]; 
		$referenceLongitude=$_POST["referenceLongitude"]; 
		$referenceLatitude=$_POST["referenceLatitude"]; 
		$pointNum=$_POST["pointNum"];	  
		//吧数据保存到userData目录下并设置文件名为地图名
		$myfile = fopen("../userData/".$_POST["mapName"].".js","w");		
		$mapName = "var title='".$mapName."';"."\n";
		fwrite($myfile, $mapName);
		$initScale = "var initScale=".$initScale.";"."\n";
		fwrite($myfile, $initScale);
		$minScale = "var minScale=".$minScale.";"."\n";
		fwrite($myfile, $minScale);
		$maxScale = "var maxScale=".$maxScale.";"."\n";
		fwrite($myfile, $maxScale);
		$chgScale = "var chgScale=".$chgScale.";"."\n";
		fwrite($myfile, $chgScale);
		$referenceX = "var ReferencePoint_x=".$referenceX.";"."\n";
		fwrite($myfile, $referenceX);
		$referenceY = "var ReferencePoint_y=".$referenceY.";"."\n";
		fwrite($myfile, $referenceY);
		$referenceLongitude = "var ReferencePoint_longitude=".$referenceLongitude.";"."\n";
		fwrite($myfile, $referenceLongitude);
		$referenceLatitude = "var ReferencePoint_latitude=".$referenceLatitude.";"."\n";
		fwrite($myfile, $referenceLatitude);	
		$pointNum = "var pointNum=".$pointNum.";"."\n";
		fwrite($myfile, $pointNum);
		
		fclose($myfile);
		
		//获取已经设置id的svg文本**已添加location
		//删除反斜杠
		$svgstr=stripslashes($_POST["svgData"]);
		
		//组合网页保存到网站根目录
		$html = fopen("../".$_POST["mapName"].'.html', "w");//创建可以使用的网页
		fwrite($html,file_get_contents("../htmlText/htmlH.txt"));//写入头文件
		fwrite($html,$svgstr);//写入编id完成的<svg>
		fwrite($html,file_get_contents("../htmlText/htmlL.txt"));//写入尾文件
		fwrite($html,'<script type="text/javascript" src="userData/'.$_POST["mapName"].'.js"></script>');//写入js文件
		fwrite($html,file_get_contents("../htmlText/htmlJs.txt"));//写入js文件
		fclose($html);
		//生成链接可以跳转								
		echo "<a href='../".$_POST["mapName"].".html' data-ajax='false' class='  ui-btn ui-icon-carat-r ui-btn-icon-right'>查看地图</a> 请记住该地址";

?>

</body>
</html>