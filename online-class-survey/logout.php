<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Ends the session and returns a user to the login page
*/
 session_start();

// if (isset($_GET['logout'])) {
  unset($_SESSION['username']);
  session_unset();
  $_SESSION = array();
  session_destroy();
  header("Location: index.php");
  exit;
 //}
?>
