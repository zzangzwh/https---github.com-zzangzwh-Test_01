<?php
session_start();

// create facke users credentials

$validUser = "admin";
$validPassword = password_hash("nimda",PASSWORD_DEFAULT);
// check users creds and authericate a user
function autherticateUser($params){

    global $validUser,$validPassword;

    // default to fail 
    $params["response"] = "Invalid username or password";
    $params["status"] = false;

    //check crendintials
    if(isset($params["user"]) && $params["user"] == $validUser){
        //user is good now check password
        if(isset($params["password"]) && password_verify($params["password"],$validPassword))
        {
            //auth is good set return good
            $params["response"] = "autherticated";
            $params["status"] = true;
        }
    }
    return $params;

    // check params["user"] against $valid user 
    
    // check params["password"] against valid password
} 

//echo $validPassword;

// create a simple output for displaying login errors
function displayErro($err){
    $output = "";
    foreach($err as $value){
        $output .= "$value </br>";
    }
    return $output;
}