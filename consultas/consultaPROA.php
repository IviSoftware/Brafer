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
$resultado=$conexion->prepare("SELECT proveedores.idProveedor, proveedores.proveedor,proveedores.precioMaterial, material.material FROM proveedores, material WHERE proveedores.Material_idMaterial=material.idMaterial");
$resultado->execute();
while ($fila = $resultado->fetch(PDO::FETCH_ASSOC))
{
	echo'<tr style="width:900px">
	 <td style="width:74px">'.$fila['idProveedor'].'</td>
	 <td style="width:172px">'.$fila['proveedor'].'</td>
	 <td style="width:129px">'.$fila['material'].'</td>
     <td style="width:180px">'.$fila['precioMaterial'].'</td>
     <td style="width:15px"><a href="editarPROA.php?id='.$fila['idProveedor'].'" id="edit"><i class="fas fa-edit"></i></a></td>
     <td style="width:40px"><button data-id='.$fila['idProveedor'].' id="delete"><i class="far fa-trash-alt"></i></button></td>
	 </tr>';
}
?>