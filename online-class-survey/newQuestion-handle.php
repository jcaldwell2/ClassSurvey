<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Handler for the new question page
*/
require_once "db_conn.php";
global $con;
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: index.php");
    exit;
}

$question = $_POST[htmlspecialchars('newQuestion')];
$category = $_POST[htmlspecialchars('category_name')];

$sql = "INSERT INTO questions (question, category) values ('$question','$category');";
$result = mysqli_query($con,$sql);

header("Location: admin.php");

mysqli_close($con);

?>