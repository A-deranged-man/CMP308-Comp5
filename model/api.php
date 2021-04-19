<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

	// Connect to database
	include("../controller/DBController.php");
	$db = new DBController();
	$conn =  $db->getConnstring();



    function make_safe($uname) 
    {
	    global $conn;
	    return mysqli_real_escape_string($conn, $uname);   
    }

    function make_safe_SS($uname) 
    {
        global $conn;
        mysqli_real_escape_string($conn, $uname);
        return stripslashes($uname);   
    }

    function register_user($fname, $lname, $email, $password, $date)
    {
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO `users` (fname, lname, email, password, create_datetime)
        VALUES (?, ?, ?, ?,?)" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'sssss', $fname, $lname, $email, $password, $date);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    function login_user($email){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM `users` WHERE email=?" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 's', $email);
        mysqli_stmt_execute($stmt);
        return mysqli_stmt_get_result($stmt);
    }

    function getTests(){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM tests" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }

        function getUserById($id){    
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM users WHERE users.user_id = ?" ;
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }

    function getQuestionsByTestId($id){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT tests.test_name , tests.test_subject, questions.qno , questions.score, questions.rd, questions.question , questions.ans1 , questions.ans2, questions.ans3,questions.ans4,questions.correct_ans
         FROM `test_questions` 
         INNER JOIN tests 
         ON test_questions.test_id = tests.test_id 
         INNER JOIN questions 
         ON test_questions.qno = questions.qno 
         WHERE test_questions.test_id = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
             $rows[] = $r;
        }
        return json_encode($rows);

    }

    function getQuestionsUserAccount(){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM `questions` ORDER BY `questions`.`score` DESC LIMIT 5";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);

    }

    function getStudentsUserAccount(){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM `users` ORDER BY `users`.`score` ASC LIMIT 5";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }

    //SELECT tests.test_name , user_scores.score , user_scores.num_of_questions FROM `user_scores` INNER JOIN users ON user_scores.user_id = users.user_id INNER JOIN tests on user_scores.test_id = tests.test_id WHERE user_scores.user_id = 2

     function getResultsForUser($userid){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT tests.test_name , user_scores.score , user_scores.num_of_questions 
        FROM `user_scores` 
        INNER JOIN users 
        ON user_scores.user_id = users.user_id 
        INNER JOIN tests 
        on user_scores.test_id = tests.test_id 
        WHERE user_scores.user_id = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $userid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
             $rows[] = $r;
        }
        return json_encode($rows);
     }


     function getRightAnswerByID($qid){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM `questions` WHERE questions.qno = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $qid);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
             $rows[] = $r;
        }
        return json_encode($rows);
     }

     function updateScore($UserID , $TestID , $NumberOfQuestions, $CorrectCounter){
         global $conn;
         $stmt = mysqli_stmt_init($conn);
         $sql = "INSERT INTO `user_scores` (`user_id`, `test_id`, `num_of_questions`, `score`) VALUES (?, ?, ?, ?)";
         mysqli_stmt_prepare($stmt, $sql);
         mysqli_stmt_bind_param($stmt, 'iiii', $UserID, $TestID, $NumberOfQuestions, $CorrectCounter);
         mysqli_stmt_execute($stmt);

         return mysqli_stmt_get_result($stmt);
     }


     function glickoUpdate($UserID, $UserRating, $UserRD ,$QID, $QRating, $QRD){

         global $conn;

         $stmt = mysqli_stmt_init($conn);
         $sql = "UPDATE users SET users.score = ?, users.rd = ? WHERE users.user_id = ?";
         mysqli_stmt_prepare($stmt, $sql);
         mysqli_stmt_bind_param($stmt, 'iii', $UserRating, $UserRD, $UserID);
         mysqli_stmt_execute($stmt);

         $stmt2 = mysqli_stmt_init($conn);
         $sql2 = "UPDATE questions SET questions.score = ?, questions.rd = ? WHERE questions.qno = ?";
         mysqli_stmt_prepare($stmt2, $sql2);
         mysqli_stmt_bind_param($stmt2, 'iii', $QRating, $QRD , $QID);
         mysqli_stmt_execute($stmt2);


     }

    function test_logCheck($UserID, $TestID){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT test_log.current_question FROM `test_log` WHERE user_id = ? AND test_id = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $UserID , $TestID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $rows = array();
        while($r = mysqli_fetch_assoc($result)) {
            $rows[] = $r;
        }
        return $rows;
    }

     function test_logCreate($UserID, $TestID, $QNO){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "INSERT INTO test_log (user_id, test_id, current_question) VALUES (?, ?, ?);";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'iii', $UserID, $TestID, $QNO);
        mysqli_stmt_execute($stmt);
    }

     function test_logUpdate($UserID, $TestID, $QNO){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "UPDATE test_log SET test_log.current_question = ? WHERE test_log.user_id = ? AND test_log.test_id = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'iii',$QNO, $UserID, $TestID);
        mysqli_stmt_execute($stmt);
    }

     function isTestTaken($userId , $testId){
        global $conn;
        $stmt = mysqli_stmt_init($conn);
        $sql = "SELECT * FROM `user_scores` WHERE user_id = ? AND test_id = ?";
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, 'ii', $userId , $testId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result)==1){
            return 1;
        }else {
            return 0;
        }
     }