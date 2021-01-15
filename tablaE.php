<?php
include_once 'datos/Conexion.php';
$conexion=conectar();
$query=$conexion->prepare("SELECT * FROM empleado");
$query->execute();
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
    <link rel="stylesheet" href="css/tablaE.css">
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
    <h1 style="text-align: center;" >Información completa</h1> 
    <section id="miTablas">
		<table class="table" style="font-size:12px; margin-top:-1%;">
			<thead>
				<tr class="active" style="width:1200px">
					<th style="width:80px" scope="col">ID</th>
                    <th style="width:180px" scope="col">Nombre</th>
					<th style="width:160px" scope="col">Apellido</th>
                    <th style="width:173px" scope="col">Fecha nacimiento</th>
                    <th style="width:120px" scope="col">RFC</th>
					<th style="width:142px" scope="col">Puesto</th>
                    <th style="width:143px" scope="col">Horas trabajo</th>
                    <th style="width:190px" scope="col">Sueldo</th>
                    <th style="width:190px" scope="col">Fecha captura</th>
				</tr>
			</thead>
			<tbody id="miTabla">
                <?php
                while ($fila = $query->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <tr class="active" style="width:1500px">
                    <td style="width:85px"><?php echo $fila['idCliente'] ?></td>
                    <td style="width:176px"><?php echo $fila['nombreCliente'] ?></td>
                    <td style="width:160px"><?php echo $fila['apellidosCliente'] ?></td>
                    <td style="width:174px"><?php echo $fila['direccionCliente'] ?></td>
                    <td style="width:123px"><?php echo $fila['Estado'] ?></td>
                    <td style="width:140px"><?php echo $fila['Municipio'] ?></td>
                    <td style="width:140px"><?php echo $fila['telefono'] ?></td>
                    <td style="width:190px"><?php echo $fila['email'] ?></td>
                    <td style="width:275px"><?php echo $fila['CURP'] ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
		</section>
    
    <!--Empieza tabla-->
    
</body>
</html>