<!DOCTYPE html>
<html lang="ch">
    <head>
        
    <title>上传地图</title>
    <?php
     include '../../phpFile/echoHead.php';    
    ?>

    </head>



<body>


<div class="page">

    <?php
    include '../../phpFile/echoLogo.php';
    ?>

    <div class="page__bd">
    	
        <div class="weui-cells__title">上传地图文件</div>
        
        <form  action="../uploadEdit/editPage.php" onSubmit="return validate_form(this)"  data-ajax='false'  method="post" enctype="multipart/form-data">
            <!--表单主体-->
            <div class="weui-cells weui-cells_form">
                <!--地图名称-->
                <div class="weui-cell">
                    <div class="weui-cell__hd">
                        <label for="mapName" class="weui-label">地图名：</label>
                    </div>
                    
                    <div class="weui-cell__bd">
                        <input type="text" name="mapName" id="mapName" class="weui-input"  placeholder="请输入地图名称"/>
                    </div>
                </div>
                <!--地图文件-->
                <div class="weui-cell">
                    <div class="weui-cell__bd">
                        <div class="weui-uploader">
             
                            <div class="weui-uploader__hd">
                                <p class="weui-uploader__title">选择地图文件（svg格式）</p>
                                <div class="weui-uploader__info">0/1</div>
                            </div>
                        
                            <div class="weui-uploader__bd">
                                <ul class="weui-uploader__files" id="uploaderFiles">
                                 </ul>
                                <div class="weui-uploader__input-box">
                                    <input id="uploaderInput" class="weui-uploader__input" name="file" type="file" accept="image/svg" multiple>
                                </div>
                            </div>    
                        </div>
                    </div>
                </div>  
                <!--图片预览-->
                <div class="weui-gallery" id="gallery" style="opacity: 0; display: none;">
                    <span class="weui-gallery__img" id="galleryImg" style="background-image:url(blob:https://weui.io/8658f0cb-0b89-4fdc-8386-2eaa07d7fdca)"></span>
                    <div class="weui-gallery__opr">
                        <a href="javascript:" class="weui-gallery__del">
                            <i class="weui-icon-delete weui-icon_gallery-delete"></i>
                        </a>
                    </div>
                </div>   
            </div>

            <!--提交按钮-->
            <div class="weui-btn-area">
                <input  type="submit" name="submit" value="上传" class="weui-btn weui-btn_primary" href="javascript:" >


                <a href="../uploadEdit/example/" class="weui-btn weui-btn_default">使用模板</a>
                
                <a href="../uploadEdit/example_picture/" class="weui-btn weui-btn_default">使用模板(带图片)</a>

                <a href="../../html/help/" class="weui-btn weui-btn_default">查看帮助</a>

                <a href="../../earlyVersion/" class="weui-btn weui-btn_default">历史版本</a>
            </div>

        </form>
        
    </div>
    
    <?php
    include '../../phpFile/echoFoot.php';
    include '../../phpFile/echoWarnAlert.php';
    ?>
    

</div>
<script type="text/javascript">
       //js表单验证
        function validate_required(field,alerttxt)
        {
        with (field)
          {
          if (value==null||value=="")
            {
                ShowWarnAlert("提示",alerttxt);
                return false
            }
          
          else {return true}
          }
        }
        
        function validate_form(thisform)
        {

        with (thisform)
          {

          if (validate_required(mapName,"请输入地图名称！")==false)
            {mapName.focus();return false}
          if (validate_required(file,"未选择文件，如需跳过请使用模板！")==false)
            {file.focus();return false}
            else if(document.getElementById("uploaderInput").value.substr(document.getElementById("uploaderInput").value.lastIndexOf(".")).toLowerCase()!=".svg"){
                ShowWarnAlert("提示","目前只能上传.svg后缀的文件哦！");
              file.focus();return false
             }
          }
           
        }  
</script>
<script type="text/javascript" class="uploader js_show">
    $(function(){
        var tmpl = '<li class="weui-uploader__file" style="background-image:url(#url#)"></li>',
            $gallery = $("#gallery"), $galleryImg = $("#galleryImg"),
            $uploaderInput = $("#uploaderInput"),
            $uploaderFiles = $("#uploaderFiles")
            ;

        $uploaderInput.on("change", function(e){
            var src, url = window.URL || window.webkitURL || window.mozURL, files = e.target.files;
            for (var i = 0, len = files.length; i < len; ++i) {
                var file = files[i];

                if (url) {
                    src = url.createObjectURL(file);
                } else {
                    src = e.target.result;
                }

                $uploaderFiles.append($(tmpl.replace('#url#', src)));
            }
        });
        $uploaderFiles.on("click", "li", function(){
            $galleryImg.attr("style", this.getAttribute("style"));
            $gallery.fadeIn(100);
        });
        $gallery.on("click", function(){
            $gallery.fadeOut(100);
        });
    });</script>
</body>
</html>