<?php
defined('CONTROL') or die('Acesso negado!'); // tem que estar definida a const CONTROL, para cessar o resto do codigo, caso contrario aparecera acesso negado 

//verifica se o formulario foi submetido
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //verificar se o usuario e a senha foram submetidas
    $usuario = $_POST['usuario'] ?? null;
    $senha = $_POST['senha'] ?? null;
    $erro = null;

    if(empty($usuario) || empty($senha)){
        $erro = "usuario e senha são obrigatorios";
    }

    //verifica se usuario e seha são validos (match)
    if(empty($erro)){
        
        $usuarios = require_once __DIR__ . '/../inc/usuarios.php';

        foreach ($usuarios as $user){
            if($user['usuario'] == $usuario && password_verify($senha, $user['senha'])){
                //efetua login
                $_SESSION['usuario'] = $usuario;

                //volta a pagina inicial
                header('Location: main.php?rota=home');
               
            }
        }
     
        //login invalido
        $erro = "Usuário ou senha inválidos"; 

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>

    <form action="main.php?rota=login" method="post">
        <h3 style="color: white;">Login</h3>
        <div>
            <label for="usuario">Usuário:</label>
            <input type="email" name="usuario" id="usuario">
        </div>
        <div>
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
        </div>
        <div>
            <button type="submit">Entrar</button>
        </div>
    </form>

    <?php if(!empty($erro)) : ?>
        <p style="color: red"><?= $erro ?></p>
    <?php endif; ?>

</body>
</html>