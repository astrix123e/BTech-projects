<html>
<head>
<style>
body{
background-image:url("2.jpg");
background-size:cover;
}

</style>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title >Index</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="script/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link href="log-sign.css" rel="stylesheet">

<?php require("connection.php");
?>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<?php
	  if(isset($_POST['search'])){
$q=$_POST['q'];
$query="(SELECT * FROM company WHERE Profile like '%$q%')";
$count=mysqli_query($conn,$query);
$cou=mysqli_query($conn,$query);
$s=0;
while($row=mysqli_fetch_array($count))
	{
		$s++;
	}
if($s!=0)
{
    $sno=1;
    echo '<br><table border="1px" class="table ">';
	echo '<tr class="danger"><th><center>Sno.</center></th><th><center>Company</center></th><th><center>Profile</center></th><th><center>Package</center></th><tr>';
	while($ro=mysqli_fetch_array($cou))
	{	
		$a=$ro['Company'];
		$m=$ro['Profile'];
		$p=$ro['Package'];
		echo '<tr><td>';
		echo $sno;
		echo '</td><td>';
		echo $a;
		echo '</td><td>';
		echo $m;
		echo '</td><td>';
		echo $p;
		echo '</td></tr>';
		$sno=$sno + 1;
	}
	echo '</table>';
}
	else
	{
		echo '<center><h2>';
		echo "NO such company found";
		echo'</h2></center>';
	}
}
?>
</div>
<div class="col-md-1"></div>
</div>
</html>