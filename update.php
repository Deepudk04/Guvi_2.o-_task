

<?php 
if(isset($_POST['psub']))
{
   echo '<script type="text/javascript"> alert("Updated Sucessfully!") </script>';
   require 'vendor/autoload.php';

   $client = new MongoDB\Client;
    $var=$_POST['pname'];
    $var1=$_POST['age'];
    $var2=$_POST['con'];
    $user = $client-> USER_PROFILE;
    $profUpdate= $user -> profiles;
    $result=$profUpdate->updateOne(
    ['eMail' => $_POST['pmail']],
    ['$set' => ['Name' => $var]],
    );
    $result=$profUpdate->updateOne(
        ['eMail' => $_POST['pmail']],
        ['$set' => ['Age' => $var1]],
        );
        $result=$profUpdate->updateOne(
            ['eMail' => $_POST['pmail']],
            ['$set' => ['Contact' => $var2]],
            );
    // $result=$profUpdate->update(
    //     array('eMail' => $_POST['pmail']),
    //     array(
    //         '$set' => 
    //                   array(
    //                          array("Name" => $_POST['pname']),
    //                          array("Age" => $_POST['age']),
    //                          array("Contact" => $_POST['con'])
    //                        )
    //     ),
    //     array("upsert" => true) 
    //  );
    var_dump($result);
    if($result->getModifiedCount() == 1){
        header('location:php/profile.php');
    } 
    else{
        echo 'Failed to create profile';
      }
}

?>


