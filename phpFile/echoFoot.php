<?php
//直接插入
// | <a href="http://www.miitbeian.gov.cn/publish/query/indexFirst.action" target="_blank">闽ICP备16035380号-2</a></p>
echo 	'
		<!--网站脚标 weui-footer_fixed-bottom 浮动 当页面过短时添加该属性-->
        <div class="weui-footer ">
            <p class="weui-footer__links">
                <a href="../../" class="weui-footer__link">首页</a>
            </p>
            <p class="weui-footer__text">&copy; 2016-2017 我的地图


            
            <script>
            function chekHeight(){
                if($("body").height()< $(window).height()){
                    $(".weui-footer").addClass("weui-footer_fixed-bottom");
                    $("body").height($(window).height());
                }
            }
            
            chekHeight();
            
            $(window).resize(function (){
                chekHeight();
            });
            </script>
        </div> 
        ';
?>