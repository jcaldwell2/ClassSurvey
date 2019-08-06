<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Gives the administrator a menu to utilize to perform actions
*that would be necessary
*/

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: index.php");
    exit;
}
?>

<html>
    <head>
        <link rel='stylesheet' type="text/css" href="styles.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.red-indigo.min.css" />
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Page</title>
    </head>
    <body>
    <div id="page">
        <div class="card-admin mdl-card-wide mdl-shadow--3dp">
        <h1>Admin Page</h1>
        <div class="wrapper">
            <form action="newQuestion.php" method="post">

                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 200px;"
                        type="submit"  name="addQuestion">Add Question</button>

            </form>
            <form action="newCat.php" method="post">


                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 200px;"
                        type="submit"  name="addCategory">Add Category</button>

            </form>
            <form action="newClass.php" method="post">


                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 200px;"
                        type="submit"  name="addClass">Add Class</button>

            </form>
            <form action="dropQuestion.php" method="post">


                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 200px;"
                        type="submit"  name="dropQuestion">Drop Question</button>
            </form>
            <form action="reactivateQuestion.php" method="post">



                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 200px;"
                        type="submit"  name="reactQuestion">Reactivate Question</button>

            </form>
            <form action="displayScores.php" method="post">


                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 200px;"
                        type="submit"  name="displayScores">Display Scores</button>

            </form>
            <form action="promoteUser.php" method="post">


                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 200px;"
                        type="submit"  name="promoteUser">Promote User</button>

            </form>
            <form action="demoteUser.php" method="post">



                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 200px;"
                        type="submit"  name="demoteUser">Demote User</button>

            </form>

            </br>
            </br>
            <form action="logout.php" method="post">



                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect " style="width: 200px;"
                        type="submit"  name="logout">Logout<i class='material-icons'>games</i></button>

            </form>
        </div>
        </div>
        </div>
    </body>








</html>
