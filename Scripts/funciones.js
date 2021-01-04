function agregar_cliente(){
    var datos=$("#frmCliente").serialize();
    $.ajax({
        type:"POST",
        url:"../insertar.php",
        data: datos,
        success: function(e){
            if(e==1){
                alert("Cliente registrado");
            }
        }
        /*success: function(data){
            if($.trim(data)==='1'){
                alert("Cliente registrado");
            }else{
                alert("Error en el registro");
            }
        }*/
    });
    return false; 
}