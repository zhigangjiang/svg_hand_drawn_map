
function ApplicationData(){
	
	if($("#mapName").val())
	document.title=$("#mapName").val();
	
	if($("#initScale").val())
	initScale=parseFloat($("#initScale").val());
	
	if($("#minScale").val())
	minScale=parseFloat($("#minScale").val());
	
	if($("#maxScale").val())
	maxScale=parseFloat($("#maxScale").val());
	
	if($("#chgScale").val())
	chgScale=parseFloat($("#chgScale").val());
	
	if($("#referenceX").val())
	ReferencePoint_X=parseFloat($("#referenceX").val());
    
	if($("#referenceY").val())
	ReferencePoint_Y=parseFloat($("#referenceY").val());
	
	if($("#referenceLongitude").val())
	ReferencePoint_longitude=parseFloat($("#referenceLongitude").val());
	
	if($("#referenceLatitude").val())
	ReferencePoint_latitude=parseFloat($("#referenceLatitude").val());
	
	
	resetElement();
	if(err1){
	locationMap();
	alphaMap();	
	}
	else 
	getLocation();
	
}
function ApplicationSimulationData(){
		
	if($("#simulationLongitude").val())
	longitude=parseFloat($("#simulationLongitude").val());
	
	if($("#simulationLatitude").val())
	latitude=parseFloat($("#simulationLatitude").val());
	
	if($("#simulationAccuracy").val())
	accuracy=parseFloat($("#simulationAccuracy").val());
	
	if($("#simulationAlpha").val())
	alpha=parseFloat($("#simulationAlpha").val());
	
	locationMap();
	alphaMap();
	
	}
