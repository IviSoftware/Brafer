<?php
date_default_timezone_set('America/Mexico_City');
$fechaActual=date("Y-m-d H:i:s");
        include_once 'datos/Conexion.php';
        $conexionE=conectar();
        $conexionM=conectar();
        $conexion=conectar();
        $cnx=conectar();
        $nombre=$_POST['txtNombre'];
        $apellido=$_POST['txtApellido'];
        $curp=$_POST['txtCurp'];
        $dir=$_POST['txtDirecion'];
        $estado=$_POST['txtEstado'];
        $muni=$_POST['txtMunicipio'];
        $tel=$_POST['txtTelefono'];
        $email=$_POST['txtEmail'];
        $fecha=$_POST['txtFecha'];
        $tipo=$_POST['txtTipo'];
        $name=ucfirst(strtolower($nombre));
        $ln=ucfirst(strtolower($apellido));
        $es=ucfirst(strtolower($estado));
        $mu=ucfirst(strtolower($muni));
        //consulta
        $consulta=$cnx->prepare("SELECT CURP FROM cliente WHERE CURP=?");
        $consulta->bindParam(1,$curp);
        $consulta->execute();
        $row=$consulta->fetch();
        if($row){
            echo '3';
        }else{
            $query=$conexionE->prepare("INSERT INTO estado (Estado) VALUES (?)");
            $query->bindParam(1,$es);
            $query->execute();
            $idE=$conexionE->lastInsertId();
            $query=$conexionM->prepare("INSERT INTO municipio (Municipio, Estado_idEstado) VALUES (?,?)");
            $query->bindParam(1,$mu);
            $query->bindParam(2,$idE);
            $query->execute();
            $idM=$conexionM->lastInsertId();
            $querys=$conexion->prepare("INSERT INTO clientes (nombreCliente,apellidosCliente,direccionCliente,fechaNacimiento,telefono,email,CURP,tipo,fechaCaptura,Estado_idEstado,Municipio_idMunicipio)  VALUES (?,?,?,?,?,?,?,?,?,?,?)");
            $querys->bindParam(1,$name);
            $querys->bindParam(2,$ln);
            $querys->bindParam(3,$dir);
            $querys->bindParam(4,$fecha);
            $querys->bindParam(5,$tel);
            $querys->bindParam(6,$email);
            $querys->bindParam(7,$curp);
            $querys->bindParam(8,$tipo);
            $querys->bindParam(9,$fechaActual);
            $querys->bindParam(10,$idE);
            $querys->bindParam(11,$idM);
            if($querys->execute()){
                echo '1';
            }else{
                echo '2';
            }
        }
        
        /*if($querys->execute()){
            header("Location: hola.html");
        }else{
            header("Location: hola.html");
        }*/
?>