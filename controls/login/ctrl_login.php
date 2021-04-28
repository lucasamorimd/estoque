<?php
require_once '../../models/DAO/bd_login.php';

$loginDAO = new bd_login();

//var_dump($_POST); die;

if (isset($_GET['logout']) && ($_GET['logout'] == TRUE)) {
    $loginDAO->fazerLogout();
     $resultado = 'LOGOUT FEITO!';
    Header("Location: ../../index.php?mensagem={$resultado}");
    
} else {
    $matricula = $_POST["matriculaUsuario"];
    $senha = $_POST["senhaUsuario"];
    //$pefil = $_POST["perfilUsuarioLogado"];
}


$usuario = $loginDAO->fazerLogin($matricula, $senha);
if($_GET['logout']==TRUE) {

	$resultado = 'LOGOUT FEITO!';
    Header("Location: ../../index.php?mensagem={$resultado}");

}elseif (!isset($usuario)) {

	$resultado = 'ERRO NO LOGIN!!!';
    Header("Location: ../../index.php?mensagem={$resultado}");

} else {
	$resultado = 'SEJA BEM VINDO';
    Header("Location: ../../index.php?mensagem={$resultado}");

}  

?>