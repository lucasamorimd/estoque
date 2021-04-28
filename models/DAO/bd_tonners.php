<?php

require '../../vendor/crud.php';

class bd_tonners extends crud{

    public function cadastrartonners(tonners $novatonners){

        $tabela = "tonners";
        $colunas = array("codigo_tonners","cor","modelo","tipo","codigo_usuario");
        $valores = array($novatonners->getCod_tonners(),
                         $novatonners->getCor(),
                         $novatonners->getModelo(),
                         $novatonners->getTipo()
                         $novatonners->getCod_usuario());
        return parent::gerarInsert($tabela, $colunas, $valores);
    }

    public function listartonnerss(){

        $tabelas = array("tonners");
        $joinsA = array();
        $joinsB = array();
        return parent::gerarList($tabelas, $joinsA, $joinsB);
        
    }
        public function pesquisartonnersPeloNome($nometonners){
        $tabelas = array("tonners");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("modelo");
        $valorId = array($nometonners."%");
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }

}