<?php 
include("../model/api.php");
include("Glicko2Player.php");
session_start();

//Take the selected answer from the question sent to this controller and place it inside a variable.
if(isset($_POST["Submit1"])){
    $selected_answer = $_POST["ans"];
}

//Retrieve the TestID & QuestionCounter variables, increment the QuestionCounter by 1.
$TestID = $_GET["TestID"];
$QuestionCounter = $_GET['QuestionCounter'];
$QuestionCounter++;
test_logUpdate($_SESSION["userid"],$TestID,$QuestionCounter);



//Create two new Glicko2Players, one for the logged-in user, the other for the current question.
$user = new Glicko2Player($_SESSION["UserRating"],$_SESSION["UserRD"]);
$question_player = new Glicko2Player($_SESSION["QRating"],$_SESSION["QRD"]);

//Retrieve the correct answer to this question and place it inside a variable.
$questiontxt = getRightAnswerByID($QuestionCounter);
$question = json_decode($questiontxt);

//if the selected answer matches the correct answer, do the following.
if($question[0]-> correct_ans == $selected_answer){
    //Increment the correct question counter by one.
    ++$_SESSION["CorrectCounter"];

    //If a question is correctly answered, add a win to the user, and a loss to the question, then update both players.
    $user->AddWin($question_player);
    $question_player->AddLoss($user);
    $user->Update();
    $question_player->Update();
    
    //Take the current rating and rd from the user glicko2player, round them both and place them into respective session vars.
    $_SESSION["UserRating"] = $user->rating;
    $_SESSION["UserRating"] = round($_SESSION["UserRating"]);
    $_SESSION["UserRD"] = $user->rd;
    $_SESSION["UserRD"] = round($_SESSION["UserRD"]);
    
    //Take the current rating and rd from the question glicko2player, round them both and place them into respective session vars.
    $_SESSION["QRating"] = $question_player->rating;
    $_SESSION["QRating"] = round($_SESSION["QRating"]);
    $_SESSION["QRD"] = $question_player->rd;
    $_SESSION["QRD"] = round($_SESSION["QRD"]);
    

    
    //Send all session variables into an update function to place them into the database.
    glickoUpdate($_SESSION["userid"],$_SESSION["UserRating"],$_SESSION["UserRD"],$_SESSION["QID"],$_SESSION["QRating"],$_SESSION["QRD"]);
    
    //Return to the quiz, starting from the next question.
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/production/view/quiz.php?TestID={$TestID}&QuestionCounter={$QuestionCounter}&NewStart=0';</script>";

}
//If the answer was incorrect, do the following.
else{

    //If a question is incorrectly answered, add a loss to the user, and a win to the question, then update both players.
    $question_player->AddWin($user);
    $user->AddLoss($question_player);
    $user->Update();
    $question_player->Update();

    //Take the current rating and rd from the user glicko2player, round them both and place them into respective session vars.
    $_SESSION["UserRating"] = $user->rating;
    $_SESSION["UserRating"] = round($_SESSION["UserRating"]);
    $_SESSION["UserRD"] = $user->rd;
    $_SESSION["UserRD"] = round($_SESSION["UserRD"]);

    //Take the current rating and rd from the question glicko2player, round them both and place them into respective session vars.
    $_SESSION["QRating"] = $question_player->rating;
    $_SESSION["QRating"] = round($_SESSION["QRating"]);
    $_SESSION["QRD"] = $question_player->rd;
    $_SESSION["QRD"] = round($_SESSION["QRD"]);
    
    //Send all session variables into an update function to place them into the database.
    glickoUpdate($_SESSION["userid"],$_SESSION["UserRating"],$_SESSION["UserRD"],$_SESSION["QID"],$_SESSION["QRating"],$_SESSION["QRD"]);

    //Return to the quiz, starting from the next question.
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/production/view/quiz.php?TestID={$TestID}&QuestionCounter={$QuestionCounter}&NewStart=0';</script>";

}