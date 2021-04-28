<?php
session_start();
require_once '../../models/usuario.php';
require_once '../../models/DAO/bd_usu.php';

// Essa função pega tudo que tiver no $_POST e coloca num array
// $params recebe o array com todos os valores
$params = filter_input_array(INPUT_POST, FILTER_DEFAULT);



$usu = new usuario();
$usuDAO = new bd_usu();

$usu->setCod_usuario($_SESSION['Matricula']);
$usu->setnome($params['nome']);
$usu->setsenha($params['senha']);
$usu->setemail($params['email']);


$resultado = $usuDAO->atualizausu($usu);

// Verifica se conseguiu salvar no banco e monta a mensagem
// Atualiza os valores na sessão do usuário
if($resultado === true){
    $resultado = "Seus dados foram atualizados!";
    $_SESSION['NomeUsuarioLogado'] = $params['nome'];
    $_SESSION['SenhaUsuario'] = $params['senha'];
    $_SESSION['EmailUsuario'] = $params['email'];

}else{

    $resultado = "Erro ao salvar seus dados.";
}

Header("Location: ../../index.php?mensagem={$resultado}"); // Redireciona passando a mensagem