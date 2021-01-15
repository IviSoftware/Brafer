<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d H:i:s");
include_once 'datos/Conexion.php';
$cnx=conectar();
$c=conectar();
$idP=$_POST['idP'];
$idM=$_POST['idM'];
$can=$_POST['txtCan'];
$sum=0;
$querys=$cnx->prepare("SELECT precioMaterial FROM proveedores WHERE idProveedor=?");
$querys->bindParam(1,$idP);
$querys->execute();
$raw=$querys->fetch();
if($raw){
    $sum=$raw['precioMaterial'];
}
$total=($sum*$can);
$query=$c->prepare("INSERT INTO compras (fechaCompra, precioCompra, cantidadCompra, totalCompra, Material_idMaterial, Proveedores_idProveedor) VALUES (?,?,?,?,?,?)");
$query->bindParam(1,$fechaActual);
$query->bindParam(2,$sum);
$query->bindParam(3,$can);
$query->bindParam(4,$total);
$query->bindParam(5,$idM);
$query->bindParam(6,$idP);
if($query->execute()){
    echo '1';
}else{
    echo '2';
}
?>