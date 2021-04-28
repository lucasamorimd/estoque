<?php

require_once 'conexao.php';

class crud_pesquisa {

    public function gerarInsert($tabela, $colunas, $valores) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "INSERT INTO $tabela(";
            $numeroColunas = count($colunas);
            for ($c = 0; $c < $numeroColunas; $c++) {

                if ($c == $numeroColunas - 1) {
                    $sql = $sql . "$colunas[$c]";
                } else {
                    $sql = $sql . "$colunas[$c],";
                }
            }
            $sql = $sql . ")VALUES(";
            for ($v = 0; $v < $numeroColunas; $v++) {

                if ($v == $numeroColunas - 1) {
                    $sql = $sql . "?)";
                } else {
                    $sql = $sql . "?,";
                }
            }
            
            $stmt = $pdo->prepare($sql);
            for($b = 0;$b < $numeroColunas;$b++){
                $stmt->bindValue($b+1, $valores[$b]);
            }
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "" . $ex;
        }
    }
    
    public function gerarList($tabelas,$joinsA, $joinsB){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM ";
            $numeroTabelas = count($tabelas);
            for($h = 0;$h < $numeroTabelas; $h++){
                if($numeroTabelas == 1){
                    $sql = $sql . $tabelas[$h];
                }
                if($h != $numeroTabelas-1){
                    if($h %2 == 0 && $h < 2){
                        $sql = $sql . $tabelas[$h];
                    }
                    $sql = $sql . "<br> INNER JOIN " . $tabelas[$h+1];
                    $sql = $sql . " ON(".$joinsA[$h] ."=".$joinsB[$h].") ";
                }
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $Entidades = array();
            while ($Entidade = $stmt->fetchObject(__CLASS__)){
                $Entidades[] = $Entidade;
            }
            return $Entidades;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }    
    public function gerarListOrd($tabelas,$joinsA, $joinsB,$ntab){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM ";
            $numeroTabelas = count($tabelas);
            for($h = 0;$h < $numeroTabelas; $h++){
                if($numeroTabelas == 1){
                    $sql = $sql . $tabelas[$h];
                }
                if($h != $numeroTabelas-1){
                    if($h %2 == 0 && $h < 2){
                        $sql = $sql . $tabelas[$h];
                    }
                    $sql = $sql . "<br> INNER JOIN " . $tabelas[$h+1];
                    $sql = $sql . " ON(".$joinsA[$h] ."=".$joinsB[$h].") ";
                }
            }
            $sql = $sql . " ORDER BY ". $ntab . " DESC";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $Entidades = array();
            while ($Entidade = $stmt->fetchObject(__CLASS__)){
                $Entidades[] = $Entidade;
            }
            return $Entidades;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }
    public function gerarFind($tabelas,$joinsA, $joinsB, $identificadores, $valorId){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM ";
            $numeroTabelas = count($tabelas);
            for($h = 0;$h < $numeroTabelas; $h++){
                if($numeroTabelas == 1){
                    $sql = $sql . $tabelas[$h];
                }
                if($h != $numeroTabelas-1){
                    if($h %2 == 0 && $h < 2){
                        $sql = $sql . $tabelas[$h];
                    }
                    $sql = $sql . "<br> INNER JOIN " . $tabelas[$h+1];
                    $sql = $sql . " ON(".$joinsA[$h] ."=".$joinsB[$h].") ";
                }
            }
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] LIKE ?";
                } else {
                    $sql = $sql . "$identificadores[$i] LIKE ? AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            for($b = 0;$b < $numeroIdentificadores;$b++){
                $stmt->bindValue($b+1, $valorId[$b]);
            }
            $stmt->execute();
            $Entidades = array();
            while ($Entidade = $stmt->fetchObject(__CLASS__)){
                $Entidades[] = $Entidade;
            }
            return $Entidades;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }    
    public function gerarFindEquals($tabelas,$joinsA, $joinsB, $identificadores, $valorId){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM ";
            $numeroTabelas = count($tabelas);
            for($h = 0;$h < $numeroTabelas; $h++){
                if($numeroTabelas == 1){
                    $sql = $sql . $tabelas[$h];
                }
                if($h != $numeroTabelas-1){
                    if($h %2 == 0 && $h < 2){
                        $sql = $sql . $tabelas[$h];
                    }
                    $sql = $sql . " INNER JOIN " . $tabelas[$h+1];
                    $sql = $sql . " ON(".$joinsA[$h] ."=".$joinsB[$h].") ";
                }
            }
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] = ?";
                } else {
                    $sql = $sql . "$identificadores[$i] = ? AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            for($b = 0;$b < $numeroIdentificadores;$b++){
                $stmt->bindValue($b+1, $valorId[$b]);
            }
            $stmt->execute();
            $Entidades = array();
            while ($Entidade = $stmt->fetchObject(__CLASS__)){
                $Entidades[] = $Entidade;
            }
            return $Entidades;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }
    public function gerarFindRepeat($tabela, $identificadores, $valorId){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM $tabela";
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] = ?";
                } else {
                    $sql = $sql . "$identificadores[$i] = ? AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            for($b = 0;$b < $numeroColunas;$b++){
                $stmt->bindValue($b+1, $valorId[$b]);
            }
            $stmt->execute();
            $Entidades = array();
            while ($Cliente = $stmt->fetchObject(__CLASS__)){
                $Entidades[] = $Entidade;
            }
            return $Entidades;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }    
    public function gerarFindById($tabelas,$joinsA, $joinsB, $identificadores, $valorId){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT * FROM $tabelas";
            $numeroTabelas = count($tabelas);
            for($h = 0;$h < $numeroTabelas; $h++){
                if($numeroTabelas == 1){
                    $sql = $sql . $tabelas[$h];
                }
                if($h != $numeroTabelas-1){
                    if($h %2 == 0 && $h < 2){
                        $sql = $sql . $tabelas[$h];
                    }
                    $sql = $sql . " INNER JOIN " . $tabelas[$h+1];
                    $sql = $sql . " ON(".$joinsA[$h] ."=".$joinsB[$h].") ";
                }
            }
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] = ?";
                } else {
                    $sql = $sql . "$identificadores[$i] = ? AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            for($b = 0;$b < $numeroColunas;$b++){
                $stmt->bindValue($b+1, $valorId[$b]);
            }
            $stmt->execute();
            $Entidade = $stmt->fetchObject(__CLASS__);
            return $Entidade;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }    
    public function gerarFindDayById($tabela,$campoData, $identificadores, $valorId){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT DATEDIFF(NOW(),$campoData) as dias FROM $tabela";
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] = '$valorId[$i]'";
                } else {
                    $sql = $sql . "$identificadores[$i] = '$valorId[$i]' AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $List = $stmt->fetch(PDO::FETCH_ASSOC);
            return $List;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }
    public function gerarFindTimeById($tabela,$campoData, $identificadores, $valorId){
        try {
            $pdo = Conexao::getInstance();
            $sql = "SELECT TIMEDIFF(NOW(),$campoData) as tempo FROM $tabela";
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] = '$valorId[$i]'";
                } else {
                    $sql = $sql . "$identificadores[$i] = '$valorId[$i]' AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $List = $stmt->fetch(PDO::FETCH_ASSOC);
            return $List;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }
    public function gerarConsultaEspecifica($sql){
        try {
            $pdo = Conexao::getInstance();
            $sqlTratado = $sql;
            $stmt = $pdo->prepare($sqlTratado);
            $stmt->execute();
            $List = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $List;
        } catch (PDOExceptionException $ex) {
            echo "".$ex;
        }
    }
    public function gerarUpdate($tabela, $colunas, $valores, $identificadores, $valorId) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "UPDATE  $tabela ";
            $numeroColunas = count($colunas);
            for ($c = 0; $c < $numeroColunas; $c++) {
                if ($c == $numeroColunas - 1) {
                    $sql = $sql . "SET $colunas[$c] = '$valores[$c]'";
                } else {
                    $sql = $sql . "SET $colunas[$c] = '$valores[$c]',";
                }
            }
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] = ?";
                } else {
                    $sql = $sql . "$identificadores[$i] = ? AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            for($b = 0;$b < $numeroColunas;$b++){
                $stmt->bindValue($b+1, $valorId[$b]);
            }
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "" . $ex;
        }
    }
    public function gerarDeleteWithException($tabela, $identificadores, $valorId) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM $tabela";
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] = ?";
                } else {
                    $sql = $sql . "$identificadores[$i] = ? AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            for($b = 0;$b < $numeroColunas;$b++){
                $stmt->bindValue($b+1, $valorId[$b]);
            }
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "" . $ex;
        }
    } 
    public function gerarDelete($tabela, $identificadores, $valorId) {
        try {
            $pdo = Conexao::getInstance();
            $sql = "DELETE FROM $tabela";
            $sql = $sql . " WHERE ";
            $numeroIdentificadores = count($identificadores);
            for ($i = 0; $i < $numeroIdentificadores; $i++) {

                if ($i == $numeroIdentificadores - 1) {
                    $sql = $sql . "$identificadores[$i] = ?";
                } else {
                    $sql = $sql . "$identificadores[$i] = ? AND ";
                }
            }
            $stmt = $pdo->prepare($sql);
            for($b = 0;$b < $numeroColunas;$b++){
                $stmt->bindValue($b+1, $valorId[$b]);
            }
            return $stmt->execute();
        } catch (PDOException $ex) {
            echo "" . $ex;
        }
    }
}
/*
$Crud = new Crud();
$tabelas = array("campeoes c","usuario u ","desafio d");
        $joinsA = array("c.codUsuario","c.codDesafio");
        $joinsB = array("u.codUsuario","d.codDesafio");
        $identificadores = array('c.codTipo','DATEDIFF(NOW(),c.data)');
        $valorId = array('2','1');
$Crud->gerarFindEquals($tabelas, $joinsA, $joinsB, $identificadores, $valorId);*/