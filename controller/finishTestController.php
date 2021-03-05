<?php 
session_start();
include("../model/api.php");
$userId = $_SESSION["userid"];
$testId = $_GET["id"];
$qcount = $_SESSION["qcount"];
$testNum= $_GET["qnum"];
$rating = $_SESSION["score"];

$res = updateScore($userId , $testId , $testNum, $qcount, $rating);



//https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/useraccount.php
echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/useraccount.php';</script>";




?>