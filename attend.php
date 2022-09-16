<div class="collapse" id="at">
<br><br>

<form method="post" action="">

<?php
$query="SELECT * FROM registration order by rollno";
$count=mysqli_query($conn,$query);
$cou=mysqli_query($conn,$query);
$s=0;
while($row=mysqli_fetch_array($count))
	{
		$s++;
	}
if($s!=0)
{
    echo '<table border="1px" class="table table-striped">';
	echo '<tr class="danger"><th><center>Name</center></th><th><center>Roll no.</center></th><th><center>Old Attendence</center></th><th><center>New Attendence</center></th></tr>';
	$j=1;
	while($ro=mysqli_fetch_array($cou))
	{
		$n=$ro['name'];
		$r=$ro['rollno'];
		//$s=$ro['section'];
		$s=$ro['attend'];
		$f=1;
		$nm='n'.$j;
		$j=$j+1;
		if($r !=1010101010)
		{
		if($f%2==0)
		{
		echo '<tr class="info"><td>';
		echo $n;
		echo '</td><td>';
		echo $r;
		echo '</td><td><center>';
		echo $s;
		echo '</center></td><td><center>';
		echo '<input type="text" pattern="[2]" name="'.$nm.'">';
		echo'</center></td></tr>';
		$f++;
		}
		else
		{
		echo '<tr><td>';
		echo $n;
		echo '</td><td>';
		echo $r;
		echo '</td><td><center>';
		echo $s;
		echo '</center></td><td><center>';
		echo '<input type="text" pattern="[2]" name=';echo $nm;echo'>';
		echo '</center></td></tr>';
		$f++;
		}
	}}
	echo '</table>';
}
?>
<center><button class="btn btn-lg btn-info" name="sub">Update</button>
<input type="reset" class="btn btn-lg btn-warning"></input></center>
</form>


<?php
			if(isset($_POST['sub'])){
$que="SELECT * FROM registration order by rollno";
$co=mysqli_query($conn,$que);
$j=2;
$cot=mysqli_query($conn,$que);
$st=0;
while($row=mysqli_fetch_array($cot))
	{
		$st++;
	}
while($row=mysqli_fetch_array($co))
	{

		$name=$row['rollno'];
		if($name!=1010101010){
		$nm1='n'.$j;
		$n=$_POST[$nm1];
		$sql="update registration set attend=attend +$n where rollno='$name'";
		$result=mysqli_query($conn,$sql);
		$st=$st-1;
		if($st==0)
		{ 
			break;
		}
		$j=$j+1;}
	}			//echo"<script language='javascript' type='text/javascript'>confirm('Are you sure that you want to delete your account?');</script>";
echo "<script language='javascript' type='text/javascript'>alert('Your Attendence is updated')</script>";
}
?>
<center><button class="btn btn-danger btn-lg" data-toggle="collapse" data-target="#at">Close</button></center>
<br>
</div>