<?php
session_start();
require("connection.php");
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Test</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="script/jquery.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
   <link href="log-sign.css" rel="stylesheet">
<script type="text/javascript">
/*function KillCopy(e)
{return false}
//function reEnable(){return true}
//document.onselectstart = new Function("return false")
if(window.sidebar){
document.onmousedown=KillCopy
//document.onclick=reEnable
}*/
</script>
<style>
body{
background-color:white;
}

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
  color: white;
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
  height: 1500px; /* Used in this example to enable scrolling */
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
	width:1200px;
	//border:5px solid white;
	margin:0px auto;
}
#menu
{
	height:50px;
	width:1200px;
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
	border-radius:20px 20px 20px 20px;
	background-color:white;
}
#rside
{
	height:auto;
	width:300px;
	float:right;
	border-radius:20px 20px 20px 20px;
	background-color:lightgrey;
}
#parent
{
	height=auto;
	width=1200px;
	margin-top:5px;
}
#footer
{
	height:auto;
	width:auto;
	background-color:white;
	margin-top:5px;
	border-radius:20px 20px 20px 20px;
}
::placeholder{
font-size:50px;
text-align:center;
}
textarea{
-webkit-user-select:none;
-khtml-user-select:none;
-moz-user-select:none;
-ms-user-select:none;
-o-user-select:none;
user-select:none;
}
</style>
</head>

 <body style="background-color:white;" oncontextmenu="return false;" onselect="return false;">
 <div class="navbar" style="padding-top:5px";>
     <center>
<h3>
<?php
 $n=$_SESSION['login_user'];
$sql="(select * from candidate where rollno='$n')";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($result))
{
	$name=$row['name'];
	$section=$row['academic'];
}
echo"<b>All the Best </b>".$name;

?>

</h3>
</center>
	

	</div><br>
<div id="outer" ><br>
<br><br>

 
<div style="color:white;">
<h3>
<?php
if(isset($_POST['givetest']))
{	
$sess =$_POST['field'];		
$n=$_SESSION['login_user'];
$nt=0;
	$ch="SELECT giventest from candidate where rollno=$n";
	if($res=mysqli_query($conn,$ch)){
	if($row=mysqli_fetch_array($res))
	{
		$nt=$row['giventest'];
	}
	}
if($nt!=$sess-1){
	echo '<script>alert("give previous test ")</script>';
    echo '<script language="javascript">';
echo 'top.location.href="events.php"';
      echo '</script>';

}
else{	
$g='ans'.$n;
$sql2="alter table question add column $g int(1) default 0";
$result2=mysqli_query($conn,$sql2);

$query="(SELECT * FROM question where testID='$sess' order by questionID)";
$count=mysqli_query($conn,$query);
$cou=mysqli_query($conn,$query);
$s=0;
$sno=1;
while($row=mysqli_fetch_array($count))
	{
		$s++;
	}
if($s!=0)
{
	$f=1;
    echo '<table border="1px" class="table ">';
	echo '<tr border="20px"class="danger"><th><center>Sno.</center></th><th><center>Questions</center></th><th><center>Type</center></th><tr>';
	$ro=mysqli_fetch_array($cou);
		$g=$ro['Img'];
		$quest=$ro['questionID'];
		$j=$ro['type'];
		echo '<tr class="warning"><td rowspan="2">';
		echo $f;
		$f++;
		echo '</td><td>';
		echo'<img src="data:image/jpeg;base64,'.base64_encode($ro["Img"] ).'" height="auto" width="auto" class="img-thumnail" />';
		echo'</td><td rowspan="2">';
		echo $j;
		echo '</td></tr>';
		echo'<tr class="warning"><td>';
		echo'<p style="color:black; font-size:20px;">Choose Option</p><br>';
		echo'<form action="qq2.php" method="post">';
		echo'<input type="radio" id="a" name="ans" value="1">';
		echo'<label for="a">&nbsp&nbspOption A</label><br>';
		echo'<input type="radio" id="b" name="ans" value="2">';
		echo'<label for="b">&nbsp&nbspOption B</label><br>';
		echo'<input type="radio" id="c" name="ans" value="3">';
		echo'<label for="c">&nbsp&nbspOption C</label><br>';
		echo'<input type="radio" id="d" name="ans" value="4">';
		echo'<label for="d">&nbsp&nbspOption D</label>';
		echo'<center>';
		echo'<input type="hidden" name="sno" value="'.$f.'">';
		echo'<input type="hidden" name="testid" value="'.$sess.'">';
		echo'<input type="hidden" name="question" value="'.$quest.'">';
		echo'<button class="btn btn-primary btn-lg" name="answer"><b>Save & Next</b></button>';
		echo'&nbsp<button type="reset" class="btn btn-danger btn-lg"><b>Reset</b></button>';
		echo'</form></center>';
		echo'</td></tr>';	
	echo '</table>';
}
else
{
	
}
}
}
?>

</div></h3><br>
<!--<button class="btn btn-lg btn-warning"type="submit" name="answering" value = "'.$sess.'" >Submit</button>-->
  </div><br>
</div>
</body>
</html>