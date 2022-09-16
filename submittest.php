<?php
 session_start();
 $id=$_SESSION['login_user']; /* assume ,rank and %tile cal kr na hai*/
?>

<html>
<head>
<style>
body{
background-image:url("3.jpg");
background-size:cover;
}
</style>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <script src="import/jquery-3.3.1.js" type="text/javascript"> </script>
 <script src="jquery.min.js"></script>
 <script src="js/bootstrap.min.js"></script>
</head>
<body >
<?php
/* connectivity */
if(isset($_POST['submittest'])){
   $tid  = 'T'.$_POST['testid'];
   $test=$_POST['testid'];
   $roll = $_SESSION['login_user'];
   $y='yes';
   $connect = mysqli_connect("localhost", "root", "", "finalyear");
   $sql="UPDATE candidate set $tid='$y' WHERE rollno='$roll'";
       $query="INSERT INTO testresult(Testid,Rollnumber) VALUES('$test','$roll')";
	   $up="update candidate set giventest=$test where rollno='$roll'";
       if(mysqli_query($connect,$sql))
       {
        mysqli_query($connect,$query);
		mysqli_query($connect,$up);
         echo '<script>alert("Test is submitted succesfully")</script>';
       }

   else{
     echo$test;
     echo$roll;
     echo '<script>alert("Test is not submitted ")</script>';
   }
 }

     ?>
       <center>
	   <h1> Your Response is succesfully submitted</h1>
       <form method = "post" action = "events.php">
             <input class="btn btn-lg btn-danger" type="submit" name="login1" value="Back"><br>

            </input>
           <br><br>
           </form>
</center>
</body>
</html>