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
        $resultado = array();
        $parametros = array(
            'num_cnpj' => $this->getCnpj(),
            'botao' => 'Consultar'
        );
        $acesso = $this->request('http://www.sintegra.es.gov.br/resultado.php', 'POST', 'http://www.sintegra.es.gov.br/index.php', $parametros);
        
        $padrao = '#<td ?.*>(.*?)</td>#';
        preg_match_all($padrao, $acesso, $resultado);
        
        $resultado = count($resultado) > 0 ? array_map('utf8_encode', $resultado[1]) : $resultado; 
        
        return json_encode($resultado, true);
    }
} 