<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d H:i:s");
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
    $idE;
    $idM;
    //consulta
    $query=$conexionE->prepare("SELECT idEstado FROM estado WHERE Estado=?");
    $query->bindParam(1,$est);
    $query->execute();
    $raw=$query->fetch();
    if($raw){
        $idE=$raw['idEstado'];
    }else{
        $query=$conexionE->prepare("INSERT INTO estado (Estado) VALUES (?)");
        $query->bindParam(1,$est);
        $query->execute();
        $idE=$conexionE->lastInsertId();
    }
    $q=$conexionM->prepare("SELECT idMunicipio FROM municipio WHERE Municipio=? AND Estado_idEstado=?");
    $q->bindParam(1,$mun);
    $q->bindParam(2,$idE);
    $q->execute();
    $rew=$q->fetch();
    if($rew){
        $idM=$rew['idMunicipio'];
    }else{
        $q=$conexionM->prepare("INSERT INTO municipio (Municipio, Estado_idEstado) VALUES (?,?)");
        $q->bindParam(1,$mun);
        $q->bindParam(2,$idE);
        $q->execute();
        $idM=$conexionM->lastInsertId();
    }
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
?>