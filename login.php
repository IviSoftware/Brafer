<?php
    include_once 'datos/Conexion.php';
    $conexion=conectar();
    if(isset($_POST['logearse'])){
        $usuario=$_POST['txtUsuario'];
        $pass=$_POST['txtPassword'];
        $query=$conexion->prepare("SELECT * FROM usuarios WHERE Usuario=:usuario AND Contrasena=:pass");
        $query->bindParam(':usuario',$usuario,PDO::PARAM_STR);
        $query->bindParam(':pass',$pass,PDO::PARAM_STR);
        $query->execute();
        if($query->rowCount()>0){
            $infoUsuario=$query->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['nombre_usuario']=$infoUsuario['Tipo'];
            if($_SESSION['nombre_usuario']=="Admin"){
                header("Location: menuA.php");
            }else if($_SESSION['nombre_usuario']=="Receptor"){
                header("Location: menuR.php");
            }else if($_SESSION['nombre_usuario']=="Gestor"){
                header("Location: menuG.php");
            }
        }else{
            header("Location: index.php");
        }
    }
?>