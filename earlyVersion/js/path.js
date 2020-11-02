
var pointNUM=133;
/**
 * Dijkstra算法
 * 
 * @author wupanpan@baidu.com
 * @date 2014-03-26
 */
var length;
var s;//path id
var c;

var arrArcs = new Array();  //先声明一维
    for (var k = 0; k < 133; k++) {    //一维长度为i,i为变量，可以根据实际情况改变

        arrArcs[k] = new Array();  //声明二维，每一个一维数组里面的一个元素都是一个数组；

        for (var j = 0; j < 133; j++) {   //一维数组里面每个元素数组可以包含的数量p，p也是一个变量；
             s=k+"_"+j;
			 c = document.getElementById(s);
			 
			 if(k==j)
			   
			   {
			   arrArcs[k][j] =0;
			   }
			   
			else if(c==null)
			{
			  arrArcs[k][j] = Infinity;;
			}
			else
			{
			   length = c.getTotalLength();
			 
			   arrArcs[k][j] =length; 
			}
            
        }
    }


for (k = 0; k < 133; k++) {
        for (j = k; j < 133; j++) {
		if(arrArcs[k][j]!=arrArcs[j][k])
		 {
		 //document.write(j+","+k+" ");
		 if(arrArcs[k][j]==Infinity)
		 {
		   arrArcs[k][j]=arrArcs[j][k];
		 }
		 else
		 {
		   arrArcs[j][k]=arrArcs[k][j];
		 }
		}
}
}
/**
 * @const
 */
 function go(qq,ww)
 {
 
var POS_INFINITY = Infinity;

/**
 * @param {number} sourceV 源点的索引，从0开始
 * @param {Array} adjMatrix 图的邻接矩阵，是一个二维数组
 */

function dijkstra(sourceV, adjMatrix) {
    var set = [],
        path = [],
        
        dist = [];
        distCopy = [],
        vertexNum = adjMatrix.length;

    var temp, u,
        count = 0;

    // 初始化
    for (var i = 0; i < vertexNum; i++) {
        distCopy[i] = dist[i] = POS_INFINITY;
        set[i] = false;
    }
    distCopy[sourceV] = dist[sourceV] = 0;

    while (count < vertexNum) {
        u = distCopy.indexOf(Math.min.apply(Math, distCopy));
        set[u] = true;
        distCopy[u] = POS_INFINITY;

        for (var i = 0; i < vertexNum; i++) {
            if (!set[i] && ((temp = dist[u] + adjMatrix[u][i]) < dist[i])) {
                distCopy[i] = dist[i] = temp;
                path[i] = u;
            }
        }
        count++;
    }

    return {
        path: path,
        dist: dist
    };
}

/**
 * @param {number} v 源点索引, 从0开始
 * @param {number} d 非源点索引, 从0开始
 * @param {Array} adjMatrix 图的邻接矩阵，是一个二维数组
 */
function searchPath(v, d, adjMatrix) {
    var graph = dijkstra(v, adjMatrix),
        path = graph.path,
        dist = graph.dist;

    var prev = path[d],
        queue = [],
        str = '';
		str1 = '';
		
		
        stra =[];
		
		var i=0;
		
		
    queue.push(d);
    while(prev != v) {
        queue.push(prev);
        prev = path[prev];
    }
    queue.push(v);

    for (var j = queue.length - 1; j >= 0; j--) {
        str += stra[i++]=queue.pop();
		
    }
	stra[++i]=-1;	
    console.log(str);
	
	document.getElementById("demo").innerHTML=str;
	
	for (i = 0; stra[i+1]!=-1; i++) {
			
			str1 += stra[i];
			}
			document.getElementById("demo1").innerHTML=str1;
			
	goo(stra);
	
	
}


/**
 * 测试数据
 */

// var adjM = [
//     [0, 10, POS_INFINITY, 30, 100],
//     [10, 0, 50, POS_INFINITY, POS_INFINITY],
//     [POS_INFINITY, 50, 0, 20, 10],
//     [30, POS_INFINITY, 20, 0, 60],
//     [100, POS_INFINITY, 10, 60, 0]
// ];

searchPath(qq, ww, arrArcs);
}






function goo(str)
{
  var i,j=0,k=0,s,c,c1,s1;
        
      
	  for(i=0;str[i+1]!=-1;i++)
	  {
	      j=str[i+1];
		  k=str[i];
		  s=k+"_"+j;
		  s1=j+"_"+k;
		  c = document.getElementById(s);
		  if(c==null)
		  {}
          else
		  {
		  c.setAttribute('stroke','red');
		  }
		  
		  c1 = document.getElementById(s1);
		   if(c1==null)
		  {}
          else
		  {
		  c1.setAttribute('stroke','red');
		  }
	   }
	 
	 }






function displayDate()
{
var pointNUM=133;
var a=document.getElementById("name1").value;
var b=document.getElementById("name2").value;
if(a<133&&a>=1&&b<133&&b>=1)
{
go(a,b);
}
else
{
document.getElementById("demo1").innerHTML="重新输入";
}
}
