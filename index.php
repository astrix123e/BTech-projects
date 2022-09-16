<?php
session_start();
?>

<?php require("connection.php");
?>
<html>
<head>
<style>
body{
background-image:url("b5.jpg");
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
<body >
<center><h1 style="color:white"> Company Recommender System </h1></center>
 <?php require("checksignup.php");
?>
<nav class="navbar navbar" role="nvigation" style="padding-top:20px";>
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="https://en.wikipedia.org/wiki/List_of_Indian_IT_companies"><h4 style="color:white;">COMPANY</h4></a>
    </div>
	 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">   
        <li >
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseZero">
          <h4 style="color:white; hover:blue;">ABOUT</h4>
        </a>
    <div id="collapseZero" class="panel-collapse collapse ">
      <div class="panel-body">
	  <p>
	  Our website provides a platform to candidates where they participate along with many other candidates and give an online assessment which involves the past questions of various recruitment companies, after giving the assessment it will recommend the best company to the candidates for which they are fit for.
	</p>
  </div>  </div></li>
         <li>
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
          <h4 style="color:white;">CONTACT US</h4>
        </a>
    <div id="collapseOne" class="panel-collapse collapse ">
	  <div class="panel-body-left-side">
        <p>Anil Kumar :- anilk27@gmail.com <br>Anubhav Gupta :- anu6gupta@gmail.com<br>Arpit Kesarwani :- arpitkesarwani16@gmail.com<br>Devansh Mittal :- devanshmittal98@gmail.com</p>
      </div>
    </div>		
	       <br>
          </li>
		 
        </ul>
     
      <ul class="nav navbar-nav navbar-right">
               <li >
          <a href="#" data-toggle="modal" data-target="#myModal"><h4 style="color:white;">USER<b class="caret"></b></h4></a>
        </li>
</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
<!-- Carousel -->
<div class="row" style="margin-top:30px;">
<div class="col-md-6">
    	<div id="carousel-example-generic" class="carousel slide" data-interval="2000" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
			  	<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<center><img width="550px"src="tcs.jpg" alt="First slide">
                    </center><!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <div class="">
                               </div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<center><img height="300px"width="550px"src="hcl.jpg" alt="Second slide">
			    	</center><!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <div class="">
                                </div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			    <div class="item">
			    	<center><img height="300px"width="550px" src="wipro.jpg" alt="Third slide">
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
		</div>
				<!-- /carousel -->
<div class="col-md-6">
    	<div id="carousel-example-generic1" class="carousel slide" data-interval="2000" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic1" data-slide-to="3" class="active"></li>
			    <li data-target="#carousel-example-generic1" data-slide-to="4"></li>
			    <li data-target="#carousel-example-generic1" data-slide-to="5"></li>
			</ol>
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
			    <div class="item active">
			    	<center><img height="300px"width="550px"src="in.jpg" alt="Fourth slide">
			    	</center><!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <div class="">
                            </div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
				<div class="item">
			    	<center><img height="300px"width="550px"src="cognizant.jpg" alt="Fifth slide">
			    	</center><!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <div class="">
                            </div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
				<div class="item">
			    	<center><img width="550px" height="300px" src="cap.jpg" alt="Sixth slide">
			    	</center><!-- Static Header -->
                    <div class="header-text hidden-lg">
                        <div class="col-md-12 text-center">
                            <div class="">
                            </div>
                        </div>
                    </div><!-- /header-text -->
			    </div>
			</div>
			<!-- Controls -->
			<a class="left carousel-control" href="#carousel-example-generic1" data-slide="prev">
		    	<span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic1" data-slide="next">
		    	<span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		</div>
		</div>
		<!-- /carousel -->

</div>
  </nav>
 <!-- MODAl1-->
<div class="modal fade bs-modal-sm log-sign" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" >
    <div class="modal-content">
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <li id="tab1" class=" active tab-style login-shadow "><a href="#signin" data-toggle="tab">Log In</a></li>
              <li id="tab2" class=" tab-style "><a href="#signup" data-toggle="tab">Sign Up</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content" >
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" method="post" action="">
	

			<fieldset>
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="group">
<input required="" class="input" type="text" name="rollno" pattern="[1-9][0-9]{9}"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date" >University RollNo.</label></div>
            
			<!-- Text input-->
               <div class="group">
<input required="" class="input" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Email ID</label></div>
            
			<!-- Password input-->
            <div class="group">
<input required="" class="input" type="password" name="password" pattern=".{4,}" ><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Password</label>
    </div>
<em>minimum 6 characters</em>
           <div class="forgot-link">
            <a href="#forgot" data-toggle="modal" data-target="#forgot-password" style="font-size:20px; color:black;"> I forgot my password</a>
            </div>
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls">
                <button id="signin" name="signin" class="btn btn-primary btn-block">Log In</button>     
	  
			  </div>
            </div>
            </fieldset>
            </form>
			<?php
			function alerting($msg){
			echo '<script type="text/javascript">alert("'.$msg.'")</script>';
			}
			if(isset($_POST['signin']))
			{
			$rollno=$_POST['rollno'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$_SESSION['login_user']=$rollno;
			$query="select rollno from candidate where rollno='$rollno' and email='$email' and password='$password'";
			$run=mysqli_query($conn,$query);
			if(mysqli_num_rows($run)!=0)
			{
				if($rollno==1010101010)
				{
					echo"<script language='javascript' type='text/javascript'>location.href='admin.php'</script>";
				}
				else
				{
						echo"<script language='javascript' type='text/javascript'>location.href='student.php'</script>";
				}
			}
			else
			{
					alerting("Invalid details.Please check your details again");
			}
			}
			?>
        
			</div>
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal" method="post" action="">
       	<fieldset>
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="group">
<input required="" class="input" type="text"  name="name"pattern ="[a-zA-Z ]+"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Name</label></div>
            <!-- Text input-->
            <div class="group">
<input required="" class="input" type="text" name="rollno" pattern="[1-9][0-9]{9}" title="10 digits required"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date" >University RollNo.</label></div>
            <!-- Password input-->
            <div class="group">
<input required="" class="input" type="text" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}" title="Valid ID format required"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date" >Email ID</label></div>
            <!-- Text input-->
            <div class="group">
<input required="" class="input" type="password" name="password" pattern=".{4,}" title="four or more character required"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date" >Password</label></div>
              <em>1-8 Characters</em>
              <div class="group2">
<input required="" class="input" type="text" name="section" pattern="[1-9]{2}" title="valid percentage required"><span class="highlight" ></span><span class="bar"></span>
    <label class="label" for="date" >Academics</label></div>      
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <button id="confirmsignup" name="confirmsignup" class="btn btn-primary btn-block">Sign Up</button>
              </div>
            </div>
            </fieldset>
            </form>
			

      </div>
    </div>
      </div>
      <!--<div class="modal-footer">
      <center>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </center>
      </div>-->
    </div>
  </div>
</div>
<!--modal2-->
<div class="modal fade bs-modal-sm" id="forgot-password" tabindex="0" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"style="color:black";>Get your new password</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" action="">
        <fieldset>
		 <div class="group">
<input required="" class="input" type="text" name="rollno" pattern="[1-9][0-9]{9}" title="10 digits required"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date" >University RollNo.</label></div>
        <div class="group">
<input required="" class="input" type="text" name="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date">Email ID</label></div>
            <div class="group">
<input required="" class="input" type="password" name="password" pattern=".{4,}" title="four or more character required"><span class="highlight"></span><span class="bar"></span>
    <label class="label" for="date" >Enter new Password</label></div>
        
		<div class="control-group">
              <label class="control-label" for="forpassword"></label>
              <div class="controls">
                <button name="checkmail" class="btn btn-primary btn-block">Submit</button>
              </div>
            </div>
          </fieldset>
            </form>
			<?php
			if(isset($_POST['checkmail'])){
//echo"<script language='javascript' type='text/javascript'>confirm('Are you sure that you want to delete your account?');</script>";
$n=$_POST['rollno'];
$e=$_POST['email'];
$p=$_POST['password'];
$sql="update candidate set password='$p' where rollno='$n' and email='$e'";
$result=mysqli_query($conn,$sql);
echo "<script language='javascript' type='text/javascript'>alert('Your password is updated with new password')</script>";
}
?>


      </div>
    </div>
  </div>
</div>
</body>
</head>
</html>