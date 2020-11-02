
   


     //查询列表
    //画出起点 圆
    //排序得到起点
    //地图数据接入口
    //变色函数入口
    //抓取跟起点有关的路 排序得到最近路
    //输入值范围

    var Rstr = [];
    Rstr[1] = -1;
    var Rstrcolor = [];
    var Newin = 0;
    var pointNUM = pointNum;
	//(pointNum);
    var allzx, allzy,allxend,allyend;
    var nearpath = new Object();
    nearpath.final = 0;
    nearpath.path = 0;
    nearpath.H = 0;
    nearpath.l = 0;
    nearpath.x = 0;
    nearpath.y = 0; /**/
    nearpath.starlong = 0;
    function firststar(zx, zy, final,xend,yend) {
        allzx = zx;
        allzy = zy;
        allxend = xend;
        allyend = yend;
        var length;
        var s; //path id
        var c;
        var arrArcs = new Array();  //先声明一维
        for (var k = 0; k < pointNUM; k++) {//点的数量
            arrArcs[k] = new Array();
            for (var j = 0; j < pointNUM; j++) {  //点的数量 
                s = k + "_" + j;
                c = document.getElementById(s);
                if (k == j) {
                    arrArcs[k][j] = 0;
                }
                else if (c == null) {
                    arrArcs[k][j] = Infinity; ;
                }
                else {
                    length = c.getTotalLength();

                    arrArcs[k][j] = length;
                }

            }
        }
        for (k = 0; k < pointNUM; k++) {//点的数量  对称
            for (j = k; j < pointNUM; j++) {//点的数量
                if (arrArcs[k][j] != arrArcs[j][k]) {
                    //document.write(j+","+k+" ");
                    if (arrArcs[k][j] == Infinity) {
                        arrArcs[k][j] = arrArcs[j][k];
                    }
                    else {
                        arrArcs[j][k] = arrArcs[k][j];
                    }
                }
            }
        }
        var cc = Snap.select("#SvgMap");
        var yuan = cc.paper.circle(zx, zy, 2).attr({ id: "papercircle" }); //画出起点圆 
        var yuan2 = cc.paper.circle(xend, yend, 2).attr({ id: "papercircle2" }); //画出起点圆
        Nearpointend(allxend, allyend, pointNUM, nearpath, arrArcs)
        //var final = Nearpoint(allxend, allyend, pointNUM, final, arrArcs); //排序得到起点
        var star666 = Nearpoint(allzx, allzy, pointNUM, final, arrArcs); //排序得到起点
        //(nearpath)
        //cut8(nearpath.path)
        //("enter go")
        go(star666, nearpath.final, arrArcs)
    }
	
	
	
	
	
	
	   function displayDate() {//输入值范围
        var x = mapx;
        var y = mapy;
        var b = 5;
        var xend = touchx;
        var yend = touchy;
//(x);
//(xend);
            firststar(x, y, b,xend,yend);
    }
