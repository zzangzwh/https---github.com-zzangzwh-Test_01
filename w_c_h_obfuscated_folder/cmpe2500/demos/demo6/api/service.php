<?php
require_once("../dbUtil.php");
if(isset($_POST["filter"]) && strlen($_POST["filter"])>0){
    $input = strip_tags($_POST["filter"]);
    echo titleQuery($input);
}

function titleQuery($filter = ""){
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