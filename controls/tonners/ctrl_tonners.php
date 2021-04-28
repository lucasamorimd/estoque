<?php
session_start();
require_once '../../models/tonners.php';
require_once '../../models/DAO/bd_tonners.php';
//require_once '../../models/DAO/bd_pesquisa_estoque.php';
if (isset($_SESSION['UsuarioLogado'])) {
	# code...
$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$novatonners = new tonners();
$bd_tonnersnova = new bd_tonners();

$novatonners->setCod_tonners($params['codigo_tonners']);
$novatonners->setCod_usuario($_SESSION['Matricula']);
$novatonners->setCor($params['cor']);
$novatonners->setModelo($params['modelo']);
$novatonners->setTipo($params['tipo']);




$attquantidade = $novatonners->getQuantidade();

$QuantidadeID = $novatonners->getCod_est();

$quantidadeI = $bd_tonnersnova->pesquisarestoquePorID($QuantidadeID);

foreach ($quantidadeI as $q) {
	$q->quantidade;
}

$qi = $q->quantidade;
$qf = $qi-$attquantidade;

if ($qf >= 0) {
	# code...
$resultado = $bd_tonnersnova->cadastrartonners($novatonners);
}else{
	$resultado='tonners maior que o estoque disponível!';
	Header("Location: ../../index.php?mensagem={$resultado}");
}

if($resultado === true){
	$bd_tonnersnova->aumentaQuantidade($novatonners, $qf);
	$resultado = "Cadastro de tonners realizado!";
	
}else{
	$resultado = "Erro ao efetuar Cadastro";
}

}else{
	$resultado = 'Você não está logado!';
	
}

Header("Location: ../../index.php?mensagem={$resultado}");