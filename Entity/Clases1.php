<?php 
namespace Entity;

use \PDO;

class Clases1 {

	private $id;
	private $usuario;
	private $pass;
	const Tabla='Clases1'; 

	public function setId($id) {
		$this->id=$id;
	}

	public function setUsuario ($usuario){
		$this->usuario=$usuario;
	}
	
	public function setPass ($pass){
		$this->pass=$pass;
	}

	public function save (){
		$Conexion = new Conexion;
		$consult = $Conexion->prepare('INSERT INTO '.self::Tabla.' (usuario, pass) values (:usuario, :pass)');

		$consult->bindParam(':usuario',$this->usuario);
		$consult->bindParam(':pass',$this->pass);
		
		if($this->usuario){
			$consult->execute();
			return true;	
		}else{
			return false;
		}	
	}

}
