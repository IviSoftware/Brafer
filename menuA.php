<?php
include_once 'datos/Conexion.php';
    session_start();
    if(!isset($_SESSION['nombre_usuario'])){
        header("Location: index.php");
    }else{
        if($_SESSION['nombre_usuario']!="Admin"){
            header("Location: index.php");
        }else{
            echo "Bienvenido";
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
    <link rel="stylesheet" href="css/menu.css">

    <link rel="stylesheet" href="css/BraferColors.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/botons.css">
    <link rel="shortcut icon" href="Iconos/Imagen-logo.ico" type="image/x-icon">
    
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
                <li><a href="Acreedores.html">Acreedores</a>
                <li><a href="Socios.html">Socios</a>
                <li><a href="Cuenta.html">Cuenta</a>
            </ul>
        </nav>

        <div id="menu-toggle" class="menu-toggle" onClick="cambiarClase()">
            <div class="hamburger"></div>
        
        </div>

    </header> <!--Termina el menu-->

    <script src="Scripts/app.js"></script>
</body>
</html>