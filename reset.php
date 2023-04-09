<?php
  session_start();
  include('dbconfig/config.php');
?>
<?php error_reporting(0); ?>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>password reset</title>
</head>
<body>
  <h2>Password reset</h2>
	<form action="reset.php" method="post">
		<div>
		Email id:<input type="email" name="umail">
		</div>
        <input type="submit" name="sub" value="VERIFY" />
	</form>
</body>
</html>

<?php
   if(isset($_POST['sub']))
   {
   $uname= $_POST['umail'];
   $query = "select * from user where email = '$uname'";
   $query_run = mysqli_query($con,$query);
   if(mysqli_num_rows($query_run)>0) {
    $_SESSION['umail']=$uname;
    header('location:php/resetpass.php');
   }
   else{
    die("'Enter valid Email id'");
   }
   }

?>