var limite;
$(traer(),mostrar());

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