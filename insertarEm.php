<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d H:i:s");
    include_once 'datos/Conexion.php';
    $conexion=conectar();
    $nombre=$_POST['txtNombre'];
    $apellido=$_POST['txtApellido'];
    $fecha=$_POST['txtFecha'];
    $rfc=$_POST['txtRFC'];
    $puesto=$_POST['txtPuesto'];
    $horas=$_POST['txtH'];
    $suelo=$_POST['txtSueldo'];
    $query=$conexion->prepare("INSERT INTO empleados (nombreEmpleado, apellidosEmpleado, fechaNacimiento, RFC, puesto, horasTrabajo, sueldo, fechaCaptura) VALUES (?,?,?,?,?,?,?,?)");
    $query->bindParam(1,$nombre);
    $query->bindParam(2,$apellido);
    $query->bindParam(3,$fecha);
    $query->bindParam(4,$rfc);
    $query->bindParam(5,$puesto);
    $query->bindParam(6,$horas);
    $query->bindParam(7,$suelo);
    $query->bindParam(8,$fechaActual);
    if($query->execute()){
        echo '1';
    }else{
        echo '2';
    }
?>