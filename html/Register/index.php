<!DOCTYPE html>
<html lang="ch">
    <head>
        
    <title>注册账户</title>
    <?php
     include '../../phpFile/echoHead.php';    
    ?>
        <script src="http://pv.sohu.com/cityjson?ie=utf-8"></script>  

    </head>
    
<body>



 		<?php
            include '../../phpFile/echoLogo.php';
        ?>
        <form  id="form" action="Register.php" method="post" onsubmit="return checkNum();">
        <div class="weui-cells__title">注册</div>
        
        <div class="weui-cells weui-cells_form">
            <div id="accountsCell" class="weui-cell"><!--weui-cell_warn-->
                <div class="weui-cell__hd">
                <label class="weui-label">用户名</label>
                </div>
                
                <div class="weui-cell__bd">
                    <input id="accounts" name="accounts" onBlur="CheckAccounts(this.value)" class="weui-input"  placeholder="请输入用户名"/>
                </div>
                
                <div class="weui-cell__ft">
                   <i style="display:none" id="warn"    class="weui-icon-warn"></i>
                   
                   <i style="display:none" id="success" class="weui-icon-success"></i>
                </div>
            
            </div>
            
            <div id="passwordCell" class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">密码</label></div>
                
                <div class="weui-cell__bd">
                    <input id="password" name="password" onBlur="CheckPassword(this.value)" class="weui-input"  type="password" placeholder="请输入密码"/>
                </div>
                <div class="weui-cell__ft">
                   <i style="display:none" id="passwordWarn"  class="weui-icon-warn"></i>
                   
                   <i style="display:none" id="passwordSuccess" class="weui-icon-success"></i>
                </div>
            </div>
            <div id="confirmPasswordCell" class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">确认密码</label></div>
                
                <div class="weui-cell__bd">
                    <input id="confirmPassword"  onblur="ConfirmPassword(document.getElementById('password').value,this.value)" class="weui-input"  type="password" placeholder="请输入确认密码"/>
                </div>
                <div class="weui-cell__ft">
                   <i style="display:none" id="confirmPasswordWarn"  class="weui-icon-warn"></i>
                   
                   <i style="display:none" id="confirmPasswordSuccess" class="weui-icon-success"></i>
                </div>
            </div>
            <div id="emailCell" class="weui-cell">
                <div class="weui-cell__hd"><label class="weui-label">电子邮箱</label></div>
                
                <div class="weui-cell__bd">
                    <input id="email" name="email" onblur="CheckEmail(this.value)" class="weui-input"   placeholder="请输入电子邮箱(选填)"/>
                </div>
                <div class="weui-cell__ft">
                   <i style="display:none" id="emailWarn"  class="weui-icon-warn"></i>
                   <i style="display:none" id="emailSuccess" class="weui-icon-success"></i>
                </div>
            </div>
            
            
        </div>
        
        <label for="weuiAgree" class="weui-agree">
            <input id="weuiAgree" onClick="Agree()" type="checkbox" class="weui-agree__checkbox">
            <span class="weui-agree__text">
                阅读并同意<a href="Demo.php" >《相关条款》</a>
            </span>
        </label>
        
        
        <div class="weui-btn-area">
            <input  type="submit" onClick="SendMessageCip()" class="weui-btn weui-btn_primary" href="javascript:" id="showTooltips">
        </div>
        
        </form>
     
        
		<?php
            include '../../phpFile/echoFoot.php';
            include '../../phpFile/echoWarnAlert.php';
            include '../../phpFile/echoToast.php';
        ?>

        <div id="addJs">
       
		</div>
         <script>
		 
        
			
		function ShowWarnIcon(str1,str2,str3){
			document.getElementById(str1).setAttribute("class","weui-cell weui-cell_warn");
			document.getElementById(str2).setAttribute("style","display:none");
			document.getElementById(str3).setAttribute("style","");
		}
		function HiddenWarnIcon(str1,str2,str3){
			document.getElementById(str1).setAttribute("class","weui-cell");
			document.getElementById(str3).setAttribute("style","display:none");
			document.getElementById(str2).setAttribute("style","");
		}
         </script>
         <script>
            var temp;
			var xmlHttp
			function Check(str)
			{   
				
				xmlHttp=GetXmlHttpObject()
				if (xmlHttp==null)
				 {
				 alert ("Browser does not support HTTP Request")
				 return
				 }
				var url="CheckAccounts.php"
				url=url+str
				url=url+"&sid="+Math.random()
				xmlHttp.onreadystatechange=stateChanged 
				xmlHttp.open("GET",url,false)//async 同步传参
				xmlHttp.send(null)
				
				if(temp=="1")return true;
				else if(temp=="0") return false;
			}
				
				function stateChanged() 
				{ 
				if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
				 { 
				 temp=xmlHttp.responseText ;
				
				 } 
				}
				
				function GetXmlHttpObject()
				{
				var xmlHttp=null;
				try
				 {
				 // Firefox, Opera 8.0+, Safari
				 xmlHttp=new XMLHttpRequest();
				 }
				catch (e)
				 {
				 //Internet Explorer
				 try
				  {
				  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				  }
				 catch (e)
				  {
				  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				 }
				 return xmlHttp;
			     }
         
         </script>
         
		 <script>
		 var flagAccounts=true;
		 var flagPassword=true;
		 var flagConfirmPassword=true;
		 var flagEmail=true;
		 var flagAgree=false;
		 
		 var aa=false;
		 var bb=false;
		 var cc=false;
		 var dd=true;
		
		 
		 var existence;
         function CheckAccounts(accounts){
			if(accounts.length <1 || accounts.length >12)  
	  		{
				ShowWarnIcon('accountsCell','success','warn');
				$("#warn").attr("onclick","ShowWarnAlert('用户名输入错误','用户名格式错误，请输入1~12个字符。')");
				if(flagAccounts){
					$("#warn").trigger("click");
				}
				flagAccounts=false;
			}else if(Check("?accounts="+accounts)){
				ShowWarnIcon('accountsCell','success','warn');
				$("#warn").attr("onclick","ShowWarnAlert('用户名输入错误','该用户名已经存在。')");
				if(flagAccounts){
					$("#warn").trigger("click");
				}
				flagAccounts=false;

			}else{
				HiddenWarnIcon('accountsCell','success','warn');
				flagAccounts=true;
				aa=true;
			}
			
			
			//////////////////////////////////////////
			 
		}

        function CheckPassword(password){ 
			  
			var flagZM=false ;
			var flagSZ=false ; 
			var flagQT=false ;
			if( !flagAccounts || !aa ){
				$("#passwordWarn").attr("onclick","ShowWarnAlert('提示','请输入正确账号。')");
				$("#passwordWarn").trigger("click");
			}
			else if(password.length<6 || password.length>12){ 
				ShowWarnIcon('passwordCell','passwordSuccess','passwordWarn');
				$("#passwordWarn").attr("onclick","ShowWarnAlert('密码输入错误','长度是6~12个字符。')");
				if(flagPassword){
					$("#passwordWarn").trigger("click");
				}
				flagPassword=false;  
			}else
				{   
				  for(i=0;i < password.length;i++)   
					{    
						if((password.charAt(i) >= 'A' && password.charAt(i)<='Z') || (password.charAt(i)>='a' && password.charAt(i)<='z')) 
						{   
							flagZM=true;
						}
						else if(password.charAt(i)>='0' && password.charAt(i)<='9')    
						{ 
							flagSZ=true;
						}else    
						{ 
							flagQT=true;
						}   
					}
					   
					if(!flagZM||!flagSZ||flagQT)
					{
						ShowWarnIcon('passwordCell','passwordSuccess','passwordWarn');
						$("#passwordWarn").attr("onclick","ShowWarnAlert('密码输入错误','密码必须是字母数字的组合。')");
						if(flagPassword){
							$("#passwordWarn").trigger("click");
						}
						flagPassword=false;
					}
					else{
						HiddenWarnIcon('passwordCell','passwordSuccess','passwordWarn');
						flagPassword=true;
						bb=true; 
					}  
				 
				}
		}
		//验证确认密码 
		
		function ConfirmPassword(password,confirmpassword){
			   
			    if(!flagAccounts || !aa){
					$("#confirmPasswordWarn").attr("onclick","ShowWarnAlert('提示','请输入正确账号。')");
					$("#confirmPasswordWarn").trigger("click");
				}else if( !flagPassword || !bb ){
					$("#confirmPasswordWarn").attr("onclick","ShowWarnAlert('提示','请输入密码。')");
					$("#confirmPasswordWarn").trigger("click");
				}else if(confirmpassword!=password)
				{
					ShowWarnIcon('confirmPasswordCell','confirmPasswordSuccess','confirmPasswordWarn');
					$("#confirmPasswordWarn").attr("onclick","ShowWarnAlert('确认密码输入错误','两次输入的密码不一样。')");
					if(flagConfirmPassword){
						$("#confirmPasswordWarn").trigger("click");
					}
					flagConfirmPassword=false;
				}else{
					HiddenWarnIcon('confirmPasswordCell','confirmPasswordSuccess','confirmPasswordWarn');
					flagConfirmPassword=true;
					cc=true;
				}
		}
		function CheckEmail(email){
			
					apos=email.indexOf("@");
					dotpos=email.lastIndexOf(".");
					if(email == ""){
						HiddenWarnIcon('emailCell','emailSuccess','emailWarn');
						flagEmail=true;
						dd=true; 
					}
					else if(Check("?email="+email)){
						ShowWarnIcon('emailCell','emailSuccess','emailWarn');
						$("#emailWarn").attr("onclick","ShowWarnAlert('电子邮箱输入错误','该电子邮箱已经注册过了。')");
						if(flagEmail){
							$("#emailWarn").trigger("click");
						}
						flagEmail=false;
					}else if(apos<1||dotpos-apos<2){
					    ShowWarnIcon('emailCell','emailSuccess','emailWarn');
						$("#emailWarn").attr("onclick","ShowWarnAlert('电子邮箱输入错误','电子邮箱格式错误。')");
						if(flagEmail){
							$("#emailWarn").trigger("click");
						}
						flagEmail=false;
					  }
					else {
						HiddenWarnIcon('emailCell','emailSuccess','emailWarn');
						flagEmail=true;
						dd=true; 
					}
		}
		
		$("#weuiAgree").trigger("click");
		
		function Agree(){
			
			if(flagAgree){
				flagAgree=false;
			}
			else{
				flagAgree=true;
			}
			
		}
        </script>
        
        <script>
		function checkNum(){
			if(!aa||!bb||!cc||!dd ||!flagEmail)
			{
				
					ShowWarnAlert('提示','表单还有错误哦');
			 
			 return false;
			}
			else{
				if(!flagAgree){
				ShowWarnAlert('提示','请同意《相关条款》');
				return false;
				}
				else{
					ShowLoading("提交中",2000,"weui-loading");
					
					return true;
				}
			}
		}
        function SendMessageCip(){//发送注册ip地址
		    //document.getElementById("loadingToast").setAttribute("style","display:");
			var cip = document.createElement("input");  
			cip.name ="cip"
			cip.value =returnCitySN["cip"];//+','+returnCitySN["cname"];
			cip.style ="display:none"
			document.getElementById("form").appendChild(cip);
		}
		 
		 
		
			
	  
	  
  
        </script>




</body>
</html>