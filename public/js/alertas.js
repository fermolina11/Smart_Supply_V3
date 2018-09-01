var mensaje = "";

function ver_success() {
    $('.alert').css('background', 'green');
    $('.alert').css('color', 'white');
    $(".alert").html(mensaje);
    window.setTimeout(function () {
        $(".alert").slideDown(function () {
            $(".alert").fadeTo(4000, 500).slideUp(500, function () {});
        }); // 500 : Time will remain on the screen
    });
}

function ver_fail() {
    $('.alert').css('background', 'red');
    $('.alert').css('color', 'white');
    $(".alert").html(mensaje);
    window.setTimeout(function () {
        $(".alert").slideDown(function () {
            $(".alert").fadeTo(4000, 500).slideUp(500, function () {});
        }); // 500 : Time will remain on the screen
    });
}