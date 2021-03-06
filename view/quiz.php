<?php
include("header.php");
include("../model/api.php");
include("../controller/Glicko2Player.php");

$QuestionCounter = $_GET["QuestionCounter"];
$TestID = $_GET["TestID"];

if($_SESSION["logged-in"] === "yes"){
    
    if(!isset($_SESSION["CorrectCounter"])){
        $_SESSION["CorrectCounter"] = 0;
    }
    
    $questionstxt = getQuestionsByTestId($TestID);
    $questions = json_decode($questionstxt);
    $NumberOfQuestions = count($questions);
    $QuestionCounterFrontEnd = $QuestionCounter + 1;

    echo "<h2> Test Name: {$questions[0]-> test_name}</h2>";
    echo "<h7> Subject: {$questions[0]-> test_subject}</h7>";
    echo  "<label> Question {$QuestionCounterFrontEnd} of {$NumberOfQuestions}</label>";
    echo "<br>";


    $UserRating = round($_SESSION["UserRating"]);
    $_SESSION["QRating"] = $questions[$QuestionCounter] -> score;
    $_SESSION["QID"] = $questions[$QuestionCounter] -> qno;

    echo "Rating: {$UserRating}";



        if($QuestionCounterFrontEnd == $NumberOfQuestions){
            echo " <form name='qForm' method='post' action='../controller/finishTestController.php?TestID={$TestID}&NumberOfQuestions={$NumberOfQuestions}'>";
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

                if($QuestionCounter == $NumberOfQuestions){
                    echo "<input class='btn btn-primary' type='Submit' name='Submit1' value='Finish Test'></input>";
                }else{
                    echo "<input class='btn btn-primary' type='Submit' name='Submit1' value='Next Question'></input>";
                }

                
    
  echo      "</form>";
    

?>



<?php
}
else{
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/login.php';</script>"; exit;
}

include("footer.php");
?>