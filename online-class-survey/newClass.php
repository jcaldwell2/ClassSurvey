<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Gives the administrator the ablity to create a new class
*/

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
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
    <meta charset="UTF-8">
    <title>New Class</title>
</head>
    <body>
        <h1>Add New Class </h1>
        <div class="wrapper">
            <form action="newClass-handle.php" method="post">
                <p> Please enter the information for the new class:</p></ br></ br>
                <table align="center">

                   <tr><td>   crn:</td>
                       <td> <input type="number" name="crn" min="10000" max="999999"  required="required"></td></tr>

                   <tr><td>  year:
                       <td> <input type="number" name="year" min="2017" max="9999" required="required"></td></tr>

                   <tr><td>   semester:
                       <td> <input type="text" name="semester" maxlength="15" required="required" ></td></tr>

                   <tr><td>    section:
                       <td> <input type="number" name="section" max="99" required="required"></td></tr>
                </table>
                </br></br>&nbsp;&nbsp;&nbsp;
                <input type="submit" value="Submit">
                <button onclick="goBack()">Go Back</button>
            </form>
        </div>
    </body>
</html>