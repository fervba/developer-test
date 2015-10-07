<?php
    require_once 'exercicio.php';
    
    $exercicio = new exercicio();
    
    $exercicio->setCnpj('31.804.115-0002-43');
    
    echo $exercicio->acessarSintegra();
?>