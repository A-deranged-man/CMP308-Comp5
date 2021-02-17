<?php
include("header.php");
include("../model/api.php");
session_start();

$id = $_GET["id"];

if($_SESSION["logged-in"] === "yes"){

    $questionstxt = getQuestionsByTestId($id);
    $questions = json_decode($questionstxt);

    echo "<h2> Test Name: {$questions[0]-> test_name}</h2>";
    echo "<h7> Subject: {$questions[0]-> test_subject}</h7>";
    echo "<br>";

    for($i =0, $iMAx = count($questions); $i < $iMAx; $i++){
        echo "
            <div class='container'>
                <h4>{$questions[$i] -> question}</h4>
                    <div class='container'>
                        <div class='row'>


                            <div class='col-sm-3' >
                                <div class='form-check'>
                                <input class='form-check-input' type='radio' name='flexRadioDefault{$i}' id='flexRadioDefault{$i}'>
                                <label class='form-check-label' for='flexRadioDefault{$i}'>
                                    <h6>{$questions[$i] -> ans1}</h6>
                                </label>
                                </div>
                            </div>

                            <div class='col-sm-3' >
                            <div class='form-check'>
                            <input class='form-check-input' type='radio' name='flexRadioDefault{$i}' id='flexRadioDefault{$i}'>
                            <label class='form-check-label' for='flexRadioDefault{$i}'>
                                <h6>{$questions[$i] -> ans2}</h6>
                            </label>
                            </div>
                            </div>

                        <div class='col-sm-3' >
                        <div class='form-check'>
                        <input class='form-check-input' type='radio' name='flexRadioDefault{$i}' id='flexRadioDefault{$i}'>
                        <label class='form-check-label' for='flexRadioDefault{$i}'>
                            <h6>{$questions[$i] -> ans3}</h6>
                        </label>
                        </div>
                        </div>

                    <div class='col-sm-3' >
                    <div class='form-check'>
                    <input class='form-check-input' type='radio' name='flexRadioDefault{$i}' id='flexRadioDefault{$i}'>
                    <label class='form-check-label' for='flexRadioDefault{$i}'>
                        <h6>{$questions[$i] -> ans4}</h6>
                    </label>
                    </div>
                    </div>

                            
                        </div>
                    </div>
            </div>
            <br>
            <br>
        ";
    }
    // $testtxt = getTests();
    // $test = json_decode($testtxt);
    // for ($i = 0, $iMax = count($test); $i < $iMax; $i++) {
    //     echo "
    //     <div class=\"container\">
    //         <div class=\"list-group-item list-group-item-action bg-light text-dark \">
    //             <div class=\"d-flex w-100 justify-content-between\">
    //                 <h5 class=\"mb-1\"><strong>{$test[$i]-> test_name} </strong></h5>
    //                 <h7>{$test[$i]-> test_subject} </h7>
    //                 <a class='btn btn-primary' href='quizz.php?id={$test[$i]-> test_id}'>Start Test</a>
    //             </div>
                

    //         </div>
    //     </div>
    // //     <br>";
    // }

}
else{
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/login.php';</script>"; exit;
}

include("footer.php");