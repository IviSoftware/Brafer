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
    <h1 style="text-align: center;">Clientes</h1>
    <div class="containerBoxClientes">
        <div class="BraferBlue , BraferBlueDiv" id="info"><a href="tablaCA.php" class="aBraferBlue">Ver información completa</a></div>
        <div class="BraferBlue , BraferBlueDiv" id="acre"><a href="#" class="aBraferBlue">Acreedores</a></div>
    </div>
    <!--Termina el boton-->
   
    <!--Empieza formulario-->
    <section class="formu">
        <h3>Ingresar cliente</h3>
    <form method="POST" id="frmCliente" action="insertar.php">
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
            var name=$('#nom').val();
            var ln=$('#ape').val();
            var cur=$('#cur').val();
            var dir=$('#dir').val();
            var est=$('#est').val();
            var mun=$('#mun').val();
            var tel=$('#tel').val();
            var ema=$('#ema').val();
            var fec=$('#fec').val();
            var reg= /^([A-Za-z ñÑáéíóúÁÉÍÓÚ\d\s]{3,25})+$/i;
            var num= /^([0-9]{9,13})+$/;
            var com= /^([a-zA-Z ñáéíóúÑÁÉÍÓÚ\d\s0-9-]{8,90})+$/i;
            var cor= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var may= /^([A-Z 0-9]{18})+$/i;
            var fe= /^([0-9]{4})*([\-])*([0-9]{2})*([\-])*([0-9]{2})+$/;
            if($('#nom').val()!=""){
                if($('#ape').val()!=""){
                    if($('#cur').val()!=""){
                        if($('#dir').val()!=""){
                            if($('#est').val()!=""){
                                if($('#mun').val()!=""){
                                    if($('#tel').val()!=""){
                                        if($('#ema').val()!=""){
                                            if($('#fec').val()!=""){
                                                if(reg.test(name)){
                                                    if(reg.test(ln)){
                                                        if(may.test(cur)){
                                                            if(com.test(dir)){
                                                                if(reg.test(est)){
                                                                    if(reg.test(mun)){
                                                                        if(num.test(tel)){
                                                                            if(cor.test(ema)){
                                                                                if(fe.test(fec)){
                                                                                    var datos=$("#frmCliente").serialize();
                                                                                    $.ajax({
                                                                                        type:"POST",
                                                                                        url:"insertar.php",
                                                                                        data: datos,
                                                                                        success: function(e){
                                                                                            if(e==1){
                                                                                                alert("Cliente registrado");
                                                                                                $('#frmCliente')[0].reset();
                                                                                            }else if(e==2){
                                                                                                alert("Error en los datos");
                                                                                            }else if(e==3){
                                                                                                alert("Cliente ya registrado anteriormente");
                                                                                            }
                                                                                        }
                                                                                    });
                                                                                }else{
                                                                                    alert("Debe ingresar solo numeros y / en la fecha \nCon el formato año/mes/dia\nEjemplo: 2020/11/03");
                                                                                }
                                                                            }else{
                                                                                alert("Debe ingresar un correo valido ejemplo@ejemplo.com");
                                                                            }
                                                                        }else{
                                                                            alert("Debe ingresar solo números en telefono");
                                                                        }
                                                                    }else{
                                                                        alert("Debe ingresar solo letras en el campo municipio");
                                                                    }
                                                                }else{
                                                                    alert("Debe ingresar solo letras en el campo estado");
                                                                }
                                                            }else{
                                                                alert("Solo son validos: letras, numeros y - en el campo dirección");
                                                            }
                                                        }else{
                                                            alert("Debe ingresar solo MAYUSCULAS y números en el CURP \nDeben ser 18 digitos");
                                                        }
                                                    }else{
                                                        alert("Debe ingresar solo letras en el campo apellidos");
                                                    }
                                                }else{
                                                    alert("Debe ingresar solo letras en el campo nombre");
                                                }
                                            }else{
                                                alert("Todos los campos deben estar llenos");
                                            }
                                        }else{
                                            alert("Todos los campos deben estar llenos");
                                        }
                                    }else{
                                        alert("Todos los campos deben estar llenos");
                                    }
                                }else{
                                    alert("Todos los campos deben estar llenos");
                                }
                            }else{
                                alert("Todos los campos deben estar llenos");
                            }
                        }else{
                            alert("Todos los campos deben estar llenos");
                        }    
                    }else{
                        alert("Todos los campos deben estar llenos");
                    }
                }else{
                    alert("Todos los campos deben estar llenos");
                }
            }else{
                alert("Todos los campos deben estar llenos");
            }
            return false;
        });         
    });
</script>
<script type="text/javascript"> 
    $(document).on("click", "#delete", function() {
        if(confirm("¿Esta seguro de eliminar el cliente?")){
            var id=$(this).data("id");
            $.ajax({
                type:"POST",
                url:"eliminarCliente.php",
                data: {id: id,},
                success: function(e){
                    if(e==1){
                        alert("Cliente eliminado");
                    }else if(e==2){
                        alert("Error en la eliminación");
                    }
                }
            });
        }
   });
</script>