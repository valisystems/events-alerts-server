$(document).ready(function() {
    $('#dialog-form').hide();
    $(document).on('change', '.ext', function(){ 
        if($(this).val() == 'Custom'){
            $( "#dialog-form" ).dialog({
                autoOpen: false,
                height: 300,
                width: 350,
                modal: true
            });	
            $( "#dialog-form" ).dialog( "open" );
            $('#record').html('<input type="hidden" size="20" name="cRecord" id="cRecord" value="' + $(this).attr('id') + '" />'); 
        }
    });
    $('#send-button').click(function(){
        // validate
        $('.error').hide();  
        var cExt = $("input#cExt").val();  
        if (cExt == ""){  
            $("label#cExt_error").show();  
            $("input#cExt").focus();  
            return false;  
        }  
        var cSecret = $("input#cSecret").val();  
        if (cSecret == ""){  
            $("label#cSecret_error").show();  
            $("input#cSecret").focus();  
            return false;  
        } 
        var cLabel = $("input#cLabel").val();
        var record = $("input#cRecord").val();
        var cDestination = $("input#cDestination").val();
        var cSipPort = $("input#cSipPort").val();        
        
        var dataString = 'display=endpoint&view=save_custom&cExt=' + cExt + '&cSecret=' + cSecret + '&cLabel=' + cLabel + '&cDestination=' + cDestination + '&cSipPort=' + cSipPort;  
        $.ajax({  
            type: "POST",  
            url: "config.php",  
            data: dataString,  
            success: function(data) {
                $('#dialog-form').html("<div id='message'></div>");  
                $('#message').html("<h2>Extension Added.</h2>")
                var select = document.getElementById(record);
                select.options[select.options.length] = new Option(cExt + ' ' + cLabel, cExt + ' ' + cLabel, '', '1');
                $('#dialog-form').dialog('close');
            }  
        });  
        return false; 

    });  
    
    
    
    
    
    $('#check_All').click(function(){
        $('.select').trigger('click');
    });
/*    $('.content').not('[name=select]').delegate('input','change', function() {
		var name = $(this).attr('name');
		chk = name.split('[');
		chk = chk[1].split(']');
		chk = chk[0];
console.log('boo');
//		$("input[name='select_exist[" + chk +"]']").attr('checked', true);
	});*/
        
    $('.content').delegate('select','change', function() {
        var name = $(this).attr('name');
        chk = name.split('[');
        exist = chk[0].split('_');
        exist = exist[1];
        chk = chk[1].split(']');
        chk = chk[0];
        //console.log('3' + chk);
        //console.log("input[name='select_exist[" + chk +"]']");
        if(exist == 'exist'){
            $("input[name='select_exist[" + chk +"]']").attr('checked', true);
        }

        name = name.substring(5,name.length);
        var ext_list = '';
        var mod_list = '';
        if($(this).val() == 'Aastra'){
            $.each(aastra, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(aastraModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
		if($(this).val() == 'Algo'){
            $.each(algo, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(algoModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
		if($(this).val() == 'AND'){
            $.each(and, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(andModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
		if($(this).val() == 'Audiocodes'){
            $.each(audiocodes, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(audiocodesModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Cisco'){
            $.each(cisco, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(ciscoModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Cortelco'){
            $.each(cortelco, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(cortelcoModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Cyberdata'){
            $.each(cyberdata, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(cyberdataModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Digium'){

            $.each(digium, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(digiumModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Grandstream'){

            $.each(grandstream, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(grandstreamModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Mitel'){

            $.each(mitel, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(mitelModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Mocet'){
            $.each(mocet, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(mocetModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Obihai'){
            $.each(obihai, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(obihaiModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Panasonic'){
            $.each(panasonic, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(panasonicModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Phoenix'){
            $.each(phoenix, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(phoenixModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Polycom'){
            $.each(polycom, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(polycomModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Sangoma'){
            $.each(sangoma, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(sangomaModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Snom'){
            $.each(snom, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(snomModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Uniden'){
            $.each(uniden, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(unidenModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Vtech'){
            $.each(vtech, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(vtechModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Xorcom'){
            $.each(xorcom, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(xorcomModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        if($(this).val() == 'Yealink'){
            $.each(yealink, function(key, value){
                ext_list = ext_list + '<option value="' + value + '">' + value + '</option>';
            });
            $.each(yealinkModels, function(key, value){
                mod_list = mod_list + '<option value="' + value + '">' + value + '</option>';
            });
        }
        
        $("[name='template" + name+"']").find('option')
                                        .remove()
                                        .end()
                                        .append(ext_list);
        $("[name='brand_model" + name+"']").find('option')
                                     .remove()
                                     .end()
                                     .append(mod_list);
                                                                       
    });
});

var newCount = 1;

function addExtension(ext, brands, aastra, algo, and, audiocodes, cyberdata, cortelco, cisco, digium, grandstream, mitel, mocet, obihai, panasonic, phoenix, polycom, sangoma, snom, uniden, vtech, xorcom, yealink) {
    var trCount = $('tr').length;
    var clonedRow = $("tr:last");
    var extensions = $('table#extensions').html();

    var ext_list = '<tr><td><input type="checkbox" name="select[' + newCount + ']" checked></td><td><select name="ext[' + newCount + ']" id="ext[' + newCount + ']" class="ext" >';
    $.each(ext, function(key, value) {
        ext_list = ext_list + '<option value="' + key + '">' + key + ' ' + value + '</option>'; 
    });
    
    ext_list = ext_list + '</select>';
    ext_list = ext_list + '<br /><select name="acct[' + newCount + ']" id="acct[' + newCount + ']" class="acct" ><option value="">Account</option><option value="account1">Account 1</option><option value="account2">Account 2</option><option value="account3">Account 3</option><option value="account4">Account 4</option><option value="account5">Account 5</option><option value="account6">Account 6</option><option value="account7">Account 7</option><option value="account8">Account 8</option></select>';
    ext_list = ext_list + '</td><td><select name="brand[' + newCount + ']" id="brand_' + newCount + '" >';
    $.each(brands, function(key, value){
        ext_list = ext_list + '<option value="' + key + '">' + value + '</option>';
    });
    ext_list = ext_list + '</select><br /><input name="mac[' + newCount + ']" id="mac_' + newCount + '" value="" size="10"></td><td><select name="template[' + newCount + ']" id="template_' + newCount + '"><option value="0"> Select </option></select><br /><select name="brand_model[' + newCount + ']" id="brand_model_' + newCount + '"><option value="0"> Select </option></select></td><td></td><td></td>';
    
    $("table#extensions").append(ext_list);    
      
    newCount += 1;
}

function displayImport(){
    $('#extensions').hide();
    $('#import').show();
}

function displayAdvanced(ext){
    $('.' + ext).toggle();	
}
