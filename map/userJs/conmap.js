document.title =title;

var allColor='#99CCFF';//点击颜色

var tempPolygonFill=null;
var PolygonInitFill=null;
function ArchitectureOnTap(obj){
	
	$(tempPolygonFill).attr('fill',PolygonInitFill);//变色之前恢复其他颜色		 
		$(tempPolygonFill).attr('stroke',PolygonInitFill);//变色之前恢复其他颜色		 

     PolygonInitFill=$(obj).attr("fill");
	//obj.setAttribute('stroke',allColor);
	//obj.setAttribute('fill',allColor);
	 $(obj).attr('stroke','#99C0F0');//搜索到之后执行变色

    $(obj).attr('fill','#99CCFF');//搜索到之后执行变色
			tempPolygonFill=obj;
						 
	
}

var numText=SetIdSetAttByText();

//获取svg中文本加载到搜索栏
function SetIdSetAttByText(){
    var number=0;
	var str1="<li data-icon='plus'><a href='#'    onclick='ulOnTap(this)'>";
	var str2="</a></li>";
	var str="";
	var id=$('#Name').find("text");
	for(var x=0 in id){	
	if(!isNaN(x)){
		id[x].id='Name'+x;
		id[x].setAttribute('class','Name');
		id[x].setAttribute('onclick','NameOnTap(this)');
		str=str1+id[x].innerHTML+str2
		$("#seachUl").append(str);
		number++;
		}
	}
	return(number-1);
}


function ulOnTap(obj){
	$("#searchText").val(obj.innerHTML);
	
}

var tempTextFill=null;
var tempFristClick=1;
function searchFun(){
	if($("#searchText").val()!=''||tempFristClick){
			$("#seachdiv").slideDown();//如果是第一次点击则展开搜索栏或者搜索栏有文本
			var id=$('#Name').find("text");
			for(var x=0 in id){	
					 if(!isNaN(x)&&id[x].innerHTML==$("#searchText").val()){
						
						 var cx=Snap(id[x]).getBBox().cx
						 var cy=Snap(id[x]).getBBox().cy
						
						 el.className = 'animate';
						 transform .translate.x=CENTER_X-(cx-svgWidth/2);
						 transform .translate.y=CENTER_Y-(cy-svgHeight/2);
				
						 START_X = transform.translate.x ;
						 START_Y = transform.translate.y ;
						 
						 $(tempTextFill).attr('fill','black');//变色之前恢复其他颜色		 
						 $(id[x]).attr('fill','#38c');//搜索到之后执行变色
						 tempTextFill=id[x];
						 
						 
					    //地图移动使搜索到的文本位于地图中心
						var str="translate(".concat(cx.toString());
						str=str.concat(",");
						str=str.concat((cy-15/(transform.scale*0.5)).toString());
						str=str.concat(")");//转化为字符串"translate(x,y)"
						str=str.concat("scale("+1/transform.scale+')');						
						document.getElementById("searchMove").setAttribute("transform",str);//地图定位图标移动svg transform	   
						document.getElementById("searchMove").setAttribute("display","");

						requestElementUpdate();
						 
					}
				tempFristClick=0; 
			}
	}
	else{//搜索栏内容为空且不是第一次点击，点击则隐藏搜索栏
		$("#seachdiv").hide();
		tempFristClick=1;
		}
				 
}
var touchx;
var touchy;

function NameOnTap(obj){
	document.getElementById("searchMove").setAttribute("display","none");
		
						 var cx=Snap(obj).getBBox().cx;
						 var cy=Snap(obj).getBBox().cy;
						 touchx=cx;
						 touchy=cy;
						 
						 $(tempTextFill).attr('fill','black');//变色之前恢复其他颜色		 
						 $(obj).attr('fill','#38c');//搜索到之后执行变色
						 tempTextFill=obj;
						 					
						var str="translate(".concat(cx.toString());
						str=str.concat(",");
						str=str.concat(cy.toString());
						str=str.concat(")");//转化为字符串"translate(x,y)"
						document.getElementById("touchTemp").setAttribute("transform",str);//地图定位图标移动svg transform	

						$("#goTipa").trigger("click");
}