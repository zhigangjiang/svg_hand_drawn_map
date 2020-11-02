<?php
$mapName=$_POST["mapName"];
$initScale=$_POST["initScale"]; 
$minScale=$_POST["minScale"]; 
$maxScale=$_POST["maxScale"]; 
$chgScale=$_POST["chgScale"]; 
$referenceX=$_POST["referenceX"]; 
$referenceY=$_POST["referenceY"]; 
$referenceLongitude=$_POST["referenceLongitude"]; 
$referenceLatitude=$_POST["referenceLatitude"]; 
  

$myfile = fopen("date.js", "w") or die("Unable to open file!");
$mapName = "var title='".$mapName."';"."\n";
fwrite($myfile, $mapName);

$initScale = "var initScale=".$initScale.";"."\n";
fwrite($myfile, $initScale);

$minScale = "var minScale=".$minScale.";"."\n";
fwrite($myfile, $minScale);

$maxScale = "var maxScale=".$maxScale.";"."\n";
fwrite($myfile, $maxScale);

$chgScale = "var chgScale=".$chgScale.";"."\n";
fwrite($myfile, $chgScale);

$referenceX = "var ReferencePoint_x=".$referenceX.";"."\n";
fwrite($myfile, $referenceX);

$referenceY = "var ReferencePoint_y=".$referenceY.";"."\n";
fwrite($myfile, $referenceY);

$referenceLongitude = "var ReferencePoint_longitude=".$referenceLongitude.";"."\n";
fwrite($myfile, $referenceLongitude);

$referenceLatitude = "var ReferencePoint_latitude=".$referenceLatitude.";"."\n";
fwrite($myfile, $referenceLatitude);

fclose($myfile);

?>

