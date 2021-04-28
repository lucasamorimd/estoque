    <?php

require '../vendor/crud_pesquisa.php';

class bd_pesquisa_estoque extends crud_pesquisa{
    public function listarestoques(){

        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        $ntab = "quantidade";
        return parent::gerarListOrd($tabelas, $joinsA, $joinsB,$ntab);
        
    }
        public function pesquisarestoquePeloNome($nomeestoque){
        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("descricao");
        $valorId = array($nomeestoque."%");
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }        
    public function pesquisarestoquePeloNomeId($nomeestoque,$mat){
        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("descricao","codigo_usuario");
        $valorId = array("%".$nomeestoque."%",$mat);
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
    public function pesquisarestoquePorId0($idproduto){
        $tabelas = array("estoque");
        $joinsA = array();
        $joinsB = array();
        $identificadores = array("codigo_usuario");
        $valorId = array($idproduto);
        return parent::gerarFind($tabelas, $joinsA, $joinsB, $identificadores, $valorId);
    }
}