<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Allows the administator to demote a user from administrative privilege
*/
require_once "db_conn.php";

global $con;
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' type="text/css" href="styles.css">
    <meta charset="UTF-8">
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
    <title>Demote User</title>
</head>
<body>
<h1>Demote a user's role</h1>
<form action="demoteUser-handle.php" method="post">

    <?php
    $select_query= "Select user_id, fname, lname from users WHERE role ='Admin' ;";
    $select_query_run =  mysqli_query($con,$select_query);
    echo "</ br> \n<select name='user_id' id='user_id' required='required'>";
    echo "<option disabled selected value>--- select an Admin ---</option>";
    while ($select_query_array =  mysqli_fetch_array($select_query_run) )
    {
        echo "<option value=".$select_query_array['user_id'].">
                                        ".htmlspecialchars($select_query_array['lname']).", "
            .htmlspecialchars($select_query_array['fname']) ."</option>";

    }
    echo "</select>";
    mysqli_close($con);
    ?>

    <input type="submit" value="Submit">
    <button onclick="goBack()">Go Back</button>
</form>
</body>
</html>