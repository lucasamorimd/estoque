<?php
session_start();
require_once '../../models/entrada.php';
require_once '../../models/DAO/bd_entrada.php';
//require_once '../../models/DAO/bd_pesquisa_estoque.php';

$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$novaentrada = new entrada();
$bd_entradanova = new bd_entrada();

$novaentrada->setCod_est($params['codigo_estoque']);
$novaentrada->setCod_usu($_SESSION['Matricula']);
$novaentrada->setQuantidade($params['quantidade']);
$novaentrada->setData($params['data']);
$novaentrada->setDescricao($params['descricao']);
$novaentrada->setNatureza($params['natureza']);


$resultado = $bd_entradanova->cadastrarentrada($novaentrada);


$attquantidade = $novaentrada->getQuantidade();

$QuantidadeID = $novaentrada->getCod_est();

$quantidadeI = $bd_entradanova->pesquisarestoquePorID($QuantidadeID);


foreach ($quantidadeI as $q) {
	$q->quantidade;
}

$qi = $q->quantidade;
if($resultado === true && isset($_SESSION['UsuarioLogado'])){
	$qf = $attquantidade + $qi;
	$bd_entradanova->aumentaQuantidade($novaentrada, $qf);
	$resultado = "Cadastro de Entrada realizado!";
//Header("Location: ../../index.php?mensagem={$resultado}");
}else{
	$resultado = "Erro ao efetuar Cadastro";
}
Header("Location: ../../index.php?mensagem={$resultado}");