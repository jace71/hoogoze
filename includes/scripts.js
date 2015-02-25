$(document).ready(function(){
	
	// preprint checkin function
	$('#checkall').click(function(){
		if($(this).is(':checked')){
			$('#precheck-form input[type="checkbox"]').prop('checked',true);
			$('#checkall-text').text('Uncheck All');
		} else {
			$('#precheck-form input[type="checkbox"]').prop('checked',false);
			$('#checkall-text').text('Check All');
		}
	});
	
});