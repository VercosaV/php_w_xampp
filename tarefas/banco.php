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
};

function buscar_tarefas($conexao) {
    $sqlBusca = 'SELECT * FROM tarefas';
    $resultado = mysqli_query($conexao, $sqlBusca);

    $tarefas = array();

    while($tarefa = mysqli_fetch_assoc($resultado)){
        $tarefas[] = $tarefa;
    }
    return $tarefas;
};

function gravar_tarefa($conexao, $tarefa) {
    $sqlGravar = "
    INSERT INTO tarefas (nome, descricao, prioridade) 
    VALUES 
        (
            '{$tarefa['nome']}',
            '{$tarefa['descricao']}',
            '{$tarefa['prioridade']}'
        )
    ";

    mysqli_query($conexao, $sqlGravar);
};