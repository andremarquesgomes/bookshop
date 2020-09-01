<form action="envia_pedido_recuperacao.php" method="POST">
    <ul>
        <li>
            EMAIL:
            <input type="text" name="endereco_email">
        </li>
        <li>
            <button>Recuperar</button>
        </li>
    </ul>
</form>

<?php

    if(isset($_GET['status']) && $_GET['status']==0){
        echo "email não existe";
    }else{
        if(isset ($_GET['status']) && $_GET['status']==1){
            echo "email enviado";
        }
        else{
            if(isset($_GET['status']) && $_GET['status']==2){
                echo "Problema ao enviar o email";
            }
        }
    }

?>