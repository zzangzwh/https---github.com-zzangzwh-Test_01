<?php
require_once('dbUtil.php');

/**
 * Check user creds and authenticate a user. 
 */
function authenticate($params)
{
    global $mysql_Connection;
   // $data = $mysql_Connection->
    // default to fail
    $params['response'] = 'No match';
    $params['status'] = false;

    // ensure required params are set
    if (!isset($params['user']) || (!isset($params['password']))) {
        return $params;
    }

    // check user exists
    $query = "SELECT userID, password";
    $query .= " FROM users";
    $query .= " WHERE username = '{$params['user']}'";

    if ($results = mysqlQuery($query)) {
        if ($results->num_rows == 1) {
            // user exists, now check password
            $user = $results->fetch_assoc();

            if (password_verify($params['password'], $user['password'])) {
                $params['response'] = 'Authenticated';
                $params['status'] = true;
                $params['userID'] = $user['userID'];
            }
        }
    }

    return $params;
}

/**
 * Create a simple output for displaying login errors
 */
function displayErrors($err)
{
    $output = '';

    foreach ($err as $value) {
        $output .= "$value</br>";
    }

    return $output;
}