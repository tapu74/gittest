<?php
include('static.php');
echo $minimumPasswordLength;

//$check=$minimumPasswordLength;
$password = "test123";
$user=new User();

if($user->ValidatePassword($password))
//if(ValidatePassword($password))
    echo "Password is valid!";
else
    echo "Password is NOT valid!";


?>