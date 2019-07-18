$(document).ready(function(){
	
	//toggle send fax area
	$('#sendfaxtoggle').toggle(
		function(){
			if (faxhidesend) {
				alert(faxhidejsmsg);
				return false;
			}
			$(this).text('+ ');
			$('#sendfaxarea').slideUp();
		},
		function(){
		 	if (faxhidesend) {
				alert(faxhidejsmsg);
				return false;
			}
			$(this).text('- ');
			$('#sendfaxarea').slideDown();
		 }
	);
	
	//toggle fax history table area
	$('#faxhistorytoggle').toggle(
		function(){
			$(this).text('+ ');
			$('#faxhistoryarea').slideUp();
		},
		function(){
			$(this).text('- ');
			$('#faxhistoryarea').slideDown();
		}
	);
	
	//ajax form
	$('#newfax').ajaxForm({
						resetForm: true,
						beforeSubmit:  beforeSubmit,
						success:  showResponse
				}); 

	//add file
	//make sure this row doenst get deleted before it gets cloned!!
	$('.del_row').eq(0).hide();
	$('.add_file').click(function(){
		if (typeof this.newfaxtr == 'undefined') {
			$('.del_row').eq(0).show();//NOW we can enable deleting
			 this.newfaxtr = $('.add_file').closest('tr').prev('tr').clone();
		}
		$(this).closest('tr').before(this.newfaxtr.clone());
	});
	
	//delete line
	$(document).on('click', '.del_row', function(){
		$(this).closest('tr').fadeOut('normal', function(){
			$(this).remove();
		});
	});
	//auto grow textbox
	$('#tomsgbox').autogrow().inputlimiter({limit: 1340, boxId: 'tomsgcounter', boxAttach: false,remTextHideOnBlur: false, remText: '%n', limitText: ''});
	
	//forward fax
	$('.forward').click(function(){
		var file = $(this).attr('data-fax-id');
		$('<div></div>')
			.html('Please enter a phone number or extension:' 
				+ '<input type="text" name="destination" placeholder="Destination Number"><br />'
				+ '<input type="checkbox" id="is_local_num" name="is_local" value="false">'
				+ ' <label for="is_local_num">Send to Local Extension</label>'
				)
			.dialog({
				title: 'Destination Number',
				resizable: false,
				modal: true,
				position: ['center', 'center'],
				close: function (e) {
					$(e.target).dialog("destroy").remove();
				},
				buttons: [
					{
						text: 'Forward',
						click: function() {
							var tonum = $('[name=destination]').val();
							var is_local = $('#is_local_num').attr('checked') ? true : false;
								$(this).dialog("destroy").remove();
								$.ajax({
									url: window.location.href,
									data: {
											forward: file, 
											tonum: tonum, 
											ajax: 'true',
											is_local: is_local,
											f: 'action'
										},
									success: function(data){
										console.log(data);
										notify(data,'5000');
									},
									error: function() {
										notify('An error has occurred','5000');
									}
								});
						}

					},
					{
						text: fpbx.msg.framework.cancel,
						click: function() {
								$(this).dialog("destroy").remove();
							}
					}
					]
			});
	});	
	
	//toggel coversheet options
	$('[name=coversheet]').click(function(){
		if ($('[name=coversheet]').attr('checked')) {
			$('.coveroptstr').fadeIn();
		}else{
			$('.coveroptstr, .mycoveroptstr').fadeOut();
		}
	});
	
	//show coversheet personal details
	$('#showmydeets').click(function(){
		$(this).hide();
		$('.mycoveroptstr').show();
	});
	
	//forward a fax
	$('.trashimg').click(function(){
		var c = confirm('Are you sure you wish to delete this fax?');
		if (c) {
			window.location.href 
					= window.location.pathname 
					+ '?m=faxpro&f=action&delete=' 
					+ $(this).data('fax-id');
		}
	});
	
	//view a fax
	$('.pdfimg').click(function(){
		$(this).closest('tr').find('.new').each(function(e){
			$(this).removeClass('new');
		});
		url = window.location.pathname + '?m=faxpro&f=action&file=' + $(this).data('fax-id');
		console.log('url', url);
		window.open(url);
	});
});
var supported_files = ['pdf', 'tif', 'tiff'];

function beforeSubmit(formData, jqForm, options) { 
	var fax_found = false
	$('#newfax [name^=newfax]').each(function(){
		var name	= $(this).val();
		var ext		= name.split('.');
		ext			= ext[ext.length -1 ].toLowerCase();
		
		//console.log(name, ext);
		//test for valid file type
		if (ext && $.inArray(ext, supported_files) == -1) { 
			notify ('Unsupported file type, removing...', '3000');
			$(this).val('');
		} else {
			fax_found = true;	
		}
	});
	

	if (!fax_found) { //test for file
		notify('Please select a file to send!','3000');
		return false;
	}	
	
	if (!$('#newfax [name=tonum]').val()){ //test for dest. num
		notify('Please enter a destination number!','3000');
		return false;
	}
	
	notify('Please wait while your fax is being sent');
}

function showResponse(responseText, statusText) { 
	console.log(responseText);
	var responseText = $.trim(responseText.replace('#!/usr/bin/php -q', ''));
	var msg = responseText ? responseText.replace(/\n/g, '<br/>') : 'Unknow state. It might have worked, it might not have...';
	
	notify(msg,'5000');
	$('.coveroptstr, .mycoveroptstr').fadeOut();
}
 
function notify(msg, time){
	if (typeof c != 'undefined') {
		clearTimeout(c)
	};
	$('.notify').fadeIn('fast').html(msg);
	if (typeof time!='undefined') {
		c = setTimeout(function(){$('.notify').fadeOut();},time);
	}
}


