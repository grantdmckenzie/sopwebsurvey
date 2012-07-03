function start() {
	$("#indexpage").submit();	
}
function resetpassw() {
	$("#reset").submit();	
}
function continue1() {
	if (!$('#agree').is(':checked')) {
		alert("Please select 'I agree…' to continue");
	} else if ($('#initials').val().length < 1) {
		alert("Please enter your initials to continue");	
	} else {
		$("#iagree").submit();	
	}
}

function continue3() {
	$("#three").submit();	
}
function continue4() {
	if ($('#other').val().length < 1) {
		alert('Please answer the question: \"Please explain why you chose the options you did\"');
	} else if (!$('#decision').is(':checked') && !$('#group').is(':checked') && !$('#follower').is(':checked') && !$('#other1').is(':checked')) {
		alert('Please select at least one answer for Question #1');
	} else {
		$("#four").submit();
	}	
}
function continue5() {
	if ($('#why').val().length < 2)
		alert('Please describe why you think the area is important');
	else 
		$("#five").submit();
}
function continue6() {
	if ($('#why').val().length < 2)
		alert('Please tell us what about these areas detours you from visiting them');
	else 
	$("#six").submit();	
}
function continue7() {
	if ($('#why').val().length < 2)
		alert('Please describe what about these areas makes them attractive for shopping');
	else 
	$("#seven").submit();	
}
function continue8() {
	if ($('#why').val().length < 2)
		alert('Please describe what about these areas makes them attractive for shopping');
	else 
	$("#eight").submit();	
}
function continue9() {
	$("#nine").submit();	
}
function continue10() {
	$("#ten").submit();	
}
function continue11() {
	$("#eleven").submit();	
}
function continue12() {
		var checkasdf = false;
	if (!$('input:radio[name=goods1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=identity1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=quality1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=social1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=timetravel1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=culture1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=distance1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=place1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=proximity1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=dependence1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=atmosphere1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=goods2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=identity2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=quality2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=social2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=timetravel2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=culture2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=distance2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=place2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=proximity2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=dependence2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=atmosphere2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=goods3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=identity3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=quality3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=social3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=timetravel3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=culture3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=distance3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=place3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=proximity3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=dependence3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('#nofam').is(':checked') && !$('input:radio[name=atmosphere3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=goods4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=identity4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=quality4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=social4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=timetravel4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=culture4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=distance4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=place4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=proximity4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=dependence4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=atmosphere4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else {
		$("#twelve").submit();	
	}
}
function continue13() {
	if (!$('input:radio[name=goods1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=identity1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=quality1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=social1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=timetravel1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=culture1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=distance1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=place1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=proximity1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=dependence1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=atmosphere1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=goods2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=identity2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=quality2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=social2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=timetravel2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=culture2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=distance2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=place2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=proximity2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=dependence2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=atmosphere2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=goods3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=identity3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=quality3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=social3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=timetravel3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=culture3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=distance3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=place3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=proximity3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=dependence3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=atmosphere3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else {
		$("#thirteen").submit();	
	}	
}
function continue14() {
	if(!isNumeric($('#years').val())) {
		alert("Please enter a number for years.");
	} else if (!isNumeric($('#times').val())) {
		alert("Please enter a number for times.");
	} else if (!$('input:radio[name=likert1]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert2]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert3]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert4]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert5]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert6]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert7]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert8]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert9]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert10]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert11]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert12]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else if (!$('input:radio[name=likert13]:checked').val()) {
		alert('Please answer all questions before continuing');
	} else {
		$("#fourteen").submit();	
	}
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
	if (!$('input:radio[name=gender]:checked').val()) {
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
	if ($('#firstname').val().length < 1) {
		alert('Please enter a first name');
	} else if ($('#lastname').val().length < 1) {
		alert('Please enter a last name');
	} else if ($('#email').val().length < 5) {
		alert('Please enter your email address');
	} else {
		$("#twentytwo").submit();	
	}
}
function continuepoly() {
	window.location = "16.php";	
}
function continuehex() {
	window.location = "10.php";	
}
function logmein() {
	// alert('testasdf');
	$("#login1").submit();	
}

function isNumeric(input)
{
    return (input - 0) == input && input.length > 0;
}
function popup(mylink, windowname) {
	if (! window.focus)return true;
	var href;
	if (typeof(mylink) == 'string')
	   href=mylink;
	else
	   href=mylink.href;
	window.open(href, windowname, 'width=4500,height=400,scrollbars=yes');
	return false;
}