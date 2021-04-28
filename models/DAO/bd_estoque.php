<?php

require '../../vendor/crud.php';

class bd_estoque extends crud{

    public function cadastrarestoque(estoque $novaestoque){

        $tabela = "estoque";
        $colunas = array("codigo_estoque","quantidade","descricao","codigo_usuario");
        $valores = array($novaestoque->getCod_estoque(),
                         $novaestoque->getQuantidade(),
                         $novaestoque->getDescricao(),
                         $novaestoque->getCod_usuario());
        return parent::gerarInsert($tabela, $colunas, $valores);
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

}