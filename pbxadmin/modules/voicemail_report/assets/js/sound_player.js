
$(document).ready(function() {
	$(document).on('click','.play_sound', function() {
                play_sound($(this).data('soundId'));
        });
});


var play_sound = function(id) {
	var src = '//'
			+ window.location.host 
			+ window.location.pathname
			+ '?display='
			+ $.urlParam('display')
			+ '&action=play_sound'
			+ '&file_id=' + id;

	if (typeof a == 'undefined' || a.paused) {
		var currently_playing = true;
		a = new Audio(src);
		a.play();
	}
}
