<?php
include('conectar.php');
if($_POST['id'])
{
$id=$_POST['id'];
$delete = "DELETE FROM $table WHERE id='$id'";
mysql_query( $delete);
}

?>