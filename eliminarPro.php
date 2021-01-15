<?php
$codigo=$_POST['id'];
include_once 'datos/Conexion.php';
$conexion=conectar();
$query=$conexion->prepare("DELETE FROM proveedores WHERE idProveedor=?;");
$resultado=$query->execute([$codigo]);
if($resultado===true){
    echo '1';
}
?>