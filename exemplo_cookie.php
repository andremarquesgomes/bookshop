<?php

    // nome cookie + valor + tempo (vazio=agora)+segundos
    setcookie('dia_da_semana', 'Sábado', time()+3600);
    setcookie('Mês', 'Dezembro', time()+3600);

    echo "Hoje é:" .$_COOKIE['Mês'];

?>