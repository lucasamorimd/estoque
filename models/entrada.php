<?php

class entrada
{
	private $codigo_entrada;
	private $codigo_estoque;
	private $codigo_usuario;
	private $quantidade;
	private $descricao;
	private $data;
	private $natureza;

	public function setCod_ent($codigo_entrada){
		$this->codigo_entrada = $codigo_entrada;
	}
	public function getCod_ent(){
		return $this->codigo_entrada;
	}	
	public function setCod_est($codigo_estoque){
		$this->codigo_estoque = $codigo_estoque;
	}
	public function getCod_est(){
		return $this->codigo_estoque;
	}	
	public function setCod_usu($codigo_usuario){
		$this->codigo_usuario = $codigo_usuario;
	}
	public function getCod_usu(){
		return $this->codigo_usuario;
	}
	public function setQuantidade($quantidade){
		$this->quantidade = $quantidade;
	}
	public function getQuantidade(){
		return $this->quantidade;
	}
	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}
	public function getDescricao(){
		return $this->descricao;
	}
	public function setData($data){
		$this->data = $data;
	}
	public function getData(){
		return $this->data;
	}
	public function setNatureza($natureza){
		$this->natureza = $natureza;
	}
	public function getNatureza(){
		return $this->natureza;
	}
}