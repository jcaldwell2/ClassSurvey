<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Following code will get single user details from a user
*that is identified by pid
*/

// array for JSON response
$response["users"] = array();
$users = array();
 
$con=mysqli_connect("localhost","jcaldwell2","132435Ac$","jcaldwell2");

if (mysqli_connect_errno($con))
{
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
 

$result = mysqli_query($con,"SELECT * FROM users WHERE request = 1") or die(mysqli_error());
     
   if (mysqli_num_rows($result) > 0) {

          while ($row = mysqli_fetch_array($result)) 
               {
                   //  echo json_encode($row);
                    //  $users[] = array('user' => $row);
                   $users["email"] = $row["email"];
		           $users["lat"] = $row["lat"];	
                   $users["lng"] = $row["lng"];	
                
                 array_push($response["users"], $users);
			
                        }
     
         $response["success"] = 1;   
        
         echo json_encode($response);
} else {
    // required field is missing
    $users["success"] = 0;
    $users["message"] = "Required field(s) is missing";
 
    // echoing JSON response
    echo json_encode($users);
}   
mysqli_close($con);
?>