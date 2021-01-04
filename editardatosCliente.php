<?php
if(!isset($_POST['id'])){
    header("Location:hola.html");
}
/*function conectar(){
    $servidor='localhost';
    $bd='hola';
    $user='root';
    $pass='123abc';
    try{
        $conexionDB=new PDO('mysql:host='.$servidor. ';dbname=' .$bd, $user,$pass);
        return $conexionDB;
    }catch(PDOException $ex){
        die($ex->getMessage());
    }
}*/
include_once 'datos/Conexion.php';
$conexionE=conectar();
$conexionM=conectar();
$conexion=conectar();
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
/*$query=$conexionE->prepare("UPDATE estado SET Estado=?");
$query->bindParam(1,$estado);
$query->execute();
$idE=$conexionE->lastInsertId();
$query=$conexionM->prepare("UPDATE municipio SET Municipio=?");
$query->bindParam(1,$muni);
$query->execute();
$idM=$conexionM->lastInsertId();*/
$querys=$conexion->prepare("UPDATE cliente SET nombreCliente=?,apellidosCliente=?,direccionCliente=?,fechaNacimiento=?,telefono=?,email=?,CURP=?,tipo=?,fechaCaptura=? WHERE idCliente=?;");
$resultado=$querys->execute([$nombre,$apellido,$dir,$fecha,$tel,$email,$curp,$tipo,$fecha,$idU]);
if($resultado===true){
    echo '1';
}
?>