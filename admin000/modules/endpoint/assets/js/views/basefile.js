$(document).ready(function() {
   $('.content').delegate('input','change', function() {
   //console.log('input');
		var name = $(this).attr('name');
		chk = name.split('[');
		chk = chk[1].split(']');
		chk = chk[0];
		$("input[name='default[" + chk +"]']").attr('checked', true);
	});
        
    $('#submit').click(function(event) {
        event.preventDefault();
        var dat = JSON.stringify($('#basefile').serializeArray());
        var url = $('#basefile').attr('action');
        $.ajax({
        type: "POST",
        url: url,
        data: {'data': dat},
        success: function(data,textStatus,jqXHR) {
                //alert('success ');
                //$("#errors").html('result ' + jqXHR.responseText);
                //$("#errors").html('<br />json<br />' + dat);
                location.href=url;
        },
        error:function(xhr, textStatus, errorThrown){
            alert('fail');
            //$("#errors").html(xhr.responseText);
        }
        });

        //console.log(dat,url);
    });
});

var newCount = 1;

function addSetting(brand) {
    var trCount = $('tr').length;
    var clonedRow = $("tr:last");
    var extensions = $('#newbasefiles').html();
    
    if(brand == 'aastracfg'){
        var ext_list = '<tr><td><input type="hidden" name="newtemplate[' + newCount + ']" value="' + template + '"><input type="checkbox" name="newdefault[' + newCount + ']" value="nd" checked></td>';
            ext_list = ext_list + '<td>' + brand + '<input type="hidden" name="newbrand[' + newCount + ']" value="' + brand + '">';
            ext_list = ext_list + '<td><input name="newparam[' + newCount + ']" value="" size="10" placeholder="Parameter"></td>';
            ext_list = ext_list + '<td><input name="newvalue[' + newCount + ']" value="" size="10" placeholder="Value"></td><td></td></tr>';
    } 
    
    
    
    if(brand != 'aastracfg'){
        var ext_list = '<tr><td><input type="hidden" name="newtemplate[' + newCount + ']" value="' + template + '"><input type="checkbox" name="newdefault[' + newCount + ']" value="nd" checked></td>';
            ext_list = ext_list + '<td>' + brand + '<input type="hidden" name="newbrand[' + newCount + ']" value="' + brand + '">';
            ext_list = ext_list + '<td><input name="newmodel[' + newCount + ']" value="" size="10" placeholder="Models"></td>';
            ext_list = ext_list + '<td><input type="checkbox" name="newtypePhone[' + newCount + ']" value="phone" checked> Phone <input type="checkbox" name="newtypeFxs[' + newCount + ']" value="fxs" checked>FXS</td>';
            ext_list = ext_list + '<td><input name="newparam[' + newCount + ']" value="" size="10" placeholder="Parameter"></td>';
            ext_list = ext_list + '<td><input name="newattrib[' + newCount + ']" value="" size="10" placeholder="Attribute"></td>';
            ext_list = ext_list + '<td><input name="newvalue[' + newCount + ']" value="" size="10" placeholder="Value"></td><td></td></tr>';
    }
    
    $("#newbasefiles").append(ext_list);    
      
    newCount += 1;
}

function addSettingPolycom() {
    var trCount = $('tr').length;
    var clonedRow = $("tr:last");
    var extensions = $('#newbasefiles').html();
						
    var ext_list = '<tr><td><input type="hidden" name="newtemplate[' + newCount + ']" value="' + template + '"><input type="checkbox" name="newdefault[' + newCount + ']" value="nd" checked></td>';
	ext_list = ext_list + '<td>' + brand + '<input type="hidden" name="newbrand[' + newCount + ']" value="' + brand + '">';
	ext_list = ext_list + '<td><input name="newmodel[' + newCount + ']" value="" size="10" placeholder="Models"></td>';
    ext_list = ext_list + '<td><input type="checkbox" name="newtypePhone[' + newCount + ']" value="phone" checked> Phone ';
	ext_list = ext_list + '<input type="checkbox" name="newtypePhone[' + newCount + ']" value="fxs" checked> FXS </td>';
	ext_list = ext_list + '<td><input name="newfile[' + newCount + ']" value="' + file + '" size="10" placeholder="File"></td>';
	ext_list = ext_list + '<td><input name="newattrib[' + newCount + ']" value="" size="10" placeholder="Attribute"></td>';
    ext_list = ext_list + '<td><input name="newparam[' + newCount + ']" value="" size="10" placeholder="Parameter"></td>';
    ext_list = ext_list + '<td><input name="newvalue[' + newCount + ']" value="" size="10" placeholder="Value"></td><td></td></tr>';
    $("#newbasefiles").append(ext_list);    
      
    newCount += 1;
}
