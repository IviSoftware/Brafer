<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5725e9fd23.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/menuC.css">
    <link rel="stylesheet" href="css/BraferColors.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/botons.css">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/CMA.css">
    <link rel="stylesheet" href="css/container.css">
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'consultas/consultaCA.php',
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
    <h1 style="text-align: left;" class="hC">Categoria</h1> <h1 style="text-align: right;" class="hM">Material</h1>
    <!--Termina el boton-->
    
    <!--Empieza formulario-->
    <section class="formuC">
        <h3>Ingresar Categoria</h3>
    <form method="POST" action="insertarC.php" id="frmC">
    <td><input type="text" class="control" name="txtCategoria" placeholder="Nombre de la categoria" id="nom"></td>
    <input type="submit" value="Registrar Categoria" class="boton" name="registrar" id="btnRegistrar">
    </form>
    </section>

    <!--Empieza formulario-->
    <section class="formuM">
        <h3>Ingresar Material</h3>
    <form method="POST" action="insertarM.php" id="frmM">
    <td><input type="text" class="controls" name="txtMaterial" placeholder="Nombre del material" id="nom"></td>
    <input type="submit" value="Registrar Material" class="boton" name="registrar" id="btnInsertar">
    </form>
    </section>
    
    <!--Empieza tabla-->
    <section id="miTablas">
    <table class="table" style="font-size:17px; margin-top:-1%;">
        <thead>
            <tr class="active" style="width:350px">
                <th style="width:130px" scope="col">ID</th>
            <th style="width:160px" scope="col">Categoria</th>
            <th style="width:130px" scope="col">Editar</th>
            </tr>
        </thead>
        <tbody id="miTabla">
        </tbody>
    </table>
    </section>
    <!--Empieza tabla-->
    <section id="miTablas1">
    <table class="table" style="font-size:17px; margin-top:-1%;">
        <thead>
            <tr class="active" style="width:350px">
                <th style="width:130px" scope="col">ID</th>
            <th style="width:160px" scope="col">Material</th>
            <th style="width:130px" scope="col">Editar</th>
            </tr>
        </thead>
        <tbody id="miTabla1">
        </tbody>
    </table>
    </section>
    <script src="Scripts/app.js"></script>
</body>
</html>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#btnRegistrar').click(function(){
                var datos=$("#frmC").serialize();
                $.ajax({
                    type:"POST",
                    url:"insertarC.php",
                    data: datos,
                    success: function(r){
                    if(r==1){
                        alert("Categoria registrada");
                    }else if(r==2){
                        alert("Debe llenar todos los campos");
                    }else if(r==3){
                        alert("Debe llenar todos los campos")
                    }
                    }
                });
                return false;
        });         
    });
</script>
<script type="text/javascript"> 
    $(document).ready(function(){
        $('#btnInsertar').click(function(){
                var datos=$("#frmM").serialize();
                $.ajax({
                    type:"POST",
                    url:"insertarM.php",
                    data: datos,
                    success: function(a){
                    if(a==1){
                        alert("Material registrado");
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

<script type="text/javascript">
		function tiemposR()
		{
			var tablas = $.ajax({
				url:'consultas/consultaMA.php',
				dataType:'text',
				async:false
			}).responseText;

			document.getElementById("miTabla1").innerHTML = tablas;
		}
		setInterval(tiemposR, 1000);
</script>