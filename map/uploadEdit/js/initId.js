document.getElementsByTagName('svg')[0].id="SvgMap";//给svg设置id

function svgId(){
if($("#SvgMap").find("#Road")[0]==undefined)document.getElementById("svgIdP1").innerHTML="错误：未找到Road图层，请检查并重新上传";
if($("#SvgMap").find("#Name")[0]==undefined)document.getElementById("svgIdP2").innerHTML="错误：未找到Name图层，请检查并重新上传";
if($("#SvgMap").find("#Architecture")[0]==undefined)document.getElementById("svgIdP3").innerHTML="错误：未找到Architecture图层，请检查并重新上传";
if($("#SvgMap").find("#Other")[0]==undefined)document.getElementById("svgIdP4").innerHTML="错误：未找到Other图层，如果没有设置该图层请忽略";

}

svgId();

function lineChangePath(){//将line转化为path
    var id=$('#Road').find("line");
	for(var x=0 in id){	
	if(!isNaN(x)){
		var x1=$(id[x]).attr("x1");
		var y1=$(id[x]).attr("y1");
		var x2=$(id[x]).attr("x2");
		var y2=$(id[x]).attr("y2");
		str='M'+x1+" "+y1+"L"+x2+" "+y2;
		$(id[x]).remove();
		Snap("#Road").append(Snap("#Road").paper.path(str).attr({fill: "none"}));
	}
	}
}lineChangePath();




var numPolygon;
var numPath;
var errorRange=4;
numPolygon=SetIdSetAttByPolygon();
numPath=SetidByPath();



function SetIdSetAttByPolygon(){
    var number=0;
	var id=$("#Architecture").find("polygon");
	for(var x=0 in id){	
	if(!isNaN(x)){
		id[x].id='Architecture'+x;
		id[x].setAttribute('onclick','ArchitectureOnTap(this)');
		number++;
		}
	}
	return(number-1);
}

//遍历所有path标签并设置id id命名规则'头端点附近顶点_尾端点附近顶点	'
function SetidByPath(){
	var path=new Array();
	var pathTag=$('#Road').find("path");
	var number=0;
	var temp=0;

    for(var x=0 in pathTag){
			if(!isNaN(x)){
				number++;
				path[x]=new Object();
				path[x].h=0;
				path[x].l=0;
			
			}
	}
    
	for(var i=0;i<number;i++){
		
			for(var j=0;j<number;j++){
				if(j!=i){
						hh=Math.sqrt(Math.pow((pathTag[j].getPointAtLength(0).x-pathTag[i].getPointAtLength(0).x),2)+Math.pow((pathTag[j].getPointAtLength(0).y-pathTag[i].getPointAtLength(0).y),2));
					
						hl=Math.sqrt(Math.pow((pathTag[j].getPointAtLength(pathTag[j].getTotalLength()).x-pathTag[i].getPointAtLength(0).x),2)+Math.pow((pathTag[j].getPointAtLength(pathTag[j].getTotalLength()).y-pathTag[i].getPointAtLength(0).y),2));
						
						lh=Math.sqrt(Math.pow((pathTag[j].getPointAtLength(0).x-pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).x),2)+Math.pow((pathTag[j].getPointAtLength(0).y-pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).y),2));
						
						ll=Math.sqrt(Math.pow((pathTag[j].getPointAtLength(pathTag[j].getTotalLength()).x-pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).x),2)+Math.pow((pathTag[j].getPointAtLength(pathTag[j].getTotalLength()).y-pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).y),2));
	 
						if(hh<=errorRange&&path[j].h>0)path[i].h=path[j].h;
						if(hl<=errorRange&&path[j].l>0)path[i].h=path[j].l;
						if(lh<=errorRange&&path[j].h>0)path[i].l=path[j].h;
						if(ll<=errorRange&&path[j].l>0)path[i].l=path[j].l;	
					}
			}
						
			if(!path[i].h){
				temp++;
				path[i].h=temp;
			}
			if(!path[i].l){
				temp++;
				path[i].l=temp;
			}
			pathTag[i].id=path[i].h+'_'+path[i].l;
	}
	return (number-1);
		

}




