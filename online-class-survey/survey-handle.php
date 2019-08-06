<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Handler for the survey page
*/
require_once "db_conn.php";
require_once "survey-utils.php";

global $con;
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: index.php");
    exit;
}

$uservalue = $_SESSION['username'];
$crn = $_SESSION['crn'];
$categories = get_catArr();

if($_SESSION['index'] < $_SESSION['catArrLength']){
    insertData($uservalue);
    require "survey.php";
}else{

    require "results.php";
    insertData($uservalue);

    echo "<div id='page'>";
    echo "<div class='card-results mdl-card-wide mdl-shadow--3dp'>";
    echo "<div class='wrapper'>";
    echo "<h1 style='text-align:center'>Your Results</h1>";

    foreach ($categories as $cat){

        $sql = "SELECT SUM(answer_int) AS value_sum, COUNT(answer_int) AS count_val 
        FROM userAnswers INNER JOIN questions 
        ON userAnswers.question_id = questions.question_id 
        WHERE user_id = '$uservalue' 
        AND category = '$cat' 
        AND userAnswers.crn = '$crn'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $sum = $row['value_sum'];
        $count = $row['count_val'];
        $maxScore = $count * 7;
        $avgScore = ceil($maxScore * .6);

        echo "Your total score for category " . $cat . " is : " . $sum . " </br>";
        echo "If your score is below ".$avgScore." , please work to improve your score.</br></br>";
        }
        //echo "<button type = 'button' onclick = 'location.href=\"logout.php\"'>Logout</button></td>";


        echo   "<a class=  \"mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect\" href=\"logout.php\"><i class='material-icons left'>cloud</i>Logout</a>";
    }
        echo "</div>";
        echo "</div>";
        echo "</div>";
    function insertData($uservalue){
    global $con;
    global $crn;

        foreach ($_POST['questions'] as $thiskey => $value){
            $sql = "REPLACE INTO userAnswers (user_id, crn, question_id, answer_int) values ('$uservalue','$crn','$thiskey','$value');";
            $result = mysqli_query($con,$sql);
        }

    }

            mysqli_close($con);

?>



