$(document).ready(function() {
    $("input[name='dest_option']").click(function() {
        if ($("input[name='dest_option']:checked").val() == 'internal') {
            $('#destination').val($('#int_ip').val());
            $('#ftpserver').val($('#int_ip').val());
        } else if ($("input[name='dest_option']:checked").val() == 'external') {
            $('#destination').val($('#ext_ip').val());
            $('#ftpserver').val($('#ext_ip').val());
        }

    });

    $("input[name='tftp_option']").click(function() {
        if ($("input[name='tftp_option']:checked").val() == 'internal') {
            $('#tftp_server').val($('#int_ip').val());
        } else if ($("input[name='tftp_option']:checked").val() == 'external') {
            $('#tftp_server').val($('#ext_ip').val());
        }

    });
    
    $(":checkbox").change(function(){
	console.log('2');
        var id = $(this).attr('name');
        if (this.checked) {
            $('#' + id).show();
        } else {
            $('#' + id).hide();
        }
    });
    
// for ftp username and password box	
    $("input[name='protocol']").click(function() {
        if ($("input[name='protocol']:checked").val() == '0'){
            $('#ftp').show();
        } else if ($("input[name='protocol']:checked").val() == '1'){
            $('#ftp').hide();
        }
    })
    
// watch for line key selection
    $(".buttonType").change(function(){
	console.log('3');
        if($(this).val() == "Line"){
            $('#' + $(this).attr('name') + 'NotLine').hide();
        } else {
            $('#' + $(this).attr('name') + 'NotLine').show();
        }
    })
        
        
});

function addItem(ext) {
    var trCount = $('tr').length;
    var clonedRow = $("tr:last");
    var directory = $('#directory').html();
     
    list = '<tr><td><input name="ln[]" id="ln[]" size="10" value=""></td>';
    list = list + '<td><select name="ct[]" id="ct[]" >';
    $.each(ext, function(key, value) {
        list = list + '<option value="' + key + '">' + key + ' ' + value + '</option>'; 
    });
    list = list + '</select></td><td><input name="sd[]" id="sd[]" size="2" value="">';
    list = list + '</td><td><input name="bw[]" id="bw[]" size="2" value="">';
    list = list + '</td></tr>';
    $("#directory").append(list);
}