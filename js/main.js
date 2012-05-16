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
	} else if ($('#city').val() == "Select") {
		alert('Please enter a valid City');
	} else if ($('#zip').val() == "Select") {
		alert('Please enter a valid Zip Code');
	} else if ($('#members').val() == "Select") {
		alert('Please select a valid number for question 2');
	} else if ($('#children').val() == "Select") {
		alert('Please select a valid number for question 3');
	} else if (!$('input:radio[name=related]:checked').val()) {
		alert('Please select a valid number for question 4');
	} else if (!$('input:radio[name=house]:checked').val()) {
		alert('Please select a valid number for question 5');
	} else if ($('#years').val() == "Select") {
		alert('Please select a valid number for question 6');
	} else if (!$('input:radio[name=income]:checked').val()) {
		alert('Please select a valid number for question 7');
	} else if ($('#vehicles').val() == "Select") {
		alert('Please select a valid number for question 8');
	} else if ($('#drivers').val() == "Select") {
		alert('Please select a valid number for question 9');
	} else if ($('#bicycles').val() == "Select") {
		alert('Please select a valid number for question 10');
	} else {
		$("#fifteen").submit();	
	}
}
function continue16() {
	if ($('#address').val().length < 5) {
		alert('Please enter a valid Address');
	} else if ($('#city').val().length < 2) {
		alert('Please enter a valid City');
	} else if ($('#zip').val().length != 5) {
		alert('Please enter a valid Zip Code');
	} else if ($('#month').val() == "Select") {
		alert('Please select a valid birth month');
	} else if ($('#year').val() == "Select") {
		alert('Please select a valid birth year');
	} else if (!$('input:radio[name=gender]:checked').val()) {
		alert('Please select a gender');
	} else if ($('#occupation').val().length < 3) {
		alert('Please enter your occupation');
	} else if (!$('input:radio[name=license]:checked').val()) {
		alert('Please select a valid option for question 7');
	} else if (!$('input:radio[name=education]:checked').val()) {
		alert('Please select a valid option for question 8');
	} else if (!$('input:radio[name=marital]:checked').val()) {
		alert('Please select a valid option for question 9');
	} else {
		$("#sixteen").submit();	
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
function continue18() {
	var count=0;
	for(var prop in hexvalues) {
		count++;
	}
	if (count < 23) {
		alert('Please supply a ranking for each of the regions of Santa Barbara.');	
	} else {
		$("#eighteen").submit();	
	}
}
function continue19() {
	var count=0;
	for(var prop in hexvalues) {
		count++;
	}
	if (count < 23) {
		alert('Please supply a ranking for each of the regions of Santa Barbara.');	
	} else {
		$("#nineteen").submit();	
	}
}
function continue20() {
	var count=0;
	for(var prop in hexvalues) {
		count++;
	}
	if (count < 23) {
		alert('Please supply a ranking for each of the regions of Santa Barbara.');	
	} else {
		$("#twenty").submit();	
	}
}
function continue21() {
	if (!$('input:radio[name=proximity]:checked').val()) {
		alert('Please select an option for Proximity to Home');
	} else if (!$('input:radio[name=danger]:checked').val()) {
		alert('Please select an option for Perception of danger');
	} else if (!$('input:radio[name=attractive]:checked').val()) {
		alert('Please select an option for Attractive');
	} else if (!$('input:radio[name=familiarity]:checked').val()) {
		alert('Please select an option for Familiarity with the area');
	} else if (!$('input:radio[name=todo]:checked').val()) {
		alert('Please select an option for Provides a lot of things to do');
	} else {
		$("#twentyone").submit();	
	}
}
function continue22() {
	if ($('#firstname').val().length < 5) {
		alert('Please enter a first name');
	} else if ($('#lastname').val().length < 5) {
		alert('Please enter a last name');
	} else if ($('#email').val().length < 5) {
		alert('Please enter your email address');
	} else {
		$("#twentytwo").submit();	
	}
}
function logmein() {
	// alert('testasdf');
	$("#login1").submit();	
}