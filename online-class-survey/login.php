<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Allows a user to login, hashes passwords, and confirms the login validation
*/
 ob_start();
 session_start();

 error_reporting(E_ALL);
 require_once 'db_conn.php';
 
 // it will never let you open index(login) page if session is set
 if ( isset($_SESSION['username'])!="" ) {
  header("Location: survey.php");
  exit;
 }
 
 $error = false;
 
 if( isset($_POST['btn-login']) ) { 
  
  // prevent sql injections/ clear user invalid inputs
  $username = trim($_POST['username']);
  $username = strip_tags($username);
  $username = htmlspecialchars($username);
  
  $pass = trim($_POST['password']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);
  // prevent sql injections / clear user invalid inputs
  
  if(empty($username)){
   $error = true;
   $emailError = "Please enter your username";
  } else if ( !filter_var($username,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid username.";
  }
  
  if(empty($pass)){
   $error = true;
   $passError = "Please enter your password.";
  }
  
  // if there's no error, continue to login
  if (!$error) {
   
   $password = hash('sha256', $pass); // password hashing using SHA256
  
   //$res=mysql_query("SELECT user_id, password FROM users WHERE user_id='$username'");
      $query = "SELECT password, user_id, role FROM users WHERE user_id='$username'";
      $result = mysqli_query($con, $query);
   $row = mysqli_fetch_row($result);
   $count = mysqli_num_rows($row); // if uname/pass correct it returns must be 1 row
      

 if($row[0]===$password && $row[2]==='Student') {
    // echo $row[1];
     $_SESSION['username'] = $row[1];
     $_SESSION["index"] = 0;
    header("Location: survey.php");

   }else if($row[0]===$password && $row[2]==='Admin'){
    // echo $row[1];
     $_SESSION['username'] = $row[1];
     $_SESSION["index"] = 0;
     header("Location: admin.php");
   }else {
    $errMSG = "Incorrect Credentials, Try again...";
   }
  }
 }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-red.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
</head>
<body>
<div id="page">
    <div class="card-result mdl-card-wide mdl-shadow--3dp">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
    <div class="wrapper">
        <h1>ITEC 120 Skills Survey</h1>
        <img src="Radford_Highlanders_logo.png" alt="Radford University" style="width:250px;height:175px;">

<h2>Sign In</h2>
    </div>
    <div class="mdl-card__supporting-text" style="font-weight: bold;color: black;">

<hr />
    <?php   if ( isset($errMSG) ) { echo $errMSG;  }   ?>
    <table align="center">
        <tr><td>Email Address: </td>
            <td><input class="mdl-textfield__input" type="text" name="username"  value="<?php echo $username; ?>
        "required="required" autocomplete="off" maxlength="30" /></td></tr>

            <span class="text-danger"><?php echo $emailError; ?></span>

        <td>Password: </td>
        <td><input class="mdl-textfield__input" type="password" name="password" value="<?php echo $password; ?>
                    "required="required" autocomplete="off" maxlength="15" /></td></tr>
        <?php echo $passError; ?>


        <tr style="height: 50px"><td>Class: </td><td>

        <?php
        $select_query= "Select crn, semester, cyear, section from classes ;";
        $select_query_run =  mysqli_query($con,$select_query);
        echo "&nbsp;</ br> \n<select name='class' id='class' required='required'>";
        echo "<option disabled selected value>--- select a class ---</option>";
        while ($select_query_array =  mysqli_fetch_array($select_query_run) )
        {
            echo "<option value=".$select_query_array['crn'].">
                                        ".htmlspecialchars($select_query_array['semester'])." "
                .$select_query_array['cyear']." section "
                .$select_query_array['section'] ."</option>";
            $_SESSION['crn']=$select_query_array['crn'];
        }
        echo "</select>";
        ?>
            </td></tr>

    </table>

    </br>
    </br>
    <div class="wrapper">
        <a class="mdl-button mdl-button--colored mdl-button--raised mdl-js-button
         mdl-js-ripple-effect mdl-button--accent" href="create_account.php">
            <i class='material-icons'> build</i>Create Account</a>
   <!-- <a href="create_account.php"> Sign Up Here...</a> -->        &nbsp;  &nbsp;  &nbsp;  &nbsp;

        <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect "
                      type="submit"  name="btn-login">Sign In<i class='material-icons'>done</i></button>
    </div>
    </div>
</form>

</body>
</html>
<?php ob_end_flush(); ?>