<?php

class Usuarios{
    private $ci; 
    private $correo; 
    private $name; 
    private $surname; 
    private $password; 
    private $verifiacion; 
    private $id_cargo; 

    public function getCi(){
		return $this->ci;
	}

	public function setCi($ci){
		$this->ci = $ci;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getName(){
		return $this->name;
	}

	public function setName($name){
		$this->name = $name;
	}

	public function getSurname(){
		return $this->surname;
	}

	public function setSurname($surname){
		$this->surname = $surname;
	}

	public function getPassword(){
		return $this->password;
	}

	public function setPassword($password){
		$this->password = $password;
	}

	public function getVerifiacion(){
		return $this->verifiacion;
	}

	public function setVerifiacion($verifiacion){
		$this->verifiacion = $verifiacion;
	}

	public function getId_cargo(){
		return $this->id_cargo;
	}

	public function setId_cargo($id_cargo){
		$this->id_cargo = $id_cargo;
	}
}


?>