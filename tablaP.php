<?php
include_once 'datos/Conexion.php';
$conexion=conectar();
$query=$conexion->prepare("SELECT P.idProveedor, P.proveedor, P.direccionPro, P.telefono, P.fechaCaptura, P.precioMaterial, E.Estado, M.Municipio, MA.material
FROM proveedores AS P
INNER JOIN estado AS E ON P.Estado_idEstado=E.idEstado
INNER JOIN municipio AS M ON E.idEstado=M.Estado_idEstado
INNER JOIN material AS MA ON P.Material_idMaterial=MA.idMaterial");
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
    <link rel="stylesheet" href="css/tablaP.css">
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
                    <th style="width:180px" scope="col">Proveedor</th>
					<th style="width:160px" scope="col">Dirección</th>
                    <th style="width:173px" scope="col">Estado</th>
                    <th style="width:165px" scope="col">Municipio</th>
					<th style="width:162px" scope="col">Material</th>
                    <th style="width:143px" scope="col">Precio</th>
                    <th style="width:190px" scope="col">Fecha captura</th>
				</tr>
			</thead>
			<tbody id="miTabla">
                <?php
                while ($fila = $query->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <tr class="active" style="width:1500px">
                    <td style="width:85px"><?php echo $fila['idProveedor'] ?></td>
                    <td style="width:176px"><?php echo $fila['proveedor'] ?></td>
                    <td style="width:160px"><?php echo $fila['direccionPro'] ?></td>
                    <td style="width:174px"><?php echo $fila['Estado'] ?></td>
                    <td style="width:165px"><?php echo $fila['Municipio'] ?></td>
                    <td style="width:160px"><?php echo $fila['material'] ?></td>
                    <td style="width:140px"><?php echo $fila['precioMaterial'] ?></td>
                    <td style="width:190px"><?php echo $fila['fechaCaptura'] ?></td>
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