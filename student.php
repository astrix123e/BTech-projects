<?php
session_start();
if(!isset($_SESSION["login_user"]))
{echo '<script>window.location.href="finalyear/index.php"</script>';
}
?>
<?php
require("checksignup.php");
require("checksignin.php");
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Student Section</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="script/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link href="log-sign.css" rel="stylesheet">

<style>
body{
background-color:white;
}
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color:lightgreen;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 10px 16px;
  text-decoration: none;
  font-size: 20px;
}

.navbar a:hover {
  background: green;
  color: white;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1000px; /* Used in this example to enable scrolling */
}

.zoom {
    
    background-color: black;
    transition: transform .5s; /* Animation */
    width: 1200px;
    height: 500px;
    margin: 0 auto;
}

.zoom:hover {
    transform: scale(1.5); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}
#outer
{
	height:auto;
	width:1000px;
	//border:5px solid white;
	margin:0px auto;
}
#menu
{
	height:50px;
	width:1000px;
	border:1px solid white;
	background-color:white;
	border-radius:20px 20px 0px 0px;
}
#menu ul
{
	list-style-type:none;
}
#menu ul li
{
	display:inline;
	//border:1px solid;
	padding:50px;
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


#sofa1
{
	height:250px;
	width:100px;
	//border:1px solid white;
	margin-top:5px;
}
#lside
{
	height:auto;
	width:100%;
	float:left;
	border-radius:0px 0px 20px 20px;
	background-color:white;
}
#rside
{
	height:auto;
	width:300px;
	float:right;
	border-radius:0px 0px 20px 20px;
	background-color:lightgrey;
}
#parent
{
	height=auto;
	width=1000px;
	margin-top:5px;
}
#footer
{
	height:auto;
	width:1000px;
	background-color:lightgreen;
	margin-top:5px;
	border-radius:0px 0px 20px 20px;
}
</style>
</head>
 <body style="background-color:green"; >
 <div class="navbar" style="padding-top:5px";>
  <a href="https://en.wikipedia.org/wiki/List_of_Indian_IT_companies">COMPANY</a>		
     <center><a href="index.php">HOME</a></center>
	 <center><form class="navbar-form navbar-left" role="search" action="search.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search for company" name="q">
        </div>
        <button class="btn btn-default" name="search">Search</button>
      </form>
	  </center>
	 <a class="navbar-right" data-toggle="collapse" data-target="#sp"><b>Student Profile</b></a>
	 

	</div>
<div class="main">
<br>
<div id="outer"><br>
<div id="menu" style="background-color:white";>
<center>
<h3><b>
<?php
 $n=$_SESSION['login_user'];
$sql="(select * from candidate where rollno='$n')";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{
	$name=$row['name'];
	$academic=$row['academic'];
	$attendence=$row['attend'];
	$email=$row['email'];
	$pass=$row['password'];
}
$w= 'Welcome '.$name;
echo $w;
?>




</b></h3>
</center>
			
</div>	
 <div id="sp" class="collapse" style="background-image:url(3.jpg)";>
<br>
 <center><u> <h1> Student Profile</h1></u></center>
 <br>
 
 
  <form>
 <table class="table table-stripped">
 <tr><th>Name :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $name ?></th></tr>
 <tr class="danger"><th>Rollno. :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $_SESSION['login_user'] ?></th></tr>
 <tr><th>Academics Average :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $academic ?>%</th></tr>
 <tr class="danger"><th>Attendence :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $attendence ?></th></tr>
<tr ><th>Email ID :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $email ?></th></tr>
 <tr class="danger"><th>Password :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $pass; ?></th></tr>
<!-- <tr ><th>Total Test Evaluated :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $f;?></th></tr>
<tr class="danger"><th>Total Correct Program :&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $fs;?></th></tr>-->
 
  </table>
  </form>
<center><button name="checklogout" class="btn btn-success btn-lg" data-toggle="collapse" data-target="#logout">Log Out</button>
<button name="checksignout" class="btn btn-success btn-lg" data-toggle="collapse" data-target="#signout">Delete Account</button>     
 </center>
 <br>
<div id="logout" class="collapse">
<center><h3><b>Are you sure that you want to logout?</b></h2></center>
<center><a href="checklogout.php" class="btn btn-danger btn-lg">YES</a>
<button class="btn btn-info btn-lg" data-toggle="collapse" data-target="#logout">NO</button>
</center><br>
</div>
<div id="signout" class="collapse">
<center><h3><b>Are you sure that you want to Delete your account?</b></h2></center>
<center><a href="checksignout.php" class="btn btn-danger btn-lg">YES</a>
<button class="btn btn-info btn-lg" data-toggle="collapse" data-target="#signout">NO</button>
</center><br>
</div>

 </div>
<div id="carousel-example-generic" class="carousel slide" data-interval="3000" data-ride="carousel" style="padding-top:5px";>
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<center><img src="a.jpg" alt="First slide" height="400px" width="800px"/>
                    </center><!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <div class="">
                               </div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<center><img src="b.jpg" alt="Second slide" height="400px" width="800px"/>
			    	</center><!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <div class="">
                                </div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<center><img src="c.jpg" alt="Third slide" height="400px" width="800px"/>
			    	</center><!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <div class="">
                            </div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
	
<div id="parent" >
<div id="lside"style="background-image:url(3.jpg);">
<br>




 <table border="1px" style="margin-left:50px;margin-top:50px;margin-bottom:50px;margin-right:50px;">
    <tr>
        <td style="height:250px;width:470px;">
            <h3><p style="text-align:center;margin-top:-20px;"><b style="color:black;">Events</b></p></h3>

    <form method="post" action="events.php">
    <center>
    <button style="background-color:#D3D3D3;" type="submit" name="bt" """)
    print("value={}".format(z))
    print("""class="btn btn-default" style="width:160px;height:160px;">
<span style="color:#0080ff;font-size:150px;" onMouseOut="this.style.color='#0080ff'"     onMouseOver="this.style.color='#003366'" title="Events"  class="glyphicon glyphicon-th"></span>
</button>
</center></form>

          
        </td>
   
    <td style="height:300px;width:470px;">
            <h3><p style="text-align:center;margin-top:-20px;"><b style="color:black;">Messages</b></p></h3>

            <form method="post" action="message.php">
    <center>
    <button style="background-color:#D3D3D3;" type="submit" name="bt" """)
    print("value={}".format(z))
    print("""class="btn btn-default" style="width:165px;height:160px;">
<span style="color:#0080ff;font-size:150px;" onMouseOut="this.style.color='#0080ff'"     onMouseOver="this.style.color='#003366'" title="Message"  class="glyphicon glyphicon-envelope"></span>
</button>
</center></form>

        </td>
        <td style="height:300px;width:470px;">
            <h3><p style="text-align:center;margin-top:-20px;"><b style="color:black;">Performance</b></p></h3>
   <form method="post" action="performance.php">
    <center>
    <button style="background-color:#D3D3D3;" type="submit" name="bt" """)
    print("value={}".format(z))
    print("""class="btn btn-default" style="width:165px;height:160px;">
<span style="color:#0080ff;font-size:150px;" onMouseOut="this.style.color='#0080ff'"     onMouseOver="this.style.color='#003366'" title="Performance"  class="glyphicon glyphicon-object-align-bottom"></span>
</button>
</center></form>

            
        </td>
    </tr>
    </table>

</div>
 </div>
<div id="footer">
</div>
</div>
</div>
</body>
</html>