//Auto Expanding Text Area (1.2.2) by http://www.aclevercookie.com/facebook-like-auto-growing-textarea/
(function(jQuery){var self=null;jQuery.fn.autogrow=function(o){return this.each(function(){new jQuery.autogrow(this,o);});};jQuery.autogrow=function(e,o){this.options=o||{};this.dummy=null;this.interval=null;this.line_height=this.options.lineHeight||parseInt(jQuery(e).css('line-height'));this.min_height=this.options.minHeight||parseInt(jQuery(e).css('min-height'));this.max_height=this.options.maxHeight||parseInt(jQuery(e).css('max-height'));;this.textarea=jQuery(e);if(this.line_height==NaN)this.line_height=0;this.init();};jQuery.autogrow.fn=jQuery.autogrow.prototype={autogrow: '1.2.2'};jQuery.autogrow.fn.extend=jQuery.autogrow.extend=jQuery.extend;jQuery.autogrow.fn.extend({init: function(){var self=this;this.textarea.css({overflow: 'hidden',display: 'block'});this.textarea.bind('focus',function(){self.startExpand()}).bind('blur',function(){self.stopExpand()});this.checkExpand();},startExpand: function(){var self=this;this.interval=window.setInterval(function(){self.checkExpand()},400);},stopExpand: function(){clearInterval(this.interval);},checkExpand: function(){if(this.dummy==null){this.dummy=jQuery('<div></div>');this.dummy.css({'font-size' : this.textarea.css('font-size'),'font-family': this.textarea.css('font-family'),'width' : this.textarea.css('width'),'padding' : this.textarea.css('padding'),'line-height': this.line_height+'px','overflow-x' : 'hidden','position' : 'absolute','top' : 0,'left' :-9999}).appendTo('body');}var html=this.textarea.val().replace(/(<|>)/g,'');if($.browser.msie){html=html.replace(/\n/g,'<BR>new');}else{html=html.replace(/\n/g,'<br>new');}if(this.dummy.html()!=html){this.dummy.html(html);if(this.max_height>0&&(this.dummy.height()+this.line_height>this.max_height)){this.textarea.css('overflow-y','auto');}else{this.textarea.css('overflow-y','hidden');if(this.textarea.height()<this.dummy.height()+this.line_height||(this.dummy.height()<this.textarea.height())){this.textarea.animate({height:(this.dummy.height()+this.line_height)+'px'},100);}}}}});})(jQuery);
//jQuery Input Limiter plugin 1.1.1 by http://rustyjeans.com/jquery-plugins/input-limiter/
(function($){$.fn.inputlimiter=function(options){var opts=$.extend({},$.fn.inputlimiter.defaults,options);if(opts.boxAttach&&!$('#'+opts.boxId).length){$('<div/>').appendTo("body").attr({id: opts.boxId,'class': opts.boxClass}).css({'position': 'absolute'}).hide();if($.fn.bgiframe)$('#'+opts.boxId).bgiframe();}$(this).each(function(i){$(this).keyup(function(e){if($(this).val().length>opts.limit)$(this).val($(this).val().substring(0,opts.limit));if(opts.boxAttach){$('#'+opts.boxId).css({'width': $(this).outerWidth()-($('#'+opts.boxId).outerWidth()-$('#'+opts.boxId).width())+'px','left': $(this).offset().left+'px','top':($(this).offset().top+$(this).outerHeight())-1+'px','z-index': 2000});}var charsRemaining=opts.limit-$(this).val().length;var remText=opts.remTextFilter(opts,charsRemaining);var limitText=opts.limitTextFilter(opts);if(opts.limitTextShow){$('#'+opts.boxId).html(remText+' '+limitText);var textWidth=$("<span/>").appendTo("body").attr({id: '19cc9195583bfae1fad88e19d443be7a','class': opts.boxClass}).html(remText+' '+limitText).innerWidth();$("#19cc9195583bfae1fad88e19d443be7a").remove();if(textWidth>$('#'+opts.boxId).innerWidth()){$('#'+opts.boxId).html(remText+'<br/>'+limitText);}$('#'+opts.boxId).show();}else $('#'+opts.boxId).html(remText).show();});$(this).keypress(function(e){if((!e.keyCode||(e.keyCode>46&&e.keyCode<90))&&$(this).val().length>=opts.limit)return false;});$(this).blur(function(){if(opts.boxAttach){$('#'+opts.boxId).fadeOut('fast');}else if(opts.remTextHideOnBlur){var limitText=opts.limitText;limitText=limitText.replace(/\%n/g,opts.limit);limitText=limitText.replace(/\%s/g,(opts.limit==1?'':'s'));$('#'+opts.boxId).html(limitText);}});});};$.fn.inputlimiter.remtextfilter=function(opts,charsRemaining){var remText=opts.remText;remText=remText.replace(/\%n/g,charsRemaining);remText=remText.replace(/\%s/g,(charsRemaining==1?'':'s'));return remText;};$.fn.inputlimiter.limittextfilter=function(opts){var limitText=opts.limitText;limitText=limitText.replace(/\%n/g,opts.limit);limitText=limitText.replace(/\%s/g,(opts.limit==1?'':'s'));return limitText;};$.fn.inputlimiter.defaults={limit: 255,boxAttach: true,boxId: 'limiterBox',boxClass: 'limiterBox',remText: '%n character%s remaining.',remTextFilter: $.fn.inputlimiter.remtextfilter,remTextHideOnBlur: true,limitTextShow: true,limitText: 'Field limited to%n character%s.',limitTextFilter: $.fn.inputlimiter.limittextfilter};})(jQuery);
