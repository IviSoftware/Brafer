<?php
$codigo=$_POST['id'];
include_once 'datos/Conexion.php';
$conexion=conectar();
$query=$conexion->prepare("DELETE FROM productos WHERE idProducto = ?;");
$resultado=$query->execute([$codigo]);
if($resultado===true){
    echo '1';
}
?>