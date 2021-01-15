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
$resultado=$conexion->prepare("SELECT idProducto, nombreProducto, precio, existencias FROM productos");
$resultado->execute();
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:900px">
	 <td style="width:71px">'.$fila['idProducto'].'</td>
	 <td style="width:220px">'.$fila['nombreProducto'].'</td>
	 <td style="width:155px">'.$fila['precio'].'</td>
     <td style="width:170px">'.$fila['existencias'].'</td>
     <td style="width:15px"><a href="editarProductoG.php?idP='.$fila['idProducto'].'" id="edit"><i class="fas fa-edit"></i></a></td>
     <td style="width:95px"><button data-id='.$fila['idProducto'].' id="buy"><i class="fas fa-shopping-cart"></i></button></td>
     <td style="width:40px"><button data-id='.$fila['idProducto'].' id="add"><i class="fas fa-plus-circle"></i></button></td>
	 </tr>';
}
?>