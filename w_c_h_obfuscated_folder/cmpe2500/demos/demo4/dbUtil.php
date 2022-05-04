<?php

// typically, this info should be in a location outside of WEB_ROOT
define('DB', 'wcho2222_cmpe2500');
define('DB_USER', 'wcho2222_admin');
define('DB_PASS', 'whdnjsgur1');
define('DB_SERVER', 'localhost');

$mysql_connection;
$mysql_response = array();
$mysql_status = "";

// establish the database connection
mysqlConnect();

function mysqlConnect()
{
    global $mysql_connection, $mysql_response,$mysql_status;

    $mysql_connection = new mysqli(
        DB_SERVER,
        DB_USER,
        DB_PASS,
        DB
    );

    if ($mysql_connection->connect_error) {
        $mysql_response[] = 'Connect Error (' .
            $mysql_connection->connect_errno .
            ') ' . $mysql_connection->connect_error;

        echo json_encode($mysql_response);
        die();
    }
    // else{
    //     echo "Connected!";
    //     echo json_encode(mysqlQuery("select title_id from titles"));
    //     die();
    // }
}

/**
 * run a query against the database and return the results
 */
function mysqlQuery($query)
{
    global $mysql_connection, $mysql_response,$mysql_status;

    $results = false;
    if ($mysql_connection == null) {
        echo "No connection!";
        $mysql_status = "No active database connection.";
        return $results;
    }

    if (!($results = $mysql_connection->query($query))) {
        http_response_code(500);
        $mysql_response[] = "Query Error {$mysql_connection->errno} : " .
            "{$mysql_connection->error}";

        echo json_encode($mysql_response);
        die();
    }

    return $results;
}
function mysqlNonQuery($query){
    global $mysql_connection, $mysql_response;
    if ($mysql_connection == null) {
        $mysql_response[] = "No connection!";
        echo json_encode($mysql_response);
          die();
    }
    if(!($mysql_connection->query($query))){
        http_response_code(500);
        $mysql_response[] = "Query Error {$mysql_connection->errno} : " .
        "{$mysql_connection->error}";

        echo json_encode($mysql_response);
        die();
    }

    return $mysql_connection->affected_rows;
}