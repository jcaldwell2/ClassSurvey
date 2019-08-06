<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Gives the administrator the ability to create a new question
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
    <title>New Question</title>
</head>
<body>

        <h1> Add New Question</h1>
        <div class="wrapper">
        <form action="newQuestion-handle.php" method="post">
            <p> Please enter the new question:</p>
            </ br>
            <textarea rows="4" cols="50" maxlength="250" name ="newQuestion" required="required"></textarea>
            </ br>
        </ br>
    <p>Select your category for the question</p>
        <?php
            $select_query= "Select category_name from categories";
            $select_query_run =  mysqli_query($con,$select_query);
            echo "</ br> \n<select name='category_name' required='required'>";
            while ($select_query_array =  mysqli_fetch_array($select_query_run) )
            {
                echo "<option value=".htmlspecialchars($select_query_array['category_name']).">
                ".htmlspecialchars($select_query_array["category_name"])."</option>";
            }
            echo "</select>";
            mysqli_close($con);
            ?>
            </ br>
            <input type="submit" value="Submit"/>
            <button onclick="goBack()">Go Back</button>
        </form>
    </div>
</body>
</html>