$(document).ready(function(){
	
	//don allow more than PAGINGMAXPARTICIPANTS items to be selected
	$('select[name="pagelist[]"]').change(function(e){
		if ($(this).val().length > fpbx.conf.PAGINGMAXPARTICIPANTS) {
			alert('You cannot add more than ' + fpbx.conf.PAGINGMAXPARTICIPANTS + ' participants');
			$('select[name="pagelist[]"] option[value=' + e.currentTarget.value + ']')
						.attr('selected', false);
			return false;
		}
	});
});
