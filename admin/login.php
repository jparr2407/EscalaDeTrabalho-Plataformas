<?php 

date_default_timezone_set('America/Sao_Paulo');
header ( "Content-Type: text/html; charset=UTF-8", true );
include_once 'conectar.php';

// session_start inicia a sessão session_start(); 
// as variáveis login e senha recebem os dados digitados na página anterior 
$login = $_POST['login'];
$senha = md5($_POST['senha']); 
$result = mysql_query("SELECT * FROM `escala_teste.admins` WHERE `login` = '$login' AND `SENHA`= '$senha'"); 
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi bem sucedida, 
 * ou seja se ela estiver encontrado algum registro idêntico o seu valor será igual a 1, se não, 
 * se não tiver registros seu valor será 0. Dependendo do resultado ele redirecionará para 
 * a pagina site.php ou retornara para a pagina do formulário inicial para que se possa tentar novamente realizar o login */ 

if(mysql_num_rows ($result) > 0 ) { 
	$_SESSION['login'] = $login; 
	$_SESSION['senha'] = $senha; 
	header('location:mostrar.php'); 
} else{ unset ($_SESSION['login']); 
unset ($_SESSION['senha']); 
header('location:index.php'); } 
?>

