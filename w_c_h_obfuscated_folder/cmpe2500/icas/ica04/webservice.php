<?php
session_start();


$userTable = array();
$userTable['admin'] = password_hash('god', PASSWORD_DEFAULT );
$userTable['germf'] = password_hash('new123', PASSWORD_DEFAULT );
$userTable['willy'] = password_hash('wonka', PASSWORD_DEFAULT );
$userTable['great'] = password_hash('gazoo', PASSWORD_DEFAULT );
$userTable['deep'] = password_hash('god', PASSWORD_DEFAULT );

function Authenticate($param){
    global $userTable;

    $param["response"] = "Invalid Username or password " ;
    $param["status"] = false;
    
    if(isset($param["user"])){
        if(isset($userTable[$param["user"]])) 
    {      
        if(isset($param["password"]) && password_verify($param["password"],$userTable[$param["user"]]))
        {
            //auth is good set return good
            $param["response"] = "autherticated";
            $param["status"] = true;
        }
    }
}
    
 
    return $param;
}
function DisplayError($err){
    $output = "";
    foreach($err as $value){
        $output .="$value</br>";

    }
    return $output;
}