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
$resultado=$conexion->prepare("SELECT V.idVenta, V.fechaVenta, V.precioV, V.cantidad, V.totalVenta, C.nombreCliente, C.apellidosCliente, P.nombreProducto
FROM ventas AS V
INNER JOIN clientes AS C ON V.clientes_idCliente=C.idCliente
INNER JOIN productos AS P ON V.productos_idProducto=P.idProducto");
$resultado->execute();
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:900px">
	 <td style="width:122px">'.$fila['idVenta'].'</td>
	 <td style="width:150px">'.$fila['nombreCliente'].'</td>
	 <td style="width:165px">'.$fila['apellidosCliente'].'</td>
     <td style="width:137px">'.$fila['nombreProducto'].'</td>
     <td style="width:115px">'.$fila['precioV'].'</td>
     <td style="width:90px">'.$fila['cantidad'].'</td>
     <td style="width:120px">'.$fila['totalVenta'].'</td>
     <td style="width:170px">'.$fila['fechaVenta'].'</td>
	 </tr>';
}
?>