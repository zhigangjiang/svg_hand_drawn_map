
$("#svgData").val($("#conSvg").html());
$("#pointNum").val(numPath);

function ApplicationData(){
	document.title =$("#mapName").val();
    initScale=parseFloat($("#initScale").val());
    minScale=parseFloat($("#minScale").val());
    maxScale=parseFloat($("#maxScale").val());
    chgScale=parseFloat($("#chgScale").val());
    ReferencePoint_x=parseFloat($("#referenceX").val());
    ReferencePoint_y=parseFloat($("#referenceY").val());
    ReferencePoint_longitude=parseFloat($("#referenceLongitude").val());
    ReferencePoint_latitude=parseFloat($("#referenceLatitude").val());
}
function ApplicationSimulationData(){
	longitude=parseFloat($("#simulationLongitude").val());
	latitude=parseFloat($("#simulationLatitude").val());
	accuracy=parseFloat($("#simulationAccuracy").val());
	locationMap();
	showNow();
	alpha=parseFloat($("#simulationAlpha").val());
	alphaMap();
}