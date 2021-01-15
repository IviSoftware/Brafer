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
$resultado=$conexion->prepare("SELECT acredores.idacredor, acredores.adeudo, acredores.fechaCapturas, clientes.idCliente, clientes.nombreCliente, clientes.apellidosCliente 
FROM acredores, clientes WHERE acredores.Clientes_idCliente=clientes.idCliente");
$resultado->execute();
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:900px">
	 <td style="width:144px">'.$fila['idacredor'].'</td>
	 <td style="width:91px">'.$fila['idCliente'].'</td>
	 <td style="width:155px">'.$fila['nombreCliente'].'</td>
     <td style="width:137px">'.$fila['apellidosCliente'].'</td>
     <td style="width:102px">'.$fila['adeudo'].'</td>
     <td style="width:180px">'.$fila['fechaCapturas'].'</td>
	 </tr>';
}
?>