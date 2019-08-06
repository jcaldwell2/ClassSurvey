<?php
/**
*James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Gives the ability to create a user
* Modified From http://www.codingcage.com/2015/01/user-registration-and-login-script-using-php-mysql.html
*/
 ob_start();
 session_start();
 if( isset($_SESSION['username'])!="" ){
  header("Location: survey.php");
 }
 require_once 'db_conn.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {
  
  // clean user inputs to prevent sql injections
  $fname = trim($_POST['fname']);
  $fname = strip_tags($fname);
  $fname = htmlspecialchars($fname);
  
  $lname = trim($_POST['lname']);
  $lname = strip_tags($lname);
  $lname = htmlspecialchars($lname);

  $username = trim($_POST['username']);
  $username = strip_tags($username);
  $username = htmlspecialchars($username);
  
  $pass = trim($_POST['pass']);
  $pass = strip_tags($pass);
  $pass = htmlspecialchars($pass);

  $role = trim($_POST['role']);
  $role = strip_tags($role);
  $role = htmlspecialchars($role);
  
  // basic name validation
  if (empty($fname)) {
   $error = true;
   $nameError = "Please enter your first name.";
  } else if (strlen($fname) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$fname)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }
  
  if (empty($lname)) {
   $error = true;
   $nameError = "Please enter your last name.";
  } else if (strlen($lname) < 3) {
   $error = true;
   $nameError = "Name must have atleat 3 characters.";
  } else if (!preg_match("/^[a-zA-Z ]+$/",$lname)) {
   $error = true;
   $nameError = "Name must contain alphabets and space.";
  }

  //basic email validation
     /*
  if ( !filter_var($username,FILTER_VALIDATE_EMAIL) ) {
   $error = true;
   $emailError = "Please enter valid email address.";
  } else {
   // check email exist or not
   $query = "SELECT user_id FROM users WHERE user_id='$username'";
   $result = mysql_query($query);
   $count = mysql_num_rows($result);
   if($count!=0){
    $error = true;
    $emailError = "Provided Username is already in use.";
   }
  }
*/
  // password validation
  if (empty($pass)){
   $error = true;
   $passError = "Please enter password.";
  } else if(strlen($pass) < 6) {
   $error = true;
   $passError = "Password must have at least 6 characters.";
  }
  
  // password encrypt using SHA256();
  $password = hash('sha256', $pass);
  
  // if there's no error, continue to signup
  if( !$error ) {
   
   $query = "INSERT INTO users(user_id,fname,lname, password, role) VALUES('$username', '$fname','$lname','$password', 'Student')";
   //$query = "INSERT INTO users(user_id) VALUES('$username')";
   //$res = mysql_query($query);
    if($con->query($query) === TRUE){
        echo "New Record Created Successfully";
        
    }
      else{
          echo "Good Try";
      }
    /**In Case PHP ever gets update at Radford
   if ($res) {
    $errTyp = "success";
    $errMSG = "Successfully registered, you may login now";
    unset($username);
    unset($fname);
    unset($lname);
    unset($pass);
    unset($role);
   } else {
    $errTyp = "danger";
    $errMSG = "Something went wrong, try again later..."; 
   } 
    */
  } 
 }
mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel='stylesheet' type="text/css" href="styles.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.grey-red.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        function goBack() {
            window.history.back()
        }
    </script>
    <title>Create Account</title>
</head>
<body>
<div id="page">
    <div class="card-admin mdl-card-wide mdl-shadow--3dp">
    <h1>ITEC 120 Skills Survey</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
            <h2 class="">Create Account</h2>
            <?php if ( isset($errMSG) ) ?>
            <?php echo ($errTyp=="success") ? "success" : $errTyp; ?>
            <?php echo $errMSG; ?>
            <table align="center"
                <tr><td>First Name:</td>
                    <td> <input type="text" name="fname"  minlength="3" maxlength="25" value="<?php echo $fname ?>" /></td>
                </tr>

                <tr><td>Last Name:</td>
                    <td>  <input type="text" name="lname"  minlength="3" maxlength="35" value="<?php echo $lname ?>" /></td>
                </tr>
                <tr><td>Email:</td>
                    <td>  <input type="email" name="username"   maxlength="30" value="<?php echo $username ?>" /></td>
                </tr>
                    <?php echo $emailError; ?>

                <tr><td>Password:</td>
                    <td>  <input type="password" name="pass" maxlength="15" /></td>
                </tr>
                     <?php echo $passError; ?>
            </table>


            <div class="wrapper">

                <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button mdl-js-ripple-effect
                                    mdl-button--accent" style="width: 200px;"
                        type="submit"  name="btn-signup">Sign up<i class='material-icons'>fingerprint</i></button>
            </div>

        </form>
        <table align="center">
            <tr><td><form action="index.php" method="post">


                        <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect mdl-button--accent" style="width: 100px;"
                                type="submit"  name="login">Login Page</button>
                </td>

                <td></td>
                <td>
                    <button class=  "mdl-button mdl-button--colored mdl-button--raised mdl-js-button
                 mdl-js-ripple-effect " style="width: 100px;"
                            type="submit"  name="logout">Logout</button>

                </td>
                </p>
            </tr>
        </table>
        </form>
    </div>
</div>
    </body>
</html>
<?php ob_end_flush(); ?>
