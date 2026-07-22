<?php

 function saudacao(){
    //$hora = (int)date('H');
    $hora = 20;
    //echo gettype($hora);
    if($hora < 12){
        ecHo "<h1>Bom dia</h1>";
    } elseif ($hora > 12 && $hora <= 16) {
        echo "<h1>Boa tarde</h1>";
    } else {
        echo "<h1>Boa noite</h1>";
    }
    
}

saudacao();

?>

