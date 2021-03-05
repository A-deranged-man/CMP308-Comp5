<?php 
include("../model/api.php");
include("Glicko2Player.php");
session_start();
$selected_radio="";

$_SESSION["qcount"] = 0;

if(isset($_POST["Submit1"])){
    $selected_radio = $_POST["ans"];
    echo $selected_radio;
}


$hashkey = 178450932;


++$_SESSION["qcount"];

$id = $_GET["id"];
$question_number = ($_GET['q'] / $hashkey);

$user = new Glicko2Player($_SESSION["score"],350);
$question_player = new Glicko2Player();


$questiontxt = getRightAnswerByID($question_number);
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




$_SESSION["score"] = $user->rating;
$_SESSION["score"] = round($_SESSION["score"]);

$q = ($question_number + 1) * $hashkey;
echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/quizz.php?id={$id}&q={$q}';</script>";

}else{
    //Decrement score session var
    //Increment question number
    //Hash question number and send to quizz page
    // -> Redirect to quizz

    $user->AddLoss($question_player);
    $question_player->AddWin($user);
    $user->Update();
    $question_player->Update();

    if($_SESSION["qcount"] == 0){
        $_SESSION["qcount"] = 0;
    }else{
        $_SESSION["qcount"] = $score - 1;
    }

    $q = ($question_number + 1) * $hashkey;
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/quizz.php?id={$id}&q={$q}';</script>";

}


?>