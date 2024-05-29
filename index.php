<?php
date_default_timezone_set('America/Sao_Paulo');
header("Content-Type: text/html; charset=UTF-8", true);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Escala de Plataformas</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Preencha o href com o diretório da sua imagem em png -->
	<link rel="icon" type="image/png" href="">

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .05);
        }

        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }

        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

        .centered {
            text-align: center;
            float: none;
            margin-left: auto;
            margin-right: auto;
			margin-top: 20px;
        }

        body {
            padding-top: 20px;
        }

        .panel-body .btn:not(.btn-block) {
            width: 120px;
            margin-bottom: 10px;
        }

        /* ESTILOS ADICIONADOS PARA O CEBEÇALHO */
        .header {
            background-color: #DCDCDC; /* AMARELO */
            color: #000; /* PRETO */
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

		.panel-body {
			margin-top: 20px; /* ADICIONA ESPAÇO ENTRE OS CABEÇALHOS E BOTÕES */
		}
    </style>
</head>

<body>
<div class="header">
    <!-- ADICIONAR IMAGEM PARA LOGO NA ABA DA PÁGINA, preencha o src -->
    <img src="" alt="Sua imagem" style="float: left; margin-right: 20px; margin-left: 12px; width: 100px; height: auto;">
	<h1>Escala de Plataformas</h1>
	
</div>

<div class="container centered">
    <form class="form-signin" name="login" id="login" method="post" action="autentica.php">
        <div class="panel-body espace">
            <div class="col-xs-6 col-md-6">
                <a href="data.php" class="btn btn-success btn-large" role="button"><i class="icon-book icon-white"></i> <br/>Data Center</a>
            </div>
            <div class="col-xs-6 col-md-6">
                <a href="dcn.php" class="btn btn-info btn-large" role="button"><i class="icon-user icon-white"></i> <br/>DCN</a>
            </div>
            <div class="col-xs-6 col-md-6">
                <a href="seguranca.php" class="btn btn-warning btn-large" role="button"><i class=" icon-retweet  icon-white"></i> <br/>Segurança</a>
            </div>
            <div class="col-xs-6 col-md-6">
                <a href="oem.php" class="btn btn-dark btn-large" role="button"><i class=" icon-retweet  icon-white"></i> <br/>O&M</a>
            </div>
            <div class="col-xs-6 col-md-6">
                <a href="torre_ba.php" class="btn btn-primary btn-large" role="button"><i class=" icon-retweet  icon-white"></i> <br/>Torre BA</a>
            </div>
            <div class="col-xs-6 col-md-6">
                <a href="admin/index.php" class="btn btn-danger btn-large" role="button"><i class="icon-home icon-white"></i> <br/>Admin</a>
            </div>
        </div>
    </form>
</div>

<!-- /CONTAINER -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.min.js"></script>

</body>
</html>
