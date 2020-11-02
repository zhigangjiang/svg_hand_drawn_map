                                                                                                       var errorRange=4;//点误差范围
var allColor='#99CCFF';//点击颜色
function ChangeStrokeColor(obj){
	for(var i=0;i<numPolygon;i++){
		arrPolygon[i].setAttribute('stroke','none');
		
		}
	obj.setAttribute('stroke',allColor);
	
}
function ArchitectureOnTap(obj){
	
	ChangeStrokeColor(obj);
	
}


var arrText;
var arrPolygon;
var numText;
var numPolygon;
var numPath;
var numOther=0;


document.getElementsByTagName('svg')[0].id="SvgMap";
function SetIdSetAttByText(){
    var number=0;
	var str1="<li><a href='#'>";
	var str2="</a></li>";
	var str="";
	var id=document.getElementsByTagName('text');
	arrText=id;
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
numText=SetIdSetAttByText();

function SetIdSetAttByPolygon(){
    var number=0;
	var id=document.getElementsByTagName('polygon');
	arrPolygon=id;
	for(var x=0 in id){	
	if(!isNaN(x)){
		id[x].id='Architecture'+x;
		id[x].setAttribute('onclick','ArchitectureOnTap(this)');
		number++;
		}
	}
	
	return(number);
	
}
numPolygon=SetIdSetAttByPolygon();

//遍历所有path标签并设置id id命名规则'头端点附近顶点_尾端点附近顶点	'
function SetidByPath(){
var path=new Array();
var pathTag=document.getElementsByTagName('path');
var pathcount=0;
		for(var x=0 in pathTag){
			
			if(!isNaN(x)){
				pathcount++;
				path[x]=new Object();
				path[x].h=0;
				path[x].l=0;
				path[x].id=0;
				path[x].temph=0;
				path[x].templ=0;
				path[x].path=pathTag[x];
				pathTag[x].id=x;
				pathTag[x].h=x;			
				}
		}
 
 
var temp=0;
for(var i=0;i<pathcount;i++){
	
	for(var j=0;j<pathcount;j++){
		if(j!=i){
	hh=Math.sqrt(Math.pow((pathTag[j].getPointAtLength(0).x-pathTag[i].getPointAtLength(0).x),2)+Math.pow((pathTag[j].getPointAtLength(0).y-pathTag[i].getPointAtLength(0).y),2));

	hl=Math.sqrt(Math.pow((pathTag[j].getPointAtLength(pathTag[j].getTotalLength()).x-pathTag[i].getPointAtLength(0).x),2)+Math.pow((pathTag[j].getPointAtLength(pathTag[j].getTotalLength()).y-pathTag[i].getPointAtLength(0).y),2));
	
	lh=Math.sqrt(Math.pow((pathTag[j].getPointAtLength(0).x-pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).x),2)+Math.pow((pathTag[j].getPointAtLength(0).y-pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).y),2));
	
	ll=Math.sqrt(Math.pow((pathTag[j].getPointAtLength(pathTag[j].getTotalLength()).x-pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).x),2)+Math.pow((pathTag[j].getPointAtLength(pathTag[j].getTotalLength()).y-pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).y),2));
	/*alert(
	'当前'+i+'\n'+
	'循环到'+j+'\n'+
	'hh'+hh+'\n'+
	'hl'+hl+'\n'+
	'lh'+lh+'\n'+
	'll'+ll+'\n');
	*/
	if(hh<=errorRange&&path[j].h>0){
		path[i].h=path[j].h;//头查头
		path[i].temph=1;
		path[j].temph=1;
		
		}
	if(hl<=errorRange&&path[j].l>0){
		path[i].h=path[j].l;//头查尾
		path[i].temph=1;
		path[j].templ=1;

		}
	if(lh<=errorRange&&path[j].h>0){
		path[i].l=path[j].h;//尾查头
		path[i].templ=1;
		path[j].temph=1;
		
		
		}
	if(ll<=errorRange&&path[j].l>0){
		path[i].l=path[j].l;//尾查尾
		path[i].templ=1;
		path[j].templ=1;
		}
	}
	}
	
	if(!path[i].temph){
		temp++;
		path[i].h=temp;
	}
	if(!path[i].templ){
	    temp++;
	    path[i].l=temp;
	}
	pathTag[i].id=path[i].h+'_'+path[i].l;
	//alert('path'+i+'id'+pathTag[i].id);
	
	
    }


        //查找不属于道路的path标签
		
		for(var i=0;i<pathcount;i++){
		if(path[i].temph==0&&path[i].templ==0&&pathTag[i].getPointAtLength(0).x==pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).x&&pathTag[i].getPointAtLength(0).y==pathTag[i].getPointAtLength(pathTag[i].getTotalLength()).y){
			//alert('path:'+i+'不属于道路');
			pathTag[i].id='other'+numOther;
			numOther++;
			}
		}
		
		
		return(pathcount);
}
numPath=SetidByPath();
//显示文档信息
function printSvgImf(){
	
	document.getElementById("svgImf").innerHTML=
	 '道路(PathNum):'+numPath+'条'+'<br>'
	+'建筑(PolygonNum):'+numPolygon+'个'+'<br>'
	+'名称(TextNum):'+numText+'个'+'<br>'
	+'其他(OtherPolygonNum):'+numOther+'个'+'<br>'
	
	 
}
function hideSvgImf(){
		document.getElementById("svgImf").innerHTML='';

	}
//printSvgImf();