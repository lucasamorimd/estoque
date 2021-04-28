<?php

class estoque
{
	private $codigo_estoque;
	private $codigo_usuario;
	private $quantidade;
	private $descricao;
	
	public function setCod_estoque($codE){
		$this->codE = $codE;
	}

	public function getCod_estoque(){
		return $this->codE;
	}
	public function setCod_usuario($codigo_usuario){
		$this->codigo_usuario = $codigo_usuario;
	}

	public function getCod_usuario(){
		return $this->codigo_usuario;
	}

	public function setQuantidade($qtd){
		$this->qtd = $qtd;
	}

	public function getQuantidade(){
		return $this->qtd;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getDescricao(){
		return $this->descricao;
	}
}