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
$resultado=$conexion->prepare("SELECT idEmpleado,nombreEmpleado, apellidosEmpleado,puesto FROM empleados");
$resultado->execute();
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:900px">
	 <td style="width:73px">'.$fila['idEmpleado'].'</td>
	 <td style="width:188px">'.$fila['nombreEmpleado'].'</td>
	 <td style="width:208px">'.$fila['apellidosEmpleado'].'</td>
     <td style="width:201px">'.$fila['puesto'].'</td>
     <td style="width:15px"><a href="editarCliente.php?id='.$fila['idEmpleado'].'" id="edit"><i class="fas fa-edit"></i></a></td>
     <td style="width:40px"><button data-id='.$fila['idEmpleado'].' id="delete"><i class="far fa-trash-alt"></i></button></td>
	 </tr>';
}
?>