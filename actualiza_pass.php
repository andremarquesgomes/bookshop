<?php

    include('config.php');

    $ref= $_POST['ref'];
    $pass= $_POST['nova_password'];


    $sql="select * from referencias where valor_referencia='$ref'";


    $resultado = $ligacao->query($sql);

    $linha=mysqli_fetch_assoc($resultado);

    $id_cliente=$linha['fk_id_cliente'];

    $sql_update= "update clientes set password_cliente=MD5('$pass') 
    where id_cliente=$id_cliente";

 
    $resultado=$ligacao->query($sql_update);

    // se quiser apagar as referencias uso este comando
    // $sql_delete="delete from referencias where valor_referencia='$ref'";
    // $resultado=$ligacao->query($sql_delete);

    header('Location:index.php?zona=repor_pass&status=ok');
?>