<!DOCTYPE html>
<html lang="ch" >
    <head>
    
    <title>帮助2017.2</title>
    <?php
     include '../../phpFile/echoHead.php';    
    ?> 
    <link rel="stylesheet" href="../../css/jquery.mobile-1.4.5.min.css">
    </head>
<body >

    
 		<?php
            include '../../phpFile/echoLogo.php';
        ?>
       
       
          
        
          <div data-role="main" class="ui-content">
          <h2>如何绘制地图</h2>
          <p><h4>1、绘制：</h4>建议上传svg格式地图，可以使用AI绘制 svg编辑器</p>
          <p>绘制地图不限制长宽，但是应该以25m对应图上1cm的比例来绘制，可以参考天地图的地图作为底图（在25m比例尺下截图放入AI中）来绘制</p>
          <p><h4>2、图层：</h4>一共4个图层：道路图层设置名为Road、文字标签（描述建筑道路的文本）设置图层名为Name、建筑图层名称设置为Architecture、其他的内容图层名称设置为Other。开头是大写英文，图片中最外层SvgMap可以不用，直接建立4个图层就行，图片中第5图层为背景，可以加在Other图层</p>
                             <img src="img/QQ图片20170318212830.png" />
                             <p>Name图层、Architecture图层、Road图层是必须的图层，顺序也是这样，显示的时候，Road图层为底层，Architecture图层在中间，Name图层在最顶层，可以添加其他图层，但不会读取其中内容和数据</p>

          <p><h5>Road图层：</h5>这个图层是道路信息，svg内容为&lt;path&gt;标签，就是使用AI中钢笔绘制，注意：在道路交叉段，应该剪开，看下列图片</p>
          <p>错误</p>
                    <img src="img/5202785421.gif"  height="394px" width="345px" alt="x" />

          <p>正确</p>
                    <img src="img/4825531563.gif"  height="388px" width="344px" alt="x" />

          <p><h5>Name图层：</h5>这个图层包含建筑道路名称，svg内容为&lt;text&gt;标签，使用文本框添加，注意：如果使用了其他字体，在保存svg文件时要勾选保存已使用的字形</p>
          <p><h5>Architecture图层：</h5>这个图层包含建筑的轮廓，及建筑的大小，坐标，svg内容为 &lt;polygon&gt;标签，使用钢笔绘制闭合的路径</p>
          <p><h5>Other图层：</h5>这个图层包括其他的扩展内容，如果想要使地图美观，列如手绘建筑，可以把绘制好的图片（位图）放入地图，注意保存svg文件时选择嵌入图片，同样也可以直接使用AI绘制，在该图层的内容不会读取，相当于装饰的图层</p>
          <h2>检查svg</h2>
          <p>绘制好后保存的svg文件可以直接用记事本打开，或者上传后载预览界面，按F12，查看svg</p>
          <p>主体框架：</p>
          <img src="img/QQ图片20170318221625.png"/>
          <p>Road图层<p>
          <img src="img/QQ图片20170318221656.png"/>
          <p>Architecture图层<p>
          <img src="img/QQ图片20170318221724.png"/>
          <p>Name图层<p>
          <img src="img/QQ图片20170318221743.png"/>

          <h2>格式说明</h2>
              <p>1、可以上传地图的格式：矢量图（svg）、位图（png、gif、jpg、bmp、jpeg）。</p>
              <p>2、上传svg格式地图，可以读取地图中文本信息，道路信息，从而实现搜索和导航。
                 <a href="http://baike.baidu.com/link?url=gFvcbKxSB8MwFLwSYtwZTUM7T9jRiXgJWHEQwM8rfUpy7m4GP-668e_Sibif6Woq-W_2qE7oiZZqQmqI4qyz7a"
                data-ajax="false"  data-transition="slide" >什么是svg？</a>
                 <a href="http://www.w3school.com.cn/svg/index.asp"
                data-ajax="false"  data-transition="slide" >更详细的svg教程</a>
              </p>
              <p>3、上传位图，则无法获取这些信息而不能实现搜索和导航</p>
              <p>4、无论矢量图还是位图，只要上传后输入参数，就能实现定位（在手机端）</p>
          
          <h2>参数说明</h2>
          
          <h3>地图操作参数</h3>
          <p>1、初始缩放倍数:地图最开始显示的缩放倍数，建议设置两倍。</p>
          <p>2、最小缩放倍数、最大缩放倍数：地图限制的缩放倍数</p>
          <P>3、递增递减倍数:每次点击放大或缩小按钮，产生的效果，建议设置为1.2，每次点击放大按钮放大1.2倍</P>
          
          <h3>地图定位参数</h3>
          <p>1、参考点：要实现定位必须要有一个参考点，才能将上传的地图鱼与获取的gps数据联系起来，选取的参考点，必须要知道该点位于所画地图的坐标，还需要知道该点的地理位置（经纬度）</p>
          <p>2、参考点位于svg中x坐标：参考点位于地图的横坐标x，如果不知道请在上传地图后的预览页按F12查看参考点的元素对应标签的坐标x，同理y坐标（纵坐标）</p>
          <h4>在AI中查看</h4>
                              <img src="img/QQ图片20170318214128.png"  />
          <h4>在浏览器F12开发者工具中查看</h4>
                              <img src="img/QQ图片20170318214433.png"  />                              
                              <h4>两个坐标有偏差，建议在AI中查看，后者显示的为text标签的左下角坐标</h4>
          
          <p>3、参考点的经纬度：所选取的参考点位于现实的经纬度（无偏移，wgs84坐标体系），可以   <a href="http://map.51240.com/"
                data-ajax="false"  data-transition="slide" >点此查看</a>选择天地图，并把坐标箭头勾选
           </p>
            <img src="img/QQ图片20170318215314.png"  />
           <p>4、该选项为地图制作者上传数据调试使用，在用户界面不会出现</p>
           
           <h2>其他</h2>
           <p>模拟地理位置是指模拟gps数据，当无法获取位置时供地图制作者调试使用，在用户界面不会有该选项</p>
           <p>如果你是绘图高手，想绘制一副精美的手绘地图，但是绘制好的地图却没有定位和导航功能，这个平台可以在你上传你的手绘地图后实现这些功能，并生成链接给其他人使用</p>
           <p>2017.2更新</p>

           <div class="weui-flex">
           <div class="weui-flex__item" style="justify-content:center;
            align-items:center;
            display:-webkit-flex;">
            <p>
                有疑问还可以加<a target="_blank" href="//shang.qq.com/wpa/qunwpa?idkey=e4b0c6d4baa99873239fc63c93d8f3887d8994fee89eaf11e43767bbfaf4cd70"><img border="0" src="//pub.idqqimg.com/wpa/images/group.png" alt="课题小组" title="课题小组"> </a>
            
            <br/>
            或者
            <a href="../aboutMessage/">点击留言</a>
            </p>
           </div>
           <div class="weui-flex__item" style="text-align: center;">
           <img style="width: 150px;" src="img/1513229159615.png"/>
           </div>
       </div>

          
            

         
          </div>
 
       

        <?php
            include '../../phpFile/echoFoot.php';
        ?>
    
    

</body>
</html>