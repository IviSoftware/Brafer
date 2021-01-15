<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d H:i:s");
if(isset($_POST['txtPro'])&&isset($_POST['txtDir'])&&isset($_POST['txtEstado'])&&isset($_POST['txtMunicipio'])&&isset($_POST['txtTel'])&&isset($_POST['txtPrecio'])){
    include_once 'datos/Conexion.php';
    $conexionE=conectar();
    $conexionM=conectar();
    $conexion=conectar();
    $pro=$_POST['txtPro'];
    $dir=$_POST['txtDir'];
    $est=$_POST['txtEstado'];
    $mun=$_POST['txtMunicipio'];
    $tel=$_POST['txtTel'];
    $pre=$_POST['txtPrecio'];
    $material=$_POST['idM'];
    $query=$conexionE->prepare("INSERT INTO estado (Estado) VALUES (?)");
    $query->bindParam(1,$est);
    $query->execute();
    $idE=$conexionE->lastInsertId();
    $query=$conexionM->prepare("INSERT INTO municipio (Municipio, Estado_idEstado) VALUES (?,?)");
    $query->bindParam(1,$mun);
    $query->bindParam(2,$idE);
    $query->execute();
    $idM=$conexionM->lastInsertId();
    $querys=$conexion->prepare("INSERT INTO proveedores (proveedor, direccionPro, telefono, fechaCaptura, Material_idMaterial, Estado_idEstado, Municipio_idMunicipio, precioMaterial) VALUES (?,?,?,?,?,?,?,?)");
    $querys->bindParam(1,$pro);
    $querys->bindParam(2,$dir);
    $querys->bindParam(3,$tel);
    $querys->bindParam(4,$fechaActual);
    $querys->bindParam(5,$material);
    $querys->bindParam(6,$idE);
    $querys->bindParam(7,$idM);
    $querys->bindParam(8,$pre);
    if($querys->execute()){
        echo '1';
    }else{
        echo '2';
    }
}
?>