<?php
session_start();
require '../dbconfig/config.php'
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
	<form action="resetpass.php" method="post">
		<div>
			<label for="upass">Password :</label>
			<input type="password" name="upass" id="upass">
        </div>
        <div>    
            <label for="cpass">Confirm Password :</label>
			<input type="password" name="cpass" id="cpass">
		</div>
		<input type="submit" name="sub" value="CHANGE PASSWORD" />
        <a href="../login.html"><input type="button" value="GO BACK TO LOGIN"/></a>
	</form>
</body>
</html>

<?php
 if(isset($_POST['sub']))
 {
  if($_POST['upass'] != $_POST['cpass']) {
    die("Enter the same password in confirm password");
   }
  if(strlen($_POST["upass"])<8) {
    die("Password must be at least 8 charachters long");
  }

  if( ! preg_match("/[a-z]/i", $_POST['upass'])) {
    die("Password must contain at least one alphabet");
  }

  if( ! preg_match("/[0-9]/i", $_POST['upass'])) {
    die("Password must contain at least one number");
  }
  $password_hash = password_hash($_POST['upass'], PASSWORD_DEFAULT);
  // $Data = "<script>document.write(localStorage.getItem('res')).value);</script>";
  //  print_r($Data);
  $sess=$_SESSION['umail'];

  $query="UPDATE user set password = '$password_hash' where email =?";
  $stmt = $con->prepare($query); 
  $stmt->bind_param("s", $sess);
  $stmt->execute();
  // $query_run=mysqli_query($con,$query);
  echo '<script type="text/javascript"> alert("Password changed successfully!!!") </script>';

}

?>