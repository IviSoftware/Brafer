<?php
if(isset($_POST['txtMaterial'])){
    include_once 'datos/Conexion.php';
    $conexionC=conectar();
    $mate=$_POST['txtMaterial'];
    $ma=ucfirst(strtolower($mate));
    $query=$conexionC->prepare("INSERT INTO material (material) VALUES (?)");
    $query->bindParam(1,$ma);
    if($query->execute()){
        echo '1';
    }else{
        echo '2';
    }
}
?>