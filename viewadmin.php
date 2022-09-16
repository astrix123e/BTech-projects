<html>
<head>
<style>

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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title >UpdateCompany</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="script/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link href="log-sign.css" rel="stylesheet">
<?php require("connection.php");
?>
<body style="background-color:lightgreen">
<div class="navbar" style="padding-top:5px";>
   <a href="admin.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
     <center><a href="index.php">HOME</a></center>
	 <center><form class="navbar-form navbar-left" role="search" action="search.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search company details" name="q">
        </div>
        <button class="btn btn-default" name="search">Search</button>
      </form>
	  </center>
	 

	</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<center><h2><u>Update Company Details</u></h2></center><br>
<form method="post" action="">
  <table class="table table-striped">
  <tr class="warning"><td>Enter Company Name:</td><td><input required="" class="input" type="text"  name="sno"><br>
	</td></tr>
	<tr class="warning"><td>Enter Profile:</td><td><input required="" class="input" type="text"  name="pro"><br>
	</td></tr>
	<tr class="warning"><td>Enter Package:</td><td><input required="" class="input" type="text"  name="pr"><br>
	</td></tr>
	</table>
			<!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <center><button id="update" name="up" class="btn btn-warning btn-lg">Update</button></center>
			  </div>
            </div>
            </form>
			<?php
			if(isset($_POST['up'])){
//echo"<script language='javascript' type='text/javascript'>confirm('Are you sure that you want to delete your account?');</script>";
$n=$_POST['sno'];
$e=$_POST['pro'];
$e1=$_POST['pr'];
$sql="update Company set profile='$e',package='$e1' where company='$n'";
$result=mysqli_query($conn,$sql);
echo "<script language='javascript' type='text/javascript'>alert('Your Program is updated')</script>";
}
?><br>
<center><h2><u>Insert Program</u></h2></center><br>
<form method="post" action="">
  <table class="table table-striped">
  <tr class="info"><td>Enter Company Name:</td><td><input required=""class="input" type="text"  name="sn"><br>
	</td></tr>
	<tr class="info"><td>Enter Profile:</td><td><input required="" class="input" type="text"  name="prog"><br>
	</td></tr>
	<tr class="info"><td>Enter Quants cut-off:</td><td><input required="" class="input" type="text"  name="pro"><br>
	</td></tr>
	<tr class="info"><td>Enter Reasoning cut-off:</td><td><input required="" class="input" type="text"  name="pr"><br>
	</td></tr>
	<tr class="info"><td>Enter Verbal cut-off:</td><td><input required="" class="input" type="text"  name="p"><br>
	</td></tr>
	<tr class="info"><td>Enter Package:</td><td><input required="" class="input" type="text"  name="p1"><br>
	</td></tr>
	</table>
			<!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <center><button id="update" name="upd" class="btn btn-info btn-lg">Insert</button></center>
			  </div>
            </div>
            </form>
<?php
			if(isset($_POST['upd'])){
//echo"<script language='javascript' type='text/javascript'>confirm('Are you sure that you want to delete your account?');</script>";
$n1=$_POST['sn'];
$n2=$_POST['prog'];
$n3=$_POST['pro'];
$n4=$_POST['pr'];
$n5=$_POST['p'];
$n6=$_POST['p1'];
$sql="insert into Company values ('$n1','$n3','$n4','$n5','$n2','$n6')";
$result=mysqli_query($conn,$sql);
echo "<script language='javascript' type='text/javascript'>alert('Your Program is inserted and its respective column is also inserted')</script>";
}
?><br>
<center><h2><u>Delete Program</u></h2></center><br>
<form method="post" action="">
  <table class="table table-striped">
  <tr class="danger"><td>Enter Company:</td><td><input required=""class="input" type="text"  name="s"><br>
	</td></tr>
	</table>
			<!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <center><button id="update" name="upda" class="btn btn-danger btn-lg">Delete</button></center>
			  </div>
            </div>
            </form>
<?php
			if(isset($_POST['upda'])){
//echo"<script language='javascript' type='text/javascript'>confirm('Are you sure that you want to delete your account?');</script>";
$n=$_POST['s'];
$sql="delete from company where Company='$n'";
$result=mysqli_query($conn,$sql);
echo "<script language='javascript' type='text/javascript'>alert('Your Program is deleted and its respective column is also deleted')</script>";
}
?>
</div>
<div class="col-md-1"></div>
</div>
</body>
</html>