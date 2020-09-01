<form action="actualiza_pass.php" method="POST">

    <!-- Identificar a referencia do link gerado para a pessoa -->
    <input type="hidden" name="ref" value="<?php echo $_GET['ref']?>">
    <ul>
        <li>
            Nova Password:
            <input type="text" name="nova_password">
        </li>
        <li>
            <button>Actualizar</button>
        </li>
    </ul>
</form>

<?php 

    if(isset($_GET['status'])&& $_GET['status']=='ok'){
    echo "Password alterada com sucesso";
    }

?>