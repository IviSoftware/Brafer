<?php
if(!isset($_GET['id'])){
    header("Location:hola.html");
}
$codigo=$_GET['id'];
include_once 'datos/Conexion.php';
$conexion=conectar();
$query=$conexion->prepare("DELETE FROM cliente WHERE idCliente = ?;");
$resultado=$query->execute([$codigo]);
if($resultado===true){
header("Location:ClientesA.php");
}
?>