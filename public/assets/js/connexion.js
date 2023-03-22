$(document).ready(function () {
    $('.toggle-password').click(function () {
        var input = $(this).parents('.input-group').find('input');
        if (input.attr('type') == 'password') {
            input.attr('type', 'text');
            $(this).html('<i class="bi bi-eye"></i>');
        } else {
            input.attr('type', 'password');
            $(this).html('<i class="bi bi-eye-slash"></i>');
        }
    });
});