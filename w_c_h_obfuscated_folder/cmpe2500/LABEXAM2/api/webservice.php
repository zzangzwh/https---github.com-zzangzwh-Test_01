<?php
    require_once('../dbUtil.php');
echo titleQuery();
echo getAvg();
echo sumRow();
echo insertion();
echo deletion();
echo largetLowAndWOrd();
echo containsS();

function containsS(){
    global $mysql_connection;
    $query = "SELECT word FROM words_exam where word = '%S%'";
                
if($result = mysqlQuery($query)){
    while($row = $result->fetch_assoc()){
        $output = "<tr><td>{$row['high']}</td>";
    }
}
else{
    return"Query Error - $query";
}
$output .= "</tbody></table>";
echo $output;
}
function largetLowAndWOrd(){
    global $mysql_connection;
    $query = "SELECT low,word,high FROM words_exam where low == -25 and high ==218";
                
if($result = mysqlQuery($query)){
    while($row = $result->fetch_assoc()){
        $output = "<tr><td>{$row['high']}</td>";
    }
}
else{
    return"Query Error - $query";
}
$output .= "</tbody></table>";
echo $output;
}
function deletion(){
    global $mysql_connection;
    $query = "DELETE FROM  words_exam WHERE ID = 5 ";
    $numRows = mysqlNonQuery($query);

}


function insertion(){
    global $mysql_connection;
    
    $query = "INSERT INTO  words_exam (ID,word,low,high,sha1)";
    $query .= "VALUES(205,'---------allwordLow---------',1,99,'9b921e37ef4399864b74b387a65')";

    $numRows = mysqlNonQuery($query);
    if($numRows ==1){
        return mysqli_insert_id($mysql_connection);
    }
    else{
        return -1;
    }
   
}

function titleQuery(){
    global $mysql_connection;
    $query = "SELECT * FROM words_exam";

    $output = "<table><thead><tr><th>ID</th>"
    ."<th>word</th>"
    ."<th>low</th>"
    ."<th>high</th>" 
    ."<th>sha1</th>  <thead><tbody>";

    if($result = mysqlQuery($query)){
        while($row = $result->fetch_assoc()){
            $output .= "<tr><td>{$row['id']}</td>"
            ."<td>{$row['word']}</td>"
            ."<td>{$row['low']}</td>"
            ."<td>{$row['high']}</td>"
            ."<td>{$row['sha1']}</td>"
           // ." <td>{$row['price']}</td>"
            . "</td></tr>";
        }
    }else{
        return"Query Error - $query";
    }
    $output .= "</tbody></table>";
    echo $output;

}
function getAvg(){
    global $mysql_connection;
    $query = "SELECT high FROM words_exam";
                
if($result = mysqlQuery($query)){
    while($row = $result->fetch_assoc()){
        $output = "<tr><td>{$row['high']}</td>";
    }
}
else{
    return"Query Error - $query";
}
$output .= "</tbody></table>";
echo $output;
}

function sumRow(){
    global $mysql_connection;
    $query = "SELECT word from words_exam where word like '%S%' ";
                
    if($result = mysqlQuery($query)){
        while($row = $result->fetch_assoc()){
            $output = "<tr><td>{$row['word']}</td>";
        }
    }
else{
    return"Query Error - $query";
}

echo $output;
}
?>