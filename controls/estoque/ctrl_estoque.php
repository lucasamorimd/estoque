<?php
session_start();
require_once '../../models/estoque.php';
require_once '../../models/DAO/bd_estoque.php';

$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$novaestoque = new estoque();
$bd_estoquenova = new bd_estoque();

$novaestoque->setCod_estoque($params['codigo_estoque']);
$novaestoque->setCod_usuario($_SESSION['Matricula']);
$novaestoque->setQuantidade($params['quantidade']);
$novaestoque->setDescricao($params['descricao']);

if(isset($_SESSION['UsuarioLogado'])){

$resultado = $bd_estoquenova->cadastrarestoque($novaestoque);
}else{
	$resultado == false;
}

if($resultado === true){
	$resultado = "Cadastro de Estoque realizado!";
}else{

	$resultado = "Erro ao efetuar Cadastro";;
}


Header("Location: ../../index.php?mensagem={$resultado}");