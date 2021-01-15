<?php
include_once 'datos/Conexion.php';
session_start();
if(!isset($_SESSION['nombre_usuario'])){
    header("Location: index.php");
}else{
    if($_SESSION['nombre_usuario']!="Gestor"){
        header("Location: index.php");
    }else{
    }
}

$conexionC=conectar();
$idC=$_GET['idC'];
$resultado=$conexionC->prepare("SELECT idCategoria, categoria FROM categorias WHERE idCategoria=?;");
$resultado->execute([$idC]);
$categoria=$resultado->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5725e9fd23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/menusP.css">
    <link rel="stylesheet" href="css/BraferColors.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/botons.css">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/CMA.css">
    <link rel="stylesheet" href="css/container.css">
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <title>Menu | Brafer</title>
</head>
<body>
    <header> <!--Inicia el menu-->
        <div class="container">
            <img  class="logo" src="https://i.postimg.cc/nh4D9Z7J/Imagen-logo.png" alt="Logo" width="60px">
        </div>
    
        <nav id="site-nav" class="site-nav">
            <ul>
            <li><a href="productosG.php">Inventario</a>
                <li><a href="ProveedorG.php">Proveedores</a>
                <li><a href="comprasG.php">Compras</a>
                <li><a href="cuentaG.php">Cuenta</a>
                <li><a href="Cuenta.html">Catalogo</a>
            </ul>
        </nav>

        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        
        </div>
    </header> <!--Termina el menu-->
    <!--Empieza el boton-->
    <h1 style="text-align: left;" class="hC">Categoria</h1>
    <!--Termina el boton-->
    
    <!--Empieza formulario-->
    <section class="formuC">
        <h3>Editar Categoria</h3>
    <form method="POST" action="editarC.php" id="frmCu">
    <td><input type="text" class="control" name="txtCategoriau" value="<?php echo $categoria->categoria; ?>" id="nom"></td>
    <input type="hidden" name="oculto">
    <input type="hidden" name="idC" value="<?php echo $categoria->idCategoria;?>">
    <input type="submit" value="Editar Categoria" class="boton" name="editarC" id="btnEC">
    </form>
    </section>
</body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#btnEC').click(function(){
                var datos=$("#frmCu").serialize();
                $.ajax({
                    type:"POST",
                    url:"editarC.php",
                    data: datos,
                    success: function(r){
                    if(r==1){
                        alert("Categoria Actualizada");
                    }else if(r==2){
                        alert("Debe llenar todos los campos");
                    }else if(r==3){
                        alert("Debe llenar todos los campos")
                    }
                    }
                });
                return false;
        });         
    });
</script>
