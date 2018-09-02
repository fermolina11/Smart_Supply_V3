var id;
var proveedores;
var contador = 0;

//Movimientos
function buscar_movimientos(consulta, consulta2) {
    $.ajax({
            url: uri + '/movimientos/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                tipo: consulta,
                producto: consulta2
            },
        })
        .done(function (respuesta) {
            $('#datos_mov').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

//Productos
function buscar_producto(consulta, consulta2) {
    $.ajax({
            url: uri + '/producto/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta,
                proveedor: consulta2
            },
        })
        .done(function (respuesta) {
            $('#datos').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function consultar_producto(consulta) {
    $.ajax({
            url: uri + '/producto/consultar_producto',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta
            },
        })
        .done(function (respuesta) {
            if (respuesta == "no") {
                $('#crear_detalle').slideDown();
                $('#informacion').hide();
            } else {
                mensaje = respuesta;
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function guardar_producto(consulta, consulta2, consulta3, consulta4, consulta5, consulta6) {
    $.ajax({
            url: uri + '/producto/guardar',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta,
                precio: consulta2,
                existencia: consulta3,
                stock: consulta4,
                idc: consulta5,
                idp: consulta6
            },
        })
        .done(function (respuesta) {
            if (respuesta == "no" || respuesta == "No se guardo") {
                mensaje = "Error al ejecutar la accion";
                ver_fail();
            } else {
                id = respuesta;
                $("#lista").append("<li>" + "*" + $("#proveedores_p option:selected").text() + "</li>");
                contador++;
                mensaje = "Se creo correctamente";
                ver_success();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_producto(consulta, consulta2) {
    $.ajax({
            url: uri + '/producto/estado_producto',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado del producto cambiado correctamente";
                ver_success();

                var buscar = $('#nombre_p').val();
                var buscar2 = $("#categorias_p").val();

                if (buscar != "" || buscar2 != "") {
                    buscar_producto(buscar, buscar2);
                } else {
                    buscar_producto();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_producto(consulta) {
    $.ajax({
            url: uri + '/producto/editar',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#nombre_p').val(contenido.nombre_producto);
            $('#cantidad_p').val(contenido.existencia);
            $('#stock_p').val(contenido.stock_minimo);
            $('#precio_p').val(contenido.precio_venta);
            $("#categorias_p").val(contenido.id_categoria);
            $("#categorias_p option[text=" + contenido.nombre_categoria + "]").attr("selected", "selected");
            buscar_producto($('#nombre_p').val(), $('#categorias_p').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function modificar_producto(consulta, consulta2, consulta3, consulta4, consulta5, consulta6) {
    $.ajax({
            url: uri + '/producto/modificar',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta,
                precio: consulta2,
                existencia: consulta3,
                stock: consulta4,
                idc: consulta5,
                id: consulta6
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Se modifico correctamente";
                ver_success();
                $('#añadir').show();
                $('#modificar_p').hide();
                $('#crear_producto').trigger("reset");
                buscar_producto();
            } else {
                mensaje = "Error al ejecutar la accion,intentelo de nuevo";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Detalle Productos
function buscar_detalle(consulta, consulta2) {
    $.ajax({
            url: uri + '/Detalle/tabla',
            type: 'POST',
            dataType: 'html',
            data: {
                producto: consulta,
                proveedor: consulta2
            },
        })
        .done(function (respuesta) {
            $('#registros_d').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function guardar_detalle(consulta, consulta2) {
    $.ajax({
            url: uri + '/Detalle/guardar',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                idpro: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                $("#lista").append("<li>" + "*" + $("#proveedores_p option:selected").text() + "</li>");
                contador++;
                mensaje = "Se creo correctamente";
                ver_success();
            } else {
                mensaje = "Este proveedor ya fue asignado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function listar_detalle(consulta) {
    $.ajax({
            url: uri + '/Detalle/lista_detalle',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            $('#lista').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_detalle(consulta, consulta2) {
    $.ajax({
            url: uri + '/Detalle/estado_detalle',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado cambiado correctamente";
                ver_success();

                var buscar = $('#nombre_d').val();
                var buscar2 = $('#proveedor_d').val();

                if (buscar != "" || buscar2 != "") {
                    buscar_detalle(buscar, buscar2);
                } else {
                    buscar_detalle();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Categorias
function buscar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/tabla_categorias',
            type: 'POST',
            dataType: 'html',
            data: {
                categoria: consulta
            },
        })
        .done(function (respuesta) {
            $('#datos_c').html(respuesta);
        })
        .fail(function () {
            console.log("error");
        });
}

function guardar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/guardar_categoria',
            type: 'POST',
            dataType: 'html',
            data: {
                categoria: consulta
            },
        })
        .done(function (respuesta) {
            if (respuesta == "Ya existe") {
                mensaje = respuesta;
                ver_fail();
            } else {
                mensaje = "Se guardo la categoria correctamente";
                ver_success();
                buscar_categoria();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cambiar_categoria(consulta, consulta2) {
    $.ajax({
            url: uri + '/Categoria/estado_categoria',
            type: 'POST',
            dataType: 'html',
            data: {
                id: consulta,
                estado: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Estado de la categoria cambiado correctamente";
                ver_success();

                var buscar = $('#nombre_c').val();

                if (buscar != "") {
                    buscar_categoria(buscar);
                } else {
                    buscar_categoria();
                }
            } else {
                mensaje = "Error al cambiar el estado";
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function editar_categoria(consulta) {
    $.ajax({
            url: uri + '/categoria/editar_categoria',
            type: 'POST',
            data: {
                id: consulta
            },
        })
        .done(function (respuesta) {
            var contenido = jQuery.parseJSON(respuesta);
            $('#nombre_c').val(contenido.nombre_categoria);
            buscar_categoria($('#nombre_c').val());
        })
        .fail(function () {
            console.log("error");
        });
}

function modificar_categoria(consulta, consulta2) {
    $.ajax({
            url: uri + '/categoria/modificar_categoria',
            type: 'POST',
            data: {
                id: consulta,
                nombre: consulta2
            },
        })
        .done(function (respuesta) {
            if (respuesta == "si") {
                mensaje = "Categoria modificada correctamente";
                ver_success();
                buscar_categoria($('#nombre_c').val());
                $('#guardar_c').show();
                $('#modificar_c').hide();
                id = "";
            } else {
                mensaje = respuesta;
                ver_fail();
            }
        })
        .fail(function () {
            console.log("error");
        });
}

//Cartera
function consultar_cartera(consulta) {
    $.ajax({
            url: uri + '/Cartera/buscar',
            type: 'POST',
            data: {
                cedula: consulta
            },
        })
        .done(function (respuesta) {
            console.log(JSON.stringify(respuesta));
            var contenido = jQuery.parseJSON(respuesta);
            $('#nombre_cliente').html(contenido.nombre_cliente);
            $('#cartera').html(contenido.cartera);
            $('#disponible').html((contenido.cartera) - (contenido.valor_total));
            $('#pedido').html(contenido.valor_total);
        })
        .fail(function () {
            console.log("error");
        });
}

//Login
function consultar_usuario(consulta, consulta2) {
    $.ajax({
            url: uri + '/Login/buscar',
            type: 'POST',
            dataType: 'html',
            data: {
                usuario: consulta,
                clave: consulta2,
            },
        })
        .done(function (respuesta) {
            if (respuesta == "usuario incorrecto") {
                mensaje =respuesta;
                ver_fail();
            } else {
                window.location = uri + '/Login/menu';
            }
        })
        .fail(function () {
            console.log("error");
        });
}

function cerrar() {
    $.ajax({
            url: uri + '/Login/cerrar',
            type: 'POST',
            dataType: 'html',
            data: {},
        })
        .done(function (respuesta) {
            if (respuesta == "Se cerro") {
                window.location = uri + '/Login/index';
            }
        })
        .fail(function () {
            console.log("error");
        });
}