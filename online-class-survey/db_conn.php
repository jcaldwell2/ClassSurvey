<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Database connection
*/
require_once "creds.php";

global $secure_pass;
global $secure_user;

        $host = "localhost";
        $username = $secure_user;
        $password = $secure_pass;
        $dbname = "proj4";




$con=mysqli_connect($host,$username,$password,$dbname);

if (mysqli_connect_errno($con))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error() . " ";
}

mysqli_select_db($con, $dbname) or die ("Error selecting specified database on mysqli server: ".mysqli_error());

//echo "Success!";