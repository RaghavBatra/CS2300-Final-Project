$(document).ready(function() {
    $("#login_button").on('click', function(event) {
        event.preventDefault();
        if($('#login_window').css('display') == 'none') {
            $('#login_window').css('display', 'block');
        }
        else
            $('#login_window').css('display', 'none');
    });   
});