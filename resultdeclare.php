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

</head>
<body style="background-color:lightgreen;">
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
<?php
/* connectivity */
 $connect = mysqli_connect("localhost", "root", "", "finalyear");
  $query = "SELECT p1.Testid,p1.Rollnumber from testresult p1 where dc=0 and cal!=0 ORDER BY (p1.Testid)";
  $count=mysqli_query($connect,$query);
  $cou=mysqli_query($connect,$query);
  $s=0;
  while($row=mysqli_fetch_array($count))
  {
  $s++; 
}
  if($s!=0)
  {
      $a=1;
       {
         echo '<center><h2>Result declaration</h2></center>';
       echo '<table border="1px" style="margin-top:70px;" class="table table-striped">';
       echo '<tr class="success"><th><center>Sno.</center></th><th><center>RollNumber</center></th><th><center>Testid</center></th><th><center>  ?</center></th></tr>';
       while($ro=mysqli_fetch_array($cou))
       {
       $f=$ro['Rollnumber'];
       $d=$ro['Testid'];
       $g = $f; 
       if($f!=-1){
       echo '<tr><td>';
       echo'<center>';echo $a;echo'</center>';
       echo '</td><td>';

       echo'<center>';echo $f;echo'</center>';
       echo '</td><td>';

       echo'<center>';echo $d;echo'</center>';
       echo '</td><td>';

       echo '<center><form method="post" action="#">
       <input type="hidden" name="field" value="'.$d.'">

       <button type="submit" name="friend1" value = "'.$g.'" class="btn btn-success"><span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbspDeclare Result</button></form></center>';
       /* # means insert query will begin--
        */

       echo '</td></tr>';
       $a++;

     }
   }

   echo '</table>';
 }
}
else{
    echo '<center><h2>No Record is present to declare</h2></center>';
}
?>
<?php
   // inset query begin for dec1
   if(isset($_POST['friend1'])){
      $rol  = $_POST['friend1'];
      $tid = $_POST['field'];
      //calaculate below_stud

      $sql4="SELECT Tmark from testresult WHERE Testid=$tid and Rollnumber=$rol";
      $result4=mysqli_query($connect,$sql4);
      if($row=mysqli_fetch_array($result4))
      {
        $studmark=$row['Tmark'];
        //echo$studmark;
        $query="SELECT count(*) FROM testresult WHERE Tmark<=$studmark and Testid=$tid";
        $result5=mysqli_query($connect,$query);
        if($row=mysqli_fetch_array($result5))
        {
          $count=$row['count(*)'];
          //update below stud
          $sql="UPDATE testresult set belowstud=$count  WHERE Testid=$tid and Rollnumber=$rol ";
          mysqli_query($connect,$sql);
        }

      }
      //calculate numstud

      $query1="SELECT count(*) FROM testresult WHERE Testid=$tid";
      $result=mysqli_query($connect,$query1);
      if($row=mysqli_fetch_array($result))
      {
        $tcount=$row['count(*)'];
        $sql="UPDATE testresult set numbstud=$tcount WHERE Testid=$tid and Rollnumber=$rol";
        mysqli_query($connect,$sql);
      }

      //calculate percentile

      $sql="SELECT belowstud,numbstud FROM testresult WHERE Testid=$tid and Rollnumber=$rol";
      $res=mysqli_query($connect,$sql);
      if($row=mysqli_fetch_array($res))
      {
        $b=$row['belowstud'];
        $n=$row['numbstud'];
        $p=($b/$n)*100;
        $p1=number_format((float)$p, 2, '.', '');
        //echo $p1;
        $sql="UPDATE testresult set Percentile=$p1 WHERE Testid=$tid and Rollnumber=$rol";
        mysqli_query($connect,$sql);
        $r=$n-$b+1;
        $sql2="UPDATE testresult t set t.Rank=$r WHERE Testid=$tid and Rollnumber=$rol";
        mysqli_query($connect,$sql2);
      }
	  $q1 = " UPDATE testresult SET dc='1' where Rollnumber=$rol AND Testid=$tid";
     if(mysqli_query($connect, $q1))
     {	
			$test='T'.$tid;
			$up="update candidate set $test='ab' ,giventest=$tid where $test='no'";
			mysqli_query($connect,$up);
          echo '<script>alert("Result declared succesfully")</script>';
          echo '<script language="javascript">';
    echo 'top.location.href="resultdeclare.php"';
            echo '</script>';
     }

}
     ?>
       <br><center>
       <a href="admin.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
</center>
</div>
<div class="col-md-1"></div></div>
</body>
</html>