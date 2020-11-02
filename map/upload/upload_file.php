<html>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
 <title>预览地图</title>
    <!--jq mb-->
    <link rel="stylesheet" href="../css/jquery.mobile-1.4.5.min.css">
    <script src="../js/jquery-1.11.0.min.js"></script>
    <script src="../js/jquery.mobile-1.4.5.min.js"></script> 
<body>
 

        <div data-role="page" id="pageone" style="overflow: hidden;  margin: 0; text-shadow:none">
                  <div data-role="header" data-position="fixed" >
                    <a href="upload.html"  data-ajax='false' class="ui-btn ui-corner-all ui-shadow ui-icon-carat-l ui-btn-icon-left">返回</a>
                    <h1>预览地图</h1>
                  </div>
		          
                  <div style=" position:fixed ;left:5px; top:60px; font-size:x-small;">
                    <strong>tips：</strong><br>
                    <strong>请不要刷新页面，刷新后需重新上传</strong><br>
                    <strong id="fillImf">
                    <?php
							// 允许上传的图片后缀
							$allowedExts = array("svg");
							$temp = explode(".", $_FILES["file"]["name"]);
							$extension = end($temp);// 获取文件后缀名
							if (($_FILES["file"]["size"] < 6048000)   // 小于 2000 kb
							&& in_array($extension, $allowedExts))
							{       echo "文件上传成功" ."<br>";
									echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
									echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
									echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
									//创建以填写内容为标题的地图
									$mapName=$_POST["mapName"].'.svg';//获取名称这是唯一标识
									
									if (file_exists("../uploadFiles/" . $mapName)){
									move_uploaded_file($_FILES["file"]["tmp_name"], "../uploadFiles/" .$mapName);
									echo $mapName." 文件已经存在，且已覆盖原文件。 ". "<br>";
									}
									else
									{
									// 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
									move_uploaded_file($_FILES["file"]["tmp_name"], "../uploadFiles/" .$mapName);
									echo "文件" .$mapName."成功创建" ."<br>";
									}
							}
							else
							{
								echo "不支持的文件格式，请返回重新上传" ."<br>";
							}
					?>
                    </strong>
					<strong id="svgIdP1"></strong><br>  
                    <strong id="svgIdP2"></strong><br> 
                    <strong id="svgIdP3"></strong><br> 
                    <strong id="svgIdP4"></strong><br> 
                   </div>
                  
                   
                   
                  <div data-role="main" class="ui-content">
        
				  
						<div id="upMap">	
							
						<?php
						$path="../uploadFiles/" .$mapName;//获取文件路径
						echo file_get_contents($path);//显示
						?>
						
                        </div>
							
                  </div>
                  
                
              
         
                
                  <div data-role="footer" data-position="fixed"  style="text-align:center;">
                        <a href="../earlyVersion/help.html"  data-ajax='false' class=' ui-btn ui-corner-all ui-shadow ui-icon-info ui-btn-icon-left' >查看帮助</a>
						<?php
                        //删除最后一行</svg>
                        $fp=file($path); 
                        $total=count($fp); //取得文件总行数
                        $num=$total-1; //要删除的行序号 
                        foreach ($fp as $line) { //按行分解内容并 
                        $tmp[]=$line; //逐行写入数组 
                        } 
                        for($i=0;$i<$total;$i++){ //若$i的值不等于要删除的行序号 
                        if($i<>$num) 
                        $savestr.=$tmp[$i]; } //写入文件 
                        
                        $myfile = fopen("../uploadEdit/" .$_POST["mapName"].'_edit.html', "w");//创建svg.html文件
                        $svgHtmlH=file_get_contents("../uploadEdit/svgHtmlH.txt");//网页上部分
                        $svgHtmlL=file_get_contents("../uploadEdit/svgHtmlL.txt");//网页下部分

                        
                        
                        
                        //开始组合网页
                        fwrite($myfile, $svgHtmlH);
                        fwrite($myfile, $savestr);//svg文档
                        fwrite($myfile, $svgHtmlL);
                        fclose($myfile);
                        
                        echo "<a href='../uploadEdit/".$_POST["mapName"]."_edit.html' data-ajax='false' class='  ui-btn ui-corner-all ui-shadow ui-icon-carat-r ui-btn-icon-right'>编辑地图</a>";
						?>
                  </div>
                  
                  <script>
                  document.getElementsByTagName('svg')[0].id="SvgMap";//给svg设置id
					function svgId(){
					if($("#SvgMap").find("#Road")[0]==undefined)document.getElementById("svgIdP1").innerHTML="错误：未找到Road图层，请检查并重新上传";
					if($("#SvgMap").find("#Name")[0]==undefined)document.getElementById("svgIdP2").innerHTML="错误：未找到Name图层，请检查并重新上传";
					if($("#SvgMap").find("#Architecture")[0]==undefined)document.getElementById("svgIdP3").innerHTML="错误：未找到Architecture图层，请检查并重新上传";
					if($("#SvgMap").find("#Other")[0]==undefined)document.getElementById("svgIdP4").innerHTML="未找到Other图层，如果没有设置该图层请忽略";
					}
					svgId();//提示图层错误；
					
					$("#upMap").css("overflow","scroll");
					$("#upMap").css("width",window.innerWidth);
					
                  </script>
                   
                  

        
        
</body>
</html>