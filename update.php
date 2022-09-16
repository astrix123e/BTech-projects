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

.avatar-zone{
   width:200px;
   height:200px;
   background-color:#CCCCCC;
}
/* upload move */
.overlay-layer{
   width:200px;
   height:40px;
   position:absolute;
   margin-left: 0px;
   margin-top:-5px;
   opacity:0.5;
   background-color:red;
   z-index:0;
   font-size:25px;
   color:#FFFFFF;
   text-align:center;
   line-height:40px;
}
/* upload file choose*/
.upload_btn{
   position:absolute;
   width:250px;
   height:25px;
   margin-top:4px;
   z-index:10;
   opacity:0;
}
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
    align:center;
}

#img-upload{
    width: 100%;
}
body{
background-color:lightgreen;
}
</style>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title >EditQuestions</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="script/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link href="log-sign.css" rel="stylesheet">
<?php //require("connection.php");
?>
<body style="background-color:lightgreen">
<div class="navbar" style="padding-top:5px";>
   <a href="admin.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
     <center><a href="index.php">HOME</a></center>
	 <center><form class="navbar-form navbar-left" role="search" action="viewquestion.php" method="post">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search for question" name="q">
        </div>
        <button class="btn btn-default" name="search">Search</button>
      </form>
	  </center>


	</div>
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<center><h2><u>Update Question</u></h2></center><br>
<form method="post" action="" enctype="multipart/form-data">
  <table class="table table-striped">
  <tr class="warning"><td>Enter QuestionID:</td><td><input required="" class="form-control" type="text"  style="width:190px;"name="sn"><br>
	</td></tr>
	<tr class="warning"><td>Question Type:</td><td><select id="inputState" required="" class="form-control" name="prog" style="width:190px;" >
        <option>Choose Type</option>
        <option>quants</option>
        <option>reasoning</option>
        <option>verbal</option>
      </select >
	</td></tr>
	<tr class="warning"><td>Update Question:</td><td><input type="file" name="image" id="image" class="upload_btn"/ required>
  <div class="overlay-layer">Upload</div><br>
	</td></tr>
	<tr class="warning"><td>Update Answer:</td><td><select id="inputState" required="" class="form-control" name="pr" style="width:190px;" >
        <option>Choose Answer</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option><br>
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
$n=$_POST['sn'];
$e=$_POST['prog'];
$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$end=$_POST['pr'];
$connect = mysqli_connect("localhost", "root", "", "finalyear");
$sql="SELECT * from question where questionID=$n";
$result1=mysqli_query($connect, $sql);
$flag=0;
if($row = mysqli_fetch_array($result1))
{
  $flag=1;
}
if($e!=NULL && $end!=0 && $file!=NULL && $flag==1)
{
  $query = "UPDATE question set type='$e',Img='$file',answer='$end' where questionID='$n'";
  if(mysqli_query($connect, $query)){
    echo '<script>alert("Updated succesfully")</script>';
  }
  else{
    echo '<script>alert("Error!! Question not found ")</script>';
  }
}

else{
  echo '<script>alert("Error!! Question not found ")</script>';

}
//$sql="update question set question='$e',type='$e1',answer='$e2' where questionID='$n'";
//$result=mysqli_query($conn,$sql);
//echo "<script language='javascript' type='text/javascript'>alert('Your Program is updated')</script>";
}
?>
<br>
<center><h2 style="margin-left:-55px;"><u>Insert Question</u></h2></center><br>
<form method="post" action="" enctype="multipart/form-data">
  <table class="table table-striped">
  <tr class="info"><td>Enter TestID:</td><td><input required="" class="form-control" type="text" style="width:190px;" name="sn" >
	</td></tr>
	<tr class="info"><td>QuestionType :</td><td><select id="inputState" required="" class="form-control" name="prog" style="width:190px;" >
        <option>Choose Type</option>
        <option>quants</option>
        <option>reasoning</option>
        <option>verbal</option>
      </select >
	</td></tr>
	<tr class="info"><td>Enter Qusetion:</td><td><input type="file" name="image" id="image" class="upload_btn"/ required>
  <div class="overlay-layer">Upload</div><br>
	</td></tr>
	<tr class="info"><td>Enter Answer:</td><td><select id="inputState" required="" class="form-control" name="pr" style="width:190px;" >
        <option>Choose Answer</option>
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
	</td></tr>
	</table>
			<!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <center><button id="insert" name="inser" class="btn btn-info btn-lg">Insert</button></center>
			  </div>
            </div>
            </form>
            <?php
            if(isset($_POST['inser'])){
            //echo"<script language='javascript' type='text/javascript'>confirm('Are you sure that you want to delete your account?');</script>";
            $n=$_POST['sn'];
            $e=$_POST['prog'];
            $end=$_POST['pr'];
            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));

            //echo $file;
            //$end=$_POST['pr'];
            $connect = mysqli_connect("localhost", "root", "", "finalyear");
            $sql="SELECT * from test where Testid=$n";
            $result=mysqli_query($connect, $sql);
            $flag=0;
            if($row = mysqli_fetch_array($result))
            {
              $flag=1;
            }
            if($flag==1){
            if($e!=NULL && $end!=NULL && $file!=NULL)
            {
              $query = "INSERT INTO question(testID,Img,type,answer) VALUES ('$n','$file','$e','$end')";
              if(mysqli_query($connect, $query))
              {
                echo '<script>alert("Question is Added succesfully")</script>';
              }
              else{
                echo'<script>alert("Error!!!")</script>';
              }
            }

            else{
              echo '<script>alert("Error!!")</script>';

            }
            }
            else{
              echo '<script>alert("Error!! please generate test link ")</script>';

            }

            }
            ?>


<br>
<center><h2><u>Delete Question</u></h2></center><br>
<form method="post" action="">
  <table class="table table-striped">
  <tr class="danger"><td>Enter QuestionID:</td><td><input required="" style="width:190px;"class="form-control" type="text"  name="s"><br>
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
$connect = mysqli_connect("localhost", "root", "", "finalyear");
$query="DELETE from question where questionID='$n'";
$result=mysqli_query($connect,$query);
echo "<script language='javascript' type='text/javascript'>alert('Your question is deleted')</script>";
}
?>

<br>
<br>
            </div>
<div class="col-md-1"></div>
</div>
</body>
</html>