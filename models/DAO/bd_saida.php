<?php

require '../../vendor/crud.php';

class bd_saida extends crud{

    public function cadastrarsaida(saida $novasaida){

        $tabela = "saida";
        $colunas = array("codigo_estoque","quantidade","descricao","data_saida","setor","codigo_usuario");
        $valores = array($novasaida->getCod_est(),
                         $novasaida->getQuantidade(),
                         $novasaida->getDescricao(),
                         $novasaida->getData(),
                         $novasaida->getSetor(),
                         $novasaida->getCod_usu());
        return parent::gerarInsert($tabela, $colunas, $valores);
    }

    public function listarsaidas(){

        $tabelas = array("saida");
        $joinsA = array();
        $joinsB = array();
        return parent::gerarList($tabelas, $joinsA, $joinsB);
        
    }
        public function aumentaQuantidade(saida $novoProduto, $attquantidade){
        $tabela = "estoque";
        $colunas = array("quantidade");
        $valores = array($attquantidade);
        $identificadores = array("codigo_estoque");
        $valorId = array($novoProduto->getCod_est());
        return parent::gerarUpdate($tabela, $colunas, $valores, $identificadores, $valorId);
    }
        public function pesquisarestoquePorId($idproduto){
        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("codigo_estoque");
        $valorId = array($idproduto);
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
}