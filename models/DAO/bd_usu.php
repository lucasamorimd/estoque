<?php 
require '../../vendor/crud.php';
if(isset($_SESSION['UsuarioLogado'])){
	$cod = $_SESSION['Matricula'];
}else{
	$cod = null;
}
/**
 * 
 */
class bd_usu extends crud
{
	

public function atualizausu(usuario $novoProduto){
    $tabela = "usuario";
    $colunas = array('nome', 'email', 'senha');
    $valores = array($novoProduto->getnome(),
                     $novoProduto->getemail(),
                     $novoProduto->getsenha());
    $identificadores = array("codigo_usuario");
    $valorId = array($novoProduto->getCod_usuario());
    return parent::gerarUpdate($tabela, $colunas, $valores, $identificadores, $valorId);
}
}
