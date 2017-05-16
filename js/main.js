$(document).ready(function() {
	var height;
    $('#login_button').on('click', function(event) {
        event.preventDefault();
        height = $(document).height() - 220;
        if($('#login_window').css('display') == 'none') {
        	$('#subscribe_window').css('display', 'none');
        	$('#login_window').css('top', height);
            $('#login_window').css('display', 'block');
        }
        else
            $('#login_window').css('display', 'none');
    });

    $('#subscribe_button').on('click', function(event) {
        event.preventDefault();
        height = $(document).height() - 220;
        if($('#subscribe_window').css('display') == 'none') {
        	$('#login_window').css('display', 'none');
        	$('#subscribe_window').css('top', height);
            $('#subscribe_window').css('display', 'block');
        }
        else
            $('#subscribe_window').css('display', 'none');
    });

    $('#nav_icon').on('click', function(event) {
        if($('#drop_down').css('display') == 'none') {
            $('#drop_down').slideDown('slow');
        }
        else {
            $('#drop_down').slideUp('slow');
        }
    });
});