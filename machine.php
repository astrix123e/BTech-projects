<?php
if(isset($_POST['friend1'])){
	$rol  = $_POST['friend1'];
   $tid = $_POST['field'];
	$connect = mysqli_connect("localhost", "root", "", "finalyear");
	$stu="SELECT * from testresult where dc=0 and Rollnumber=$rol and Testid=$tid";
	$result=mysqli_query($connect,$stu);
	if($row=mysqli_fetch_array($result))
	{
		$stquant=($row['Mquant']/3)*100;
		$stquant=number_format((float)$stquant, 2, '.', '');
		$streas=($row['Mreason']/3)*100;
		$streas=number_format((float)$streas, 2, '.', '');
		$stverb=($row['Mverbal']/4)*100;
		$stverb=number_format((float)$stverb, 2, '.', '');
	}
	echo 'Testid <b>';echo$tid;echo"</b> <br> ";
	echo 'rollno <b>';echo$rol;echo"</b> <br> ";
	echo ' st quant ';echo$stquant;echo " <br> ";
	echo ' st reas ';echo$streas;echo " <br> ";
	echo ' st verb ';echo$stverb;echo " <br> ";
		$sql="SELECT * from machinemod where clustername='c1' and rollno=$rol  order by id desc limit 0,1";
		if($res=mysqli_query($connect,$sql)){
			
			if($row=mysqli_fetch_array($res)){

					$iq=$row['newquant'];
					$ir=$row['newreas'];
					$iv=$row['newverbal'];
			
		}
		else{
			
		$mac="SELECT * FROM cluster where cluster ='c1'";
		if($res=mysqli_query($connect,$mac)){
			if($row=mysqli_fetch_array($res))
			{
					$iq=$row['quants'];
					$ir=$row['reas'];
					$iv=$row['verb'];
			}
		}
		}
		}
		else{
			
		$mac="SELECT * FROM cluster where cluster ='c1'";
		if($res=mysqli_query($connect,$mac)){
			if($row=mysqli_fetch_array($res))
			{
					$iq=$row['quants'];
					$ir=$row['reas'];
					$iv=$row['verb'];
			}
		  }
		}
		echo "c1 quants "; echo $iq;
		echo " c1 reas "; echo $ir ;
		echo " c1 verbal "; echo $iv ;echo " <br> ";
		
		$sql2="SELECT * from machinemod where clustername='c2' and rollno=$rol order by id desc limit 0,1";
		if($r=mysqli_query($connect,$sql2)){
				if($row=mysqli_fetch_array($r))
				{
					$iiq=$row['newquant'];
					$iir=$row['newreas'];
					$iiv=$row['newverbal'];
			
				}
				else{

				$mac="SELECT * FROM cluster where cluster ='c2'";
				if($res=mysqli_query($connect,$mac)){
				if($row=mysqli_fetch_array($res))
				{
					$iiq=$row['quants'];
					$iir=$row['reas'];
					$iiv=$row['verb'];
							
				}
			  }
			}
		
		
		}
		else{

		$mac="SELECT * FROM cluster where cluster ='c2'";
		if($res=mysqli_query($connect,$mac)){
		if($row=mysqli_fetch_array($res))
		{
					$iiq=$row['quants'];
					$iir=$row['reas'];
					$iiv=$row['verb'];
							
		}
		}
		}
		echo " c2 quants "; echo $iiq ;
		echo " c2 reas "; echo $iir ;
		echo " c2 verbal "; echo $iiv ; echo " <br>";
	
		$sql3="SELECT * from machinemod where clustername='c3' and rollno=$rol order by id desc limit 0,1";
		if($r=mysqli_query($connect,$sql3)){
				if($row=mysqli_fetch_array($r))
				{
					$iiiq=$row['newquant'];
					$iiir=$row['newreas'];
					$iiiv=$row['newverbal'];
			
				}
				else{
				$mac="SELECT * FROM cluster where cluster ='c3'";
				if($res=mysqli_query($connect,$mac)){
				if($row=mysqli_fetch_array($res))
				{
					$iiiq=$row['quants'];
					$iiir=$row['reas'];
					$iiiv=$row['verb'];
						
				}
			  }
			}
		
		}
		else{
		$mac="SELECT * FROM cluster where cluster ='c3'";
		if($res=mysqli_query($connect,$mac)){
		if($row=mysqli_fetch_array($res))
		{
					$iiiq=$row['quants'];
					$iiir=$row['reas'];
					$iiiv=$row['verb'];
						
		}
		}
		}
		echo " c3 quants "; echo $iiiq ;
		echo " c3 reas "; echo $iiir ;
		echo " c3 verbal "; echo $iiiv ;echo " <br> ";
		//minimum distance with cluster c1
		$dis=1000;
		$dis1=1000;
		$dis2=1000;
		$fd=1000;
		$fd1=1000;
		$fd2=1000;
		$m=0;
		$m1=0;
		$c1=0;
		$nq=0;
		$nr=0;
		$nv=0;
		$c=0;
		if($stquant>=$iq && $streas>=$ir && $stverb>=$iv)
		{
			$dis=pow(($stquant-$iq),2)+pow(($streas-$ir),2)+pow(($stverb-$iv),2);
			$dis= sqrt($dis);
			$dis=number_format((float)$dis, 2, '.', '');
			
		}
		echo$dis;
		echo'<br>';
		if($stquant>=$iiq && $streas>=$iir && $stverb>=$iiv)
		{
			$dis1=pow(($stquant-$iiq),2)+pow(($streas-$iir),2)+pow(($stverb-$iiv),2);
			$dis1 =sqrt($dis1);
			$dis1=number_format((float)$dis1, 2, '.', '');
			
		}
		echo$dis1;
		echo'<br>';
		if($stquant>=$iiiq && $streas>=$iiir && $stverb>=$iiiv)
		{
			$dis2=pow(($stquant-$iiiq),2)+pow(($streas-$iiir),2)+pow(($stverb-$iiiv),2);
			$dis2= sqrt($dis2);
			$dis2=number_format((float)$dis2, 2, '.', '');
			
		}
		echo$dis2;
		if($dis<$dis1 && $dis<$dis2){
			
				$m=$dis;
				$nq=($stquant+$iq)/2;
				$nr=($streas+$ir)/2;
				$nv=($stverb+$iv)/2;
				$c='c1';
		}
		else if($dis1<$dis && $dis1<$dis2){
			
				$m=$dis1;
				
				$nq=($stquant+$iiq)/2;
				$nr=($streas+$iir)/2;
				$nv=($stverb+$iiv)/2;
				$c='c2';
		}
		else if($dis2<$dis && $dis2<$dis1){
			$m=$dis2;
			
				$nq=($stquant+$iiiq)/2;
				$nr=($streas+$iiir)/2;
				$nv=($stverb+$iiiv)/2;
				$c='c3';
		}
	 echo'<br>';
	 echo$m;
	 echo$c;
	 echo'<br>';
	 echo'nq ';echo$nq;
	 echo'<br>';
	 echo'nr ';echo$nr;
	 echo'<br>';
	 echo'nv ';echo$nv;
	 if($m!=0 && $nq!=0 && $nr!=0 && $nv!=0)
		{
			$sql="Insert into machinemod(testid,rollno,newquant,newreas,newverbal,clustername) values('$tid','$rol','$nq','$nr','$nv','$c')";
			mysqli_query($connect,$sql);
			
		}
	else{
		echo'not inserted';
	}
	echo'<br>';
	//overall performance
	//$cot=$tid;
	$n=$tid;
	$stq=0;
	$str=0;
	$stv=0;
	/*while($cot!=0)
		{
				$sql="select * from testresult where Rollnumber=$rol and Testid=$cot";
				$res=mysqli_query($connect,$sql);
				if($row=mysqli_fetch_array($res))
				{
					$stquant1=($row['Mquant']/3)*100;
					$stquant1=number_format((float)$stquant1, 2, '.', '');
					$streas1=($row['Mreason']/3)*100;
					$streas1=number_format((float)$streas1, 2, '.', '');
					$stverb1=($row['Mverbal']/4)*100;
					$stverb1=number_format((float)$stverb1, 2, '.', '');
					echo $stquant1;echo'<br>';
					echo $streas1;echo'<br>';
					echo $stverb1;echo'<br>';
				}
				$stq=$stq+$stquant1;
				$str=$str+$streas1;
				$stv=$stv+$stverb1;
				echo'sq';echo $stq;echo'<br>';
				echo'sr';echo $str;echo'<br>';
				echo'sv';echo $stv;echo'<br>';
		
		$cot--;
		
		}*/
		$sql="select * from testresult t,machinemod n where n.rollno=$rol AND t.Testid=n.testid AND n.rollno=t.Rollnumber";
		//$sql="SELECT * FROM machinemod n JOIN testresult t ON n.testid=t.Testid AND n.rollno=t.Rollnumber"; 
		if($res=mysqli_query($connect,$sql)){
		while($row=mysqli_fetch_array($res))
		{
					$stquant1=($row['Mquant']/3)*100;
					$stquant1=number_format((float)$stquant1, 2, '.', '');
					$streas1=($row['Mreason']/3)*100;
					$streas1=number_format((float)$streas1, 2, '.', '');
					$stverb1=($row['Mverbal']/4)*100;
					$stverb1=number_format((float)$stverb1, 2, '.', '');
					$stq=$stq+$stquant1;
					$str=$str+$streas1;
					$stv=$stv+$stverb1;
					
		}
		}
		
		
		
		$stq=$stq/$n;  //avgquant
		$stq=number_format((float)$stq, 2, '.', '');
		$str=$str/$n;	//avgreas
		$str=number_format((float)$str, 2, '.', '');
		$stv=$stv/$n;	//avgverb
		$stv=number_format((float)$stv, 2, '.', '');
		echo'avgq';echo $stq;echo'<br>';
		echo'avgr';echo $str;echo'<br>';
		echo'avgv';echo $stv;echo'<br>';
		
		
		//c1
		$mac="SELECT * FROM cluster where cluster ='c1'";
		if($res=mysqli_query($connect,$mac)){
			if($row=mysqli_fetch_array($res))
			{
					$iq1=$row['quants'];
					$ir1=$row['reas'];
					$iv1=$row['verb'];
			}
		}
		echo "c1 quants "; echo $iq1;
		echo " c1 reas "; echo $ir1 ;
		echo " c1 verbal "; echo $iv1 ;echo " <br> ";
		
		//c2
		$mac="SELECT * FROM cluster where cluster ='c2'";
				if($res=mysqli_query($connect,$mac)){
				if($row=mysqli_fetch_array($res))
				{
					$iiq1=$row['quants'];
					$iir1=$row['reas'];
					$iiv1=$row['verb'];
							
				}
			  }
		echo " c2 quants "; echo $iiq1 ;
		echo " c2 reas "; echo $iir1 ;
		echo " c2 verbal "; echo $iiv1 ; echo " <br>";
		
		//c3
		$mac="SELECT * FROM cluster where cluster ='c3'";
				if($res=mysqli_query($connect,$mac)){
				if($row=mysqli_fetch_array($res))
				{
					$iiiq1=$row['quants'];
					$iiir1=$row['reas'];
					$iiiv1=$row['verb'];
						
				}
			  }
		echo " c3 quants "; echo $iiiq1 ;
		echo " c3 reas "; echo $iiir1 ;
		echo " c3 verbal "; echo $iiiv1 ;echo " <br> ";
			  
		if($stq>=$iq1 && $str>=$ir1 && $stv>=$iv1)
		{
			$fd=pow(($stq-$iq1),2)+pow(($str-$ir1),2)+pow(($stv-$iv1),2);
			$fd= sqrt($fd);
			$fd=number_format((float)$fd, 2, '.', '');
			
		}
		echo$fd;
		echo'<br>';
		if($stq>=$iiq1 && $str>=$iir1 && $stv>=$iiv1)
		{
			$fd1=pow(($stq-$iiq1),2)+pow(($str-$iir1),2)+pow(($stv-$iiv1),2);
			$fd1 =sqrt($fd1);
			$fd1=number_format((float)$fd1, 2, '.', '');
			
		}
		echo$fd1;
		echo'<br>';
		if($stq>=$iiiq1 && $str>=$iiir1 && $stv>=$iiiv1)
		{
			$fd2=pow(($stquant-$iiiq),2)+pow(($streas-$iiir),2)+pow(($stverb-$iiiv),2);
			$fd2= sqrt($fd2);
			$fd2=number_format((float)$fd2, 2, '.', '');
			
		}
		echo$fd2;
		if($fd<$fd1 && $fd<$fd2){
			
				$m1=$fd;
				
				$c1='c1';
		}
		else if($fd1<$fd && $fd1<$fd2){
			
				$m1=$fd1;
				
				$c1='c2';
		}
		else if($fd2<$fd && $fd2<$fd1){
			$m1=$fd2;
			
			$c1='c3';
		}
	 echo'<br>';
	 echo$m1;
	 echo$c1;
	 echo'<br>';
	 if($tid=='1')
		{
			
			$sql="Insert into overall(rollno,cluster) values ('$rol','$c1')";
			mysqli_query($connect,$sql);
		}
	else{
		
		$sql="update overall set cluster='$c1' where rollno=$rol";
		mysqli_query($connect,$sql);
	 
	}

}
	 ?>