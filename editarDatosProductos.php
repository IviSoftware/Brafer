<?php
if(!isset($_POST['id'])){
    header("Location:hola.html");
}
include_once 'datos/Conexion.php';
$conexion=conectar();
$idU=$_POST['id'];
$producto=$_POST['txtProductou'];
$codigo=$_POST['txtCodigou'];
$categoria=$_POST['idC'];
$des=$_POST['txtDescru'];
$material=$_POST['idM'];
$precio=$_POST['txtPreciou'];
$querys=$conexion->prepare("UPDATE productos SET nombreProducto=?, codigoBarras=?, descripcion=?, precio=?, Categorias_idCategoria=?, Material_idMaterial=? WHERE idProducto=?;");
$resultado=$querys->execute([$producto,$codigo,$des,$precio,$categoria,$material,$idU]);
if($resultado===true){
    echo '1';
}
?>