<?php
 session_start();
 $idp=$_SESSION['login_user']; /* assume kya hai line no 65 dekh lena */
  
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
 $connect = mysqli_connect("localhost", "root", "", "finalyear");
  $query = "SELECT *  from testresult where dc=1 and cal=1 and Rollnumber='$idp' ";
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
         echo '<center><h2>Messages</h2></center>';
       echo '<table border="1px" style="margin-top:70px;" class="table table-striped">';
       echo '<tr class="success"><th><center>Sno.</center></th><th><center>Message</center></th><th><center></center></th></tr>';
       while($ro=mysqli_fetch_array($cou))
       {
       $f=$ro['Testid'];

       $g = $idp; 
       if($f!=-1){
       echo '<tr><td>';
       echo'<center>';echo $a;echo'</center>';
       echo '</td><td>';

       echo'<center><h4> <p style="color:Blue;">Test ';echo $f;echo' Result Has Been Declared .....!!!
       <br>Click On View Result</p></h4></center>';
       echo '</td><td>';


       echo '<center><form method="post" action="checking.php">
        <input type="hidden" name="field" value="'.$g.'">
       <button type="submit" name="seetest" value = "'.$f.'" class="btn btn-primary"><span class="glyphicon glyphicon-link"></span>&nbsp&nbsp&nbsp&nbspView</button></form></center>';
       /* # means stud rollno will help to view the specfic result
        */
      
       echo '</td></tr>';
       $a++;

     }
   }
   echo '</table>';
      }
       }
else
{
	echo'<center><h1>No message is declared yet..!!</h1></center>';
}
       // mesage


     ?>
	 <br>
       <center>
          <a href="student.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
</div><div class="col-md-1"></div></div>
</center>
</body>
</html>