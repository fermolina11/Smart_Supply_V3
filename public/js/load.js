var limite;
$(traer(),mostrar(),menus());

function menus(){
    if($('#user_log').val() == 1){
        
    }else if ($('#user_log').val() == 2){
        $('#clientes').hide();
        $('#usuarios').hide();
        $('#rutas').hide();
        $('#carteras').hide();
    }else if($('#user_log').val() == 3){
        $('#compras').hide();
        $('#usuarios').hide();
        $('#rutas').hide();
        $('#carteras').hide();
        $('#proveedores').hide();
        $('#productos').hide();
    }
}

function traer(){
    if($('#carga').val() == "1"){
        $('#contenido').html("");
        $('#contenido').load(uri + '/Producto/index');
    }
}

function mostrar(){
    if($('#org').val() != ""){
        mensaje = $('#org').val();
        ver_success();
    }
}

$(document).on('click','#usuarios', function(){
    $('#contenido').html("");
});

$(document).on('click','#clientes', function(){
    $('#contenido').html("");
});

$(document).on('click','#proveedores', function(){
    $('#contenido').html("");
    $('#contenido').load(uri + '/Proveedor/index');
});

$(document).on('click','#productos', function(){
    $('#contenido').html("");
    $('#contenido').load(uri + '/Producto/index');
    buscar_detalle();
});

$(document).on('click','#carteras', function(){
    $('#contenido').html("");
    $('#contenido').load(uri + '/cartera/index');
    buscar_detalle();
});