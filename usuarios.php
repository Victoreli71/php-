<?php

//USUARIOS

return [
    [
        'usuario' => 'usuario1@gmail.com', //USUARIO 
        'senha' => password_hash('senha001', PASSWORD_DEFAULT) // CRIAÇÃO DE SENHA ENCRIPTADA
    ],
    [
        'usuario' => 'usuario2@gmail.com',
        'senha' => password_hash('senha002', PASSWORD_DEFAULT)
    ],
    [
        'usuario' => 'usuario3@gmail.com',
        'senha' => password_hash('senha003', PASSWORD_DEFAULT)
    ],
];

