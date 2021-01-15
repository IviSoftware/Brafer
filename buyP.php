<?php
$co=$_POST['id'];
include_once 'datos/Conexion.php';
$cnx=conectar();
$query=$cnx->prepare("UPDATE productos SET existencias=existencias-1 WHERE idProducto=?");
$query->bindParam(1,$co);
$res=$query->execute();
if($res===true){
    echo 'bien';
}else{
    echo 'mal';
}
?>