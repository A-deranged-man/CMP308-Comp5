<?php
include("header.php");
include("../model/api.php");
session_start();
if($_SESSION["logged-in"] === "yes"){
    $testtxt = getTests();
    $hashkey = 178450932;
    $q = $hashkey;
    $test = json_decode($testtxt);
    for ($i = 0, $iMax = count($test); $i < $iMax; $i++) {
        echo "
        <div class=\"container\">
            <div class=\"list-group-item list-group-item-action bg-light text-dark \">
                <div class=\"d-flex w-100 justify-content-between\">
                    <h5 class=\"mb-1\"><strong>{$test[$i]-> test_name} </strong></h5>
                    <h7>{$test[$i]-> test_subject} </h7>
                    <a class='btn btn-primary' href='quizz.php?id={$test[$i]-> test_id}&q={$q}'>Start Test</a>
                </div>
                

            </div>
        </div>
        <br>";
    }

}
else{
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/login.php';</script>"; exit;
}

include("footer.php");
