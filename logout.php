<?php
defined('CONTROL') or die('Acesso negado!');

//efetuar logout 
session_destroy();

//voltar a pagina inicial 
header('Location: main.php?rota=login');

?>


