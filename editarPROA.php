<?php
include_once 'datos/Conexion.php';
session_start();
if(!isset($_SESSION['nombre_usuario'])){
    header("Location: index.php");
}else{
    if($_SESSION['nombre_usuario']!="Admin"){
        header("Location: index.php");
    }else{
    }
}
$idP=$_GET['id'];
$conexionMate=conectar();
$conexion=conectar();
$querys=$conexionMate->prepare("SELECT idMaterial, material FROM material");
$querys->execute();
$resultado=$conexion->prepare("SELECT proveedores.idProveedor, proveedores.proveedor,proveedores.direccionPro, proveedores.telefono, proveedores.fechaCaptura,proveedores.precioMaterial ,material.material, estado.Estado, municipio.Municipio
FROM proveedores, material, estado, municipio WHERE proveedores.idProveedor=?");
$resultado->execute([$idP]);
$provedor=$resultado->fetch(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/BraferColors.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/botons.css">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/editarPROA.css">
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
            <li><a href="productosA.php">Inventario</a>
                <li><a href="VentasA.php">Ventas</a>
                <li><a href="ClientesA.php">Clientes</a>
                <li><a href="ProveedorA.php">Proveedores</a>
                <li><a href="ComprasA.php">Compras</a>
                <li><a href="Empleados.php">Empleados</a>
                <li><a href="CuentaA.php">Cuenta</a>
                <li><a href="Cuenta.html">Catalogo</a>
            </ul>
        </nav>

        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        
        </div>
    </header> <!--Termina el menu-->
   
    <!--Empieza formulario-->
    <section class="formu">
        <h3>Actualizar Proveedor</h3>
    <form method="POST"  id="frmProv" action="editarProv.php">
    <td><input type="text" class="controls" name="txtPro" value="<?php echo $provedor->proveedor;?>"  id="nom"></td>
    <td><input type="text" class="controls1" name="txtDir" value="<?php echo $provedor->direccionPro;?>"  id="dir"></td>
        <td><input type="text" class="controls" name="txtEstado" value="<?php echo $provedor->Estado;?>"  id="est"></td>
        <td><input type="text" class="controls" name="txtMunicipio" value="<?php echo $provedor->Municipio ;?>" pla id="mun"></td>
        <td><input type="text" class="controls" name="txtTel" value="<?php echo $provedor->telefono;?>"  id="tel"></td>
        <td><input type="text" class="controls" name="txtPrecio" value="<?php echo $provedor->precioMaterial;?>"  id="pre"></td>
        <td><label for="mate" id="mates">Material</label>
        <select name="idM" id="mate">
        <?php
                while ($filas = $querys->fetch(PDO::FETCH_ASSOC))
                {
            ?>
            <option value="<?php echo $filas['idMaterial'] ?>"><?php echo $filas['material'] ?></option>
            <?php
                }
            ?>
        </select></td>
        <input type="hidden" name="oculto">
        <input type="hidden" name="id" value="<?php echo $provedor->idProveedor;?>">
        <input type="submit" value="Editar Proveedor" class="boton" name="registrar" id="btnGuardar">
    </form>
    </section>

    <script src="Scripts/app.js"></script>
</body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#btnGuardar').click(function(){
                var datos=$("#frmProv").serialize();
                $.ajax({
                    type:"POST",
                    url:"editarProv.php",
                    data: datos,
                    success: function(e){
                    if(e==1){
                        alert("Proveedor actualizado");
                    }else if(e==2){
                        alert("Error");
                    }else if(e==3){
                        alert("Debe llenar todos los campos")
                    }
                    }
                });
                return false;
        });         
    });
</script>