<?php
Class Usuario{
    private $id;
    private $usuario;
	private $pass;
	$conexion=conectar();
    public function userExists($user, $pass){
		$query=$conexion->prepare("SELECT * FROM usuarios WHERE Usuario=:usuario AND Contrasena=:pass");
		$query->execute(['usuario'=>$user, 'pass'=>$pass]);
		if($query->rowCount()){
			return true;
		}else{
			return false;
		}
	}
	
?>