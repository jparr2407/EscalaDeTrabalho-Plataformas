<?php
date_default_timezone_set ( 'America/Sao_Paulo' );
header ( "Content-Type: text/html; charset=utf-8", true );
include_once 'conectar.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo  $titulo ?></title>
<!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
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

.form-signin .form-signin-heading, .form-signin .checkbox {
	margin-bottom: 10px;
}

.form-signin input[type="text"], .form-signin input[type="password"] {
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
}
</style>

</head>

<body>
	<div class="container centered">
		<form class="form-signin" name="login" id="login" method="post"
			action="autentica.php">
			<h3 class="form-signin-heading">Login</h3>
			<input type="text" class="input-block-level" placeholder="Login"
				name="login" id="login">
			 <input type="password"
				class="input-block-level" placeholder="Senha" name="senha"
				id="senha">
			 <input type="submit" style="margin-bottom: 20px;"
				class="btn btn-primary btn-large btn-block" value="Entrar"
				id="entrar" name="entrar">
			<a href="../index.php" class="btn btn-info " role="button"><i class="icon-arrow-left icon-white"></i>Voltar</a>
		</form>

	</div>
	<!-- /container -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>

</html>