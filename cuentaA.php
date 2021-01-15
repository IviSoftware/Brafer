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
    <link rel="stylesheet" href="css/cuentaA.css">
    <link rel="stylesheet" href="css/BraferColors.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/botons.css">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/container.css">
    
    
    <title> Cuenta | Brafer</title>
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

    <div class="containerBox" style="display: flex; flex-direction: column; align-items: center;">
        <h1 style="text-align: center;">Mi cuenta</h1>

        <label for="">Permisos : Administrador</label>
        <br>
        <br>
        <div class="BraferBlueDiv , BraferBlue">
            <a href="cerrar.php" class="aBraferBlue">Cerrar sesión</a>
        </div>

    </div>

    <script src="Scripts/app.js"></script>
</body>
</html>