<?php
 session_start();
 $id=$_SESSION['login_user']; /* assume kya hai line no 65 dekh lena */
  
?>
<?php
/* connectivity */
 $connect = mysqli_connect("localhost", "root", "", "finalyear");
 $idp = $_SESSION['login_user'];
 $query = "SELECT * from testresult where Rollnumber=$idp and dc=1 ";
 $query1= "SELECT * from test s join testresult t on s.Testid =t.Testid WHERE Rollnumber=$idp and dc=1";
 $count=mysqli_query($connect,$query);
 $count1=mysqli_query($connect,$query);
 $count2=mysqli_query($connect,$query1);
 $count3=mysqli_query($connect,$query);

 $chart_data='';
 $chart_data1='';
 $chart_data2='';
 $chart_data3='';
 //first chart
 while($row=mysqli_fetch_array($count))
 {
 $chart_data .="{Test:".$row['Testid'].", Mquant:".$row['Mquant'].",Mverbal:".$row['Mverbal'].",
 Mreason:".$row['Mreason']."},";

}
$chart_data=substr($chart_data,0,-1);
//second chart
while($row=mysqli_fetch_array($count1))
{
$chart_data1 .="{Test:".$row['Testid'].", Score:".$row['Mquant']. '+' .$row['Mverbal'].'+' .$row['Mreason']."},";
}
$chart_data1=substr($chart_data1,0,-1);
//third chart

while($row=mysqli_fetch_array($count2))
{
$c=$row['Mquant']+$row['Mreason']+$row['Mverbal'];
$t=$row['Tquant']+$row['Treas']+$row['Tverb'];
$p=($c/$t)*100;
$p1=number_format((float)$p, 2, '.', '');
$z=(($t-$c)/$t)*100;
$z1=number_format((float)$z, 2, '.', '');
$chart_data2 .="{Test:".$row['Testid'].", Ca:".$p1.",Wa:".$z1."},";
}
$chart_data2=substr($chart_data2,0,-1);
//fourth table
while($row=mysqli_fetch_array($count3))
{
$p=$row['Percentile'];
$chart_data3 .="{Test:".$row['Testid'].", Percentile:".$p."},";
}
$chart_data3=substr($chart_data3,0,-1);

 ?>

<html>
<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
 <link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body style="background-color:lightgreen;">
  <br>
  <table border="0px"class="container" style="margin-top:10px; height:0px">
    <tr><th colspan="2"><h1 align="center"> Performance Graph</h1></th></tr>
      <tr>
      <td style="background-color: white;height:250px;width:470px;" id="chart1">
        <h4 align="center">Test wise performance</h4></td>

      <td style="height:250px;width:470px;background-color: white;"id="chart2"><h4 align="center">Score wise performance</h4></td>
    </tr>
    <tr>
    <td style="height:250px;width:470px;background-color: white;" id="chart3"><h4 align="center">Correct Answer & Wrong Answer Reply in % </h4></td>

    <td style="height:250px;width:470px;background-color: white;"id="chart4"><h4 align="center">Percentile</h4></td>
  </tr>
    </table>
    <br>
	<?php

	$job="SELECT * FROM `overall` t join `company` c on c.cluster=t.cluster having t.rollno=$idp ";
	$job1="SELECT * FROM `overall` t join `company` c on c.cluster=t.cluster having t.rollno=$idp ";
	$res=mysqli_query($connect,$job1);
	$wer=0;
	while(mysqli_fetch_array($res))
	{
		$wer++;
	}	

		echo '<center><table border="1px" style="margin-top:70px;width:1200px" class="table table-striped">';
   echo '<tr style="width:470px;"><th class="success" ><center>Sno</center></th><th><center> Overall Company Recommended based on all the test given</center></th></tr>';
	if($comp=mysqli_query($connect,$job)){
		$sn=1;
		if($wer!=0){
			
	while($row=mysqli_fetch_array($comp))
	{
		
		$cat=$row['Company'];
		if($cat!=-1){
		echo '<tr ><td  class="success">';
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
			echo'<tr ><td  class="success" ><center>';echo$sn;echo'</center></td><td >';
			echo'<center><i>No company recommended</i></center></td></tr>';
		}
		
		

	}
	echo'</table></center>';

?>	
	<br>
   <center>
       <a href="student.php"><button class="btn btn-lg btn-danger" type="submit" name="login1" value="Back">Back</button></a>
</center>
<br>
</body>

</html>


  <script>
      Morris.Bar({
        element :'chart1',
        data:[<?php echo $chart_data;?>],
        xkey:['Test'],
        ykeys:['Mquant','Mverbal','Mreason'],
        labels:['quant','verbal','reason'],
        hideHover:'auto',

      });
      Morris.Bar({
        element :'chart2',
        data:[<?php echo $chart_data1;?>],
        xkey:['Test'],
        ykeys:['Score'],
        labels:['Testscore'],
        barColors:["#66cccc"],
        hideHover:'auto',

      });
      Morris.Bar({
        element :'chart3',
        data:[<?php echo $chart_data2;?>],
        xkey:['Test'],
        ykeys:['Ca','Wa'],
        labels:['Correct answer %','Wrong answer %'],
        barColors:["Green","Red"],
        hideHover:'auto',

      });


      Morris.Bar({
        element :'chart4',
        data:[<?php echo $chart_data3;?>],
        xkey:['Test'],
        ykeys:['Percentile'],
        labels:['Percentile %'],
        barColors:["orange"],
        hideHover:'auto',

      });

      </script>