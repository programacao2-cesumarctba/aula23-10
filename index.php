<?php

// echo '<pre>';
// print_r($_SERVER);  REQUEST_URI
// echo '</pre>';

// aqui ta fazendo da URl e dividindo em um array
$url = $_SERVER['REQUEST_URI'];
$arrUrl = explode('/', $url);
unset($arrUrl[0]);
echo '<pre>';
print_r($arrUrl); 
echo '</pre>';

// validação de diretorio
if (file_exists(__DIR__ . '/'. $arrUrl[1] . '.php')) {
    echo 'Achou o arquivo<br>';
    // include do arquivo
    require_once(__DIR__ . '/'. $arrUrl[1] . '.php');
    // instancia um novo objeto
    eval('$obj = new $arrUrl[1];');
    // instancia o método informado
    if (empty($arrUrl[2])) {
        $obj->index();
    } else {
        $method = $arrUrl[2];
        eval('$obj->$method();');
    }
    
} else {
    echo 'Não achou o arquivo';
}








