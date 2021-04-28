    <?php

require '../vendor/crud_pesquisa.php';

class bd_pesquisa_saida extends crud_pesquisa{
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
        $identificadores = array("codigo_usuario");
        $valorId = array($idproduto);
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
    public function pesquisarsaidaPeloNomeId($nomesaida,$mat){
        $tabelas = array("saida");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("descricao","codigo_usuario");
        $valorId = array("%".$nomesaida."%",$mat);
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
}