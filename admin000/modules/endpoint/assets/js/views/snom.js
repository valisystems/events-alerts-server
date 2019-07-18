$(document).ready(function() {
   //used for ajax call to eliminate excessive input variables
    $('#submit').click(function(event) {
        event.preventDefault();
        var dat = JSON.stringify($('#snom').serializeArray());
        var url = $('#snom').attr('action') + '&template=' + $('#template_name').val();
        alert('Please wait until page reloads.');
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

