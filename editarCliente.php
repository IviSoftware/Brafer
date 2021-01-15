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
$conexion=conectar();
$id=$_GET['id'];
$resultado=$conexion->prepare("SELECT clientes.idCliente, clientes.nombreCliente,clientes.apellidosCliente,clientes.direccionCliente,clientes.fechaNacimiento,clientes.telefono,clientes.email,clientes.CURP,clientes.tipo,estado.Estado,municipio.Municipio from clientes,estado,municipio WHERE clientes.idCliente=?;");
$resultado->execute([$id]);
$clientes=$resultado->fetch(PDO::FETCH_OBJ);
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
    <link rel="shortcut icon" href="../Iconos/Imagen-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/editarCliente.css">
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
    <!--Empieza el boton-->
    <h1 style="text-align: center;">Editar cliente</h1>
    <!--Empieza formulario-->
    <section class="formu">
        <h3>Editar cliente</h3>
    <form method="POST" action="editardatosCliente.php" id="frmCliente">
    <td><input type="text" class="controls" name="txtNombreu" value="<?php echo $clientes->nombreCliente;?>" id="nom"></td>
        <td><input type="text" class="controls" name="txtApellidou" value="<?php echo $clientes->apellidosCliente;?>"  id="ape"></td>
        <td><input type="text" class="controls" name="txtCurpu" value="<?php echo $clientes->CURP;?>" id="cur"></td>
        <td><input type="text" class="controls1" name="txtDirecionu" value="<?php echo $clientes->direccionCliente;?>" id="dir"></td>
        <td><input type="text" class="controls" name="txtEstadou" value="<?php echo $clientes->Estado;?>" id="est"></td>
        <td><input type="text" class="controls" name="txtMunicipiou" value="<?php echo $clientes->Municipio;?>" id="mun"></td>
        <td><input type="text" class="controls" name="txtTelefonou" value="<?php echo $clientes->telefono;?>" id="tel"></td>
        <td><input type="email" class="controls" name="txtEmailu" value="<?php echo $clientes->email;?>" id="ema"></td>
        <td><input type="text" class="controls" name="txtFechau" value="<?php echo $clientes->fechaNacimiento;?>" id="fec"></td>
        <td><label for="tiposu" id="tipsu">Tipo de cliente</label><select name="txtTipou" id="tiposu">
            <option value="normal">Normal</option>
            <option value="socio">Socio</option>
        </select></td>
        <input type="hidden" name="oculto">
        <input type="hidden" name="id" value="<?php echo $clientes->idCliente;?>">
        <input type="submit" value="Editar cliente" class="boton" name="registrar" id="btnEditar">
    </form>
    </section> 
    <script src="Scripts/app.js"></script>
</body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#btnEditar').click(function(){
            var datos=$("#frmCliente").serialize();
            $.ajax({
                type:"POST",
                url:"editardatosCliente.php",
                data: datos,
                success: function(e){
                if(e==1){
                    alert("Cliente actualizado");
                }else if(e==2){
                    alert("Error al actualizar");
                }else if(e==3){
                    alert("CURP ya utilizada")
                }
                }
            });                            
            return false;
        });         
    });
</script>