<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ch">
    <head>
        
    <title>注册成功...自动登录中...</title>
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
            include '../../phpFile/conSql.php';
            $link_id=conSql();//
            ////////////////////////////////////////////////////////////////////////////
            $sql_new = "CREATE TABLE User (Accounts varchar(24),Password varchar(12),Email varchar(15),Date varchar(20),Cip varchar(30))";
            
            
            if (mysql_query($sql_new,$link_id))//新建表 persons
              {
              echo "新建表：".$sql_new."成功</br>";
              }
            else
              {
                  if(mysql_error()=="Table 'User' already exists")
                  {
                  //echo "已经存在User表，无需建立"."</br>";
                  }
                  else
                  {
                      echo "其他错误"."</br>";
                  }
              }
            //////////////////////////////////////////////////////////////////////////////
            $accounts="'".$_POST["accounts"]."',";
            //$passwordMd5="'".md5($_POST["password"])."',"; //md5加密
			$password="'".$_POST["password"]."',";
            $email="'".$_POST["email"]."',"; 
            $datep="'".date("Y/m/d")." ".date("H:i:s")."',";
            $cip="'".$_POST["cip"]."'";
            //echo $accounts .$password.$email.$datep.$cip;
            
            $sql_new_l="INSERT INTO User(Accounts, Password, Email, Date, Cip) VALUES (".$accounts .$password.$email.$datep.$cip.")";
            
            if(mysql_query($sql_new_l)){//新建记录
                //echo "新建记录：".$sql_new_l."</br>";
				$_SESSION['accounts'] =htmlspecialchars($_POST['accounts']); 
                include '../../phpFile/echoToast.php';
                echo '<script> 
                ShowLoading("注册成功！",2000,"weui-icon-success-no-circle");
                setTimeout("javascript:location.href=\'../../\'", 1000); 
                </script>';

                echo '
				<p>
				正在登录，如果浏览器不支持跳转请
				<a href="../../">点击跳转</a>
                </p>
                ';
            }else{
                echo mysql_error();
            }
            /////////////////////////////////////////////////////////////////////////////////
            echo "用户：".$_SESSION['accounts']."欢迎你！";
            mysql_close($link_id);
            ?>
         </div>
         
        
         <?php
            include '../../phpFile/echoFoot.php';
        ?>
    
</body>
</html>
