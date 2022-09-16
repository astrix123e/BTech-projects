<?
session_start();
php require("connection.php");
?>
<?php
			if(isset($_POST['confirmsignup'])){
			$a=$b=$c=$d=$e="";
$a=$_POST['name'];
$b=$_POST['rollno'];
$c=$_POST['email'];
$d=$_POST['password'];
$e=$_POST['section'];

  $var="insert into candidate(name,rollno,email,password,academic)values('$a','$b','$c','$d','$e')";
$var1=mysqli_query($conn,$var);
if($var1){
echo"";
}
else{
echo"error".mysqli_error($conn);
}
}
?>