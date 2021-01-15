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
$conexion=conectar();
$query=$conexion->prepare("SELECT P.idProducto, P.nombreProducto, P.codigoBarras, P.descripcion, P.precio, P.existencias, C.categoria, M.material, P.fechaCaptura FROM productos AS P
INNER JOIN categorias AS C ON P.Categorias_idCategoria=C.idCategoria
INNER JOIN material AS M ON P.Material_idMaterial=M.idMaterial");
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
    <link rel="stylesheet" href="css/menusP.css">
    <link rel="stylesheet" href="css/BraferColors.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/botons.css">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/tablaPA.css">
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
    <h1 style="text-align: center;" >Información completa</h1> 
    <section id="miTablas">
		<table class="table" style="font-size:12px; margin-top:-1%;">
			<thead>
				<tr class="active" style="width:1200px">
					<th style="width:80px" scope="col">ID</th>
                    <th style="width:180px" scope="col">Producto</th>
					<th style="width:160px" scope="col">Codigo de barras</th>
                    <th style="width:190px" scope="col">Descripción</th>
                    <th style="width:120px" scope="col">Precio</th>
					<th style="width:142px" scope="col">Existencias</th>
                    <th style="width:143px" scope="col">Categoria</th>
                    <th style="width:150px" scope="col">Material</th>
                    <th style="width:190px" scope="col">Fecha captura</th>
				</tr>
			</thead>
			<tbody id="miTabla">
                <?php
                while ($fila = $query->fetch(PDO::FETCH_ASSOC))
                {
                ?>
                <tr class="active" style="width:1500px">
                    <td style="width:85px"><?php echo $fila['idProducto'] ?></td>
                    <td style="width:179px"><?php echo $fila['nombreProducto'] ?></td>
                    <td style="width:160px"><?php echo $fila['codigoBarras'] ?></td>
                    <td style="width:189px"><?php echo $fila['descripcion'] ?></td>
                    <td style="width:148px"><?php echo $fila['precio'] ?></td>
                    <td style="width:115px"><?php echo $fila['existencias'] ?></td>
                    <td style="width:140px"><?php echo $fila['categoria'] ?></td>
                    <td style="width:150px"><?php echo $fila['material'] ?></td>
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