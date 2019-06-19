$(document).ready(function () {
var select_theme = $('#select_theme');

    select_theme.on('change', function(e){
        var form = $(this).closest('form');
        form.attr("action", "/posts/theme/"+select_theme.val());
        form.submit();
    });

});