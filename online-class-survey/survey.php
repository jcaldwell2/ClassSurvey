<?php

require_once "survey-utils.php";
error_reporting(E_ALL);

session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: index.php");
    exit;
}
 $index = $_SESSION["index"];
 $catName = get_categories($index);
 $questScore = 8;
$_SESSION["index"] += 1;
?>
<html>
    <head>
     <link rel='stylesheet' type="text/css" href="styles.css">
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-red.min.css" />
     <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Page <?php echo $index+1 ?></title>
    </head>
         <body>

                 <div id="page">
                     <div class="card-survey mdl-card-wide mdl-shadow--3dp">
         <form action="survey-handle.php" method="post">
                <h1 style="text-align:center"><?php echo $catName ?></h1>
                <table   width="95%" style="margin-left: 25px"><?php get_questions($catName);  ?>
                    <tr><td></td><td>
                    <div class="wrapper">
                     <!--   <input type="submit" name="submit" value="Next Page"></td></tr> -->
                        <button class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                         mdl-button--accent mdl-js-ripple-effect type='submit' name='action'">
                            Next Page
                            <i class="material-icons">send</i>
                        </button>

                        </td></tr>

                </table>
         </form>
                     </div>
                     </div>

        </br> </br> </br>
         </body>
</html>



