<?php
include_once 'datos/Conexion.php';
$conexionMate=conectar();
$querys=$conexionMate->prepare("SELECT idMaterial, material FROM material");
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
    <link rel="stylesheet" href="css/proveeA.css">
    <link rel="stylesheet" href="css/container.css">
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'consultas/consultaPROA.php',
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
    <h1 style="text-align: center;">Proveedor</h1>
    <div class="containerBoxClientes">
        <div class="BraferBlue , BraferBlueDiv" id="info"><a href="tablaP.php" class="aBraferBlue">Ver información completa</a></div>
    </div>
    <!--Termina el boton-->
   
    <!--Empieza formulario-->
    <section class="formu">
        <h3>Ingresar Proveedor</h3>
    <form method="POST" action="insertarPro.php" id="frmProv">
    <td><input type="text" class="controls" name="txtPro" placeholder="Nombre del Proveedor" id="nom"></td>
    <td><input type="text" class="controls1" name="txtDir" placeholder="Dirección del proveedor" id="dir"></td>
        <td><input type="text" class="controls" name="txtEstado" placeholder="Estado" id="est"></td>
        <td><input type="text" class="controls" name="txtMunicipio" placeholder="Municipio" id="mun"></td>
        <td><input type="text" class="controls" name="txtTel" placeholder="Telefono proveedor" id="tel"></td>
        <td><input type="text" class="controls" name="txtPrecio" placeholder="Precio del material" id="pre"></td>
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
        <input type="submit" value="Registrar Proveedor" class="boton" name="registrar" id="btnGuardar">
    </form>
    </section>
    <!--Empieza tabla-->
    <section id="miTablas">
    <table class="table" style="font-size:17px; margin-top:-1%;">
        <thead>
            <tr class="active" style="width:900px">
                <th style="width:70px" scope="col">ID</th>
                <th style="width:170px" scope="col">Proveedor</th>
                <th style="width:130px" scope="col">Material</th>
                <th style="width:110px" scope="col">Precio</th>
                <th style="width:90px" scope="col">Editar</th>
                <th style="width:139px" scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody id="miTabla">
        </tbody>
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
                    url:"insertarPro.php",
                    data: datos,
                    success: function(e){
                    if(e==1){
                        alert("Cliente registrado");
                    }else if(e==2){
                        alert("Debe llenar todos los campos");
                    }else if(e==3){
                        alert("Debe llenar todos los campos")
                    }
                    }
                });
                return false;
        });         
    });
</script>