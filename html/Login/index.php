<!DOCTYPE html>
<html lang="ch" >
    <head>
    
    <title>登陆</title>
    <?php
     include '../../phpFile/echoHead.php';    
    ?> 

    </head>
<body >

    
 		<?php
            include '../../phpFile/echoLogo.php';
        ?>
       
        <div class="weui-cells__title">登录</div>
        
        <form  id="loginForm" name="LoginForm" action="Login.php" method="post" onsubmit="return checkNum();">
        <div class="weui-cells weui-cells_form">
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">帐号</label></div>
                
                <div class="weui-cell__bd">
                    <input id="accounts" name="accounts" onblur="CheckAccounts(this.value)" class="weui-input"  placeholder="请输入帐号"/>
                </div>
            </div>
            
            <div class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
                
                <div class="weui-cell__bd">
                    <input id="password" name="password" onBlur="CheckPassword(this.value)" class="weui-input"  type="password" placeholder="请输入密码"/>
                </div>
            </div>
            <a href="../Register" class="weui-cell weui-cell_link">
        		<div class="weui-cell__bd">注册帐号</div>
   			</a>
        </div>
        <div class="weui-btn-area">
            <input  type="submit" name="submit" value="登录" onClick="ShowLoading('登陆中',5000,'weui-loading');" class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">
        </div>
        
        </form>

        <?php
            include '../../phpFile/echoFoot.php';
            include '../../phpFile/echoToast.php';
         ?>
    
         
       <script>

        
        
        
       
       </script>

</body>
</html>