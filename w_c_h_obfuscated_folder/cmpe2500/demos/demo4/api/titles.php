<?php
require_once("../dbUtil.php");
if(isset($_POST["filter"]) && strlen($_POST["filter"])>0){
    $input = strip_tags($_POST["filter"]);
    echo titlesQuery($input);
}
else{
    echo "";
}
if(isset($_POST["create"])){

    $title = strip_tags($_POST["title"]);
    $price = strip_tags($_POST["price"]);
    echo titleInsert($title,$price);
}
else{
    echo"";
}
if(isset($_POST["update"])){
    $id = strip_tags($_POST["title-id"]);
    $title = strip_tags($_POST["title"]);
    $price = strip_tags($_POST["price"]);
   echo titlesUpdate($id,$title,$price);
}
else{
    echo "";
}
function titlesUpdate($id,$title,$price){

    global $mysql_connection;

    $query = "UPDATE titles";
    $query .= " SET title = '$title', price =$price";
    $query .= " WHERE title_id =$id";

    return mysqlNonQuery($query);
}
function titleInsert($title, $price){
     global $mysql_connection;
    
    $query = "INSERT INTO titles (title,price)";
    $query .= "VALUES('$title','$price')";

    $numRows = mysqlNonQuery($query);
    
    if($numRows ==1){
        return mysqli_insert_id($mysql_connection);
    }
    else{
        return -1;
    }
}
//TO DO isset post check

//todo : call the api function and pass the filter value from $_post
//titlesQuery();

function titlesQuery($filter = ''){
    global $mysql_connection;
    $filter = $mysql_connection->real_escape_string($filter);
    $query = "Select title_id, title, price";
    $query .= " From titles";
    $query .= " WHERE title like '%$filter%' ";
    

    $output = "<table><thead><tr><th>TitleID</th>"
                ."<th>Title</th>"
                ."<th>Price</th><thead><tbody>";
                
    if($results = mysqlQuery($query)){
        while($row = $results->fetch_assoc()){
            $output .= "<tr><td>{$row['title_id']}</td>"
                    ."<td>{$row['title']}</td>"
                   // ." <td>{$row['price']}</td>"
                    . "<td>$".number_format($row['price'],2,',',',')."</td></tr>";

        }
    }else{
        return"Query Error - $query";
    }
    $output .= "</tbody></table>";
    echo $output;


}