<?php 
 session_start();
require("connection.php");
?>
<?php
//echo"<script language='javascript' type='text/javascript'>confirm('Are you sure that you want to delete your account?')</script>";
$n=$_SESSION['login_user'];
echo $n;
$sql="delete from candidate where rollno=$n";
echo $sql;
if(mysqli_query($conn,$sql)){
echo "deleted successfully";
session_destroy();
header('Location:index.php');
}else{
echo '<center><h2>';
echo "Can't delete";
echo '</h2></center>';
}

?>
