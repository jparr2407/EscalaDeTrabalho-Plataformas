<?php
$locahost = 'xxx'; // Preencha com o ip do seu banco.
$user = 'xxx'; // Preencha com seus login no banco.
$pass = 'xxx'; // Preencha com a senha do seu usuário no banco.
$db = 'xxx'; // Preencha com o nome da sua database
$table = 'xxx'; // Preencha com o nome da sua tabela
$titulo = "Escala"; // Esse título é só para usar o mesmo título para todas as páginas e puxar por uma variável



$conn = mysql_connect($locahost,$user,$pass,$db)  or die("Não foi possivel conectar no MySQL");
mysql_select_db($db) or die( "Não foi possível conectar ao banco");

if (!$conn) {
	echo "Não foi possível conectar ao banco MySQL.";
	exit;
}

?>
