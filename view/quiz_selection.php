<?php
include("header.php");
include("../model/api.php");
if($_SESSION["logged-in"] === "yes"){
    $testtxt = getTests();
    $QuestionCounter=0;
    $test = json_decode($testtxt);
    for ($i = 0, $iMax = count($test); $i < $iMax; $i++) {
        echo "
        <div class=\"container\">
            <div class=\"list-group-item list-group-item-action bg-light text-dark \">
                <div class=\"d-flex w-100 justify-content-between\">
                    <h5 class=\"mb-1\"><strong>{$test[$i]-> test_name} </strong></h5>
                    <h7>{$test[$i]-> test_subject} </h7>";

                    if(isTestTaken($_SESSION["userid"],$test[$i]-> test_id)){
                        echo "<label>Complete</label>";
                    }else{
                        echo "<a class='st-border-black st-black st-text-white btn btn-primary' href='quiz.php?TestID={$test[$i]-> test_id}&QuestionCounter={$QuestionCounter}'>Start Test</a>";
                    }
                    
            echo"</div>
            </div>
        </div>
        <br>";
    }

}
else{
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/login.php';</script>"; exit;
}

include("footer.php");
