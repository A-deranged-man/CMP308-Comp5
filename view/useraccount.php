<?php
include("header.php");
include("../model/api.php");
session_start();
$userid = $_SESSION['userid'];
if($_SESSION["logged-in"] === "yes") {

    $usertxt = getUserById($userid);
    $user = json_decode($usertxt);
    for ($i = 0, $iMax = count($user); $i < $iMax; $i++) {
        echo "<div class=\"container\">
            <div class=\"list-group-item list-group-item-action bg-light text-dark \">
                <p class=\"st-small\">
                    Posted By: {$user[$i]-> email}
                </p>
                <p>
                    Posted By: {$user[$i]-> lname}
                </p>
  
            </div>
        </div>
        <br>";
    }
}

else{
    header("Location: login.php"); exit;
}

include("footer.php");