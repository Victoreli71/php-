<?php

//INICIAR SESSÃO 
session_start();

//definir constante de controle
define('CONTROL', true);

//verificar se existe algum usuario logado
$usuario_logado = $_SESSION['usuario'] ?? null;

//verifocar a rota URL 
if(empty($usuario_logado)){
    $rota = 'login'; 
} else {
    $rota = $_GET['rota'] ?? 'home';
}

//se o usuario esta logado, mas esta no login sera redirecionado a home
if(!empty($usuario_logado) && $rota == 'login'){
    $rota ='home';
}


//analisa a rota
$rotas = [
    'login' => 'login.php',
    'home' => 'home.php',
    'page1' => 'page1.php',
    'page2' => 'page2.php',
    'page3' => 'page3.php',
    'logout' => 'logout.php'
];

if(!key_exists($rota, $rotas)){
    die('Acesso negado!');
} else {
    require_once($rotas[$rota]);
}
