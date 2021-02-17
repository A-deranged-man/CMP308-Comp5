<?php
include("header.php");
include("../model/api.php");
session_start();
$userid = $_SESSION['userid'];
if($_SESSION["logged-in"] === "yes") {

    $usertxt = getUserById($userid);
    $user = json_decode($usertxt);
    for ($i = 0, $iMax = count($user); $i < $iMax; $i++) {
echo "</br>";
    
echo "<div class=\"container emp-profile\">
<form method=\"post\">
    <div class=\"row\">
        <div class=\"col-md-6\">
            <div class=\"profile-head\">
                        <h5>
                            Name goes here
                        </h5>
                        <h6>
                            Type of account goes here
                        </h6>
                        <p class=\"proile-rating\">Rating : <span>Rating goes here</span></p>

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
                                    <p>Test1 (put userid here)</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Full Name</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>Test Name (put full name here)</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Email</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>Test@test.com (email here)</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Account Type</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>Student/admin/teacher etc goes here</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Rating</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>Player rating goes here</p>
                                </div>
                            </div>
                </div>
                <div class=\"tab-pane fade\" id=\"Scores\" role=\"tabpanel\" aria-labelledby=\"Scores-tab\">
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Quiz 1</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>correct questions/total questions</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Quiz 2</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>correct questions/total questions</p>
                                </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>           
</div>";    



        
        // echo "<div class=\"container\">
        //     <div class=\"list-group-item list-group-item-action bg-light text-dark \">
        //         <p class=\"st-small\">
        //             Posted By: {$user[$i]-> email}
        //         </p>
        //         <p>
        //             Posted By: {$user[$i]-> lname}
        //         </p>
  
        //     </div>
        // </div>
        // <br>";
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