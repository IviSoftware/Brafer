<?php
function conectar(){
    $servidor='localhost';
    $bd='muebles';
    $user='root';
    $pass='123abc';
    try{
        $conexionDB=new PDO('mysql:host='.$servidor. ';dbname=' .$bd, $user,$pass);
        return $conexionDB;
    }catch(PDOException $ex){
        die($ex->getMessage());
    }
}
$conexionC=conectar();
$query=$conexionC->prepare("SELECT idMaterial, material FROM material");
$query->execute();
while ($filas = $query->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:500px">
	 <td style="width:135px">'.$filas['idMaterial'].'</td>
	 <td style="width:168px">'.$filas['material'].'</td>
     <td><a href="editarDMG.php?idM='.$filas['idMaterial'].'" id="edit"><i class="fas fa-edit"></i></a></td>
	 </tr>';
}
?>