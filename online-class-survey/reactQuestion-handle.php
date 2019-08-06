<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Handler for the reactivate question
*/
require_once "db_conn.php";
global $con;

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: index.php");
    exit;
}

$question = $_POST['question'];

$sql = "UPDATE questions SET active='TRUE' WHERE question_id = '$question';";
$result = mysqli_query($con,$sql);

header("Location: admin.php");

mysqli_close($con);

?>