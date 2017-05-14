$(document).ready(function() {
    $('.profile_wrapper').click(function(event) {
    	$('#subscribe_window').css('display', 'none');
    	$('#login_window').css('display', 'none');
        var id = $(this).attr('id');
        if($('#' + id).find('.description_wrapper').css('display') == 'none') {
            $('#' + id).find('.description_wrapper').slideDown('slow');
        }
        else {
            $('#' + id).find('.description_wrapper').slideUp();
        }
    });
});