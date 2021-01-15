<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d H:i:s");
        include_once 'datos/Conexion.php';
        $conexionI=conectar();
        $conexionC=conectar();
        $conexionM=conectar();
        $conexion=conectar();
        $exi=1;
        $producto=$_POST['producto'];
        $codigo=$_POST['txtCodigo'];
        $categoria=$_POST['idC'];
        $des=$_POST['txtDescr'];
        $material=$_POST['idM'];
        $precio=$_POST['txtPrecio'];
        $pro=ucfirst(strtolower($producto));
        //consulta
        $consulta=$conexionI->prepare("SELECT nombreProducto FROM productos WHERE nombreProducto=?");
        $consulta->bindParam(1,$pro);
        $consulta->execute();
        $row=$consulta->fetch();
        if($row){
            echo '3';
        }else{
            $querys=$conexion->prepare("INSERT INTO productos (nombreProducto, codigoBarras, descripcion, precio, existencias, Categorias_idCategoria, Material_idMaterial, fechaCaptura) 
            VALUES (?,?,?,?,?,?,?,?)");
            $querys->bindParam(1,$pro);
            $querys->bindParam(2,$codigo);
            $querys->bindParam(3,$des);
            $querys->bindParam(4,$precio);
            $querys->bindParam(5,$exi);
            $querys->bindParam(6,$categoria);
            $querys->bindParam(7,$material);
            $querys->bindParam(8,$fechaActual);
            if($querys->execute()){
                echo '1';
            }else{
                echo '2';
            }
        }
?>