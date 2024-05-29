<?php
date_default_timezone_set ( 'America/Sao_Paulo' );
header ( "Content-Type: text/html; charset=UTF-8", true );
include_once 'conectar.php';
ob_start ();
session_start ();
if (! isset ( $_SESSION ['login'] ) and ! isset ( $_SESSION ['senha'] )) :
	echo '
			
<!DOCTYPE html>
<html>
<head>
<title> Erro de Acesso</title>
<!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-responsive.css" rel="stylesheet">
			<meta name="viewport" content="width=device-width,initial-scale=1">
</head>
<body>
	<div class="container">			
						<div>
				<img class="img-responsive espace" alt="NET" src="../img/logo.png" />
			</div>
			<div class="alert alert-danger espace" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only"><h3>Erro:</h3></span>
				<p>Para ter acesso a esta pagina e necessario logar-se.</p><br/>
				<a href="index.php" class="btn btn-danger">Fazer Login</a>
			</div>
	</div>
	<!-- /container -->
	<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>

</html>		
			
			
			
			
		';
	die ();

endif;

// echo "Entrei";

$logindb = $_SESSION ['login'];
?>