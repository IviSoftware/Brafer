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
$conexion=conectar();
/*$resultado=$conexion->prepare("SELECT cliente.idCliente, cliente.nombreCliente, cliente.apellidosCliente,cliente.tipo FROM cliente");*/
$resultado=$conexion->prepare("SELECT idCliente,nombreCliente, apellidosCliente,tipo FROM cliente");
$resultado->execute();
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:900px">
	 <td style="width:71px">'.$fila['idCliente'].'</td>
	 <td style="width:190px">'.$fila['nombreCliente'].'</td>
	 <td style="width:210px">'.$fila['apellidosCliente'].'</td>
     <td style="width:170px">'.$fila['tipo'].'</td>
     <td style="width:15px"><a href="editarClienteR.php?id='.$fila['idCliente'].'" id="edit"><i class="fas fa-edit"></i></a></td>
	 </tr>';
}
?>