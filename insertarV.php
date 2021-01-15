<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d H:i:s");
include_once 'datos/Conexion.php';
$cnx=conectar();
$c=conectar();
$idC=$_POST['idC'];
$idP=$_POST['idP'];
$can=$_POST['txtC'];
$sum=0;
$querys=$cnx->prepare("SELECT precio FROM productos WHERE idProducto=?");
$querys->bindParam(1,$idP);
$querys->execute();
$raw=$querys->fetch();
if($raw){
    $sum=$raw['precio'];
}
$total=($sum*$can);
$query=$c->prepare("INSERT INTO ventas (fechaVenta, precioV, cantidad, totalVenta, clientes_idCliente, productos_idProducto) VALUES (?,?,?,?,?,?)");
$query->bindParam(1,$fechaActual);
$query->bindParam(2,$sum);
$query->bindParam(3,$can);
$query->bindParam(4,$total);
$query->bindParam(5,$idC);
$query->bindParam(6,$idP);
if($query->execute()){
    echo '1';
}else{
    echo '2';
}
?>