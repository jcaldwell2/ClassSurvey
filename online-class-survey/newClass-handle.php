<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Handler for the new class page
*/
require_once "db_conn.php";
global $con;

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: login.php");
    exit;
}

$crn = $_POST['crn'];
$year = $_POST['year'];
$semester = $_POST[htmlspecialchars('semester')];
$section = $_POST['section'];

$sql = "INSERT INTO classes (crn, cyear, semester, section) values ('$crn','$year','$semester','$section');";
$result = mysqli_query($con,$sql);

header("Location: admin.php");

mysqli_close($con);

?>