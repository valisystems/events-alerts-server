//validation functions
function validatePass(passInfo){
    if (passInfo['field'].val() === undefined) {
        return;
    }
    if (passInfo) {
        //it's NOT valid
        if (passInfo['field'].val().length > 0) {
            if(passInfo['field'].val().length <6){
                passInfo['field'].addClass("globalError");
                passInfo['error'].text(passInfo['name'] + " Password MUST be at least 6 characters");
                passInfo['error'].addClass("globalError");
                return false;
            } else { //it's valid			
                passInfo['field'].removeClass("globalError");
                passInfo['error'].text(" ");
                passInfo['error'].removeClass("globalError");
                return true;
            }
        }
    }
}

$(document).ready(function() {
	//global vars
	var form = $("#global");
	var admin = new Array();
	var user = new Array();
	admin['field'] = $("#admin_password");
	admin['name'] = 'Admin';
	admin['error'] = $('#adminPass');
	user['field'] = $("#user_password");
	user['name'] = 'User';
	user['error'] = $('#userPass');
	
	//On blur
	// Define an object in the global scope (i.e. the window object)
	admin['field'].blur(validatePass(admin));
	user['field'].blur(validatePass(user));
	//On key press
	admin['field'].keyup(validatePass(admin));
	user['field'].keyup(validatePass(user));
	//On Submitting
	form.submit(function(){
		if(validatePass(admin) && validatePass(user)){
			return true;
		} else {
			return false;
		}
	});
        $('.type').change(function() {
		var name = $(this).attr('name');
		var length = name.length;
		name = name.substr(0, length - 4);		
           console.log($(this).attr('value'));

                if($(this).attr('value') == 'XML-API'){
                    $("#" + name + 'xml').show();
                    $("#" + name + 'value').hide();
                    $("#" + name + 'xmlP').hide();
                } else {
                    if($(this).attr('value') != 'xml'){
                        $("#" + name + 'xml').hide();
                        $("#" + name + 'value').show();
                        $("#" + name + 'xmlP').hide();
                    }
                }
	});
});
	

$(function() {
    var result;
    var hidden;
    $( "ul.sortableEndpoint" ).sortable({
        update: function(event, ui) {
            result=$(this).sortable('toArray');
            //insert into hidden field per device label
            test = result[0].split('_'[0]);
            if(test[1].substring(1, test[1]) == 'L'){
                console.log(result);
                hidden = result['0'].substring(0, result['0'].indexOf('_')) + '_orderL';
            } else {
                hidden = result['0'].substring(0, result['0'].indexOf('_')) + '_order';
            }
            $('input[name='+hidden+']').val(result);
        }                
    });                                                                     
});
