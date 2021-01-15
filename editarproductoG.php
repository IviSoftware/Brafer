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

$conexionCate=conectar();
$conexionMate=conectar();
$conexion=conectar();
$query=$conexionCate->prepare("SELECT idCategoria, categoria FROM categorias");
$query->execute();
$querys=$conexionMate->prepare("SELECT idMaterial, material FROM material");
$querys->execute();
$idP=$_GET['idP'];
$result=$conexion->prepare("SELECT productos.idProducto, productos.nombreProducto, productos.codigoBarras, productos.descripcion, productos.precio, productos.existencias, imagenes.foto, categorias.idCategoria, categorias.categoria, material.idMaterial, material.material FROM productos, imagenes, categorias, material WHERE productos.idProducto=?");
$result->execute([$idP]);
$producto=$result->fetch(PDO::FETCH_OBJ);
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
    <link rel="stylesheet" href="css/editarProducto.css">
    <link rel="stylesheet" href="css/container.css">
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'consultas/consultaPA.php',
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

    <!--Empieza formulario-->
    <section class="formu">
        <h3>Editar Producto</h3>
    <form method="POST" action="editarDatosProductos.php" id="frmPu" enctype="multipart/form-data">
    <td><input type="text" class="controls" name="txtProductou" value="<?php echo $producto->nombreProducto; ?>" id="nom"></td>
        <td><input type="text" class="controls" name="txtCodigou" value="<?php echo $producto->codigoBarras; ?>" id="cod"></td>
        <td><input type="text" class="controls" name="txtExiu" value="<?php echo $producto->existencias; ?>" id="cod"></td>
        <td><label for="cate" id="cates">Categoria</label>
        <select name="idC" id="cate">
        <option value="<?php echo $producto->idCategoria; ?>"><?php echo $producto->categoria; ?></option>
            <?php
            
                while ($fila = $query->fetch(PDO::FETCH_ASSOC))
                {
            ?>
            <option value="<?php echo $fila['idCategoria'] ?>"><?php echo $fila['categoria'] ?></option>
            <?php
                }
            ?>
        </select></td>
        <td><textarea class="controls1" name="txtDescru" id="des"><?php echo $producto->descripcion; ?></textarea></td>
        <td><label for="mate" id="mates">Material</label>
        <select name="idM" id="mate">
        <option value="<?php echo $producto->idMaterial; ?>"><?php echo $producto->material; ?></option>
        <?php
                while ($filas = $querys->fetch(PDO::FETCH_ASSOC))
                {
            ?>
            <option value="<?php echo $filas['idMaterial'] ?>"><?php echo $filas['material'] ?></option>
            <?php
                }
            ?>
        </select></td>
        <td><input type="text" class="controls" name="txtPreciou" value="<?php echo $producto->precio; ?>" id="pre"></td>
        <td><label type="text">Seleccione una imagen</label></td>
        <td><input type="file" class="controls" name="txtImageu" value="<?php echo $producto->foto; ?>" id="ima"></td>
        <input type="hidden" name="oculto">
        <input type="hidden" name="id" value="<?php echo $producto->idProducto;?>">
        <input type="submit" value="Editar Producto" class="boton" name="registrar" id="btnEditar">
    </form>
    </section>
   
    <script src="Scripts/app.js"></script>
</body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#btnEditar').click(function(){
                var datos=$("#frmPu").serialize();
                $.ajax({
                    type:"POST",
                    url:"editarDatosProductos.php",
                    data: datos,
                    success: function(e){
                    if(e==1){
                        alert("Producto actualizado");
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