<?php
require_once 'Spider.php';

class exercicio extends Spider {
    private $cnpj;
    
    function __construct($cnpj = ''){
        $this->cnpj = $cnpj;
    }
    
    public function getCnpj(){
        return $this->cnpj;
    }
    
    public function setCnpj($cnpj){
        $this->cnpj = $cnpj;
    }
    
    public function acessarSintegra(){
        $acesso = $this->request('http://www.sintegra.es.gov.br/resultado.php', 'POST', 'http://www.sintegra.es.gov.br/index.php', array('num_cnpj'=>$this->getCnpj()));
        
        return $acesso;
    }
} 