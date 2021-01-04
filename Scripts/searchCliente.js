$(obtener_cliente());
function obtener_cliente(clientes){
    $.ajax({
        url:"../consultas/consultaCliente.php",
        type: 'POST',
        datatype:'html',
        data:{clientes,clientes},
    })
    .done(function(resultado){
        $("#miTabla").html(resultado);
    })
}

$(document).on('keyup', '#search', function(){
    var valorBusqueda=$(this).val();
    if(valorBusqueda!=""){
        obtener_cliente(valorBusqueda);
    }else{
        obtener_cliente();
    }
});