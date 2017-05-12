$(document).ready(function() {
    $('.profile_wrapper').click(function(event) {
        var id = $(this).attr('id');
        if($('#' + id).find('.description_wrapper').css('display') == 'none') {
            $('#' + id).find('.description_wrapper').slideDown('slow');
        }
        else {
            $('#' + id).find('.description_wrapper').slideUp();
        }
    });
});