var ajaxQueue = $({});
$.ajaxQueue = function( ajaxOpts ) {
    // Hold the original complete function.
    var oldComplete = ajaxOpts.complete;
    if (typeof($.ajaxQueue.len) == 'undefined') {
    	$.ajaxQueue.len = 1;
    } else {
	$.ajaxQueue.len++;
    }

    // Queue our ajax request.
    ajaxQueue.queue(function( next ) {
        // Create a complete callback to fire the next event in the queue.
        ajaxOpts.complete = function() {
            // Fire the original complete if it was there.
            if ( oldComplete ) {
                oldComplete.apply( this, arguments );
            }
            // Run the next query in the queue.
	    $.ajaxQueue.len--;
            next();
        };

        // Run the query.
        $.ajax( ajaxOpts );
    });
};


function setConfig(d, v, callback) {
    // Update the freepbxha config with the setting supplied
    console.log("Setting "+d+" to "+v);
    $.ajaxQueue({
        url: ajaxurl,
        beforeSend: function() { window.confqueue = window.confqueue + 1;  },
        data: { command: "setconf", data: d, value: v },
        success: function(data) {
            window.confqueue = window.confqueue - 1;
	    if (typeof(callback) == "function") { callback(data); }
        },
        error: function(data) {
            alert("System error updating "+d+"\nPlease contant support\n");
            window.confqueue = window.confqueue - 1;
        },
    });
}

function getConfig(d, c) {
    // Grab a config option, then callback c with it.
    if (typeof(c) != "function") {
        c = function(data) { console.log(data); }
    }

    // Fire off the ajax call
    $.ajaxQueue({
        url: ajaxurl,
        data: { command: "getconf", data: d },
        success: function(data) { c(data); }, // Do the callback
    });
}

function rollbackHA() {
    document.body.style.cursor = "wait";
    $("h3").nextAll().remove();
    $("h3").after('<h4>Attempting to remove HA</h4><div>It is often impossible to remove an incomplete HA install from a machine. It is usually better to do a complete reinstall if you have continued past the "Warning" page. Sorry.</div>');
    console.log("Rolling back...");
    $.ajaxQueue({
        url: ajaxurl,
            data: { command: "rollback" },
            success: function(data) {
                var u = window.location.protocol+"//"+window.location.host+"/"+window.location.pathname+"?display=freepbx_ha";
                window.location.href = u;
            },
    });
}

function getChecks(cmd, callback, completeCallback) {
    // If there is a class existing with the name of the check,
    // use that. If not, use states.
    var s = "states";
    if ($("."+cmd).length != 0) {
	    s = cmd;
    }

    $.ajaxQueue({
        url: ajaxurl,
        data: { command: cmd },
        success: function(data) {
            $.each(data, function(k, v) {
                if (typeof(v) == "object") {
                    // It has a comment.
                    var h = "<div class='"+s+"' id='"+k+"'><span class='left'>"+v[0]+"</span>";
                    h += "<span class='right'><img src='/pbxadmin/images/bullet.png'> <span class='comment'>"+v[1]+"</span></span></div>";
                } else {
                    var h = "<div class='"+s+"' id='"+k+"'><span class='left'>"+v+"</span>";
                    h += "<span class='right'><img src='/pbxadmin/images/bullet.png'> <span class='comment'></span></span></div>";
                }
                $("."+s).last().after(h);
                $("#"+k).data('pending', true);
                $("#"+k).data('complete', false);
                addCheck(k, s, cmd, callback);
            });
	    if (typeof(completeCallback) == 'function') { completeCallback(data); }
        },
    });
}

function addCheck(k, s, cmd, callback) {
   // Queues the check for that service
   $.ajaxQueue({
        url: ajaxurl,
        beforeSend: function(xhr, s) {
            $("#"+k+">.right>img").attr('src', '/pbxadmin/images/spinner.gif');
            $("#"+k+">span>.comment").fadeIn();
	    if (typeof(window.ajaxdata) != 'undefined') { s.url += "&"+$.param(window.ajaxdata); }
        },
        data: { command: cmd, runcheck: k },
        success: function(data) {
            if (typeof(data['setdata']) == "object") {
                // We've been handed back some stuff.
                $.each(data['setdata'], function(k, v) {
                        window.ajaxdata[k] = v;
                });
            }
            if (data['status'] == "ok") {
                $("#"+k+">.right>img").attr('src', '/pbxadmin/images/bullet_checked.png');
                $("#"+k+">span>.comment").fadeOut();
                $("#"+k).data('complete', true);
                $("#"+k).data('pending', false);
            } else if (data['status'] == "unimplemented") {
                $("#"+k+">.right>img").attr('src', '/pbxadmin/images/notify_error.png');
                $("#"+k+">span>.comment").fadeOut();
                $("#"+k).data('complete', true);
                $("#"+k).data('pending', false);
            } else if (data['status'] == "warning") {
                $("#"+k+">.right>img").attr('src', '/pbxadmin/images/notify_error.png');
		if (typeof(data['message']) == 'undefined') {
                	$("#"+k+">span>.comment").fadeOut();
		} else {
                	$("#"+k+">span>.comment").text(data['message']);
		}
                $("#"+k).data('complete', true);
                $("#"+k).data('pending', false);
            } else {
                $("#"+k+">.right>img").attr('src', '/pbxadmin/images/notify_critical.png');
		if (typeof(data['message']) == 'undefined') {
                	$("#"+k+">span>.comment").text(data['status']);
		} else {
                	$("#"+k+">span>.comment").text(data['message']);
		}
                $("#"+k).data('complete', false);
                $("#"+k).data('pending', false);
            }
	    // Call it with 'pending' and 'complete' state
	    var complete = true;
	    var pending = false;
	    $.each($("."+s), function() {
	      if (typeof($(this).data('complete')) != 'undefined' && $(this).data('complete') != true) { complete = false; }
	      if (typeof($(this).data('pending')) != 'undefined' && $(this).data('pending') != false) { pending = true; }
	    });
            callback(complete, pending, k);
        },
        error: function() {
           // 500 error from server.
            $("#"+k+">.right>img").attr('src', '/pbxadmin/images/notify_critical.png');
            $("#"+k+">span>.comment").fadeOut();
            $("#"+k).data('complete', false);
            $("#"+k).data('pending', false);
            callback(false, false, k);
        },
    });
}

function handleKeypress(callback) {
        if (window.kptimer) {
                window.clearTimeout(window.kptimer);
        }
        window.kptimer = window.setTimeout( function() { window.kptimer = null; callback(); }, 250);
}

function updateNodeStatus(data) {
	var th = data['thishost'];
	var oh = data['otherhost'];

	window.thishost = th;
	window.thisstatus = data[th];
	window.otherhost = oh;
	window.otherstatus = data[oh];

	var h = "<div><span style='width: 7em; float: left;'>This node is:</span><span class='hostname ";
	h += data[th]+"'>"+th+"</span></div><div><span style='width: 7em; float: left;'>";
	h += "Other node is:</span><span class='hostname "+data[oh]+"'>"+oh+"</span></div>";
	$("#nodestatus").html(h);
}

function genButton(str, other) {
	// Return the string to generate a button
	var classes = "btn ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only";
	var str = "<button class='"+classes+"' "+other+"><span class='ui-button-text'>"+str+"</span></button>";
	return str;
}

