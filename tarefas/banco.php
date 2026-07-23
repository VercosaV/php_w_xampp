<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'sistematarefas'; // Corrigido: removido o 's' extra no final
$bdSenha = 'sistema';
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

// Corrigido: removido o $conexao de dentro dos parênteses
if (mysqli_connect_errno()) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}

