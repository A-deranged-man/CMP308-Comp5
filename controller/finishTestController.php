<?php 
session_start();
include("../model/api.php");
$UserID = $_SESSION["userid"];
$TestID = $_GET["TestID"];
$NumberOfQuestions= $_GET["NumberOfQuestions"];
$CorrectCounter = $_SESSION["CorrectCounter"];

updateScore($UserID , $TestID , $NumberOfQuestions, $CorrectCounter);

unset($_SESSION["CorrectCounter"]);

//https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/useraccount.php
echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/useraccount.php';</script>";




?>