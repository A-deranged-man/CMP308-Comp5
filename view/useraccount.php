<?php
include("header.php");
include("../model/api.php");
session_start();
$userid = $_SESSION['userid'];
if($_SESSION["logged-in"] === "yes") {

    $usertxt = getUserById($userid);
    $user = json_decode($usertxt);

    $resulttxt = getResultsForUser($user[0]-> user_id);
    $result = json_decode($resulttxt);

    //Get user status depending on int (0 -> User / 1 -> Teacher / 2 -> Admin)
    $usertype = "";
    if ($user[0]-> user_type == 0) {
        $usertype = "User";
    }else if ($user[0]-> user_type == 1){
        $usertype = "Teacher";
    }else if ($user[0]-> user_type == 2){
        $usertype = "Admin";
    }else{
        $usertype = "Could not load user type!";
    }

    for ($i = 0, $iMax = count($user); $i < $iMax; $i++) {
            echo "</br>";
                
            echo "<div class=\"container emp-profile\">
            <form method=\"post\">
                <div class=\"row\">
                    <div class=\"col-md-6\">
                        <div class=\"profile-head\">
                                    <h5>
                                        {$user[0] -> fname} {$user[0] -> lname}
                                    </h5>
                                    <h6>
                                        {$usertype}
                                    </h6>
                                    <p class=\"proile-rating\">Rating : <span>{$user[0]-> score}</span></p>

                                    </br>
                                    
                            <ul class=\"nav nav-tabs\" id=\"myTab\" role=\"tablist\">
                            
                                <li class=\"nav-item\">
                                    <a class=\"nav-link active\" id=\"Account-tab\" data-toggle=\"tab\" onclick=\"makeaccountactive()\" role=\"tab\" aria-controls=\"Account\">Account</a>
                                </li>
                                
                                <li class=\"nav-item\">
                                    <a class=\"nav-link\" id=\"Scores-tab\" data-toggle=\"tab\" onclick=\"makescoresactive()\" role=\"tab\" aria-controls=\"Scores\">Scores</a>
                                </li>
                                
                            </ul>
                            </br>
                            
                        </div>
                    </div>

                </div>
                <div class=\"row\">
                    <div class=\"col-md-8\">
                        <div class=\"tab-content profile-tab\" id=\"myTabContent\">
                            <div class=\"tab-pane fade show active\" id=\"Account\" role=\"tabpanel\" aria-labelledby=\"Account-tab\">
                                        <div class=\"row\">
                                            <div class=\"col-md-6\">
                                                <label>User Id</label>
                                            </div>
                                            <div class=\"col-md-6\">
                                                <p>{$user[0] -> user_id}</p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-6\">
                                                <label>Full Name</label>
                                            </div>
                                            <div class=\"col-md-6\">
                                                <p>{$user[0] -> fname} {$user[0] -> lname}</p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-6\">
                                                <label>Email</label>
                                            </div>
                                            <div class=\"col-md-6\">
                                                <p>{$user[0]-> email}</p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-6\">
                                                <label>Account Type</label>
                                            </div>
                                            <div class=\"col-md-6\">
                                                <p>{$usertype}</p>
                                            </div>
                                        </div>
                                        <div class=\"row\">
                                            <div class=\"col-md-6\">
                                                <label>Rating</label>
                                            </div>
                                            <div class=\"col-md-6\">
                                                <p>{$user[0]-> score}</p>
                                            </div>
                                        </div>
                            </div>

                            <div class=\"tab-pane fade\" id=\"Scores\" role=\"tabpanel\" aria-labelledby=\"Scores-tab\">";
                                if(empty($result))
                                {
                                    echo"   <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <label>No Tests Taken</label>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <p></p>
                                    </div>
                                </div>";
                                }
                                else
                                {
                                    for ($j = 0, $jMax = count($result); $j < $jMax; $j++){

                                        echo"   <div class=\"row\">
                                               <div class=\"col-md-6\">
                                                   <label>{$result[$j] -> test_name}</label>
                                               </div>
                                               <div class=\"col-md-6\">
                                                   <p>{$result[$j]-> score} / {$result[$j]-> num_of_questions}</p>
                                               </div>
                                           </div>";
   
                                    }
                                }


                            echo "</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
            </div>";    

    }
}

else{
    header("Location: login.php"); exit;
}

include("footer.php");
?>
<script>
		
		
		function makeaccountactive(){
		document.getElementById("Scores").className = "tab-pane fade";
		document.getElementById("Account").className = "tab-pane fade show active";
		
		document.getElementById("Account-tab").className = "nav-link active";
		document.getElementById("Scores-tab").className = "nav-link";
		}
		function makescoresactive(){
		document.getElementById("Scores").className = "tab-pane fade show active";
		document.getElementById("Account").className = "tab-pane fade";
		
		document.getElementById("Account-tab").className = "nav-link";
		document.getElementById("Scores-tab").className = "nav-link active";
		}

		</script>