

    var reqAnimationFrame = (function () {
    return window[Hammer.prefixed(window, 'requestAnimationFrame')] || function (callback) {
            window.setTimeout(callback, 1000 / 60);
        };
    })();

    var log = document.querySelector("#log");
    var el = document.querySelector("#img3");
	
	
	var svgWidth=parseInt(document.getElementById("SvgMap").getAttribute("width"));
    var svgHeight=parseInt(document.getElementById("SvgMap").getAttribute("height"));
	
	
    var START_X = Math.round((window.innerWidth - svgWidth) / 2);
    var START_Y = Math.round((window.innerHeight - svgHeight) / 2);
	var CENTER_X = START_X;
	var CENTER_Y = START_Y;
	
    var transform;   //图像效果
    var timer;
    var initAngle = 0;  //旋转角度
    //var initScale = 1;  //放大倍数
	
	//var maxScale=5;
	//var minScale=0.5;

   var mc = new Hammer.Manager(el);   //用管理器  可以同时触发旋转 拖拽  移动
	//var mc = new Hammer(el);	      //旋转和移动互斥
/**
ev.srcEvent.type  touchstart  touchend touchmove
ev.deltaX  手势移动位移变量  
*/
	mc.add(new Hammer.Pan({ threshold: 0, pointers: 0 }));  
	mc.add(new Hammer.Rotate({ threshold: 0 })).recognizeWith(mc.get('pan'));
    mc.add(new Hammer.Pinch({ threshold: 0 })).recognizeWith([mc.get('pan'), mc.get('rotate')]);
	//结束时做一些处理
    mc.on("hammer.input", function(ev) {
        if(ev.isFinal) {
		console.log(START_X+"  "+transform.translate.x  +"   "+ev.deltaX);
		START_X = transform.translate.x ;
		START_Y = transform.translate.y ;
        }
		
    });
    mc.on("panstart panmove", onPan);
    mc.on("pinchstart pinchmove", onPinch);
/**
第二次进入拖拽时  delta位移重置
移动时 初始位置startxy不动。delta增加
*/
	function onPan(ev){
		
		 el.className = '';//手势放大取消动画
				transform.translate = {
					x:Math.round(START_X + ev.deltaX/transform.scale),
					y:Math.round(START_Y + ev.deltaY/transform.scale)
				};
				
				requestElementUpdate();
			   
	}
	
	function onPinch(ev){
		if(ev.type == 'pinchstart') {
			initScale = transform.scale || 1;
		}
		el.className = '';//移动取消动画
		transform.scale = initScale * ev.scale.toFixed(1);
		 
		requestElementUpdate();	
	}
	
	var imftmp=1;
	
		
	
	

	//旋转相关
	var  preAngle =0 ;
	var  tempAngleFlag=0;
	var  deltaAngle = 0;	
	var  startRotateAngle = 0;
	
    var  pos=document.getElementById("SvgMap");
	var  nextTranslate;
    function updateElementTransform() {
		
		if(pos.getBoundingClientRect().top>0){
			document.getElementById("log2").innerHTML='上面没有内容了，请往上拖动';
			 if(pos.getBoundingClientRect().top>window.innerHeight*0.7)centerElement();
			
			}
			else document.getElementById("log2").innerHTML='';
		if(pos.getBoundingClientRect().left>0){
			
			document.getElementById("log3").innerHTML='左边没有内容了，请往左拖动';
			if(pos.getBoundingClientRect().left>window.innerWidth*0.7)centerElement();
			}
			else document.getElementById("log3").innerHTML='';
		if(pos.getBoundingClientRect().bottom<window.innerHeight){
			if(pos.getBoundingClientRect().bottom<window.innerHeight*0.3)centerElement();
			document.getElementById("log4").innerHTML='下面没有内容了，请往下拖动';
			}
			else document.getElementById("log4").innerHTML='';
		if(pos.getBoundingClientRect().right<window.innerWidth){
			if(pos.getBoundingClientRect().right<window.innerWidth*0.3)centerElement();
			document.getElementById("log5").innerHTML='右边没有内容了，请往右拖动';
			}
			else document.getElementById("log5").innerHTML='';
		
		
		
		
		
		/*缩放大小控制*/
		if(transform.scale<minScale){transform.scale=minScale;}//最小放大倍数
		if(transform.scale>maxScale){transform.scale=maxScale;}//最大放大倍数	
		
		
		//设置固定字体大小
		var str=8/transform.scale+'px';
		$("text").css("font-size",str);
		/*
		/*
		/*应用操作*/		
        var value = [
                    'translate3d(' + transform.translate.x + 'px, ' + transform.translate.y + 'px, 0px)',
                    'scale(' + transform.scale + ')',
					
					];
		var originx=-transform.translate.x+window.innerWidth  * 0.5;
		var originy=-transform.translate.y+window.innerHeight  * 0.5;
		el.style.transformOrigin=originx+'px ' +originy+'px';//更新基点位置，居中放大
		//alert(el.style.transformOrigin);
        value = value.join(" ");
		
        el.style.webkitTransform = value;  /*为Chrome/Safari*/
        el.style.mozTransform = value; /*为Firefox*/
        el.style.transform = value; /*IE Opera?*/
		
		
		if(imftmp){
		document.getElementById("log").innerHTML =value+'<br>'+el.style.transformOrigin;
		
		document.getElementById("bowwh").innerHTML  ='浏览器可见宽：'+ window.innerWidth+ '<br>'+ '浏览器可见高：'+ window.innerHeight
 		document.getElementById("xy").innerHTML  ='lefx:'+pos.getBoundingClientRect().left+'topy:'+pos.getBoundingClientRect().top+'<br>'+'rightx:'+pos.getBoundingClientRect().right+'bottomy:'+pos.getBoundingClientRect().bottom;
		}
		else{
		document.getElementById("log").innerHTML ='';
		
		document.getElementById("bowwh").innerHTML ='';
 		document.getElementById("xy").innerHTML  ='';
			
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
		transform.scale = transform.scale /1.5;
		
		requestElementUpdate();	
		
	}
		
		
		
	}

	function mapPlus(){ //放大
	
	if(transform.scale<maxScale){
		el.className = 'animate';
		transform.scale = transform.scale*1.5;
	

		//$("text").css("font-size","10px");
		
		requestElementUpdate();	
	}
		
	}
    function showNow(){
		if(longitude){
		 el.className = 'animate';
		 transform.translate.x=CENTER_X-(x-svgWidth/2);
		 transform.translate.y=CENTER_Y-(y-svgHeight/2);
         transform.scale=2; 
		 START_X = transform.translate.x ;
		 START_Y = transform.translate.y ;
       
        requestElementUpdate();
		}
		else centerElement();
	}
function printOtherImf(){
	document.getElementById("otherImf").innerHTML=
	'地图宽(svgWidth):'+svgWidth+'<br>'+
	'地图高(svgHeight)'+svgHeight+'<br>'+
	'参考经度：'+ReferencePoint_longitude+'<br>'+
	'参考维度：'+ReferencePoint_latitude+'<br>'+
	'参考x坐标：'+ReferencePoint_x+'<br>'+
	'参考y坐标：'+ReferencePoint_y;
}
function hideOtherImf(){
	document.getElementById("otherImf").innerHTML=
	'';
}

resetElement();