<?php
  session_start();
  include('config.php');
  include('funcoes.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
<title>Livraria Curso PHP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
<div id="container">
	<div id="header">

    <div id="navigation">
    	 <?php include('menu.php'); ?>

        <div class="clear"></div>
    </div>

	</div>

	<div id="wrap">
    	<div id="navcontainer">
        <?php include('left.php'); ?>
      </div>

      <div id="content">
    		<?php

          if(isset($_GET['zona']) && $_GET['zona']!='' ){
            $area_a_carregar = $_GET['zona'];

          } else {
            $area_a_carregar = 'inicio';
          }



            switch($area_a_carregar){

              case 'lista_livros': {
                                    include('lista.php');
                                   } break;

              case 'registo' : {
                                  include('registo.php');
                                } break;

              case 'carrinho' : {
                                  include('detalhe_carrinho.php');
                                } break;

              case 'contactos' : {
                                  include('contacto.php');
                                } break;
              case 'inicio' : {
                                  include('home.php');
                              } break;
              case 'detalhe' : {
                                  include('detalhe.php');
                                } break;
              case 'recuperar_pass' : {
                                  include('pedido_pass.php');
                                } break;
              case 'repor_pass' : {
                                  include('repor.php');
                                } break;

              case 'obrigado' : {
                                  include('obrigado.php');
                                } break;

              default : {
                          include('404.php');
                        } break;

            }


         /* include('home.php');*/

         ?>

    	</div>


    	<div id="subcontent">
        <?php include('right.php'); ?>
      </div>


    	<div id="footer">
    		<?php include('footer.php') ?>
    	</div>
  </div>
</div>
  
  <script src="javascript/jquery.js"></script>
  <script src="javascript/custom.js"></script>
</body>
</html>