<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ch">
    <head>
    <title>关于-留言</title>
    <?php
     include '../../phpFile/echoHead.php';    
    ?>
    </head>
    
<body onLoad="ShowMessage()">
         
    
    <?php
    include '../../phpFile/echoLogo.php';
    ?>
         
    <!-- 主体 -->
    <div class="page__bd">
       <div class="weui-panel">
        <article class="weui-article">
             <section>
                <h3>网站介绍：</h3>
                <p>本站由福建师范大学福清分校5名学生创建于2016.11</p>
                <p>
                     <a href="http://www.fjnufq.edu.cn"><img  src="images/school.jpg" alt="福建师范大学福清分校"></a>
                            
                 </p>      
                 <p style="text-align:center"><a style="color:#000000;"  href="http://www.fjnufq.edu.cn">福建师范大学福清分校</a></p>
             </section>
            
             <section>
                <h3>功能介绍：</h3>
                <p>
                    1、将用户上传的地图底图转换为可实现地理定位、导航、搜索的地图。
                    <br/>
                    2、上传的地图为svg格式矢量图（也可以上传普通图片列如jpg、png格式等），后台自动从中提取道路信息、位置信息、文本信息
                    <br/>
                    3、地图可以自定义设计，适合景区地图、校园地图。
                    详细制作内容请查看<a href="../help/">帮助页面</a>。
                </p>
             </section>
            
             <section>
                <h3>其他：</h3>
                <p>
                    如果您有更好的意见或建议可以在下方留言。
                </p>
             </section>
         </article>
        </div>
        <!---------------------------------------------->
        
        
        <div class="weui-panel" >
           <div class="weui-panel__hd" >留言列表：
           </div> 
           
           <div id="txtHint" class="weui-panel__bd">
                <div class="weui-loadmore">
                    <i class="weui-loading"></i>
                    <span class="weui-loadmore__tips">正在加载</span>
                </div>
           </div>
           
       </div>
       
       <!---------------------------------------------->
       <div class="weui-panel" >
       
            <div class="weui-cells__title">标题：</div>
            <div class="weui-cells">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <input type="text" id="title" class="weui-input" placeholder="请输入标题" oninput="font_siz(50,null,this)">
                    </div>
                </div>
            </div>

            <div class="weui-cells__title">内容：</div>
            <div class="weui-cells weui-cells_form">
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <textarea ype="text" id="content"  class="weui-textarea" placeholder="请输入内容" rows="3" oninput="font_siz(300,'#textCount',this)"></textarea>
                        <div class="weui-textarea-counter"><span id="textCount">0</span>/300</div>
                    </div>
                </div>
                <script>
				
				function font_siz(limit,id,self) {
					var num = $(self).val().length;
					
					if(num<=limit){
						if(id==null){
						}else {
						 $(id).text(num);
						}
					}else{
						 ShowWarnAlert("提示","超过限制，请重新输入。");
					}
 
				}
				</script>
            </div>
            
            
        
       		 <script src="message.js"></script>
        
            
            
            <?php
               if(!session_is_registered("accounts")){ //判断当前会话变量是否注册
                    //session_register("accounts");    //注册变量
                    echo '<div id="state" class="weui-cells__tips">当前用户：访客</div>';
                }else{
                    $state=$_SESSION['accounts'];
                    echo '<div id="state" class="weui-cells__tips">当前用户：'.$state.'</div>';
                    
                    
                }
             ?>
    
            <div class="weui-btn-area">
                <a
                 class="weui-btn weui-btn_primary"
                 href="javascript:SendMessage()"
                 id="showTooltips"> 
                 提交
                 </a>
            </div>
       
       
       </div>   
    </div>
        

    <?php
    include '../../phpFile/echoFoot.php';
    include '../../phpFile/echoWarnAlert.php';
    include '../../phpFile/echoWarnAlert2.php';
    include '../../phpFile/echoToast.php';
    ?> 
        
 </body>
</html>