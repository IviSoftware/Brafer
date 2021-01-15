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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="css/cuentaG.css">

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

    <div class="containerBox" style="display: flex; flex-direction: column; align-items: center;">
        <h1 style="text-align: center;">Mi cuenta</h1>

        <label for="">Permisos : Gestor</label>
        <br>
        <br>
        <div class="BraferBlueDiv , BraferBlue">
            <a href="cerrar.php" class="aBraferBlue">Cerrar sesión</a>
        </div>

    </div>

    <script src="Scripts/app.js"></script>
</body>
</html>