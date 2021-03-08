<?php
include("header.php");
include("../model/api.php");
include("../controller/Glicko2Player.php");

//These values are retrieved from the various controllers and are used to track the current test and question number.
$QuestionCounter = $_GET["QuestionCounter"];
$TestID = $_GET["TestID"];
$NewStart = $_GET["NewStart"];

if($NewStart = 1) {
    test_logCreate($_SESSION["userid"],$TestID,$QuestionCounter);
}


if($_SESSION["logged-in"] === "yes"){

    //This sets a counter to monitor how many correct questions the user answers.
    if(!isset($_SESSION["CorrectCounter"])){
        $_SESSION["CorrectCounter"] = 0;
    }

    //Retrieve all questions assigned to a test id and decode the JSON into an object,
    // then count all questions in the test.
    $questionstxt = getQuestionsByTestId($TestID);
    $questions = json_decode($questionstxt);
    $NumberOfQuestions = count($questions);

    //This needs to be set one higher than the question counter to ensure the front-end works properly.
    $QuestionCounterFrontEnd = $QuestionCounter + 1;

    //Display front-end test information.
    echo "<h2> Test Name: {$questions[0]-> test_name}</h2>";
    echo "<h7> Subject: {$questions[0]-> test_subject}</h7>";
    echo  "<label> Question {$QuestionCounterFrontEnd} of {$NumberOfQuestions}</label>";
    echo "<br>";

    //Take the Glicko rating, rd and question id and place them into session variables(used in questionsController.php).
    $_SESSION["QRating"] = $questions[$QuestionCounter] -> score;
    $_SESSION["QRD"] = $questions[$QuestionCounter] -> rd;
    $_SESSION["QID"] = $questions[$QuestionCounter] -> qno;

    //Take the users Glicko rating and round to an int, then display it to the user.
    $UserRating = round($_SESSION["UserRating"]);
    echo "Rating: {$UserRating}";

        //The front-end variable is required here for this to work.
        if($QuestionCounterFrontEnd == $NumberOfQuestions){
            echo " <form name='qForm' method='post' action='../controller/finishTestController.php?TestID={$TestID}&NumberOfQuestions={$NumberOfQuestions}&QuestionCounter={$QuestionCounter}'>";
        }else{
            echo " <form name='qForm' method='post' action='../controller/questionsController.php?TestID={$TestID}&QuestionCounter={$QuestionCounter}'>";
        }

    echo " <form name='qForm' method='post' action='../controller/questionsController.php?TestID={$TestID}&QuestionCounter={$QuestionCounter}'>";
    
          echo      "<div class='container'>
                    <h4>{$questions[$QuestionCounter] -> question}</h4>

                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$QuestionCounter}' value='ans1' checked>
                        <label class='form-check-label' for='exampleRadios1'> {$questions[$QuestionCounter] -> ans1} </label>
                     </div>
                    <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$QuestionCounter}' value='ans2'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$QuestionCounter] -> ans2} </label>
                     </div>
                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$QuestionCounter}' value='ans3'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$QuestionCounter] -> ans3} </label>
                     </div>
                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$QuestionCounter}' value='ans4'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$QuestionCounter] -> ans4} </label>
                     </div>
                </div>
                <br>
                <br>";

                if($QuestionCounterFrontEnd == $NumberOfQuestions){
                    echo "<input class='btn btn-primary' type='Submit' name='Submit1' value='Finish Test'></input>";
                }else{
                    echo "<input class='btn btn-primary' type='Submit' name='Submit1' value='Next Question'></input>";
                }
                echo "</form>";
}
else{
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/login.php';</script>"; exit;
}
include("footer.php");
