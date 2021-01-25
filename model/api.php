<?php
	// Connect to database
	include("../controller/DBController.php");
	$db = new DBController();
	$conn =  $db->getConnstring();

 /*   function getUserById($id){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT question.qno, question.question, question.userid, question.ddtm, user.username 
        FROM question, user WHERE user.userid = ? AND question.userid = ? ORDER BY `question`.`qno` DESC " ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $id, $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }*/

    function make_safe($uname) {
	    global $conn;
	    return
            mysqli_real_escape_string($conn, $uname);
        }

    function make_safe_SS($uname) {
        global $conn;
            mysqli_real_escape_string($conn, $uname);
            stripslashes($uname);
            return $uname;
    }

    function register_user($username, $email, $password, $date){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT into `311_user` (username, email, password, create_datetime)
        VALUES (?, ?, ?, ?)" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ssss', $username,$email, $password, $date);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    function login_user($email){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM `311_user` WHERE email=?" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    /*function  delete_question($qno){
        session_start();
        if($_SESSION["logged-in"] === "yes"){
            global $conn;
            $stmt = mysqli_stmt_init($conn);
            $sql = "DELETE FROM answer WHERE answer.qno = ?" ;
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $qno);
            mysqli_stmt_execute($stmt);

            $stmt = mysqli_stmt_init($conn);
            $sql = "DELETE FROM question WHERE question.qno = ?" ;
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt, 'i', $qno);
            mysqli_stmt_execute($stmt);
        }

    }

    function edit_question($question, $qno){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "UPDATE question SET question.question = ? WHERE question.qno = ?" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'si', $question, $qno);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    function getQuestionById($qno, $userid){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT question.qno, question.question, question.userid, question.ddtm, user.username 
        FROM question, user WHERE question.qno = ? AND user.userid = ?" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $qno, $userid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }

    function getQuestions(){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT question.qno, question.question, question.userid, question.ddtm, user.username 
        FROM question, user WHERE question.userid = user.userid ORDER BY question.ddtm DESC LIMIT 6 " ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }

    function getAnswers($qno){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT answer.qno, answer.answer, answer.userid, answer.ddtm, user.username 
        FROM user, answer WHERE answer.qno = ? AND answer.userid = user.userid ORDER BY answer.ddtm" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $qno);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }

    function getQuestionForAnswer($qno){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT question.qno, question.question, question.userid, question.ddtm, user.username 
        FROM question, user WHERE question.qno = ? AND user.userid = question.userid" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $qno);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }

    function submitQuestion($question, $userid, $ddtm){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT into question (question, userid, ddtm) VALUES (?,?,?)" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'sis', $question, $userid, $ddtm);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    function submitAnswer($qno, $answer, $userid, $ddtm){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT into `answer` (qno,answer,userid, ddtm)
                     VALUES (?,?,?,?)" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'isis', $qno, $answer, $userid,$ddtm);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    } */

   