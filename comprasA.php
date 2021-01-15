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
$conexionP=conectar();
$conexionM=conectar();
$query=$conexionP->prepare("SELECT idProveedor, proveedor FROM proveedores");
$query->execute();
$querys=$conexionM->prepare("SELECT idMaterial, material FROM material");
$querys->execute();
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
    <link rel="stylesheet" href="css/comprasA.css">
    <link rel="stylesheet" href="css/container.css">
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'consultas/consultaCom.php',
				dataType:'text',
				async:false
			}).responseText;

			document.getElementById("miTabla").innerHTML = tabla;
		}
		setInterval(tiempoReal, 1000);
	</script>
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
    <h1 style="text-align: center;" >Compras</h1> 
    <!--Termina el boton-->
   
    <section class="formuC">
        <h3>Ingresar Compra</h3>
    <form method="POST" action="insertarCom.php" id="frmC">
        <td><label for="cate" id="cates">Proveedor</label>
            <select name="idP" id="cate">
                <?php
                    while ($fila = $query->fetch(PDO::FETCH_ASSOC))
                    {
                ?>
                <option value="<?php echo $fila['idProveedor'] ?>"><?php echo $fila['proveedor']; ?></option>
                <?php
                    }
                ?>
    </select></td>
    <td><label for="mate" id="mates">Material</label>
        <select name="idM" id="mate">
            <?php
                while ($fila = $querys->fetch(PDO::FETCH_ASSOC))
                {
            ?>
            <option value="<?php echo $fila['idMaterial'] ?>"><?php echo $fila['material'] ?></option>
            <?php
                }
            ?>
    </select></td>
    <td><input type="text" class="control" name="txtCan" placeholder="Cantidad de material c/u" id="can"></td>
    <input type="submit" value="Registrar compra" class="boton" name="registrar" id="btnRegistrar">
    </form>
    </section>
    <!--Empieza tabla-->
    <section id="miTablas1">
    <table class="table" style="font-size:17px; margin-top:-1%;">
        <thead>
            <tr class="active" style="width:350px">
                <th style="width:100px" scope="col">ID</th>
            <th style="width:160px" scope="col">Proveedor</th>
            <th style="width:130px" scope="col">Material</th>
            <th style="width:150px" scope="col">Precio material</th>
            <th style="width:120px" scope="col">Cantidad</th>
            <th style="width:95px" scope="col">Total</th>
            <th style="width:160px" scope="col">Fecha captura</th>
            </tr>
        </thead>
        <tbody id="miTabla">
        </tbody>
    </table>
    </section>
</body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#btnRegistrar').click(function(){
        var datos=$("#frmC").serialize();
            $.ajax({
                type:"POST",
                url:"insertarCom.php",
                data: datos,
                success: function(e){
                    if(e==1){
                        alert("Compra registrada");
                        $('#frmV')[0].reset();
                    }else if(e==2){
                        alert("Error en los datos");
                    }else if(e==3){
                        alert("Cliente ya registrado anteriormente");
                    }
                }
            });
            return false;
        });
    });         
</script>