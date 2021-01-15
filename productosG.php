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
$query=$conexionCate->prepare("SELECT idCategoria, categoria FROM categorias");
$query->execute();
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
    <link rel="stylesheet" href="css/menusP.css">
    <link rel="stylesheet" href="css/BraferColors.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/botons.css">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/productoR.css">
    <link rel="stylesheet" href="css/container.css">
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'consultas/consultaPR.php',
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
    <!--Empieza el boton-->
    <h1 style="text-align: center;">Productos</h1>
    <div class="containerBoxClientes">
        <div class="BraferBlue , BraferBlueDiv" id="info"><a href="tablaPG.php" class="aBraferBlue">Ver inventario completo</a></div>
        <div class="BraferBlue , BraferBlueDiv" id="CM"><a href="CMG.php" class="aBraferBlue">Agregar Categoria/Material</a></div>
    </div>
    <!--Termina el boton-->
    
    <!--Empieza formulario-->
    <section class="formu">
        <h3>Ingresar Producto</h3>
    <form method="POST" id="frmP" name="frmP" >
    <td><input type="text" class="controls" name="producto" placeholder="Nombre del producto" id="nom"></td>
        <td><input type="text" class="controls" name="txtCodigo" placeholder="Codigo de barras" id="cod"></td>
        <td><label for="cate" id="cates">Categoria</label>
        <select name="idC" id="cate">
            <?php
                while ($fila = $query->fetch(PDO::FETCH_ASSOC))
                {
            ?>
            <option value="<?php echo $fila['idCategoria'] ?>"><?php echo $fila['categoria'] ?></option>
            <?php
                }
            ?>
        </select></td>
        <td><textarea class="controls1" name="txtDescr" placeholder="Descripción del producto" id="des"></textarea></td>
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
        <td><input type="text" class="controls" name="txtPrecio" placeholder="Precio del producto" id="pre"></td>
        <input type="submit" value="Registrar Producto" class="boton" name="registrar" id="btnRegistrar">
    </form>
    </section>
    <!--Empieza tabla-->
    <section id="miTablas">
    <table class="table" style="font-size:17px; margin-top:-1%;">
        <thead>
            <tr class="active" style="width:900px">
                <th style="width:70px" scope="col">ID</th>
                <th style="width:221px" scope="col">Producto</th>
                <th style="width:120px" scope="col">Precio</th>
                <th style="width:130px" scope="col">Existencias</th>
                <th style="width:91px" scope="col">Editar</th>
                <th style="width:94px" scope="col">Venta</th>
                <th style="width:139px" scope="col">Añadir</th>
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
        $('#btnRegistrar').click(function(){
            var prod=$('#nom').val();
            var cod=$('#cod').val();
            var des=$('#des').val();
            var pre=$('#pre').val();
            var reg= /^([A-Za-z ñÑáéíóúÁÉÍÓÚ\d\s]{3,25})+$/i;
            var c= /^([0-9]{12})+$/;
            var p= /^([0-9]{1,9})+$/;
            var com= /^([A-Za-z ñÑáéíóúÁÉÍÓÚ 0-9]{8,60})+$/i;
            if($('#nom').val()!=""){
                if($('#cod').val()!=""){
                    if($('#des').val()!=""){
                        if($('#pre').val()!=""){
                            if(reg.test(prod)){
                                if(c.test(cod)){
                                    if(com.test(des)){
                                        if(p.test(pre)){
                                            var datos=$("#frmP").serialize();
                                            $.ajax({
                                                type:"POST",
                                                url:"insertarP.php",
                                                data: datos,
                                                success: function(e){
                                                    if(e==1){
                                                        alert("Producto registrado");
                                                        $('#frmP')[0].reset();
                                                    }else if(e==2){
                                                        alert("Error en los datos");
                                                    }else if(e==3){
                                                        alert("Producto ya registrado anteriormente");
                                                    }
                                                }
                                            });
                                        }else{
                                            alert("Debe ingresar solo números en precio");
                                        }
                                    }else{
                                        alert("Debe ingresar solo letras y números en descripción");
                                    }
                                }else{
                                    alert("Debe ingresar solo números en codigo de barras y deben ser 12 digitos");
                                }
                            }else{
                                alert("Debe ingresar solo letras en nombre del producto");
                            }
                        }else{
                            alert("Debe llenar todos los campos");
                        }
                    }else{
                        alert("Debe llenar todos los campos");
                    }
                }else{
                    alert("Debe llenar todos los campos");
                }
            }else{
                alert("Debe llenar todos los campos");
            }  
            return false;
        });         
    });
</script>
<script type="text/javascript"> 
    $(document).on("click", "#delete", function() {
        if(confirm("¿Esta seguro de eliminar el producto?")){
            var id=$(this).data("id");
            $.ajax({
                type:"POST",
                url:"eliminarProducto.php",
                data: {id: id,},
                success: function(e){
                    if(e==1){
                        alert("Producto eliminado");
                    }else if(e==2){
                        alert("Error en la eliminación");
                    }
                }
            });
        }
   });
</script>
<script type="text/javascript"> 
    $(document).on("click", "#add", function() {
        var id=$(this).data("id");
        $.ajax({
            type:"POST",
            url:"addP.php",
            data: {id: id,},
            success: function(){
                
            }
        });
   });
</script>
<script type="text/javascript"> 
    $(document).on("click", "#buy", function() {
        var id=$(this).data("id");
        $.ajax({
            type:"POST",
            url:"buyP.php",
            data: {id: id,},
            success: function(){
                
            }
        });
   });
</script>