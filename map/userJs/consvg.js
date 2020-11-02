
/*手势控制地图，使用了hammer.js库
*/

    var reqAnimationFrame = (function () {
    return window[Hammer.prefixed(window, 'requestAnimationFrame')] || function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
    })();

    var el = document.querySelector("#conSvg");
	
	
	var svgWidth=parseInt(document.getElementById("SvgMap").getAttribute("width"));
    var svgHeight=parseInt(document.getElementById("SvgMap").getAttribute("height"));
	
	
    var START_X = Math.round((window.innerWidth - svgWidth) / 2);
    var START_Y = Math.round((window.innerHeight - svgHeight) / 2);
	
	var CENTER_X = START_X;
	var CENTER_Y = START_Y;
	
    var transform;   //图像效果
    var timer;
    var initAngle = 0;  //旋转角度
    //初始化数据已放在data.js文件中
	//var initScale = 1;  
	//var maxScale=5;
	//var minScale=0.5;

   var mc = new Hammer.Manager(el);   //用管理器  可以同时触发旋转 拖拽  移动

	mc.add(new Hammer.Pan({ threshold: 0, pointers: 0 }));  
    mc.add(new Hammer.Pinch({ threshold: 0 })).recognizeWith(mc.get('pan'));
	//结束时做一些处理
    mc.on("hammer.input", function(ev) {
        if(ev.isFinal) {
		//执行完一次操作后将开始点移到最后结束点这样就能连贯执行
		START_X = transform.translate.x ;
		START_Y = transform.translate.y ;
        }
		
    });
    mc.on("panstart panmove", onPan);
    mc.on("pinchstart pinchmove", onPinch);
	var hammerTest = new Hammer(document.getElementById('conSvg')); 
	hammerTest.on('press ', function(ev) {
		     console.log(ev); 
			 document.getElementById("searchMove").setAttribute("display","none");
			 
			 			 var cx=ev.srcEvent.offsetX;
						 var cy=ev.srcEvent.offsetY;
						 touchx=cx;
						 touchy=cy;
	 
						var str="translate(".concat(cx.toString());
						str=str.concat(",");
						str=str.concat(cy.toString());
						str=str.concat(")");//转化为字符串"translate(x,y)"
						document.getElementById("touchTemp").setAttribute("transform",str);//地图定位图标移动svg transform	

						$("#goTipa").trigger("click");

			 }
	);

	function onPan(ev){
		el.className='none';//手势移动取消动画
		transform.translate.x=Math.round(START_X+ev.deltaX/transform.scale);
		transform.translate.y=Math.round(START_Y+ev.deltaY/transform.scale);
		requestElementUpdate();			   
	}

	function onPinch(ev){
		if(ev.type=='pinchstart')initScale= transform.scale || 1;
		el.className ='animate3';//手势放大取消动画
		transform.scale = initScale * ev.scale;
	
		requestElementUpdate();	
	}
	
	var imftmp=0;//默认不显示调试信息
    var  svgMap=document.getElementById("SvgMap");

    function updateElementTransform() {
		
		//移动到边缘时显示提示信息
		if(svgMap.getBoundingClientRect().top>0){
			document.getElementById("log2").innerHTML='上面没有内容了，请往上拖动';
			 if(svgMap.getBoundingClientRect().top>window.innerHeight*0.7)centerElement();
			}
			else document.getElementById("log2").innerHTML='';
		if(svgMap.getBoundingClientRect().left>0){
			
			document.getElementById("log3").innerHTML='左边没有内容了，请往左拖动';
			if(svgMap.getBoundingClientRect().left>window.innerWidth*0.7)centerElement();
			}
			else document.getElementById("log3").innerHTML='';
		if(svgMap.getBoundingClientRect().bottom<window.innerHeight){
			if(svgMap.getBoundingClientRect().bottom<window.innerHeight*0.3)centerElement();
			document.getElementById("log4").innerHTML='下面没有内容了，请往下拖动';
			}
			else document.getElementById("log4").innerHTML='';
		if(svgMap.getBoundingClientRect().right<window.innerWidth){
			if(svgMap.getBoundingClientRect().right<window.innerWidth*0.3)centerElement();
			document.getElementById("log5").innerHTML='右边没有内容了，请往右拖动';
			}
			else document.getElementById("log5").innerHTML='';
		
		
		
		
		
		/*缩放大小控制*/
		if(transform.scale<minScale){transform.scale=minScale;}//最小放大倍数
		if(transform.scale>maxScale){transform.scale=maxScale;}//最大放大倍数	
		
		
		//设置固定字体大小
		if(transform.scale>=8)
		{$("text").css("font-size","2px")}
		else if(transform.scale>=4)
		{$("text").css("font-size","4px")}
		else if(transform.scale>=2)
		{$("text").css("font-size","8px")}
		else if(transform.scale<=1)
		$("text").css("font-size","10px")
		
		/*
		/*
		/*应用操作*/		
        var value = ['translate3d(' + transform.translate.x + 'px, ' + transform.translate.y + 'px, 0px)','scale(' + transform.scale + ')'].join(" ");
		//更改基点至中心
		var originx=-transform.translate.x+window.innerWidth  * 0.5;
		var originy=-transform.translate.y+window.innerHeight  * 0.5;
		//更新基点位置，居中放大
		el.style.transformOrigin=originx+'px ' +originy+'px';
		
	
        el.style.webkitTransform = value;  /*为Chrome/Safari*/
        el.style.mozTransform = value; /*为Firefox*/
        el.style.transform = value; /*IE Opera?*/
		
		
		if(imftmp){
		document.getElementById("mapTransformP").innerHTML=
		'---手势对svg操作信息：---'+'<br>'+
		'基点(transformOrigin):'+el.style.transformOrigin+'<br>'+
		'改变(transform):'+value+'<br>'+
 		'svg左边距离浏览器边框(lefx):'+svgMap.getBoundingClientRect().left+'<br>'+
		'svg顶部距离浏览器边框(topy):'+svgMap.getBoundingClientRect().top;
		
		document.getElementById("mapImfP").innerHTML=
		'---svg地图信息：---'+'<br>'+
		'地图宽(svgWidth)px：'+svgWidth+'<br>'+
		'地图高(svgHeight)px：'+svgHeight+'<br>'+
		'参考点经度：'+ReferencePoint_longitude+'<br>'+
		'参考点纬度：'+ReferencePoint_latitude+'<br>'+
		'参考点位于图中x坐标px：'+ReferencePoint_x+'<br>'+
		'参考点位于图中y坐标px：'+ReferencePoint_y;
		
		
		}
		else{
		document.getElementById("mapTransformP").innerHTML='';	
		document.getElementById("mapImfP").innerHTML='';	
		}
    }



    function requestElementUpdate() {
            reqAnimationFrame(updateElementTransform);
    }


	
	/**
	初始化设置
	*/
    function resetElement() {

        el.className = 'animate';
		 transform = {
            translate: { x: START_X, y: START_Y },
            scale: initScale
        };
		
        requestElementUpdate();
    }
	
	
	//调回中心
	function centerElement() {
        el.className = 'animate';
		 transform .translate.x=CENTER_X;
		 transform .translate.y=CENTER_Y;
         transform.scale=initScale;
         START_X = transform.translate.x ;
		 START_Y = transform.translate.y ;
         requestElementUpdate();
    }
	
    
	function mapMinus(){//缩小
		if(transform.scale>minScale){
			el.className = 'animate';
			transform.scale = transform.scale/chgScale;		
			requestElementUpdate();			
		}	
	}

	function mapPlus(){ //放大
		if(transform.scale<maxScale){
			el.className = 'animate';
			transform.scale = transform.scale*chgScale;		
			requestElementUpdate();	
		}
	}
	//调回定位的位置
    function showNow(){
		if(longitude){//如果定位成功
		 el.className = 'animate';
		 transform.translate.x=CENTER_X-(x-svgWidth/2);
		 transform.translate.y=CENTER_Y-(y-svgHeight/2);
         transform.scale=2; 
		 START_X = transform.translate.x ;
		 START_Y = transform.translate.y ;      
         requestElementUpdate();
		}
		else centerElement();//否则调回中心
	}
	resetElement();