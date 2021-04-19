<?php 
session_start();
include("../model/api.php");

//Take the selected answer from the question sent to this controller and place it inside a variable.
if(isset($_POST["Submit1"])){
    $selected_answer = $_POST["ans"];
}
$QuestionCounter = $_GET['QuestionCounter'];

//Retrieve the correct answer to this question and place it inside a variable.
$questiontxt = getRightAnswerByID($QuestionCounter);
$question = json_decode($questiontxt);

//if the selected answer matches the correct answer, do the following.
if($question[0]-> correct_ans == $selected_answer){
    //Increment the correct question counter by one.
    ++$_SESSION["CorrectCounter"];
}

//This file takes the user id, the testid from the test they just finished, along with the total number of questions and
// correctly answered questions and sends them to a function, which places them in the database.

$UserID = $_SESSION["userid"];
$TestID = $_GET["TestID"];
$NumberOfQuestions= $_GET["NumberOfQuestions"];
$CorrectCounter = $_SESSION["CorrectCounter"];

updateScore($UserID , $TestID , $NumberOfQuestions, $CorrectCounter);

unset($_SESSION["CorrectCounter"]);

echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/useraccount.php';</script>";




?>