<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ch">
    <head>
    
    <title>登录...</title>
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
			//登录
			include '../../phpFile/conSql.php';
			$link_id=conSql();//   
			
			if(!isset($_POST['submit'])){  
				echo('非法访问!'."</br>");  
			}  
			$accounts = "'".htmlspecialchars($_POST['accounts'])."'";  
			$password = "'".$_POST['password']."'"; 
			
			
						
			//检测用户名及密码是否正确  
			$selectap="SELECT * FROM User WHERE Accounts=".$accounts." AND Password=".$password;
			//echo $selectap;
			$result = mysql_query($selectap);  
			if($row = mysql_fetch_array($result)){  
				//登录成功  
				
				$_SESSION['accounts'] =htmlspecialchars($_POST['accounts']); 
				include '../../phpFile/echoToast.php';
				echo '<script> 
				ShowLoading("登陆成功！",2000,"weui-icon-success-no-circle");
				setTimeout("javascript:location.href=\'../../\'", 1000); 
				</script>';

				echo '
				<p>
				正在登录，如果浏览器不支持跳转请
				<a href="../../">点击跳转</a>
                </p>
                ';

				
			} else {  
				echo('登录失败！点击此处 <a href="../Login">返回</a> 重新登陆');  
			}

			echo "用户：".$_SESSION['accounts']."欢迎你！";    
			
		?> 
         </div>
         
        
         <?php
            include '../../phpFile/echoFoot.php';
        ?>
    
</body>
</html>
