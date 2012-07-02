$(document).ready(function() {
    $("#nofam").click(function() {
		if ($('#nofam').is(':checked')) {
			$('input:radio[name=goods3]').attr('disabled',true);
			$('input:radio[name=identity3]').attr('disabled',true);
			$('input:radio[name=quality3]').attr('disabled',true);
			$('input:radio[name=social3]').attr('disabled',true);
			$('input:radio[name=timetravel3]').attr('disabled',true);
			$('input:radio[name=culture3]').attr('disabled',true);
			$('input:radio[name=distance3]').attr('disabled',true);	
			$('input:radio[name=place3]').attr('disabled',true);	
			$('input:radio[name=proximity3]').attr('disabled',true);	
			$('input:radio[name=dependence3]').attr('disabled',true);	
			$('input:radio[name=atmosphere3]').attr('disabled',true);	
		} else {
			$('input:radio[name=goods3]').attr('disabled',false);
			$('input:radio[name=identity3]').attr('disabled',false);
			$('input:radio[name=quality3]').attr('disabled',false);
			$('input:radio[name=social3]').attr('disabled',false);
			$('input:radio[name=timetravel3]').attr('disabled',false);
			$('input:radio[name=culture3]').attr('disabled',false);
			$('input:radio[name=distance3]').attr('disabled',false);	
			$('input:radio[name=place3]').attr('disabled',false);	
			$('input:radio[name=proximity3]').attr('disabled',false);	
			$('input:radio[name=dependence3]').attr('disabled',false);	
			$('input:radio[name=atmosphere3]').attr('disabled',false);	
		}
	});
});

