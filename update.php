<?php 
if(isset($_POST['psub']))
{
   echo '<script type="text/javascript"> alert("Updated Sucessfully!") </script>';
   require 'vendor/autoload.php';

   $client = new MongoDB\Client;

    $user = $client-> USER_PROFILE;
    $profUpdate= $user -> profiles;
    $result=$profUpdate->insertOne([
    'eMail' => $_POST['pmail'],
    'Name' => $_POST['pname'],
    'Age' => $_POST['age'],
    'Contact' => $_POST['con']
    ]);
    var_dump($result);
    if($result->getInsertedCount() === 1){
        header('location:php/profile.php');
    } 
    else{
        echo 'Failed to create profile';
      }
}

?>
