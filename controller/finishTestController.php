<?php 
session_start();
include("../model/api.php");
$testId = $_GET["id"];
$testNum= $_GET["qnum"];
$score = $_SESSION["score"];
$userId = $_SESSION["userid"];


$res = updateScore($userId , $testId , $score , $testNum);



//https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/useraccount.php
echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/useraccount.php';</script>";




?>