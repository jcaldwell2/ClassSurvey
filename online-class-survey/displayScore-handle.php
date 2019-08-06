<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Handler to display score 
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


$student = $_POST['student'];
$crn = $_POST['crn'];




$categories = get_catArr();

$select_query= "SELECT user_id, fname, lname from users WHERE user_id = '$student';";
$select_query_run =  mysqli_query($con,$select_query);
$row =  mysqli_fetch_row($select_query_run);
$studentName = $row[2] . ", " . $row[1];


if(!isset($_POST['student'])){

    require_once ("displayScores.php");

}else {

    $scoreTable = "<table>";
    foreach ($categories as $cat) {

        $sql = "SELECT SUM(answer_int) as value_sum FROM userAnswers INNER JOIN questions 
                       ON userAnswers.question_id = questions.question_id where user_id = '$student' 
                       and crn = '$crn' and category = '$cat' ;";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $sum = $row['value_sum'];


        $scoreTable .= "<tr><td>$cat : </td><td>$sum</td></tr>";
    }
    $scoreTable .= "</table>";


    echo "Test results for student : " . $studentName;
    echo $scoreTable;

    mysqli_close($con);
    require "displayScores.php";
}
?>