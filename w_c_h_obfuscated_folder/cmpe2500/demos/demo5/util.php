<?php
require_once('dbUtil.php');

function autoFunc($param){
    
    $param['response'] = 'No';
    $param["status"] = false;

    if (!isset($param['user']) || (!isset($param['pass']))) {
        return $param;
    }

    $query = "select * from users where username ='{$param['user']}'";

    if($result = mysqlQuery($query)){
        if($result->num_rows == 1)
        {
            $user = $result->fetch_assoc();
            if(password_verify($param['pass'],$user['password'])){
                $param["response"] = "authenticated!!!";
                $param["status"] = true;
                $param["userID"] = $user['userID'];
            }
        }

    }
    return $param;
}
function displayErrors($err)
{
    $output = '';

    foreach ($err as $value) {
        $output .= "$value</br>";
    }

    return $output;
}

