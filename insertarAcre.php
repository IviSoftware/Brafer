<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d H:i:s");
include_once 'datos/Conexion.php';
$cnx=conectar();
$c=conectar();
$idC=$_POST['idC'];
$can=$_POST['txtC'];
$query=$c->prepare("INSERT INTO acredores (adeudo, clientes_idCliente, fechaCapturas) VALUES (?,?,?)");
$query->bindParam(1,$can);
$query->bindParam(2,$idC);
$query->bindParam(3,$fechaActual);
if($query->execute()){
    echo '1';
}else{
    echo '2';
}
?>