<html>
<head>
<style>

body{
	background-color:lightgreen;
}

#outer
{
	height:auto;
	width:800px;
	//border:1px solid white;
	margin:0px auto;
}
#menu
{
	height:50px;
	width:800px;
	border:1px solid white;
	background-color:white;
	border-radius:20px 20px 0px 0px;
}
#men
{
	height:50px;
	width:800px;
	border:1px solid white;
	background-color:white;
	border-radius:0px 0px 20px 20px;
}
#menu ul
{
	list-style-type:none;
}
#menu ul li
{
	display:inline;
	//border:1px solid;
	padding:10px;
}
#menu ul li a
{
	color:black;
	text-decoration:none;
}
#menu ul li a:hover
{
	color:green;
}


#sofa
{
	height:250px;
	width:800px;
	margin-top:15px;
	margin-bottom:15px;
}
#lside
{
	height:400px;
	width:600px;
	float:left;
	border-radius:0px 0px 0px 20px;
	background-color:white;
}
#rside
{
	height:400px;
	width:200px;
	float:right;
	border-radius:0px 0px 20px 0px;
	background-color:lightgrey;
}
#parent
{
	height=1000px;
	width=800px;
	margin-top:5px;
}
#footer
{
	height:auto;
	width:800px;
	background-color:white;
	margin-top:5px;
	border-radius:20px 20px 20px 20px;
}
.navbar {
  overflow: hidden;
  background-color:grey;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 10px 16px;
  text-decoration: none;
  font-size: 20px;
}

.navbar a:hover {
  background:black;
  color: white;
}

</style>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title >View</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="script/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link href="log-sign.css" rel="stylesheet">

<body style="background-color:lightgreen;">
<div class="navbar" style="padding-top:5px";>
   <a href="admin.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
     <center><a href="index.php">HOME</a></center>
	 <center><form class="navbar-form navbar-left" role="search" action="viewstudent.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search student" name="q">
        </div>
        <button class="btn btn-default" name="search">Search</button>
      </form>
	  </center>
	 

	</div><br><br>
<br><br>
<form method="post" action="upat.php">
<?php require("connection.php");
session_start();
?>
<div class="col-md-2"></div>
<div class="col-md-8">
<?php
$query="SELECT * FROM candidate order by rollno";
$count=mysqli_query($conn,$query);
$cou=mysqli_query($conn,$query);
$s=0;
while($row=mysqli_fetch_array($count))
	{
		$s++;
	}
if($s!=0)
{
    echo '<table border="1px" class="table table-striped">';
	echo '<tr class="danger"><th><center>Name</center></th><th><center>Roll no.</center></th><th><center>Old Attendence</center></th><th><center>New Attendence</center></th></tr>';
	$j=1;
	while($ro=mysqli_fetch_array($cou))
	{
		$n=$ro['name'];
		$r=$ro['rollno'];
		//$s=$ro['section'];
		$s=$ro['attend'];
		$f=1;
		$nm='n'.$j;
		$j=$j+1;
		if($r !=1010101010)
		{
		if($f%2==0)
		{
		echo '<tr class="info"><td>';
		echo $n;
		echo '</td><td>';
		echo $r;
		echo '</td><td><center>';
		echo $s;
		echo '</center></td><td><center>';
		echo '<input type="text" pattern="[ ,-][2]" name="'.$nm.'">';
		echo'</center></td></tr>';
		$f++;
		}
		else
		{
		echo '<tr class="info"><td>';
		echo $n;
		echo '</td><td>';
		echo $r;
		echo '</td><td><center>';
		echo $s;
		echo '</center></td><td><center>';
		echo '<input type="text" pattern="[ ,-][2]" name=';echo $nm;echo'>';
		echo '</center></td></tr>';
		$f++;
		}
	}}
	echo '</table>';
}
?>
<center>
<button class="btn btn-lg btn-info" name="sub">Update</button>
<input type="reset" class="btn btn-lg btn-warning"></input></center>
</form>
<br>
</div>
<div class="col-md-2"></div></body>
</html>