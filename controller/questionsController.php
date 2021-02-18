<?php 
include("../model/api.php");
session_start();

if(isset($_POST["Submit1"])){
    $selected_radio = $_POST["ans"];
    echo $selected_radio;
}


$hashkey = 178450932;
$score = $_SESSION["score"];
$id = $_GET["id"];
$question_number = ($_GET['q'] / $hashkey);
// $question_choice = $_GET['c']; 
$question_choice = 'ans5';




$questiontxt = getRightAnswerByID($question_number);
$question = json_decode($questiontxt);

if($question[0]-> correct_ans == $question_choice){
 //Increment score session var 
 //Increment question number
 //Hash question number and send to quizz page
// -> Redirect to quizz 
$_SESSION["score"] = $score + 1;
$question_number = ($question_number + 1) * $hashkey;
// echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/quizz.php?id={$id}?q={$question_number}';</script>";
}else{
    //Decrement score session var
    //Increment question number
    //Hash question number and send to quizz page 
    // -> Redirect to quizz 
    // $_SESSION["score"] = $score - 1;
    $q = ($question_number + 1) * $hashkey;
    // echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/quizz.php?id={$id}&q={$q}';</script>";

}


?>