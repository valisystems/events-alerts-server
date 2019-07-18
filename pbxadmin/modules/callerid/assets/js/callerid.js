$(document).ready(function(){
	$('#add_entry').click(function(){
		//find the last id, add +1
		vals = [];
		$('input[name^=items]').each(function(){
			vals.push($(this).val());
		})
		id = vals.length ? parseInt(vals.sort().pop()) + 1: 1;
		id = + new Date();
		$('#entry_table > tbody:last').find('tr:last').after(new_entry.replace(/PLACEHOLDER/g, id));
		
		//increment prefix
		prefix = $('#entry_table > tbody:last').find('tr').eq(-2).find('[name^="entries[prefix]"]').val().split("");
		star = prefix[0] == '*' ? '*' : '';
		if (star) {
			prefix.shift();
		}
		$('#entry_table > tbody:last')
					.find('tr:last')
					.find('[name^="entries[prefix]"]')
					.val(star + (1 + parseFloat(prefix.join(''))));
	});
	
	//get 'template' row
	var new_entry = '<tr>' + $('#entry_table > tbody:last').find('tr:last').html() + '</tr>';
	
	//remove the placeholder from the items list
	$('input[name^=items][value=PLACEHOLDER]').remove();
	
	//remove the template from the table, replacing it with a blank line if the table is empty
	if ($('#entry_table > tbody:last').find('tr').length > 1) {
		$('#entry_table > tbody:last').find('tr:last').remove();
	} else {
		$('#add_entry').trigger('click');
		$('#entry_table > tbody:last').find('tr').eq(-2).remove();
		$('#entry_table > tbody:last').find('tr:last').find('[name^="entries[prefix]"]').val('*200');
	}
	
	//delete rows on click
	$('.delete_entry').live('click', function(){
		$(this).closest('tr').fadeOut('normal', function(){$(this).closest('tr').remove();})
	});
	
	//$('#cidform').submit(function(){})
	
	$('input[type=submit]').click(function(){
		//remove the last line if its empty
		last = $('#entry_table > tbody:last').find('tr:last');
		if(last.find('input[name^="entries[prefix]"]').val() == ''
			|| last.find('input[name^="entries[cid]"]').val() == ''
		){
			last.remove();
			$('input[type=submit]').trigger('click');
		}

	});
	
	
});