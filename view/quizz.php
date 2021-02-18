<?php
include("header.php");
include("../model/api.php");
session_start();

$qno = $_GET["q"];
$id = $_GET["id"];





if($_SESSION["logged-in"] === "yes"){

    $questionstxt = getQuestionsByTestId($id);
    $questions = json_decode($questionstxt);

    //Descrypt number of question and show it 
    $hashkey = 178450932;
 
    echo $qno;

    
    $i = ($qno/ $hashkey) - 1;


    echo "<h2> Test Name: {$questions[0]-> test_name}</h2>";
    echo "<h7> Subject: {$questions[0]-> test_subject}</h7>";
    echo "<br>";



    echo " <form name='qForm' method='post' action='../controller/questionsController.php?id={$id}&q={$qno}'>
    
                <div class='container'>
                    <h4>{$questions[$i] -> question}</h4>

                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$i}' value='a' checked>
                        <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans1} </label>
                     </div>
                    <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$i}' value='b'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans2} </label>
                     </div>
                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$i}' value='c'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans3} </label>
                     </div>
                     <div class='form-check form-check-inline'>
                         <input class='form-check-input' type='radio' name='ans' id='exampleRadios{$i}' value='d'>
                         <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans4} </label>
                     </div>
                </div>
                <br>
                <br>
                <input class='btn btn-primary' type='Submit' name='Submit1' value'Next Question'></input>
    
    </form>";
    
        // echo "
  
        //             <div class='container'>
        //                 <h4>{$questions[$i] -> question}</h4>

        //                 <div class='form-check form-check-inline'>
        //                     <input class='form-check-input' type='radio' name='exampleRadios{$i}' id='exampleRadios{$i}' value='a' checked>
        //                     <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans1} </label>
        //                 </div>
        //                 <div class='form-check form-check-inline'>
        //                     <input class='form-check-input' type='radio' name='exampleRadios{$i}' id='exampleRadios{$i}' value='b'>
        //                     <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans2} </label>
        //                 </div>
        //                 <div class='form-check form-check-inline'>
        //                     <input class='form-check-input' type='radio' name='exampleRadios{$i}' id='exampleRadios{$i}' value='c'>
        //                     <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans3} </label>
        //                 </div>
        //                 <div class='form-check form-check-inline'>
        //                     <input class='form-check-input' type='radio' name='exampleRadios{$i}' id='exampleRadios{$i}' value='d'>
        //                     <label class='form-check-label' for='exampleRadios1'> {$questions[$i] -> ans4} </label>
        //                 </div>
        //             </div>
        //     <br>
        //     <br>
        // ";
    
        // echo "<a class='btn btn-primary' href='../controller/questionsController.php?id={$id}&q={$qno}'>Start Test</a>"

?>



<?php
}
else{
    echo "<script type='text/javascript'>window.top.location='https://mayar.abertay.ac.uk/~cmp311g20c05/staging/view/login.php';</script>"; exit;
}

include("footer.php");
?>