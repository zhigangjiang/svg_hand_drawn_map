<?php
//显示警示框 
//直接调用ShowWarnAlert(title,content) 
//参数1 标题 参数2 内容 点击确定隐藏
echo '
		<!--警示框-->
        <div id="warnAlert" style="display: none;">
            <div class="weui-mask"></div>
            <div class="weui-dialog">
                <div class="weui-dialog__hd"><strong id="dialogHd" class="weui-dialog__title"></strong></div>
                <div class="weui-dialog__bd" id="dialogBd" ></div>
                <div class="weui-dialog__ft">
                    <a href="javascript:HiddenWarnAlert();" class="weui-dialog__btn weui-dialog__btn_primary">确定</a>
                </div>
            </div>
            <script>
				function ShowWarnAlert(title,content){
					$("#dialogHd").html(title);
					$("#dialogBd").html(content);
					$("#warnAlert").attr("style","");
				}
				function HiddenWarnAlert(){
					$("#dialogHd").html(null);
					$("#dialogBd").html(null);
					$("#warnAlert").attr("style","display:none");
				}
			</script>
        </div>
'
;
?>