<?php
 session_start();
 $rn=$_SESSION['login_user']; /* assume kya hai line no 65 dekh lena */

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
$idp = $_SESSION['login_user'];
  $query = "SELECT * from test  where started!=0";
  $count=mysqli_query($connect,$query);
  $cou=mysqli_query($connect,$query);
  $count1=mysqli_query($connect,$query);
  $s=0;
  while($row=mysqli_fetch_array($count))
  {
  $s++;
}
  if($s!=0)
  {
    $a=1;
         echo '<center><h2>Test Links</h2></center>';
       echo '<table border="1px" style="margin-top:70px;" class="table table-striped">';
       echo '<tr class="success"><th><center>Sno.</center></th><th><center>Name</center></th><th><center>Date</center></th><th><center>Status</center></th></tr>';
       while($ro=mysqli_fetch_array($cou))
       {
       $f=$ro['Testid'];
       $d=$ro['Date'];
       $g = $idp; 
       $tno='T'.$f;
       $sql="SELECT * from candidate where $tno='no' and rollno=$g";
       $result=mysqli_query($connect,$sql);
       if($row=mysqli_fetch_array($result))
       {
       echo '<tr><td>';
       echo'<center>';echo $a;echo'</center>';
       echo '</td><td>';

       echo'<center> Test';echo $f;echo'</center>';
       echo '</td><td>';

       echo'<center>';echo $d;echo'</center>';
       echo '</td><td>';

      echo '<center><form method="post" action="qq1.php">
      <input type="hidden" name="field" value="'.$f.'">
      <button type="submit" name="givetest" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span>&nbsp&nbsp&nbsp&nbspGive Test</button></form></center>';
       /* # means stud rollno will be inserted at the time of test
         isko insert krana ho ga!!--
        */
       echo '</td></tr>';
     }
     $sql1="SELECT * from candidate where $tno='yes' and rollno=$g";
       $result=mysqli_query($connect,$sql1);
       if($row=mysqli_fetch_array($result))
	 {
       echo '<tr><td>';
       echo'<center>';echo $a;echo'</center>';
       echo '</td><td>';

       echo'<center> Test';echo $f;echo'</center>';
       echo '</td><td>';

       echo'<center>';echo $d;echo'</center>';
       echo '</td><td>';

      echo '<center><b>Attempted</b></center>';
       echo '</td></tr>';
     }
	 $sql2="SELECT * from candidate where $tno='ab' and rollno=$g";
       $result=mysqli_query($connect,$sql2);
       if($row=mysqli_fetch_array($result))
	 {
       echo '<tr><td>';
       echo'<center>';echo $a;echo'</center>';
       echo '</td><td>';

       echo'<center> Test';echo $f;echo'</center>';
       echo '</td><td>';

       echo'<center>';echo $d;echo'</center>';
       echo '</td><td>';

      echo '<center><b>Absent</b></center>';
       echo '</td></tr>';
     }
       $a++;
     }
	echo '</table>';
   }
   
else
{
	echo'<center><h1>No test link present yet..!!</h1></center>';
}

     ?>

       <center>
           <a href="student.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
</center>
</div><div class="col-md-1"></div></div>
</body>
</html>