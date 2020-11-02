<?php
//显示带操作成功提示框 
//需要调用ShowLoading(text,time,icon)
//参数1 内容 参数2 自动关闭时间（ms）参数3图标
echo '
        <!--警示框-->
		<div id="loadingToast" style="display:none;">
            <div class="weui-mask_transparent"></div>
            <div class="weui-toast">
                <i class=" weui-icon_toast"></i>
                <p id="loadingText" class="weui-toast__content"></p>
            </div>
            <script type="text/javascript">
            //weui-icon-success-no-circle

                function ShowLoading(text,time,icon){

                    $("html").click(HiddenLoding());
                    $(".weui-icon_toast").addClass(icon);
                    $("#loadingText").html(text);
                    $("#loadingToast").attr("style","");
                    setTimeout("HiddenLoding()",time);//
                    
                }

                function HiddenLoding(){
                    $("#loadingText").html(null);
                    $("#loadingToast").attr("style","display:none");
                }
                
            </script>
        </div>
';
?>