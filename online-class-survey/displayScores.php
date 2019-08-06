<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Gives the administrator the ability to view a users score
*/
require "db_conn.php";
global $con;
error_reporting(E_ALL);
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel='stylesheet' type="text/css" href="styles.css">
        <meta charset="UTF-8">
        <script>

            function getCrnText(element)
            {
                var text = element.options[element.selectedIndex].text
                document.getElementById("selected_text").value = text;


            }
        </script>
        <title>Scores</title>
    </head>
    <body>
        <h1>Student Scores</h1>
        <form action="displayScore-handle.php" method="post">

            <table align="center">
               <tr> <td>Class</td><td>
                <?php
                $select_query= "Select crn, semester, cyear, section from classes ;";
                $select_query_run =  mysqli_query($con,$select_query);

                if(!isset($_POST['crn'])){
                echo "</ br> \n<select name='crn' id='crn' required='required' onchange='getCrnText(this); this.form.submit()'>";
                echo "<option disabled selected value>--- select a class ---</option>";
                }
                else{
                $text = $_POST['selected_text'];
                echo "</ br> \n<select name='crn' id='crn' required='required' onchange='this.form.submit();'>";
                echo "<option  value=\\\"$crn\\\" SELECTED>$text</option>";
                }

                while ($select_query_array =  mysqli_fetch_array($select_query_run) )
                {
                    echo "<option value=".$select_query_array['crn'].">
                                        ".htmlspecialchars($select_query_array['semester'])." "
                                         .$select_query_array['cyear']." section "
                                         .$select_query_array['section'] ."</option>";
                }
                echo "</select>";
                ?></td></tr>

                <tr><td>Student</td><td>
                <?php
                $crn = $_POST['crn'];
                $select_query= "Select DISTINCT users.user_id, fname, lname from users INNER JOIN userAnswers 
                                 ON userAnswers.user_id = users.user_id where userAnswers.crn = '$crn' and users.role !='Admin';";
                $select_query_run =  mysqli_query($con,$select_query);
                echo "</ br> \n<select name='student' id='student' required='required'>";
                echo "<option disabled selected value>--- select a student ---</option>";
                while ($select_query_array =  mysqli_fetch_array($select_query_run) )
                {
                    echo "<option value=".$select_query_array['user_id'].">
                                        ".htmlspecialchars($select_query_array['lname']).", "
                                        .htmlspecialchars($select_query_array['fname']) ."</option>";

                }
                echo "</select>";
                mysqli_close($con);
                ?></td></tr>
                <input type="hidden" name="selected_text" id="selected_text" value="" />
                <div class="wrapper">
               <tr style="height: 20px"> <td></td><td><input type="submit" name="getScores" value="Get Scores"></td>
        </form>
            <form action="admin.php" method="post">
           &nbsp;&nbsp;&nbsp;&nbsp; <td><input type="submit" name="goback" style="float: right" value="Go Back"></td></tr>
             </form>
        </table>
        <p id="demo"></p>
        </div>
    </body>
</html>