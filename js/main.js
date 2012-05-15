function start() {
	$("#indexpage").submit();	
}
function continue1() {
	$("#iagree").submit();	
}
function continue3() {
	$("#three").submit();	
}
function continue4() {
	$("#four").submit();	
}
function continue5() {
	if (geoms.length < 1)
		alert('Please draw at least one region on the map');	
	else if ($('#why').val().length < 2)
		alert('Please describe why you think the area is important');
	else 
		$("#five").submit();
}
function continue6() {
	if (geoms.length < 1)
		alert('Please draw at least one region on the map');	
	else if ($('#why').val().length < 2)
		alert('Please tell us what about these areas detours you from visiting them');
	else 
	$("#six").submit();	
}
function continue7() {
	if (geoms.length < 1)
		alert('Please draw at least one region on the map');	
	else if ($('#why').val().length < 2)
		alert('Please describe what about these areas makes them attractive for shopping');
	else 
	$("#seven").submit();	
}
function continue8() {
	if (geoms.length < 1)
		alert('Please draw at least one region on the map');	
	else if ($('#why').val().length < 2)
		alert('Please describe what about these areas makes them attractive for shopping');
	else 
	$("#eight").submit();	
}
function continue9() {
	if (geoms.length < 1)
		alert('Please draw at least one region on the map');	
	else 
	$("#nine").submit();	
}
function continue10() {
	if (geoms.length < 1)
		alert('Please draw at least one region on the map');	
	else 
	$("#ten").submit();	
}
function continue11() {
	if (geoms.length < 1)
		alert('Please draw at least one region on the map');	
	else 
	$("#eleven").submit();	
}
function continue12() {
	$("#twelve").submit();	
}
function continue13() {
	$("#thirteen").submit();	
}
function continue14() {
	$("#fourteen").submit();	
}
function continue15() {
	if ($('#address').val().length < 5) {
		alert('Please enter a valid Address');
	} 
	
	else {
		$("#fifteen").submit();	
	}
}
function continue17() {
	var count=0;
	for(var prop in hexvalues) {
		count++;
	}
	if (count < 23) {
		alert('Please supply a ranking for each of the regions of Santa Barbara.');	
	} else {
		$("#seventeen").submit();	
	}
}
function logmein() {
	// alert('testasdf');
	$("#login1").submit();	
}