<?php
if(!isset($_GET['idM'])){
    header("Location: hola.html");
}
include_once 'datos/Conexion.php';
$conexionM=conectar();
$idM=$_GET['idM'];
$res=$conexionM->prepare("SELECT idMaterial, material FROM material WHERE idMaterial=?;");
$res->execute([$idM]);
$material=$res->fetch(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="css/editarDMA.css">
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
    <!--Empieza el boton--> <h1 style="text-align: right;" class="hM">Material</h1>
    <!--Termina el boton-->
    
    <!--Empieza formulario-->
    <section class="formuM">
        <h3>Editar Material</h3>
    <form method="POST" action="editarM.php" id="frmM">
    <td><input type="text" class="controls" name="txtMaterialu" value="<?php echo $material->material; ?>" id="nom"></td>
    <input type="hidden" name="oculto">
    <input type="hidden" name="idM" value="<?php echo $material->idMaterial;?>">
    <input type="submit" value="Editar Material" class="boton" name="editarM" id="btnEM">
    </form>
    </section>
    <script src="Scripts/app.js"></script>
</body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#btnInsertar').click(function(){
                var datos=$("#frmM").serialize();
                $.ajax({
                    type:"POST",
                    url:"editarM.php",
                    data: datos,
                    success: function(a){
                    if(a==1){
                        alert("Material actualizado");
                    }else if(a==2){
                        alert("Debe llenar todos los campos");
                    }else if(a==3){
                        alert("Debe llenar todos los campos")
                    }
                    }
                });
                return false;
        });         
    });
</script>