<?php
//显示带双操作警示框 
//直接调用ShowWarnAlert2(title,content,fun)
//参数1 标题 参数2 内容 参数3 函数名称（字符串形式输入）
echo '
	<!--BEGIN dialog1-->
        <div id="warnAlert2" style="display: none;">
            <div class="weui-mask"></div>
            <div class="weui-dialog">
                <div class="weui-dialog__hd"><strong id="dialog2Hd" class="weui-dialog__title"></strong></div>
                <div id="dialog2Bd" class="weui-dialog__bd"></div>
                <div class="weui-dialog__ft">
                    <a href="javascript:HiddenWarnAlert2();" class="weui-dialog__btn weui-dialog__btn_default">取消</a>
                    <a id="coutinueWarn" href="javascript:HiddenWarnAlert2();" class="weui-dialog__btn weui-dialog__btn_primary">继续</a>
                </div>
            </div>
            <script type="text/javascript">
                function ShowWarnAlert2(title,content,fun){
                    $("#dialog2Hd").html(title);
                    $("#dialog2Bd").html(content);
                    $("#coutinueWarn").attr("href","javascript:HiddenWarnAlert2();"+fun+";");
                    $("#warnAlert2").attr("style","");
                }
                function HiddenWarnAlert2(obj){
                    $("#dialog2Hd").html(null);
                    $("#dialog2Bd").html(null);
                    $("#warnAlert2").attr("style","display:none");
                }
            </script>
        </div>
        
';
?>