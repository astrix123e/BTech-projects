<?php
 session_start();
 $id=$_SESSION['login_user']; /* assume kya hai line no 65 dekh lena */
  
?>
<html>
<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="import/jquery-3.3.1.js" type="text/javascript"> </script>
 <script src="jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</head>
<body style="background-color:lightgreen;">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<?php
/* connectivity */
if(isset($_POST['upda'])){
$n=$_POST['s'];
$connect = mysqli_connect("localhost", "root", "", "finalyear");
$query="SELECT * from question where testID='$n'";
$count=mysqli_query($connect,$query);
$cou=mysqli_query($connect,$query);
$s=0;
while($row=mysqli_fetch_array($count))
{
  $s++;
}
  if($s!=0)
  {
      $a=0;
       {
         echo '<center><h2><u>Display Questions </u></h2></center>';
       echo '<table border="1px" style="margin-top:70px;" class="table">';
       echo '<tr class="success"><th><center>Sno.</center></th><th><center>QuestionID</center></th><th><center>Question</center></th><th><center>Answer</center></th></tr>';
       while($ro=mysqli_fetch_array($cou))
       {
       $f=$ro['questionID'];
       $d=$ro['answer'];
       if($f!=-1){
       echo '<tr><td>';
       echo'<center>';echo $a;echo'</center>';
       echo '</td><td>';

       echo'<center> ';echo $f;echo'</center>';
       echo '</td><td>';

       echo'<center>
        <img src="data:image/jpeg;base64,'.base64_encode($ro["Img"] ).'" height="400px" width="1000px" class="img-thumnail" />';
        echo'</center>';
       echo '</td><td>';

       echo'<center>';echo $d;echo'</center>';

       echo '</td></tr>';
       $a++;

     }
   }
   echo '</table>';
       }
       }

	   else{
			echo '<center><h2>No such test Id found</h2></center>';
	   }

       // mesage

}
     ?>
       <center>
       <a href="generate.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
</center><br>
</div>
<div class="col-md-1"></div>
</body>
</html>