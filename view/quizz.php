<?php
include("header.php");
include("../model/api.php");
include("../controller/Glicko2Player.php");

$qno = $_GET["q"];
$id = $_GET["id"];

if($_SESSION["logged-in"] === "yes"){

    $questionstxt = getQuestionsByTestId($id);
    $questions = json_decode($questionstxt);
    $numberOfQuestions = count($questions);


    //echo $questionNumber;
    //Descrypt number of question and show it 
    $hashkey = 178450932;
    $i = ($qno/ $hashkey) - 1;

    $currentQuestion = $i + 1;

    echo "<h2> Test Name: {$questions[0]-> test_name}</h2>";
    echo "<h7> Subject: {$questions[0]-> test_subject}</h7>";
    echo  "<label> Question {$currentQuestion} of {$numberOfQuestions}</label>";
    echo "<br>";

    echo "SCORE: {$_SESSION["score"]}";


        if($currentQuestion == $numberOfQuestions){
            echo " <form name='qForm' method='post' action='../controller/finishTestController.php?id={$id}&qnum={$numberOfQuestions}'>";
        }else{
            echo " <form name='qForm' method='post' action='../controller/questionsController.php?id={$id}&q={$qno}'>";
        }

    echo " <form name='qForm' method='post' action='../controller/questionsController.php?id={$id}&q={$qno}'>";
    
          echo      "<div class='container'>
                    <h4>{$questions[$i] -> question}</h4>

                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$i}' value='ans1' checked>
                        <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans1} </label>
                     </div>
                    <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$i}' value='ans2'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans2} </label>
                     </div>
                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$i}' value='ans3'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans3} </label>
                     </div>
                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$i}' value='ans4'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans4} </label>
                     </div>
                </div>
                <br>
                <br>";

                if($currentQuestion == $numberOfQuestions){
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