<?php

session_start();
require_once 'conexao.php';

class bd_login {

    public function fazerLogin($email, $senha) {
        try {
            $pdo = conexao::getInstance();
            $sql = "SELECT * FROM usuario c WHERE c.codigo_usuario = ? AND c.senha = ?; ";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(1, $email);
            $stmt->bindValue(2, $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario != NULL) {
                $_SESSION['UsuarioLogado'] = 1;
                $_SESSION['NomeUsuarioLogado'] = $usuario['nome'];
                $_SESSION['PerfilUsuarioLogado'] = $usuario['perfil'];
                $_SESSION['Matricula'] = $usuario['codigo_usuario'];
                $_SESSION['EmailUsuario'] = $usuario['email'];
                $_SESSION['SenhaUsuario'] = $usuario['senha'];
                return $usuario;
            }
        } catch (Exception $exc) {
            echo "erro" . $exc->getMessage();
        }
    }
    public function fazerLogout() {
        try {
            unset($_SESSION['UsuarioLogado']);
           
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    }