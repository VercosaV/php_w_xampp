<?php

$nomes_meses = array(
    1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril',
    5 => 'Maio', 6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro',
    10 => 'Outubro', 11 => 'Novembro', 12 => 'Dezembro'
);


    function linha($semana, $mes_atual)
    {
        $hoje = date('j');
        echo "<tr>";
        for ($i = 0; $i <= 6; $i++) {
            
            // Adicionamos a verificação $semana[$i] !== "" para não imprimir
            // formatação nos espaços em branco antes do dia 1º
            if (isset($semana[$i]) && $semana[$i] !== "") {
            
                $e_hoje = ($mes_atual && $hoje == $semana[$i]);
                $e_domingo = ($i == 0);

                if ($e_domingo && $e_hoje) {
                    echo "<td style='color: red;'><strong>{$semana[$i]}</strong></td>";
                }
                elseif ($e_domingo) {
                    echo "<td style='color: red;'>{$semana[$i]}</td>";
                }
                elseif ($e_hoje) {
                    echo "<td><strong>{$semana[$i]}</strong></td>";
                }
                else {
                    echo "<td>{$semana[$i]}</td>";
                }

            } else {
                echo "<td></td>"; // Células vazias
            }
        }
        echo "</tr>";
    }

function calendario($mes, $ano){
    $dia = 1;
    $semana = array();
    
    // 1. Descobrir qual dia da semana é o dia 1º do mês atual
    // Pega o formato "Ano-Mês-01" (Ex: 2023-10-01)
    $primeiro_dia_mes = sprintf("%04d-%02d-01", $ano, $mes); 
    
    $dia_da_semana = date('w', strtotime($primeiro_dia_mes)); 
    $total_dias = date('t', strtotime($primeiro_dia_mes));

    $mes_atual = (date('Y') == $ano && date('n') == $mes);


    for ($espaco = 0; $espaco < $dia_da_semana; $espaco++) {
        array_push($semana, ""); 
    }

    // 4. Agora sim, preenchemos os dias do mês usando $total_dias
    while ($dia <= $total_dias) {
        array_push($semana, $dia);

        if (count($semana) == 7) {
            linha($semana, $mes_atual);
            $semana = array();
        }
        $dia++;
    }
    
    if (count($semana) > 0) {
        linha($semana, $mes_atual);
    }
}
$ano_desejado = date('Y');
?>

<h2>Calendário de <?php echo $ano_desejado ;?> </h2>

<div style="display: flex; flex-wrap: wrap; gap: 20px;">

<?php
// O laço mágico que vai do mês 1 ao 12
for ($mes = 1; $mes <=12; $mes++){
?>

    <div style="border: 1px solid #ccc; padding: 10px;">
        <h3 style="text-align: center; margin-top: 0;"><?php echo $nomes_meses[$mes]; ?></h3>
        <table border="1" style="text-align: center;">
            <tr>
                <th style="color: red;">Dom</th>
                <th>Seg</th>
                <th>Ter</th>
                <th>Qua</th>
                <th>Qui</th>
                <th>Sex</th>
                <th>Sáb</th>
            </tr>
            <?php calendario($mes, $ano_desejado);?>
        </table>
    </div>
    <?php }?>
</div>