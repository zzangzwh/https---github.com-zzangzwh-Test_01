<?php
require_once("../dbUtil.php");

//TO DO isset post check

//todo : call the api function and pass the filter value from $_post
titlesQuery();

function titlesQuery($filter = ''){
    global $mysql_connection;
    $filter = $mysql_connection->real_escape_string($filter);
    $query = "Select title_id, title, price";
    $query .= " From titles";
    $query .= " WHERE title like '%$filter%' ";
    

    $output = "<ul>";
    if($results = mysqlQuery($query)){
        while($row = $results->fetch_assoc()){
            $output .= "<li>[{$row['title_id']}] {$row['title']} {$row['price']}</li>";

        }
    }else{
        return"Query Error - $query";
    }
    $output .= "</ul>";
    echo $output;


}