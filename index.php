<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles_login.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/botons.css">
    <link rel="stylesheet" href="css/BraferColors.css">
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">

    


    <title>Login | Brafer </title>
</head>
<body>


    <div class="card-formulario">
    
       <header class="header_logo">
        <img  class="img_logo" 
        src="https://i.postimg.cc/nh4D9Z7J/Imagen-logo.png" alt="Logo">
        </header>
    
        
        <form  class="formulario" id="frmI">
            <h1 class="title_login">Login</h1>

            <label class="label_login">
                
                <span>Ingresa tu correo</span>

                <input  class="input_login" type="text" placeholder="Correo" name="txtUsuario">
            </label>

            
            <label class="label_login">
                <span>Ingresa tu contraseña</span>

                <input  class="input_login" type="password" placeholder="contraseña" name="txtPass">
            </label>

            <input type="submit" value="Iniciar sesión"  class="BraferWood" id="btnGuardar">
        </form>
    </div>

</body>
</html>
<script type="text/javascript"> 
$(document).ready(function(){
    $('#btnGuardar').click(function(){
        var datos=$("#frmI").serialize();
        $.ajax({
            type:"POST",
            url:"validar.php",
            data: datos,
            success: function(e){
                if(e==1){
                    location.href='cuentaA.php';
                    alert("Bienvenido Administrador");
                }else if(e==2){
                    location.href='cuentaR.php';
                    alert("Bienvenido Recepcionista");
                }else if(e==3){
                    location.href='cuentaG.php';
                    alert("Bienvenido Gestor");
                }else if(e==4){
                    alert("Login incorrecto");
                }
            }
        });
        return false;
    });
});
</script>