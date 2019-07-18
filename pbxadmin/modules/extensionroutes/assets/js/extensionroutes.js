$(document).ready(function() {

        $('#extensions_allowed').sortable({
                connectWith: '.extensions',
                update: extensionroutes_save_exten_list,
        }).disableSelection();

        $('#extensions_blocked').sortable({
                connectWith: '.extensions',
		update: extensionroutes_fixsize,
        }).disableSelection();

        extensionroutes_fixsize();
        $('.ExtensionRoutes').hide();
});

function extensionroutes_fixsize() {
	var height = 0;
	$(".sortable").height('auto').each(function() {
		height = $(this).height() > height ? $(this).height() : height;
	}).height(height);
	$(".sortable").width('95%');
	$(".sortable>li").width('auto');
}

function extensionroutes_save_exten_list() {
        $('form#routeEdit input[name^=extensionroutes_list]').remove();
        $('form#routeEdit ul#extensions_allowed li').each(function(){
                field           = document.createElement('input');
                field.name      = 'extensionroutes_list[]';
                field.type      = 'hidden';
                field.value     = $(this).data('extension');
                $('form#routeEdit').append(field);
        })
        extensionroutes_fixsize();
}
