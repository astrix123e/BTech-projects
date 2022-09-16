<?php
 session_start();
 $rn=$_SESSION['login_user']; /* assume ,rank and %tile cal kr na hai*/
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
if(isset($_POST['seetest'])){
   $tid  = $_POST['seetest'];
   $roll = $_POST['field'];
   $connect = mysqli_connect("localhost", "root", "", "finalyear");
  $query = " SELECT * FROM testresult p2  where Rollnumber=$roll AND Testid=$tid";
  $query1 = "SELECT * FROM test p1  where Testid=$tid";
  $count=mysqli_query($connect,$query);
  $cou=mysqli_query($connect,$query1);
  $s=0;
  $s2=0;
  while($row=mysqli_fetch_array($count))
  {
  $s++; 
  $mq=$row['Mquant'];
  $mr=$row['Mreason'];
  $me=$row['Mverbal'];
  $rank=$row['Rank'];
  $per=$row['Percentile'];
  $tot=$row['numbstud'];
}
while($ro=mysqli_fetch_array($cou))
{
$s2++;
$tq=$ro['Tquant'];
$tr=$ro['Treas'];
$te=$ro['Tverb'];
}
$cat=0;
$job="SELECT * FROM `machinemod` t join `company` c on c.cluster=t.clustername having t.testid=$tid and t.rollno=$roll ";
$job1="SELECT * FROM `machinemod` t join `company` c on c.cluster=t.clustername having t.testid=$tid and t.rollno=$roll ";
$res=mysqli_query($connect,$job1);
$wer=0;
while(mysqli_fetch_array($res))
{
	$wer++;
}	
  if($s!=0 && $s2!=0)
  {

         echo '<center><h2>Test ';echo $tid;echo ' Scorecard</h2></center>';
       echo '<table border="1px" style="margin-top:70px;" class="table table-striped">';
       echo '<tr ><th class="success"><center>Subject</center></th><th><center>Total Marks</center></th><th><center>Correct Answer</center></th><th><center>Wrong Answer</center></th><th><center>Marks Obtained</center></th></tr>';

       echo '<tr><td class="success" >';
       echo'<center><b>Quants</center></b>';
       echo '</td><td>';
       echo'<center>';echo $tq ;echo'</center></td>';
       echo'<td><center>'; echo $mq ; '</center></td>';
       echo'<td><center>';echo ($tq-$mq);'</center></td>';
       echo'<td><center>'; echo $mq ;'</center></td>';
       echo'</tr>';

       echo'<tr><td class="success">';
       echo'<center><b> Reasoning</center></b>';
       echo '</td><td>';
       echo'<center>'; echo $tr ;'</center></td>';
       echo'<td><center>';echo $mr ;'</center></td>';
       echo'<td><center>'; echo ($tr-$mr);'</center></td>';
       echo'<td><center>'; echo $mr ;'</center></td>';
       echo '</tr>';

       echo'<tr><td class="success">';
       echo'<center><b>English</center></b>';
       echo '</td><td>';
       echo'<center>'; echo $te ;'</center></td>';
       echo'<td><center>'; echo $me ;'</center></td>';
       echo'<td><center>'; echo ($te-$me);'</center></td>';
       echo'<td><center>'; echo $me ;'</center></td>';
       echo '</tr>';

       echo'<tr><td class="bg-primary">';
       echo'<center><b>Final Score</center></b>';
       echo '</td><td >';
       echo'<center>'; echo ($tq+$tr+$te);'</center></td>';
       echo'<td colspan ="2"><center>';'</center></td>';
       echo'<td><center>'; echo($mq+$mr+$me);'</center></td>';
       echo '</tr>';



   echo '</table>';

   // second table

   echo '<table border="1px" style="margin-top:70px;" class="table table-striped">';
   echo '<tr ><th class="success"><center>Rank</center></th><center><th class="success"><center>Total Student given Test</th></center><th class="success"><center>Percentile</center></th></tr>';
   echo '<tr ><th class="success"><center>';echo $rank;echo'</center></th>';
   
   echo '<td><center>';echo $tot ;echo'</center></td>';
   echo '<th class="success"><center>';echo $per; echo'</center></th></tr>';
	
	
   echo'</table>';
   $sn=1;
   //third table
	echo '<table border="1px" style="margin-top:70px;" class="table table-striped">';
   echo '<tr ><th class="success"><center>Sno</center></th><th><center>Company Recommended</center></th></tr>';
	if($comp=mysqli_query($connect,$job)){
		if($wer!=0){
	while($row=mysqli_fetch_array($comp))
	{
		
		$cat=$row['Company'];
		if($cat!=-1){
		echo '<tr><td class="success">';
       echo'<center>';echo $sn;echo'</center>';
       echo '</td><td>';

		echo'<center><b>';echo $cat;echo'</b></center>';
       echo '</td><tr>';


       $sn++;
		
		}
	}
		}
	else
		{
			echo'<tr><td><center>';echo$sn;echo'</center></td><td>';
			echo'<center><i>No company recommended</i></center></td></tr>';
		}
		
		

	}
	echo'</table>';

   }
   
   
  }

     ?>
       <center>
       <a href="message.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
</center>
</div><div class="col-md-1"></div></div>
</body>
</html>