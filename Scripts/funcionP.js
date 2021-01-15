function registra_producto(){
    var parametros=new FormData($("frmP")[0]);
    $.ajax({
        data: parametros,
        url: "../insertarP.php",
        type: "POST",
        contentType: false,
        processData: false,
        beforesend: function(){

        },
        success: function(response){
            alert(response);
            console.log("si hay");
        }
    });
}