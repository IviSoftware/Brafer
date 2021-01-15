<?php
if(isset($_POST['txtCategoria'])){
    include_once 'datos/Conexion.php';
    $conexionC=conectar();
    $cate=$_POST['txtCategoria'];
    $ca=ucfirst(strtolower($cate));
    $query=$conexionC->prepare("INSERT INTO categorias (categoria) VALUES (?)");
    $query->bindParam(1,$ca);
    if($query->execute()){
        echo '1';
    }else{
        echo '2';
    }
}
?>