<html>
<head>
<style>

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
<br>
<center><h2 style="margin-left:-55px;"><u>Generate Test</u></h2></center><br>
<form method="post" action="" enctype="multipart/form-data">
  <table class="table table-striped">
  <tr class="danger"><td>Enter TestID:</td><td><input required="" class="form-control" type="text" style="width:190px;" name="sn" >
	</td></tr>
	<tr class="danger"><td>Date :</td><td>
    <input required="" class="form-control" type="Date" style="width:190px;" name="d" >
	</td></tr>
	<tr class="danger"><td>Total Marks Quant:</td><td>
    <input required="" class="form-control" type="number" style="width:190px;" name="tq" >
	</td></tr>
	<tr class="danger"><td>Total Marks Reasoning:</td><td>
    <input required="" class="form-control" type="number" style="width:190px;" name="tr" >
	</td></tr>
  <tr class="danger"><td>Total Marks Verbal:</td><td>
    <input required="" class="form-control" type="number" style="width:190px;" name="tv" >
	</td></tr>

  </table>
			<!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <center><button id="insert" name="instest" class="btn btn-danger btn-lg">Generate Link</button></center>
			  </div>
            </div>
            </form>

            <?php
            if(isset($_POST['instest'])){
            $n=$_POST['sn'];
            $date=$_POST['d'];
            $q=$_POST['tq'];
            $r=$_POST['tr'];
            $v=$_POST['tv'];
            $connect = mysqli_connect("localhost", "root", "", "finalyear");
            $query = "INSERT into test(Testid,Date,Tquant,Treas,Tverb) VALUES('$n','$date','$q','$r','$v')";
            if(mysqli_query($connect, $query)){
            echo '<script>alert("Test link generated succesfully.. Now generate question")</script>';
            }
            else{
            echo '<script>alert("Error!! Not Generated ")</script>';
            }

          }
?>
<br>
            <center><h2><u>Start Link</u></h2></center><br>
            <form method="post" action="">
              <table class="table table-striped">
              <tr class="info"><td>Enter TestID to Start:</td><td><input required="" style="width:190px;"class="form-control" type="number"  name="s"><br>
            	</td></tr>
            	</table>
            			<!-- Button -->
                        <div class="control-group">
                          <label class="control-label" for="confirmsignup"></label>
                          <div class="controls">
                            <center><button id="update" name="st" class="btn btn-primary btn-lg">Start Link</button></center>
            			  </div>
                        </div>
                        </form>
        <?php
                        if(isset($_POST['st'])){
                        $n=$_POST['s'];
                        $tno='T'.$n;  //use to add column in table candidate
                        $connect = mysqli_connect("localhost", "root", "", "finalyear");
                        $sql="SELECT * from test WHERE Testid='$n' and started=0 ";
                        $result=mysqli_query($connect, $sql);
                        $flag=0;
                        if($row = mysqli_fetch_array($result))
                        {
                          $flag=1;
                        }


                        if($flag==1)
                        {

                        $query = "UPDATE test set started=1 where Testid='$n'";
                        $adc = "ALTER TABLE candidate add column $tno varchar(10) not null default 'no'";
                        if(mysqli_query($connect, $query)){
                          mysqli_query($connect,$adc);

                        echo '<script>alert("started succesfully")</script>';
                        }
                        else{
                        echo '<script>alert("Error!! Not generated link or already started ")</script>';
                        }
                        }

                        else{
                        echo '<script>alert("Error!! Not generated link or already started ")</script>';

                        }
                        }
                        ?>
						<br><center><h2><u>View Question</u></h2></center><br>
<form method="post" action="view.php">
  <table class="table table-striped">
  <tr class="warning"><td>Enter TestID:</td><td><input required="" style="width:190px;"class="form-control" type="text"  name="s"><br>
	</td></tr>
	</table>
			<!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls">
                <center><button id="update" name="upda" class="btn btn-warning btn-lg">View Questions</button></center>
			  </div>
            </div>
            </form>

</div>
<div class="col-md-1"></div>
</div>
</body>
</html>