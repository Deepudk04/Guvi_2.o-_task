<?php 
    require '../dbconfig/config.php'
?> 

<?php
  
   $info = "false";
//    $info['success'] = false;
   

    if (empty($_POST['uname'])) {
        // die("Name is required");
         $info = "Name is required";
         echo  json_encode($info);	
         exit;
    }
    
    if( ! filter_var($_POST["umail"], FILTER_VALIDATE_EMAIL)) {
       // die("Valid email address is required");
        $info = "Valid email address is required";
        echo  json_encode($info);	
        exit;
    }
    
    if(strlen($_POST["upass"])<8) {
       // die("Password must be at least 8 charachters long");
        $info = "Password must be at least 8 charachters long";
        echo  json_encode($info);	
        exit;
    }
    
    if( ! preg_match("/[a-z]/i", $_POST['upass'])) {
       // die("Password must contain at least one alphabet");
        $info = "Password must contain at least one alphabet";
        echo  json_encode($info);	
        exit;
    }
    
    if( ! preg_match("/[0-9]/i", $_POST['upass'])) {
       // die("Password must contain at least one number");
        $info = "Password must contain at least one number";
        echo  json_encode($info);	
        exit;
    }
    
    if($_POST['upass'] != $_POST['cpass']) {
        //die("Password confirmation failed");
        $info = "Password confirmation failed";
        echo  json_encode($info);	
        exit;
    }
    
    if( ! preg_match("/[0-9]/i", $_POST['uphone'])) {
       // die("Phone number nust contain only digits");
        $info= "Phone number nust contain only digits";
        echo  json_encode($info);	
        exit;
    }
    if(strlen($_POST['uphone']) != 10) {
        //die("Invalid phone number");
        $info = "Invalid phone number";
        echo  json_encode($info);	
        exit;
    }

    try{

    if($info == "false")
    {
        $unname = $_POST['uname'];
        $unemail = $_POST['umail'];
        $unphone = $_POST['uphone'];
        $password_hash = password_hash($_POST['upass'], PASSWORD_DEFAULT);
  
        $query="INSERT INTO user(username,email,password,phonenumber) values (?,?,?,?)";

        $stmt = $con->prepare($query);
        $stmt->bind_param('ssss',$unname,$unemail,$password_hash,$unphone);
        $stmt->execute();
        echo 1;
        exit;
       // $info = "Success";
    }
    }catch(Exception $e)
    {
        $info="Mail id already exists";
    }
    //echo '<script type="text/javascript"> alert("Registered successfully!!!  Going back to login") </script>';
    
    // $query_run =mysqli_query($con,$query);
    
    // header('location:index.php');
    //print_r($_POST);
    echo  $info;	

?>
