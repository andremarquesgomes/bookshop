$(document).ready(function(){
    $('input[name=email]').blur(function(){

        // email_inserido=$('input[name=email').val();
        // ou
        email_inserido=$(this).val();

        console.log(email_inserido);

        $.post('verifica_existencia_user.php',{ email:email_inserido } ,function(data){
            alert(data);

            if(data!=0){
                $('.zona-de-mensagens').html('Email já registado');
            }

        });
    });
});