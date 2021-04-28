<?php

require '../../vendor/crud.php';

class bd_entrada extends crud{

    public function cadastrarentrada(entrada $novaentrada){

        $tabela = "entrada";
        $colunas = array("codigo_estoque","quantidade","data_entrada","descricao","natureza","codigo_usuario");
        $valores = array($novaentrada->getCod_est(),
                         $novaentrada->getQuantidade(),
                         $novaentrada->getData(),
                         $novaentrada->getDescricao(),
                         $novaentrada->getNatureza(),
                         $novaentrada->getCod_usu());
        return parent::gerarInsert($tabela, $colunas, $valores);
    }

    public function listarentradas(){

        $tabelas = array("entrada");
        $joinsA = array();
        $joinsB = array();
        return parent::gerarList($tabelas, $joinsA, $joinsB);
        
    }
        public function aumentaQuantidade(entrada $novoProduto, $attquantidade){
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