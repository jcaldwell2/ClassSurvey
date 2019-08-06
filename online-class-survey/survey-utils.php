<?php
/**James Caldwell, John Green, Noah Thomas, Steve Oake
*ITEC 325-Spring 2017
*Team Perserverance
*Provides functions to automate the creation of the radio tables
*and categories
*/
require_once "db_conn.php";
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION["index"] = 0;
    header("Location: index.php");
    exit;
}


function get_categories($index){

    global $con;

    $sql = "SELECT DISTINCT category FROM questions ORDER BY question_id ASC " ;
    $result = mysqli_query($con,$sql);
    $array = array();
    $_SESSION['catArrLength'] = 0;

    while($row = mysqli_fetch_array($result)){
        $array[] = $row['category'];
        $_SESSION['catArrLength'] +=  1;
    }


    return $array[$index];
}

function get_catArr(){

    global $con;

    $sql = "SELECT DISTINCT category FROM questions ORDER BY question_id ASC " ;
    $result = mysqli_query($con,$sql);
    $array = array();

    while($row = mysqli_fetch_array($result)){
        $array[] = $row['category'];
    }
    return $array;
}

function get_questions($category){

    global $con;
    $htmlSoFar = "";
    $sql = "SELECT question, question_id FROM questions WHERE category = '$category' " ;
    $result = mysqli_query($con,$sql);
    $questArray = array();
    $values = array("1", "2", "3", "4", "5", "6", "7", "0");

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        $questID = $row['question_id'];
        $questArray[$questID] = $row['question'];
    }

    $htmlSoFar .= "<tr><th></th><th width='300px' style='font-size: 10pt'>Never.........Sometimes.........Always 
        &nbsp;&nbsp; N/A</th> </tr>";
    $index = 1;
    foreach($questArray as $id => $question){
        $htmlSoFar .= "<tr><td height='50' align='left' >" . $index . ".) " . $question . "</td>\n";
        $htmlSoFar .= "<td height='50' align='center'>" . radioTableRow($id, $values, 'questions') ."</td></tr>\n";
        $index += 1;
    }
    echo $htmlSoFar;
}

/* radioTableRow : string, array-of-string → string
 * Return a tr of td's containing a input:radio-button;
 * the input's `name` attribute is ...
 */
function radioTableRow( $rowName, $colNames, $tableName = false ) {
    $rowSoFar = "";
    foreach ($colNames as $colName) {
        $nameAttr = ($tableName ? "$tableName" . "[$rowName]" : $rowName);
        $idAttr = ($tableName ? "$tableName" : "$rowName");
        $rowSoFar .= "<input type='radio' id='$idAttr' name='$nameAttr' value='$colName' checked='7'/>&nbsp;&nbsp;&nbsp;";
    }
    return $rowSoFar;
}




?>