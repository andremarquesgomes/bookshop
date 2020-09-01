<?php

include ('config.php');

    $email_recebido= $_POST['email'];
    // echo "Olá, sou o PHP e recebi o valor do $email_recebido";

    $sql="select * from clientes
    where email_cliente='$email_recebido'";

    $resultado = $ligacao->query($sql);

    $n_registos=$resultado->num_rows;

    echo $n_registos;

?>