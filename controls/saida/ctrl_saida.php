<?php
session_start();
require_once '../../models/saida.php';
require_once '../../models/DAO/bd_saida.php';
//require_once '../../models/DAO/bd_pesquisa_estoque.php';
if (isset($_SESSION['UsuarioLogado'])) {
	# code...
$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$novasaida = new saida();
$bd_saidanova = new bd_saida();

$novasaida->setCod_est($params['codigo_estoque']);
$novasaida->setCod_usu($_SESSION['Matricula']);
$novasaida->setQuantidade($params['quantidade']);
$novasaida->setDescricao($params['descricao']);
$novasaida->setData($params['data']);
$novasaida->setSetor($params['setor']);



$attquantidade = $novasaida->getQuantidade();

$QuantidadeID = $novasaida->getCod_est();

$quantidadeI = $bd_saidanova->pesquisarestoquePorID($QuantidadeID);

foreach ($quantidadeI as $q) {
	$q->quantidade;
}

$qi = $q->quantidade;
$qf = $qi-$attquantidade;

if ($qf >= 0) {
	# code...
$resultado = $bd_saidanova->cadastrarsaida($novasaida);
}else{
	$resultado='Saida maior que o estoque disponível!';
	Header("Location: ../../index.php?mensagem={$resultado}");
}

if($resultado === true){
	$bd_saidanova->aumentaQuantidade($novasaida, $qf);
	$resultado = "Cadastro de Saida realizado!";
	
}else{
	$resultado = "Erro ao efetuar Cadastro";
}

}else{
	$resultado = 'Você não está logado!';
	
}

Header("Location: ../../index.php?mensagem={$resultado}");