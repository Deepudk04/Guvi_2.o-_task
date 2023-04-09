<html>
    <head>
     
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
     <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <h1>LOGGED IN THROUGH</h1>
        <h2 style="color:skyblue;" id="vals"></h2>
        <br><br>
        <form action="profile.php" method="post">
        <div class="class">
            <input type="text" size="30" placeholder="Enter your Mail id for Profile" id="input" name="input">
            <input type="submit" id="isub" name="isub" value="SEARCH PROFILE">
        </div><br><br>
       </form>
       <script src="../js/profile.js"></script>
        
    </body>
   
</html>
<?php

 require '../vendor/autoload.php';

 $client = new MongoDB\Client;
 $user = $client-> USER_PROFILE;
 $profUpdate= $user -> profiles;

//  $Data = "<script>document.write(localStorage.getItem("res")).value);</script>";
//  print_r($Data);
  
 if(isset($_POST['isub']))
 {
    $data=$_POST['input'];
    $where = array(
        "eMail" => "$data"
    );
    $select_fields = array(
        'Name' => 1,
        'Age' => 1,
        'Contact' => 1,
    );
    $options = array(
        'projection' => $select_fields
    );
    $cursor = $profUpdate->find($where, $options);   //This is the main line
    //$ans=$cursor->toArray();
   // var_dump($ans);
   if(empty($cursor))
   {
    echo "hello";
   }
   ?><h2><u>YOUR PROFILE</u></h2><?php
    foreach($cursor as $key => $a)
    { 
        
        // if($a['Name']== null)
        // {
        //     echo "hii";
        // }
        ?>
        <div class="row">
                <h3><?php echo 'Name : ' . $a['Name'] ?></h3>
           
                <h3><?php echo 'Age : ' . $a['Age'] ?></h3>
              
                <h3><?php echo 'Contact : ' . $a['Contact'] ?></h3>
         </div> 
         
   <?php break;}
 }

?>

       <br><br>
        <div>
                <a href="../profile.html"><input type="submit" name="prof" value="UPADTE PROFILE"></a>
        </div>
        <br>
        <a href="../login.html"><input type="submit" name="logout" value="LOGOUT"></a>
       