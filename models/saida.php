<?php

class saida
{
	private $codigo_saida;
	private $codigo_estoque;
	private $codigo_usuario;
	private $quantidade;
	private $descricao;
	private $data;
	private $setor;

	public function setCod_saida($codigo_saida){
		$this->codigo_saida = $codigo_saida;
	}
	public function getCod_saida(){
		return $this->codigo_saida;
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
	public function setSetor($setor){
		$this->setor = $setor;
	}
	public function getSetor(){
		return $this->setor;
	}
}