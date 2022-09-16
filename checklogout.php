<?php 
 session_start();
require("connection.php");
?>

<?php
 session_start();
	session_destroy();
header('Location:index.php');
 ?>
