<?php session_start(); ?>
<html>
    <head>
        <title>Gerenciador de Tarefas</title>
    </head>
    <body>
        <h1 style="text-align: center;">Gerenciador de Tarefas</h1>
        <div style="background-color: gray; border-radius: 8px; margin: auto; max-width: 600px; ">
        <form>
            <fieldset>
                <legend>Nova Tarefa</legend>
                <label style="display: box; margin: auto;">
                    Tarefa:
                    <input type="text" name="nome" style="display: box;" />
                </label>
                <input type="submit" value="Cadastrar" style="display: flex;" />
            </fieldset>
        </form>
        <?php
        

        if (isset($_GET['nome'])){
            $_SESSION['lista_tarefas'][] = $_GET['nome'];
        }

        $lista_tarefas = array();

        if (isset($_SESSION['lista_tarefas'])){
            $lista_tarefas = $_SESSION['lista_tarefas'];
        }

        ?>
        <table>
            <tr>
                <th>Tarefas</th>
            </tr>
            <?php foreach ($lista_tarefas as $tarefa) : ?>
                <tr>
                    <td><?php echo $tarefa ;?></td>
                </tr>
            <?php endforeach; ?>
        </table>
            </div>
    </body>
</html>
