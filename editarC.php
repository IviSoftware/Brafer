<?php
if(!isset($_POST['idC'])){
    header("Location:hola.html");
}
include_once 'datos/Conexion.php';
$conexion=conectar();
$idC=$_POST['idC'];
$categoria=$_POST['txtCategoriau'];
$querys=$conexion->prepare("UPDATE categorias SET categoria=? WHERE idCategoria=?;");
$resultado=$querys->execute($categoria,$idC);
if($resultado===true){
    echo '1';
}
?>