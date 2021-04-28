<?php

class tonners
{
	private $codigo_tonners;
	private $codigo_usuario;
	private $cor;
	private $modelo;
	private $tipo;

	public function setCod_tonners($codigo_tonners){
		$this->codigo_tonners = $codigo_tonners;
	}
	public function getCod_tonners(){
		return $this->codigo_tonners;
	}
	public function setCod_usuario($codigo_usuario){
		$this->codigo_usuario = $codigo_usuario;
	}
	public function getCod_usuario(){
		return $this->codigo_usuario;
	}
	public function setCor($cor){
		$this->cor = $cor;
	}
	public function getCor(){
		return $this->cor;
	}
	public function setTipo($tipo){
		$this->tipo = $tipo;
	}
	public function getTipo(){
		return $this->tipo;
	}


}