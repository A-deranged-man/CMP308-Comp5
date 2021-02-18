<?php 
include("../model/api.php");
session_start();
$selected_radio="";


if(isset($_POST["Submit1"])){
    $selected_radio = $_POST["ans"];
    echo $selected_radio;
}


$hashkey = 178450932;
$score = $_SESSION["score"];
$id = $_GET["id"];
$question_number = ($_GET['q'] / $hashkey);





$questiontxt = getRightAnswerByID($question_number);
$question = json_decode($questiontxt);

if($question[0]-> correct_ans == $selected_radio){
 //Increment score session var 
 //Increment question number
 //Hash question number and send to quizz page
// -> Redirect to quizz 
$_SESSION["score"] = $score + 1;
$q = ($question_number + 1) * $hashkey;
echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/quizz.php?id={$id}&q={$q}';</script>";

}else{
    //Decrement score session var
    //Increment question number
    //Hash question number and send to quizz page 
    // -> Redirect to quizz 
    if($_SESSION["score"] == 0){
        $_SESSION["score"] = 0;
    }else{
        $_SESSION["score"] = $score - 1;
    }
    
    $q = ($question_number + 1) * $hashkey;
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/quizz.php?id={$id}&q={$q}';</script>";

}


?>