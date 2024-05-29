<?php
date_default_timezone_set ( 'America/Sao_Paulo' );
header ( "Content-Type: text/html; charset=UTF-8", true );
include_once 'conectar.php';
error_reporting ( E_ALL ^ E_NOTICE );
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
</head>

<body>
<?php 
include 'topo.php';
?>
	<div class="container-fluid">
			<?php

$id = $_POST['id'];
$nome = $_POST['nome'];
$cel= $_POST['celular'];
$dt_plantao= $_POST['data'];

$parts = explode ( '/', $dt_plantao);
$convert = $parts [2] . '-' . $parts [1] . '-' . $parts [0];

$hora_ent= $_POST['hora_ent'];
$hora_sai= $_POST['hora_sai'];

$setor = $_POST['setor'];
$funcao = $_POST['funcao'];
$result = mysql_query("SELECT * FROM $table WHERE id ='$id' ");

if( mysql_num_rows($result) > 0) {
	mysql_query("UPDATE $table SET nome='$nome', cel='$cel', dt_plantao='$dt_plantao',hora_ent='$hora_ent', hora_sai='$hora_sai', setor='$setor', funcao='$funcao'
	 WHERE id = '$id' ")
	or
	die (
	"<div class='container-fluid'>
			<h2>Não foi alterado, algum erro ocorreu! </h2><br/>
			<h3>Verifique se os dados foram digitados corretamente:</h3>
			<p>Dados Informados: <br />
			Nome: $nome<br />
			Celular: $cel<br />
			Data: $dt_plantao<br />
			Hora Inicio: $hora_ent<br />
			Hora Saída: $hora_sai<br />
			Setor: $setor<br />
			Função: $funcao</p><br />
			<div class='alert alert-danger' role='alert'>
			<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
			<span class='sr-only'>Error:</span>"
		.mysql_error()
		."</div>"
 			
			
			);
	echo
	"<div class='container-fluid'>
			<h2>Registro alterado com Sucesso! </h2><br/>"
			."<div class='alert alert-success' role='alert'>
			<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
			<span class='sr-only'>Mensagem:</span>
			<p>Dados Informados: <br />
			Nome: $nome<br />
			Celular: $cel<br />
			Data: ". date ( 'd/m/Y', strtotime ($dt_plantao))."<br />
			Hora Inicio: $hora_ent<br />
			Hora Saída: $hora_sai<br />
			Setor: $setor<br />
			Função: $funcao</p><br />
			<a	class='btn' href='mostrar.php';'>Voltar</a>"
		."</div>";
}
else
{
	mysql_query("INSERT INTO $table (nome, cel, dt_plantao, hora_ent, hora_sai, setor, funcao) 
		values ('$nome', '$cel','$dt_plantao','$hora_ent','$hora_sai','$setor', '$funcao') ") or 
		die (
	"<div class='container-fluid'>
			<h2>Não foi possivel salvar, algum erro ocorreu! </h2><br/>
			<h3>Verifique se os dados foram digitados corretamente:</h3>
			<p>Dados Informados: <br />
			Nome: $nome<br />
			Celular: $cel<br />
			Data: $dt_plantao<br />
			Hora Inicio: $hora_ent<br />
			Hora Saída: $hora_sai<br />
			Setor: $setor<br />
			Função: $funcao</p><br />
			<div class='alert alert-danger' role='alert'>
			<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
			<span class='sr-only'>Error:"
		.mysql_error()
		."</span></div>"
 			
			
			);
		echo 
		"<div class='container-fluid'>
			<h2>Registro inserido com Sucesso! </h2><br/>"
			."<div class='alert alert-success' role='alert'>
			<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>
			<span class='sr-only'>Mensagem:</span>
			<p>Dados Informados: <br />
			Nome: $nome<br />
			Celular: $cel<br />
			Data: ". date ( 'd/m/Y', strtotime ($dt_plantao))."<br />
			Hora Inicio: $hora_ent<br />
			Hora Saída: $hora_sai<br />
			Setor: $setor<br />
			Função: $funcao</p><br />
			<a	class='btn' href='mostrar.php';'>Voltar</a>"
		."</div>";
}

?>

<script src="../js/jquery.js"></script>
	<script src="../js/bootstrap.min.js"></script>

 	</script>

