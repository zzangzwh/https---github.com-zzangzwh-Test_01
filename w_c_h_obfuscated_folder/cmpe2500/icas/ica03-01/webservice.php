<?php
// do requires
// ?? function/session stuff
require_once "./inc/db.php";
// if we make it here.. connection was good

// Set to always get fresh page processing, no caches supplied
header("Cache-Control: no-cache, must re-validate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Define global response object
// Response Keys : jsonData - hold response to the request
//                 status - string status for success/fail
$ajaxData = array(); 

// Function a Book Query
function QueryBooks( $filter )
{
    // For test purposes, check control flow and argument population
    //global $ajaxData;
    //$ajaxData['jsonData'] = "";
    //$ajaxData['status'] = "got {$filter} as filter";

	global $mysqli, $mysqli_response, $mysqli_status; // register the globals here for use.. odd but it works that way    
    global $ajaxData;

    // local output variables
    $outArray = array(); // return dictionary
    $status = "";

    // ALWAYS SANITIZE
    // Helper function
    //if( !$mysqli){  echo "crap"; die(); }
    $constraint = $mysqli->real_escape_string( strip_tags($filter)); // WWWWATT
    //$constraint = strip_tags($filter);

    $query = "select title_id, title, price ";
    $query.= " from titles ";
    $query.= "where title like '%{$constraint}%' ";
    error_log($query);
    if( $result = mysqliQuery($query))
    {
        $NumRows = $result->num_rows;
        while( $row = $result->fetch_assoc()){
            $outArray[] = $row; // row will be dictionary of col_name : value, keep adding them in
        }
        $status = "QueryBooks: Query successful {$NumRows} rows returned";
    }
    else{
        $status = "QueryBooks: Query {$query} failed";
    }

    $ajaxData['jsonData'] = $outArray;
    $ajaxData['status'] = $status;

}

function UpdateBooks( $filter, $amountUp )
{
	global $mysqli, $mysqli_response, $mysqli_status; // register the globals here for use.. odd but it works that way    
    global $ajaxData;

    // sanitize
    $constraint = $mysqli->real_escape_string( strip_tags( $filter ));
    $amountUp = $mysqli->real_escape_string( strip_tags( $amountUp )); // assign to self

    // query to up the amount
    $query = "UPDATE titles ";
    $query.= " SET price = price + {$amountUp} ";
    $query.= " WHERE title like '%{$constraint}%' ";
    error_log( $query ); // verify

    if(($result = mysqliNonQuery($query)) < 0 ) // error test, yup
    {
        $status = "UpdateBooks:Error in query : " . $query;
    }
    else // good
    {
        $status = "UpdateBooks:Success : {$result} rows affected";// . $query;
    }
    // pass info back
    $ajaxData['status'] = $status;

}
// Multiple functions

// Direct function calls
if( isset( $_GET['action']) && $_GET['action'] == 'select' &&
    isset( $_GET['filter']) )
{
    QueryBooks( $_GET['filter']);
}

// Direct function calls
if( isset( $_GET['action']) && $_GET['action'] == 'update' &&
    isset( $_GET['filter']) )
{
    UpdateBooks( $_GET['filter'], 0.50 ); // Up matches by $0.50 
}

// repeat for all functions defined above
error_log("Made it !!!");
echo json_encode( $ajaxData );
die();  