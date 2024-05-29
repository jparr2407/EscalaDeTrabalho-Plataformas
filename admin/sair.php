<?php 
session_start(); 
session_destroy(); 
header("Location: index.php");exit; ?>
<meta http-equiv="refresh" content="0; url=index.php">