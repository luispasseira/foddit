$(document).ready(function () {
    var input_theme = $('#input_theme');
    var select_theme = $('#select_theme');


    // if (select_theme.length < 2) {
    //     select_theme.empty();
    //     select_theme.append("<option>No themes available</option>");
    //     select_theme.prop('disabled', 'disabled');
    // }

    input_theme.on('keydown', function () {
        if ($(this).val() - 1) {
            select_theme.prop("disabled", true);
        }
    });
    input_theme.on('blur', function () {
        if (!$(this).val()) {
            select_theme.prop("disabled", false);
        }
    });


});