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
    <link rel="stylesheet" href="css/clientes.css">
    <link rel="stylesheet" href="css/container.css">
    <script src="Scripts/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script type="text/javascript">
		function tiempoReal()
		{
			var tabla = $.ajax({
				url:'consultas/consultapureba.php',
				dataType:'text',
				async:false
			}).responseText;

			document.getElementById("miTabla").innerHTML = tabla;
		}
		setInterval(tiempoReal, 1000);
		</script>
    <script type="text/javascript">
        (obtener_cliente());
        function obtener_cliente(clientes){
        $.ajax({
        url:"searchs/buscarCliente.php",
        type: 'POST',
        datatype:'text',
        data:{clientes,clientes},
        })
    .done(function(resultado){
        $("#miTabla").html(resultado);
        })
        }
    $(document).on('keyup', '#search', function(){
    var valorBusqueda=$(this).val();
    if(valorBusqueda!=""){
        obtener_cliente(valorBusqueda);
    }else{
        obtener_cliente();
    }
    });
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
                <li><a href="Inventario.html">Inventario</a>
                <li><a href="Ventas.html">Ventas</a>
                <li><a href="Clientes.html">Clientes</a>
                <li><a href="Proveedores.html">Proveedores</a>
                <li><a href="Acreedores.html">Compras</a>
                <li><a href="Socios.html">Empleados</a>
                <li><a href="Cuenta.html">Cuenta</a>
            </ul>
        </nav>

        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        
        </div>
    </header> <!--Termina el menu-->
    <!--Empieza el boton-->
    <h1 style="text-align: center;">Clientes</h1>
    <div class="containerBoxClientes">
        <div class="BraferBlue , BraferBlueDiv" id="info"><a href="#" class="aBraferBlue">Ver información completa</a></div>
        <div class="BraferBlue , BraferBlueDiv" id="acre"><a href="#" class="aBraferBlue">Acredores</a></div>
    </div>
    <!--Termina el boton-->
    <div class="buscar">
        <input type="text" id="search" class="s" placeholder="Buscar cliente"><i class="fas fa-search"></i></button>
    </div>
    
    <!--Empieza formulario-->
    <section class="formu">
        <h3>Ingresar cliente</h3>
    <form method="POST" action="insertar.php" id="frmCliente">
    <td><input type="text" class="controls" name="txtNombre" placeholder="Nombre del cliente" id="nom"></td>
        <td><input type="text" class="controls" name="txtApellido" placeholder="Apellidos del cliente" id="ape"></td>
        <td><input type="text" class="controls" name="txtCurp" placeholder="CURP" id="cur"></td>
        <td><input type="text" class="controls1" name="txtDirecion" placeholder="Dirección" id="dir"></td>
        <td><input type="text" class="controls" name="txtEstado" placeholder="Estado" id="est"></td>
        <td><input type="text" class="controls" name="txtMunicipio" placeholder="Municipio" id="mun"></td>
        <td><input type="text" class="controls" name="txtTelefono" placeholder="Telefono" id="tel"></td>
        <td><input type="email" class="controls" name="txtEmail" placeholder="Email" id="ema"></td>
        <td><input type="text" class="controls" name="txtFecha" placeholder="Fecha nacimiento año/mes/dia" id="fec"></td>
        <td><label for="tipos" id="tips">Tipo de cliente</label><select name="txtTipo" id="tipos">
            <option value="normal">Normal</option>
            <option value="socio">Socio</option>
        </select></td>
        <input type="submit" value="Registrar cliente" class="boton" name="registrar" id="btnGuardar">
    </form>
    </section>
    <!--Empieza tabla-->
    <section id="miTablas">
    <table class="table" style="font-size:17px; margin-top:-1%;">
        <thead>
            <tr class="active" style="width:900px">
                <th style="width:70px" scope="col">ID</th>
                <th style="width:190px" scope="col">Nombre</th>
                <th style="width:213px" scope="col">Apellidos</th>
                <th style="width:95px" scope="col">Tipo</th>
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
                var datos=$("#frmCliente").serialize();
                $.ajax({
                    type:"POST",
                    url:"insertar.php",
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