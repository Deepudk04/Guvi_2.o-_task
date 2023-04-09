<?php 
    session_start();
    require '../dbconfig/config.php'
?>
<?php

$sql = "select password from user where email = ?"; // SQL with parameters
$stmt = $con->prepare($sql); 
$stmt->bind_param("s",$_POST["name"]);
$stmt->execute();
$result = $stmt->get_result(); // get the mysqli result
$user = $result->fetch_assoc(); // fetch data   

if (count($user) > 0) {
    if (!password_verify($_POST['pass'], $user['password'])) {
        echo 0;
        exit;
    }
    echo 1;
    exit;
} else {
    echo 0;
    exit;
}
   
        // // echo '<script type="text/javascript"> alert("Submit is clicked") </script>';
        // $uname = $_POST["name"];
        // //$password_hash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        // $query = "select password from user where email = '$uname'";
        // $query_run = mysqli_query($con,$query);
        // // $check=$_POST["pass"];
        // // $check_pass= password_verify( $check, $query);

        // // if (password_verify($check, $query)) {
        // //     echo 'Password is valid!';
        // // } else {
        // //     echo '<script type="text/javascript"> alert("Invalid Credentials")</script>';
        // // }
        // // $query = "select * from user where email = '$uname' AND password='$password_hash'";
        // // $query_run = mysqli_query($con,$query);
        // if(mysqli_num_rows($query_run)>0)
        // {
        //     // if (password_verify($check, $query)) {

        //         echo 1;
        //         exit;
        //     //     echo 'Password is valid!';
        //        // header('location:homepage.php');
        //     // }
        //     // else
        //     // {
        //     //     echo '<script type="text/javascript"> alert("Invalid Credentials")</script>';
        //     // }

        //   //  $_SESSION['name']=$uname;
           
        //     //echo '<script type="text/javascript"> alert("Login done successfully") </script>';
        // }
        // else
        // {
        //     echo 0;
        // }
//         <!-- <html>
//     <head>
//     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
//     <script src="index.js"></script>
//     </head>
//     <body>
//         <form action="index.php" method="post">
//             Email: <input id="use" type="email" name="name" required><br>
//             Password: <input type="password" name="pass" required>
//             <input name="sname" onclick="clicks()" type="Submit" value="LOGIN">
//             <a href="registration.html"><input name="register" type="button" value="SIGN UP"></a>
//             <a href="reset.php">forgot password?</a>
//         </form>
//         <br>
//     </body>
// </html> -->
    
?>