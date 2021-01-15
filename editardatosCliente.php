<?php
/*if(!isset($_POST['id'])){
    header("Location:hola.html");
}*/
include_once 'datos/Conexion.php';
$conexionE=conectar();
$conexionM=conectar();
$conexion=conectar();
$cnx=conectar();
$idU=$_POST['id'];
$nombre=$_POST['txtNombreu'];
$apellido=$_POST['txtApellidou'];
$curp=$_POST['txtCurpu'];
$dir=$_POST['txtDirecionu'];
$estado=$_POST['txtEstadou'];
$muni=$_POST['txtMunicipiou'];
$tel=$_POST['txtTelefonou'];
$email=$_POST['txtEmailu'];
$fecha=$_POST['txtFechau'];
$tipo=$_POST['txtTipou'];
$name=ucfirst(strtolower($nombre));
$ln=ucfirst(strtolower($apellido));
$es=ucfirst(strtolower($estado));
$mu=ucfirst(strtolower($muni));
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
    $querys=$conexion->prepare("UPDATE clientes SET nombreCliente=?,apellidosCliente=?,direccionCliente=?,fechaNacimiento=?,telefono=?,email=?,CURP=?,tipo=?,
    Estado_idEstado=?, Municipio_idMunicipio=? WHERE idCliente=?;");
    $resultado=$querys->execute([$name,$ln,$dir,$fecha,$tel,$email,$curp,$tipo,$idE,$idM,$idU]);
    if($resultado===true){
        echo '1';
    }else{
        echo '2';
    }
?>