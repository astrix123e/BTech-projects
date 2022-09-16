<?php
session_start();
if(!isset($_SESSION["login_user"]))
{echo '<script>window.location.href="finalyear/index.php"</script>';
}
?>
<?php
require("connection.php");
require("checksignup.php");
require("checksignin.php");
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Admin Section</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="script/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
<style>
body{
	background-color:green;
}
.zoom {
    
    background-color: black;
    transition: transform .5s; /* Animation */
    width: 20px;
    height: 20px;
    margin: 0 auto;
}

.zoom:hover {
    transform: scale(1.2); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
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
<body>
 <div class="navbar" style="padding-top:5px";>
  <a href="https://en.wikipedia.org/wiki/Web_application_development">COMPANY</a>		
     <center><a href="index.php">HOME</a></center>
	 
	 <a class="navbar-right" data-toggle="collapse" data-target="#sp"><b>Log out</b></a>
	 

	</div><br><br>
<div class="container-fluid">
<div class="row">
<div class="col-md-2"  style="background-color:grey; height:auto";>
<center><h2><span class="label label-primary ">Admin Section</span></h2></center><br>
<div class="thumbnail">
      <img src="admin.jpg" class="img-circle">
      <div class="caption">
        <center><h3><?php
 $n=$_SESSION['login_user'];
$sql="(select * from candidate where rollno='$n')";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{
	$name=$row['name'];
	$section=$row['email'];
		$sec=$row['rollno'];
			$sect=$row['password'];
}
echo '<b>Welcome</b><br> '.$name;
?>
</h3></center>
		<center><button class="btn btn-default btn-md" data-toggle="collapse" data-target="#in">View Details</button>
		</center><br>
		<div id="in" class="collapse">
		<table class="table table-stripped">
 <tr><th>Name : <?php echo $name ?></th></tr>
 <tr><th>Email ID :<br><?php echo $section ?></th></tr>
 <tr><th>Password :<br><?php echo $sect ?></th></tr>
 <tr><th>Unique ID :<br><?php echo $sec ?></th></tr>
  </table>
 </div>
        </div>
    </div>
	<center><button class="btn btn-primary btn-block" data-toggle="collapse" data-target="#dd">Change Admin Details</button> </center>
	<br><center><a class="btn btn-warning btn-block" href="attendence.php">Update Attendence</a> </center>
	<br><center><a class="btn btn-danger btn-block" href="viewadmin.php">View/Update Company Details</a></center> 
	<br><center><a class="btn btn-info btn-block" href="studentedit.php">View/Update Student Details</a></center> 
	<br><center><a class="btn btn-success btn-block" href="update.php">View/Update Question Details</a></center> 
	<br><center><a class="btn btn-default btn-block" href="generate.php">Generate/Start Test</a> </center>
	<br><center><a class="btn btn-primary btn-block" href="admincalculate.php">Calculate Result</a> </center>
	<br><center><a class="btn btn-warning btn-block" href="resultdeclare.php">Declare Result</a> </center>
	<br>
</div>
<div class="col-md-10" style="background-color:green; height:750px";>
<div id="outer">	
 <div id="menu" style="background-color:white";>
   </div>
<div id="sofa" class="zoom">
<img src="ad.jpg"height="250px" width="800px"/>	
</div>
<div id="men" style="background-color:white";>
  </div>
<div id="footer" style="background-image:url(3.jpg);">
<div class="collapse" id="dd" ><center>
<br>
  <form method="post" action="">
  <h2>Enter Your Details</h2>
  <table class="table table-striped">
  <tr class="success"><td>Name:</td><td><input required="" class="input" type="text"  name="name"pattern ="[a-zA-Z ]+"><br>
	</td></tr>
	<tr ><td>Email ID:</td><td><input required="" class="input" type="text"  name="email"pattern ="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}"><br>
	</td></tr>
	<tr class="success"><td>Password:</td><td><input required="" class="input" type="text"  name="password"pattern =".{4,}"><br>
	</td></tr>
	</table>
			<!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="update" name="update" class="btn btn-success btn-lg">Update</button>
              <button class="btn btn-danger btn-lg" data-toggle="collapse" data-target="#dd">Close</button><br><br>
			  </div>
            </div>
          </center>
            </form>
			<?php
			if(isset($_POST['update'])){
//echo"<script language='javascript' type='text/javascript'>confirm('Are you sure that you want to delete your account?');</script>";
$id=$_SESSION['login_user'];
$n=$_POST['password'];
$e=$_POST['email'];
$p=$_POST['name'];
$sql="update candidate set name='$p',email='$e',password='$n' where rollno='$id'";
$result=mysqli_query($conn,$sql);
}
?>
</div>
<div class="collapse" id="sp">
<br>
<center><h3><b>Are you sure that you want to logout?</b></h2></center><br>
<center><a href="checklogout.php" class="btn btn-danger btn-lg">YES</a>
<button class="btn btn-info btn-lg" data-toggle="collapse" data-target="#sp">NO</button>
</center><br>
</div>

</div>
</div>
</div></div></div>
</body>
</html>