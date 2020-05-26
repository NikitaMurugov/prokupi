$(document).ready(function () {
    $('.row-conformity > [class*=col-]').conformity();
    $(window).on('resize scroll', function() {
        $('.row-conformity > [class*=col-]').conformity();
    });
});
