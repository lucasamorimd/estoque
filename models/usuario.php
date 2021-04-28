<?php

class usuario
{
	private $codigo_usuario;
	private $email;
	private $senha;
	private $nome;
	private $perfil;
	
	public function setCod_usuario($codE){
		$this->codE = $codE;
	}

	public function getCod_usuario(){
		return $this->codE;
	}
	public function setemail($email){
		$this->email = $email;
	}

	public function getemail(){
		return $this->email;
	}

	public function setsenha($senha){
		$this->senha = $senha;
	}

	public function getsenha(){
		return $this->senha;
	}
	public function setnome($nome){
		$this->nome = $nome;
	}
	public function getnome(){
		return $this->nome;
	}
	public function setperfil($perfil){
		$this->perfil = $perfil;
	}
	public function getperfil(){
		return $this->perfil;
	}
}