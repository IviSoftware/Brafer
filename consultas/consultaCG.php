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
$query=$conexionC->prepare("SELECT idCategoria, categoria FROM categorias");
$query->execute();
while ($fila = $query->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:500px">
	 <td style="width:135px">'.$fila['idCategoria'].'</td>
     <td style="width:168px">'.$fila['categoria'].'</td>
     <td><a href="editarDCG.php?idC='.$fila['idCategoria'].'" id="edit"><i class="fas fa-edit"></i></a></td>
	 </tr>';
}
?>