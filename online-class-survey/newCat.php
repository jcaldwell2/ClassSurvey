<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Gives the administrator the ability to create a new category
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
    <meta charset="UTF-8">
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
    <title>New Category</title>
</head>
<body>
    <div class="wrapper">

        <form action="newCat-handle.php" method="post">
            <h1>Add New Category</h1></ br></ br></ br>
            <p> Please enter the new category: </p>
                <input type="text" name="category" maxlength="20" required="required"/></ br>
                <input type="submit" value="Submit"/>
                <button onclick="goBack()">Go Back</button>
        </form>
    </div>

</body>
</html>