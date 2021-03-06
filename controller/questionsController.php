<?php 
include("../model/api.php");
include("Glicko2Player.php");
session_start();
$selected_radio="";


if(isset($_POST["Submit1"])){
    $selected_radio = $_POST["ans"];
    echo $selected_radio;
}

$TestID = $_GET["TestID"];
$QuestionCounter = $_GET['QuestionCounter'];
$QuestionCounter++;

$user = new Glicko2Player($_SESSION["UserRating"],350);
$question_player = new Glicko2Player($_SESSION["QRating"],350);


$questiontxt = getRightAnswerByID($QuestionCounter);
$question = json_decode($questiontxt);

if($question[0]-> correct_ans == $selected_radio){
 //Increment score session var 
 //Increment question number
 //Hash question number and send to quizz page
// -> Redirect to quizz

$user->AddWin($question_player);
$question_player->AddLoss($user);
$user->Update();
$question_player->Update();

$_SESSION["UserRating"] = $user->rating;
$_SESSION["UserRating"] = round($_SESSION["UserRating"]);

$_SESSION["QRating"] = $question_player->rating;
$_SESSION["QRating"] = round($_SESSION["QRating"]);

$_SESSION["CorrectCounter"]++;

glickoUpdate($_SESSION["userid"],$_SESSION["UserRating"],$_SESSION["QID"],$_SESSION["QRating"]);


echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/quiz.php?TestID={$TestID}&QuestionCounter={$QuestionCounter}';</script>";

}else{
    //Decrement score session var
    //Increment question number
    //Hash question number and send to quizz page
    // -> Redirect to quizz

    $question_player->AddWin($user);
    $user->AddLoss($question_player);
    $user->Update();
    $question_player->Update();

    $_SESSION["UserRating"] = $user->rating;
    $_SESSION["UserRating"] = round($_SESSION["UserRating"]);

    $_SESSION["QRating"] = $question_player->rating;
    $_SESSION["QRating"] = round($_SESSION["QRating"]);


    glickoUpdate($_SESSION["userid"],$_SESSION["UserRating"],$_SESSION["QID"],$_SESSION["QRating"]);

    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/quiz.php?TestID={$TestID}&QuestionCounter={$QuestionCounter}';</script>";

}


?>