<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

include("../model/api.php");
$email = make_safe_SS($_POST['email']);
$fname = make_safe_SS($_POST['fname']);
$lname =  make_safe_SS($_POST['lname']);
$crypted_password = password_hash($_POST['password'], PASSWORD_BCRYPT);
$create_datetime = date("Y-m-d H:i:s");
$pattern = '/[A-Za-z0-9]+/';

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
{
    echo "<div class='form'>
              <h3>Email Address Invalid.</h3><br/>
              <p class='link'><a href='../view/user_registration.php'>Click here to register again.</a></p>
              </div>";
}
else if (preg_match($pattern, $_POST['fname']) == 0 || preg_match($pattern, $_POST['lname']) == 0) 
{
    echo "<div class='form'>
              <h3>Name Invalid.</h3><br/>
              <p class='link'><a href='../view/user_registration.php'>Click here to register again.</a></p>
              </div>";
}
else if (strlen($_POST['password']) > 60 || strlen($_POST['password']) < 5) 
{
    echo "<div class='form'>
              <h3>Password Over character limit (60 characters max)</h3><br/>
              <p class='link'><a href='../view/user_registration.php'>Click here to register again.</a></p>
              </div>";
}
else
{
    $result = register_user($fname, $lname ,$email,$crypted_password,$create_datetime);
    header("Location: ../view/login.php");
    print($result);
 
}


?>