    <?php

require '../vendor/crud_pesquisa.php';

class bd_pesquisa_entrada extends crud_pesquisa{
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
        $identificadores = array("codigo_usuario");
        $valorId = array($idproduto);
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function pesquisarentradaPeloNomeId($nomeentrada,$mat){
        $tabelas = array("entrada");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("descricao","codigo_usuario");
        $valorId = array("%".$nomeentrada."%",$mat);
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
}