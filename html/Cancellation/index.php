<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ch">
    <head>
    
    <title>注销...</title>
    <?php
     include '../../phpFile/echoHead.php';    
    ?>
    </head>
<body>
		 <?php
            include '../../phpFile/echoLogo.php';
         ?>
         
         <div class="page__bd">
			<?php  
			unset($_SESSION['accounts']);
			if(!session_is_registered("accounts"))
			{
				//注销成功  
                include '../../phpFile/echoToast.php';
                echo '<script> 
                ShowLoading("注销成功！",2000,"weui-icon-success-no-circle");
                setTimeout("javascript:location.href=\'../../\'", 2000); 
                </script>';
				echo '
				<p>
				正在跳转，如果浏览器不支持跳转请
				<a href="../../">点击返回首页</a>
                </p>
                ';
				
			} else {  
				echo('注销失败！点击此处 <a href="../../">返回</a> ');  
			}  
			  
			?> 
         </div>
         
         <?php
            include '../../phpFile/echoFoot.php';
             
         ?>
    
</body>
</html>
