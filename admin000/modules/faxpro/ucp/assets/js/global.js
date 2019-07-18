var FaxproC = UCPC.extend({
	init: function(){
		this.forwardID = null;
		this.initalized = false;
		this.faxData = {files: []};
		this.noFaxes = '<tr class="fax-message"><td colspan="8">No Faxes</td></tr>';
	},
	poll: function(data){
		if(data.status) {
			$('#usage').text(data.usage+'%');
			if($('#faxpro-badge').text() < data.new) {
				var notify = 0;
				notify = data.new - $('#faxpro-badge').text();
				if(notify > 0) {
					if(UCP.notify) {
						var plural = notify > 1 ? 'es' : '';
						var faxproNotification = new Notify('Fax', {
							body: 'You Have '+notify+' New Fax'+plural,
							icon: 'modules/Faxpro/assets/images/fax.png'
						});
						faxproNotification.show();
					}
					if($('#no-messages').length) {
						$('#no-messages').fadeOut('slow');
					}
					$.each(data.newFaxes, function( index, value ) {
						if(!$('#fax-'+index).length) {
							var message = {id: value.faxid, date: value.date, time: value.time, from: value.callid, to: value.dest, status: value.status, pages: value.pages};
							var controls = '<a onclick="Faxpro.showPDF(\''+message.id+'\')"><img src="modules/Faxpro/assets/images/fax_binoculars.png"></a><a href="?quietmode=1&amp;module=faxpro&amp;command=download&amp;faxid='+message.id+'"><img src="modules/Faxpro/assets/images/fax_diskette.png"></a><img src="modules/Faxpro/assets/images/fax_right.png"><img src="modules/Faxpro/assets/images/fax_delete.png">';
							var view = '<tr id="view-'+message.id+'" class="pdf-view"><td colspan="8"><object data="?quietmode=1&amp;module=faxpro&amp;command=view&amp;faxid='+message.id+'" type="application/pdf" width="100%" height="500px"><p>It appears your Web browser is not configured to display PDF files.No worries, just <a href="http://freepbxdev1.schmoozecom.net/ucp/?quietmode=1&amp;module=faxpro&amp;command=download&amp;faxid='+message.id+'">&gt;click here to download the PDF file.</a></p></object></td></tr>';
							$('<tr class="fax-message new"><td><img id="new-img-'+message.id+'" src="modules/Faxpro/assets/images/new.png" width="20px"></td><td>'+message.date+'</td><td>'+message.time+'</td><td>'+message.from+'</td><td>'+message.to+'</td><td>'+message.status+'</td><td>'+message.status+'</td><td>'+controls+'</td></tr>').hide().prependTo('#fax-table tbody').fadeIn("slow", function (event) {
								$(this).effect("highlight", {}, 1500);
								$(view).hide().insertAfter(this);
							});
						}
					});
				}
			}
			$('#faxpro-badge').text(data.new);

			if($('.folder[data-folder="out"].active').length) {
				if($('.fax-message').length) {
					$.each($('.fax-message'), function( index, value ) {
						var faxid = $(this).data('msg');
						var remove = true;
						if((faxid in data.activeFaxes)) {
							remove = false;
						}
						if(remove) {
							$('#fax-'+faxid).fadeOut('slow', function(event) {
								$('#fax-'+faxid).remove();
							});
							if($('.message-list tr[class!="message-header"]').length) {
								//stuff
							}
						}
					});
				}
			}
			$.each(data.folderCounts, function( index, value ) {
				if($('.folder[data-folder="'+value.folder+'"] .badge').text() < value.count) {
					$('.folder[data-folder="'+value.folder+'"]').effect("highlight", {}, 1500);
				}
				$('.folder[data-folder="'+value.folder+'"] .badge').text(value.count);
			});
		}
	},
	display: function(event) {
		$(document).on('click', '[vm-pjax] a, a[vm-pjax]', function(event) {
			event.preventDefault(); //stop browser event
			var container = $('#dashboard-content');
			$.pjax.click(event, {container: container});
		});

		var initalDropMessage = $('.faxsettings .filedrop .message').html();
		$('.faxsettings input[type="file"]').fileupload({
			url: '?quietmode=1&module=faxpro&command=upload',
			dropZone: $('.faxsettings .filedrop'),
			dataType: 'json',
			add: function (e, data) {
				$('.faxsettings .filedrop .message').text('Uploading...');
				data.submit();
			},
			done: function (e, data) {
				console.log(data.result);
				if(data.result.status) {
					var html = '<li id="attachment-'+data.result.id+'" class="list-group-item" data-filename="'+data.result.localfilename+'"><div>'+data.result.filename+' <a onclick="Faxpro.deleteAttachment(\''+data.result.id+'\')"><img src="modules/Faxpro/assets/images/delete.png"><a></div></li>';
					$('.files .list-group').append(html);
					$('.files').fadeIn('slow');
					$('.faxsettings .filedrop .pbar').css('width','0%');
					$('.faxsettings .filedrop .message').html(initalDropMessage);
					Faxpro.faxData.files.push(data.result.localfilename);
				} else {
					$('.faxsettings .filedrop .pbar').css('width','0%');
					$('.faxsettings .filedrop .message').text(data.result.message);
				}
			},
			progressall: function (e, data) {
				var progress = parseInt(data.loaded / data.total * 100, 10);
				$('.faxsettings .filedrop .pbar').css('width',progress + '%');
			},
			drop: function (e, data) {
				$('.faxsettings .filedrop').removeClass("hover");
			},
			submit: function (e, data) {
				var $this = $(this);
				data.formData = {test: '123'};
				$this.fileupload('send', data);
				return false;
			}
		});


		$('.filedrop').on('dragover', function (event) {
			if (event.preventDefault) {
				event.preventDefault(); // Necessary. Allows us to drop.
			}
			$(this).addClass("hover");
		});
		$('.filedrop').on('dragleave',function (event) {
			$(this).removeClass("hover");
		});
		$('#msg').bind('input propertychange', function() {
			var max = 1340;
			$('#msg-left').text(max - $(this).val().length);
			if((max - $(this).val().length) < 0) {
				$('#msg-left').addClass('red');
			} else {
				$('#msg-left').removeClass('red');
			}
		});
		$('.faxsettings #coversheet').change(function(event) {
			if($(this).is(':checked') && !$('.faxsettings .extras').is(':visible')) {
				$('.faxsettings .extras').slideDown('slow');
			} else if($('.faxsettings .extras').is(':visible')) {
				$('.faxsettings .extras').slideUp('slow');
			}
		});
	},
	hide: function(event) {
		$(document).off('click', '[vm-pjax] a, a[vm-pjax]');
	},
	deleteAttachment: function(id) {
		if($('#attachment-'+id).length !== 0) {
			if($('.files .list-group-item').length === 1) {
				$('.files').fadeOut('slow', function(event) {
					$.post( "?quietmode=1&module=faxpro&command=deleteattachment", {name: $('#attachment-'+id).data('filename')}, function( data ) {
						if(data.status) {
							var i = Faxpro.faxData.files.indexOf($('#attachment-'+id).data('filename'));
							if(i != -1) {
								Faxpro.faxData.files.splice(i, 1);
							}
							$('#attachment-'+id).remove();
						}
					});
				});
			} else {
				$('#attachment-'+id).fadeOut('slow', function(event) {
					$.post( "?quietmode=1&module=faxpro&command=deleteattachment", {name: $('#attachment-'+id).data('filename')}, function( data ) {
						if(data.status) {
							var i = Faxpro.faxData.files.indexOf($('#attachment-'+id).data('filename'));
							if(i != -1) {
								Faxpro.faxData.files.splice(i, 1);
							}
							$('#attachment-'+id).remove();
						}
					});
				});
			}
		}
	},
	deleteFax: function(id) {
		if(confirm("Are you sure you wish to delete this fax?")) {
			$.post( "?quietmode=1&module=faxpro&command=deletefax", {id: id}, function( data ) {
				var count = $('.folder.active .badge').text();
				$('.folder.active .badge').text(count - 1);
				$('#fax-'+id).fadeOut('slow', function(event) {
					$(this).remove();
				});
			});
		}
	},
	sendFax: function() {
		if(!$('#destination').val().length) {
			alert('Please Enter a valid Destination');
			return false;
		}
		if(!Faxpro.faxData.files.length) {
			alert('Please upload at least one file');
			return false;
		}
		$('input[type!="checkbox"][type!="file"]').each(function( index ) {
			Faxpro.faxData[$(this).prop('name')] = $(this).val();
		});
		$('input[type="checkbox"]').each(function( index ) {
			Faxpro.faxData[$(this).prop('name')] = $(this).is(':checked');
		});
		$('select').each(function( index ) {
			Faxpro.faxData[$(this).prop('name')] = $(this).val();
		});
		$('textarea').each(function( index ) {
			Faxpro.faxData[$(this).prop('name')] = $(this).val();
		});
		$('#send-btn').prop('disabled',true);
		$.post( "?quietmode=1&module=faxpro&command=sendfax", this.faxData, function( data ) {
			if(data.status) {
				$('#message').addClass('alert-success').html('Sending. <br/>Check Outgoing for more information').fadeIn('slow', function(event) {
				});
				var count = $('.folder[data-folder="out"] .badge').text();
				$('.folder[data-folder="out"] .badge').text(Number(count) + 1);
				$('.folder[data-folder="out"]').effect("highlight", {}, 1500);
			} else {
				$('#message').addClass('alert-danger').text(data.message).fadeIn('slow', function(event) {
				});
				$('#send-btn').prop('disabled',false);
			}
			$("#dashboard-content").animate({ scrollTop: 0 }, "slow");
		});
	},
	showPDF: function(id) {
		$('#view-'+id).toggle();
		if($('#fax-'+id).hasClass('new')) {
			$('#new-img-'+id).hide();
			$('#fax-'+id).removeClass('new');
			var count = $('.mailbox .folder-list .folder.active a .badge').text();
			$('.mailbox .folder-list .folder.active a .badge').text(count - 1);
			count = $('#fs-navside a[data-mod="faxpro"] .badge').text();
			$('#fs-navside a[data-mod="faxpro"] .badge').text(count - 1);
		}
	},
	saveSettings: function() {
		var data = {};
		$('input[type!="checkbox"]').each(function( index ) {
			data[$(this).prop('name')] = $(this).val();
		});
		$('input[type="checkbox"]').each(function( index ) {
			data[$(this).prop('name')] = $(this).is(':checked');
		});
		$('select').each(function( index ) {
			data[$(this).prop('name')] = $(this).val();
		});
		$.post( "?quietmode=1&module=faxpro&command=save", data, function( data ) {
			$('#message').addClass('alert-success').text('Saved Settings').fadeIn('slow', function(event) {
			});
			$("#dashboard-content").animate({ scrollTop: 0 }, "slow");
		});
	},
	forward: function(id) {
		this.forwardID = id;
		UCP.showDialog('Forward Fax','<label>Please enter a phone number or extension:<br/><input type="text" name="dest"></label></br><label class="faxlocalstore">Send to Local Extension<div class="onoffswitch"><input type="checkbox" name="faxlocalstore" class="onoffswitch-checkbox" id="faxlocal" value="true"><label class="onoffswitch-label" for="faxlocal"><div class="onoffswitch-inner"></div><div class="onoffswitch-switch"></div></label></div></label><br/><button onclick="Faxpro.forwardSend();return false;">Send</button>',200);
	},
	forwardSend: function() {
		//faxlocal
		//dest
		var dest = $('.dialog input[name="dest"]').val();
		var local = $('.dialog checkbox[name="faxlocal"]').is(':checked');
		$.post( "?quietmode=1&module=faxpro&command=forward", {dest: dest, local: local, id: this.forwardID}, function( data ) {

		});
		UCP.closeDialog();
	}
});
var Faxpro = new FaxproC();
