$(document).ready(function() {
	$("input[name='address']").click(function() {
	  if ($("input[name='address']:checked").val() == 'internal'){
		  $('#ipaddress').val($('#internal').val());
	  } else if ($("input[name='address']:checked").val() == 'external'){
		  $('#ipaddress').val($('#external').val());
	  } else if ($("input[name='address']:checked").val() == 'both'){
		  $('#ipaddress').val('both');
	  }
	});
});