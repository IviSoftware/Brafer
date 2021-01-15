<?php
include_once 'datos/Conexion.php';
$conexionE=conectar();
$conexionM=conectar();
$conexion=conectar();
$cnx=conectar();
$idU=$_POST['id'];
$pro=$_POST['txtPro'];
$dir=$_POST['txtDir'];
$est=$_POST['txtEstado'];
$mun=$_POST['txtMunicipio'];
$tel=$_POST['txtTel'];
$pre=$_POST['txtPrecio'];
$material=$_POST['idM'];
$es=ucfirst(strtolower($est));
$mu=ucfirst(strtolower($mun));
$idE;
$idM;
//consulta
$query=$conexionE->prepare("SELECT idEstado FROM estado WHERE Estado=?");
$query->bindParam(1,$es);
$query->execute();
$raw=$query->fetch();
    if($raw){
        $idE=$raw['idEstado'];
    }else{
        $que=$conexionE->prepare("INSERT INTO estado (Estado) VALUES (?)");
        $que->bindParam(1,$es);
        $que->execute();
        $idE=$conexionE->lastInsertId();
    }
    $q=$conexionM->prepare("SELECT idMunicipio FROM municipio WHERE Municipio=? AND Estado_idEstado=?");
    $q->bindParam(1,$mu);
    $q->bindParam(2,$idE);
    $q->execute();
    $rew=$q->fetch();
    if($rew){
        $idM=$rew['idMunicipio'];
    }else{
        $qu=$conexionM->prepare("INSERT INTO municipio (Municipio, Estado_idEstado) VALUES (?,?)");
        $qu->bindParam(1,$mu);
        $qu->bindParam(2,$idE);
        $qu->execute();
        $idM=$conexionM->lastInsertId();
    }
    $querys=$conexion->prepare("UPDATE proveedores SET proveedor=?,direccionPro=?,telefono=?,Material_idMaterial=?,Estado_idEstado=?, Municipio_idMunicipio=? precioMaterial=? WHERE idProveedor=?");
    $resultado=$querys->execute([$pro,$dir,$tel,$material,$idE,$idM,$pre,$idU]);
    if($resultado===true){
        echo '1';
    }else{
        echo '2';
    }
?>