<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Returns the questions for the survey
*/

require_once "db_conn.php";
// array for JSON response
$response["users"] = array();
$questions = array();

global $con;


$result = mysqli_query($con,"SELECT * FROM questions") or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_array($result);

    while ($row = mysqli_fetch_array($result))
    {
        //  echo json_encode($row);
        //  $users[] = array('user' => $row);
        $key = $row["category"];
        $value = $row["question"];

        $questions[$key] = $key;
        $questions[$value] = $value;


        array_push($response["questions"], $questions);

    }

    var_dump($row);
    $response["success"] = 1;

    echo json_encode($response);
    echo json_encode($questions);
} else {
    // required field is missing
    //$users["success"] = 0;
    //$users["message"] = "Required field(s) is missing";

    // echoing JSON response
    echo json_encode($row);
}
mysqli_close($con);
?>