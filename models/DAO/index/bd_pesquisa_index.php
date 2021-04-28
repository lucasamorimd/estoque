<?php

require 'crud_pesquisa.php';

class bd_pesquisa_index extends crud_pesquisa{

    public function listarentradas(){

        $tabelas = array("entrada");
        $joinsA = array();
        $joinsB = array();
        return parent::gerarList($tabelas, $joinsA, $joinsB);
        
    }
    public function pesquisarentradaPeloNome($nomeentrada){
        $tabelas = array("entrada");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("descricao");
        $valorId = array($nomeentrada."%");
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function pesquisarentradaPorId($idproduto){
        $tabelas = array("entrada");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("codigo_entrada");
        $valorId = array($idproduto);
        return parent::gerarFindById($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function listarestoques(){

        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        return parent::gerarList($tabelas, $joinsA, $joinsB);
        
    }
    public function pesquisarestoquePeloNome($nomeestoque){
        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("descricao");
        $valorId = array($nomeestoque."%");
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function pesquisarestoquePorId($idproduto){
        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("codigo_estoque");
        $valorId = array($idproduto);
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function listarsaidas(){

        $tabelas = array("saida");
        $joinsA = array();
        $joinsB = array();
        return parent::gerarList($tabelas, $joinsA, $joinsB);
        
    }
    public function pesquisarsaidaPeloNome($nomesaida){
        $tabelas = array("saida");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("descricao");
        $valorId = array($nomesaida."%");
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function pesquisarsaidaPorId($idproduto){
        $tabelas = array("saida");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("codigo_saida");
        $valorId = array($idproduto);
        return parent::gerarFindById($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }    
    public function pesquisarusuarioPorId($idproduto){
        $tabelas = array("usuario");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("codigo_usuario");
        $valorId = array($idproduto);
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function listarusuarios(){

        $tabelas = array("usuario");
        $joinsA = array();
        $joinsB = array();
        return parent::gerarList($tabelas, $joinsA, $joinsB);
        
    }
    public function listarestoquesorder(){

        $ntab = "quantidade";
        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        return parent::gerarListOrd($tabelas, $joinsA, $joinsB,$ntab);

    }
}