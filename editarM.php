<?php
if(!isset($_POST['idM'])){
    header("Location:hola.html");
}
include_once 'datos/Conexion.php';
$conexion=conectar();
$idM=$_POST['idM'];
$material=$_POST['txtMaterialu'];
$querys=$conexion->prepare("UPDATE material SET material=? WHERE idMaterial=?;");
$resultado=$querys->execute($material,$idM);
if($resultado===true){
    echo '1';
}
?>