function  goThere(){displayDate();}




    /////////////////////////////////////////////////////////////////////////////////
    //分割线以上为地图初始化设置
    //地图数据接入口
    function go(star, final, arrArcs) {
        var POS_INFINITY = Infinity;
        function dijkstra(sourceV, adjMatrix) {
            var set = [],
        path = [],
        dist = [];
            distCopy = [],
        vertexNum = adjMatrix.length;
            var temp, u,
        count = 0;
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

        function searchPath(v, d, adjMatrix) {

            var graph = dijkstra(v, adjMatrix),
        path = graph.path,
        dist = graph.dist;
        
            var prev = path[d],
        queue = [],
        str = '';
            str1 = '';
            stra = [];
            var i = 0;
            queue.push(d);

            while (prev != v) {
                queue.push(prev);
                prev = path[prev];
            }
            queue.push(v);

            for (var j = queue.length - 1; j >= 0; j--) {
                str += stra[i++] = queue.pop();
                str += " ";
            }
            stra[++i] = -1;
            console.log(str);

            document.getElementById("demo").innerHTML = str;

            for (i = 0; stra[i + 1] != -1; i++) {

                str1 += stra[i];
            }
            document.getElementById("demo1").innerHTML = str1;

            goo(stra);

        }

        searchPath(star, final, arrArcs); //寻找最短路径
    }

    function goo(str) {//变色函数入口     
        Repath();
        var cc = Snap.select("#SvgMap");
        var i, j = 0, k = 0, s, c, c1, s1, longdu = 0, L = 0, direction = 0, c2;
        var nearpathlong = new Array();
        var point_to_path = new Array();
        var head = new Array();
        var tail = new Array();
        for (i = 0; i < 50; i++) {//抓取跟起点有关的路排序得到最近路
            j = i;
            k = str[0];
            s = k + "_" + j;
            s1 = j + "_" + k;
            c = document.getElementById(s);
            c1 = document.getElementById(s1);

            if (c != null) {
                point_to_path[L] = c; 0
                ////(point_to_path[L])
                head[L] = k;
                tail[L] = j;
                L++;
            }
            if (c1 != null) {
                point_to_path[L] = c1;
                ////(point_to_path[L])
                head[L] = j;
                tail[L] = k;
                L++;

            }
        }

        for (i = 0; i < 8 * L; i++) {
            nearpathlong[i] = new Object();
            nearpathlong[i].x = 0;
            nearpathlong[i].y = 0;
            nearpathlong[i].long = 0;
            nearpathlong[i].starlong = 0;
            nearpathlong[i].Pa_th = 0;
            nearpathlong[i].H = 0;
            nearpathlong[i].l = 0;
        }

        k = 0;
        for (L = 0; L < point_to_path.length; L++) {
            for (i = 0; i < 8; i++) {
                nearpathlong[k].x = point_to_path[L].getPointAtLength((point_to_path[L].getTotalLength()) / 8 * (i + 1)).x;
                nearpathlong[k].y = point_to_path[L].getPointAtLength((point_to_path[L].getTotalLength()) / 8 * (i + 1)).y;
                nearpathlong[k].long = (allzx - nearpathlong[k].x) * (allzx - nearpathlong[k].x) + (allzy - nearpathlong[k].y) * (allzy - nearpathlong[k].y);
                nearpathlong[k].starlong = (point_to_path[L].getTotalLength()) / 8 * (i + 1);
                nearpathlong[k].Pa_th = point_to_path[L];
                nearpathlong[k].H = head[L];
                nearpathlong[k].l = tail[L];

                k++;
            }
        }
        bubbleSortPath(nearpathlong)

        cc.paper.path("M" + allzx + " " + allzy + "L" + nearpathlong[0].x + " " + nearpathlong[0].y).attr({//画路径
            stroke: '#4876FF',
            fill: "none",
            id: "paperpolylineP_L_Star"
        })
        j = str[1];
        k = str[0];
        s = k + "_" + j;
        s1 = j + "_" + k;
        c = document.getElementById(s);
        c1 = document.getElementById(s1);

        if (nearpathlong[0].Pa_th != c && nearpathlong[0].Pa_th != c1) {
            //("wai")
            if (k == nearpathlong[0].H) {
                //("ni")
                cc.paper.path(Snap.path.getSubpath(nearpathlong[0].Pa_th.getAttribute("d"), 0, nearpathlong[0].starlong - 1)).attr({//画路径
                    stroke: '#4876FF',
                    fill: "none",
                    id: "paperpolyline0"
                })
            }
            else {
                //("shun")
                //(nearpathlong[0].Pa_th.getTotalLength())
                //(nearpathlong[0].starlong)
                cc.paper.path(Snap.path.getSubpath(nearpathlong[0].Pa_th.getAttribute("d"), nearpathlong[0].starlong - 1, nearpathlong[0].Pa_th.getTotalLength())).attr({//画路径
                    stroke: '#4876FF',
                    fill: "none",
                    id: "paperpolyline0"
                })
            }
        }
        else {
            //("nei")
            if (nearpathlong[0].Pa_th == c) {   //顺
                //("shun")
                cc.paper.path(Snap.path.getSubpath(nearpathlong[0].Pa_th.getAttribute("d"), nearpathlong[0].starlong - 1, nearpathlong[0].Pa_th.getTotalLength())).attr({//画路径
                    stroke: '#4876FF',
                    fill: "none",
                    id: "paperpolyline0"
                })
            }
            else {
                //("ni")
                cc.paper.path(Snap.path.getSubpath(nearpathlong[0].Pa_th.getAttribute("d"), 0, nearpathlong[0].starlong - 1)).attr({//画路径
                    stroke: '#4876FF',
                    fill: "none",
                    id: "paperpolyline0"
                })
            }
        }


        /* */if (nearpathlong[0].Pa_th != c && c != null) {
            cc.paper.path(c.getAttribute("d")).attr({//画路径
                stroke: '#4876FF',
                fill: "none",
                id: "paperpolyline2"
            })
        }
        if (nearpathlong[0].Pa_th != c1 && c1 != null) {
            cc.paper.path(c1.getAttribute("d")).attr({//画路径
                stroke: '#4876FF',
                fill: "none",
                id: "paperpolyline2"
            })
        }


        for (i = 1; str[i + 1] != -1; i++) {
            Rstr[i + 1] = j = str[i + 1];
            Rstr[i] = k = str[i];
            s = k + "_" + j;
            s1 = j + "_" + k;
            c = document.getElementById(s);
            c1 = document.getElementById(s1);
            if (c == null)
            { }
            else {
                Rstrcolor[i] = c.getAttribute('stroke');
                c.setAttribute('stroke', '#4876FF');
                longdu += c.getTotalLength();
            }


            if (c1 == null)
            { }
            else {
                Rstrcolor[i] = c1.getAttribute('stroke');
                c1.setAttribute('stroke', '#4876FF');
                longdu += c1.getTotalLength();
            }
        }
        document.getElementById("demo2").innerHTML = longdu;
        Rstr[i + 1] = -1;
        ///////////////////////////////////////////////////////删最后一段路
        if (str.length >= 3) {
            //("recover end")
            j = str[i - 2];
            k = str[i - 1];
            s = k + "_" + j;
            s1 = j + "_" + k;
            c = document.getElementById(s);
            c1 = document.getElementById(s1);
            if (c == null)
            { //("c=null") 
			}
            else {
                c.setAttribute('stroke', Rstrcolor[i - 2]);

            }
            if (c1 == null)
            { //("c1=null") 
			}
            else {
                c1.setAttribute('stroke', Rstrcolor[i - 2]);

            }



            /**/ ///////////////////////////////////////////


            if (nearpath.path!= c && nearpath.path!= c1) {
                //("wai")
                if (str[i-1] == nearpath.H) {
                    //("ni")
                    cc.paper.path(Snap.path.getSubpath(nearpath.path.getAttribute("d"), 0, nearpath.starlong- 1)).attr({//画路径
                        stroke: '#4876FF',
                        fill: "none",
                        id: "paperpolyline0endend"
                    })
                }
                else {
                    //("shun")
                    ////(nearpath.path.getTotalLength())
                    ////(nearpathlong[0].starlong)
                    cc.paper.path(Snap.path.getSubpath(nearpath.path.getAttribute("d"), nearpath.starlong- 1, nearpath.path.getTotalLength())).attr({//画路径
                        stroke: '#4876FF',
                        fill: "none",
                        id: "paperpolyline0endend"
                    })
                }
            }
            else {
                //("nei")
                if (nearpath.path== c) {   //顺
                    //("shun")
                    cc.paper.path(Snap.path.getSubpath(nearpath.path.getAttribute("d"), nearpath.starlong- 1, nearpath.path.getTotalLength())).attr({//画路径
                        stroke: '#4876FF',
                        fill: "none",
                        id: "paperpolyline0endend"
                    })
                }
                else {
                    //("ni")
                    cc.paper.path(Snap.path.getSubpath(nearpath.path.getAttribute("d"), 0, nearpath.starlong- 1)).attr({//画路径
                        stroke: '#4876FF',
                        fill: "none",
                        id: "paperpolyline0endend"
                    })
                }
            }



            if (nearpath.path != c && c != null) {
            cc.paper.path(c.getAttribute("d")).attr({//画路径
            stroke: '#4876FF',
            fill: "none",
            id: "paperpolyline2end"
            })
            }
    if (nearpath.path != c1 && c1 != null) {
            cc.paper.path(c1.getAttribute("d")).attr({//画路径
            stroke: '#4876FF',
            fill: "none",
            id: "paperpolyline2end"
            })
            } 
            
            ////////////////////////////////////////////
            
        } 
    }
    
    




    function Repath() {//颜色恢复
        var i, j = 0, k = 0, s, c, c1, s1;

        if (Newin != 0) {
            $(document).ready(function () {
                $("#papercircle").remove()
            })
            $(document).ready(function () {
                $("#paperpolyline0").remove()
            })
            $(document).ready(function () {
                $("#paperpolylineP_L_Star").remove()
            })
            $(document).ready(function () {
                $("#paperpolyline2").remove()
            })


            $(document).ready(function () {
                $("#papercircle2").remove()
            })
            $(document).ready(function () {
                $("#paperpolyline0endend").remove()
            })
            $(document).ready(function () {
                $("#paperpolylineP_L_End").remove()
            })
            $(document).ready(function () {
                $("#paperpolyline2end").remove()
            })
            
        }
        Newin++
        for (i = 0; Rstr[i + 1] != -1; i++) {
            j = Rstr[i + 1];
            k = Rstr[i];
            s = k + "_" + j;
            s1 = j + "_" + k;
            c = document.getElementById(s);
            if (c == null)
            { }
            else {
                c.setAttribute('stroke', Rstrcolor[i]);

            }

            c1 = document.getElementById(s1);
            if (c1 == null)
            { }
            else {
                c1.setAttribute('stroke', Rstrcolor[i]);

            }
        }
    }




 























function bubbleSort(arr) {
    var len = arr.length, j;
    var temp;
    while (len > 0) {
        for (j = 0; j < len - 1; j++) {
            if (arr[j] > arr[j + 1]) {
                temp = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = temp;
            }
        }
        len--;
    }
    return arr;
}
function bubbleSortPath(arr) {
    var len = arr.length, j;
    
    var temp;
    ////(arr[0].long)
    while (len > 0) {
        for (j = 0; j < len - 1; j++) {
            if (arr[j].long > arr[j + 1].long) {
                 
                temp = arr[j];
                arr[j] = arr[j + 1];
                arr[j + 1] = temp;
                
            }
        }
        len--;
    }
    ////("ok");

    return arr;
}
/*
var elements = [10, 9, 8, 7, 6, 5];
//('before: ' + elements);
sort(elements);
//(' after: ' + elements);
*/





function easydij(qidian, end, long, arrArcs) {

   
   var POS_INFINITY = Infinity;
    var shorpath=new Array;
    var long2
    
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

    function searchPath(v, d, adjMatrix) {

        var graph = dijkstra(v, adjMatrix),
        path = graph.path,
        dist = graph.dist;
        
        var prev = path[d],
        queue = [],
        str = '';
        str1 = '';
        stra = [];

        var i = 0;


        queue.push(d);
        while (prev != v) {
            queue.push(prev);
            prev = path[prev];
        }
        queue.push(v);

        for (var j = queue.length - 1; j >= 0; j--) {
            str += stra[i++] = queue.pop();

        }
        stra[++i] = -1;

        for (i = 0; stra[i + 1] != -1; i++) {

            str1 += stra[i];
        }

  long2=longduserch(stra,long)
}

    searchPath(qidian, end, arrArcs);
  ////("easydij")
    return long2

}



function longduserch(str,long) {//return total long
    var i, j = 0, k = 0, s, c, c1, s1, longdu = 0;
    for (i = 0; str[i + 1] != -1; i++) {
        s = k + "_" + j;
        s1 = j + "_" + k;
        c = document.getElementById(s);
        if (c == null)
        { }
        else {
            longdu += c.getTotalLength();
        }

        c1 = document.getElementById(s1);
        if (c1 == null)
        { }
        else {
            longdu += c1.getTotalLength();
        }
    }
    longdu += long;
    ////("ok")
    ////("longdu")
    return longdu

}

function Nearpoint(xg, yg, pointNUM, end, arrArcs) {//return near point
//("3.0")
    var i, j = 0, k = 0, s, c, c1, s1, longdu = 0, L = 0, direction = 0, c2;
    var nearpathlong = new Array();
    var point_to_path = new Array();
    var head = new Array();
    var tail = new Array();

    for (k = 0; k < pointNUM; k++) {
        for (j = k; j < pointNUM; j++) {
            s = k + "_" + j;
            s1 = j + "_" + k;
            c = document.getElementById(s);
            if (c == null)
            { }
            else {
                point_to_path[L] = c;
                ////(point_to_path[L])
                head[L] = k;
                tail[L] = j;
                L++;
            }

            c1 = document.getElementById(s1);
            if (c1 == null)
            { }
            else {
                point_to_path[L] = c1;
                ////(point_to_path[L])
                head[L] = j;
                tail[L] = k;
                L++;
            }


        }
    }





    for (i = 0; i < 8 * pointNUM; i++) {
        nearpathlong[i] = new Object();
        nearpathlong[i].x = 0;
        nearpathlong[i].y = 0;
        nearpathlong[i].long = Infinity;
        nearpathlong[i].starlong = 0;
        nearpathlong[i].Pa_th = 0;
        nearpathlong[i].H = 0;
        nearpathlong[i].l = 0;
    }

    k = 0;
    for (L = 0; L < pointNUM; L++) {
    if (point_to_path[L]!=null) {
        for (i = 0; i < 8; i++) {
            nearpathlong[k].x = point_to_path[L].getPointAtLength((point_to_path[L].getTotalLength()) / 8 * (i + 1)).x;
            nearpathlong[k].y = point_to_path[L].getPointAtLength((point_to_path[L].getTotalLength()) / 8 * (i + 1)).y;
            nearpathlong[k].long = (allzx - nearpathlong[k].x) * (allzx - nearpathlong[k].x) + (allzy - nearpathlong[k].y) * (allzy - nearpathlong[k].y);
            nearpathlong[k].starlong = (point_to_path[L].getTotalLength()) / 8 * (i + 1);
            nearpathlong[k].Pa_th = point_to_path[L];
            nearpathlong[k].H = head[L];
            nearpathlong[k].l = tail[L];

            k++;
        }
        }
    }


    bubbleSortPath(nearpathlong)
    //("NP3.0")

    var line1 = easydij(nearpathlong[0].l, end, nearpathlong[0].Pa_th.getTotalLength() - nearpathlong[0].starlong, arrArcs);
    var line2 = easydij(nearpathlong[0].H, end, nearpathlong[0].starlong, arrArcs);
    if (line1 <= line2) {
        return (nearpathlong[0].l)
    }
    else {
        return (nearpathlong[0].H)
    }
}

function Nearpointend(xg, yg, pointNUM, nearpath, arrArcs) {//return near point
    var cc = Snap.select("#SvgMap");
    var i, j = 0, k = 0, s, c, c1, s1, longdu = 0, L = 0, direction = 0, c2;
    var nearpathlong = new Array();
    var point_to_path = new Array();
    var head = new Array();
    var tail = new Array();
    
    for (k = 0; k < pointNUM; k++) {
        for (j = k; j < pointNUM; j++) {
            s = k + "_" + j;
            s1 = j + "_" + k;
            c = document.getElementById(s);
            if (c == null)
            { }
            else {
                point_to_path[L] = c;
                ////(point_to_path[L])
                head[L] = k;
                tail[L] = j;
                L++;
            }

            c1 = document.getElementById(s1);
            if (c1 == null)
            { }
            else {
                point_to_path[L] = c1;
                ////(point_to_path[L])
                head[L] = j;
                tail[L] = k;
                L++;
            }


        }
    }





    for (i = 0; i < 8 * pointNUM; i++) {
        nearpathlong[i] = new Object();
        nearpathlong[i].x = 0;
        nearpathlong[i].y = 0;
        nearpathlong[i].long = Infinity;
        nearpathlong[i].starlong = 0;
        nearpathlong[i].Pa_th = 0;
        nearpathlong[i].H = 0;
        nearpathlong[i].l = 0;
    }

    k = 0;
    for (L = 0; L < pointNUM; L++) {
        if (point_to_path[L]!=null) {
            for (i = 0; i < 8; i++) {
                nearpathlong[k].x = point_to_path[L].getPointAtLength((point_to_path[L].getTotalLength()) / 8 * (i + 1)).x;
                nearpathlong[k].y = point_to_path[L].getPointAtLength((point_to_path[L].getTotalLength()) / 8 * (i + 1)).y;
                nearpathlong[k].long = (allxend - nearpathlong[k].x) * (allxend - nearpathlong[k].x) + (allyend - nearpathlong[k].y) * (allyend - nearpathlong[k].y);
                nearpathlong[k].starlong = (point_to_path[L].getTotalLength()) / 8 * (i + 1);
                nearpathlong[k].Pa_th = point_to_path[L];
                nearpathlong[k].H = head[L];
                nearpathlong[k].l = tail[L];

                k++;

            }
        }
    }
//("3.0end")

    bubbleSortPath(nearpathlong)
    nearpath.path = nearpathlong[0].Pa_th;
    nearpath.final = nearpathlong[0].l;
    nearpath.x = nearpathlong[0].x;
    nearpath.y = nearpathlong[0].y;
    nearpath.H = nearpathlong[0].H;
    nearpath.l = nearpathlong[0].l;
    nearpath.starlong = nearpathlong[0].starlong;
//("nearpointEnd")
cc.paper.path("M" + allxend + " " + allyend + "L" + nearpath.x + " " + nearpath.y).attr({//画路径
        stroke: '#4876FF',
        fill: "none",
        id: "paperpolylineP_L_End"
    })
    return (nearpath)

}