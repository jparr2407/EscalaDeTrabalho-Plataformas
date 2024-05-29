<?php
include_once 'conectar.php';

session_start();


$login = $_POST['login'];
    $entrar = $_POST['entrar'];
    $senha = md5($_POST['senha']);
        if (isset($entrar)) {
            $verifica = mysql_query("SELECT * FROM escala_teste.admins WHERE login = '$login' AND senha = '$senha'") or die("Erro ao selecionar");
                if (mysql_num_rows($verifica)<=0){
                    echo"<script language='javascript' type='text/javascript'>alert('Login e/ou senha incorretos');window.location.href='login.php';</script>";
                    die();
                }else{
                		$_SESSION['login'] = $login;
						$_SESSION['senha'] = $senha;
                	
                    header("Location:mostrar.php");
                }
        }
?>
