jQuery(document).ready(function($) {
    $('.nav li.dropdown').hover(function() {
        $(this).addClass('hoverstate');
    }, function() {
        $(this).removeClass('hoverstate');
    });
});
