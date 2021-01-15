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
$resultado=$conexion->prepare("SELECT C.idCompra, C.fechaCompra, C.precioCompra, C.cantidadCompra, C.totalCompra, M.material, P.proveedor
FROM compras AS C
INNER JOIN proveedores AS P ON C.Proveedores_idProveedor=P.idProveedor
INNER JOIN material AS M ON C.Material_idMaterial=M.idMaterial");
$resultado->execute();
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:900px">
	 <td style="width:104px">'.$fila['idCompra'].'</td>
	 <td style="width:160px">'.$fila['proveedor'].'</td>
	 <td style="width:165px">'.$fila['material'].'</td>
     <td style="width:137px">'.$fila['precioCompra'].'</td>
     <td style="width:100px">'.$fila['cantidadCompra'].'</td>
     <td style="width:90px">'.$fila['totalCompra'].'</td>
     <td style="width:120px">'.$fila['fechaCompra'].'</td>
	 </tr>';
}
?>