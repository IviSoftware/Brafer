<?php
include_once 'datos/Conexion.php';
$conexion=conectar();
$usuario=$_POST['txtUsuario'];
$pass=$_POST['txtPass'];
$query=$conexion->prepare("SELECT * FROM usuarios WHERE usuario=? AND passwor=?");
//$query->bindParam(':usuario',$usuario,PDO::PARAM_STR);
//$query->bindParam(':pass',$pass,PDO::PARAM_STR);
$query->bindParam(1,$usuario);
$query->bindParam(2,$pass);
$query->execute();
if($query->rowCount()>0){
    $infoUsuario=$query->fetch(PDO::FETCH_ASSOC);
    session_start();
    $_SESSION['nombre_usuario']=$infoUsuario['rol'];
    if($_SESSION['nombre_usuario']=="Admin"){
        //("Location: cuentaA.php");
        echo '1';
    }else if($_SESSION['nombre_usuario']=="Receptor"){
        //header("Location: cuentaR.php");
        echo '2';
    }else if($_SESSION['nombre_usuario']=="Gestor"){
        //header("Location: cuentaG.php");
        echo '3';
    }else{
        echo '4';
    }
}else{
    echo '4';
}

?>