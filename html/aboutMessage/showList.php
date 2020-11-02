<?php
function showList(){
	$result = mysql_query("SELECT * FROM Message order by Nu ASC ");
	$floor = 1;
	while($row = mysql_fetch_array($result)){
		if($row['Id'] ==$_SESSION['accounts'] || $row['Id'] =='访客'){
			printSelf($row,$floor);
		}else{
			printOther($row,$floor);
		}
		$floor++;
	}
}
function printSelf($row,$floor){
	
	echo '
			<div class="weui-media-box weui-media-box_text">
				<h4 class="weui-media-box__title">'.$row['Title'].'</h4>
				<p class="weui-media-box__desc">'. $row['Message'] .'</p>
				<ul class="weui-media-box__info">
					<li class="weui-media-box__info__meta">来源：'. $row['Id'] .'</li>
					<li class="weui-media-box__info__meta">'. $row['Time'] .'</li>
					<li class="weui-media-box__info__meta weui-media-box__info__meta_extra">'.$floor.'楼</li>
					<li class="weui-media-box__info__meta weui-media-box__info__meta_extra" onclick="Reply(this)">回复</li>
					<li class="weui-media-box__info__meta weui-media-box__info__meta_extra" onclick="DeleteOne('.$row['Nu'].')">删除</li>
				</ul>
			</div>
	  
			 ';
}

function printOther($row,$floor){
	
	echo '
			<div class="weui-media-box weui-media-box_text">
				<h4 class="weui-media-box__title">'.$row['Title'].'</h4>
				<p class="weui-media-box__desc">'. $row['Message'] .'</p>
				<ul class="weui-media-box__info">
					<li class="weui-media-box__info__meta">来源：'. $row['Id'] .'</li>
					<li class="weui-media-box__info__meta">'. $row['Time'] .'</li>
					<li class="weui-media-box__info__meta weui-media-box__info__meta_extra">'.$floor.'楼</li>
					<li class="weui-media-box__info__meta weui-media-box__info__meta_extra" onclick="Reply(this)">回复</li>
					
				</ul>
			</div>
	  
			 ';
}
?>