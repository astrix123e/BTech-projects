<?php require("connection.php");
session_start();
?>
<html>
<head>
<style>
body{
background-image:url("3.jpg");
background-size:cover;
}
</style>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title >View</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="script/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link href="log-sign.css" rel="stylesheet">
<body>

<?php
			if(isset($_POST['sub'])){
$que="SELECT * FROM candidate order by rollno";
$co=mysqli_query($conn,$que);
$j=2;
$cot=mysqli_query($conn,$que);
$st=0;
while($row=mysqli_fetch_array($cot))
	{
		$st++;
	}
while($row=mysqli_fetch_array($co))
	{

		$name=$row['rollno'];
		if($name!=1010101010){
		$nm1='n'.$j;
		$n=$_POST[$nm1];
		$sql="update candidate set attend=attend +$n where rollno='$name'";
		$result=mysqli_query($conn,$sql);
		$st=$st-1;
		if($st==0)
		{ 
			break;
		}
		$j=$j+1;}
	}				
	}
?>
<center><h1 style="color:black;">Your Attendence Is Successfully Updated</h1></center>
<center>
       <a href="attendence.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
</center>
</body>
</html>