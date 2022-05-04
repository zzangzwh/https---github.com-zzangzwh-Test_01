<?php
require_once("../dbUtil.php");
$btnnum = 0;
if(isset($_POST["login"]) && strlen($_POST["login"])>0){
    $input = strip_tags($_POST["login"]);
    echo titlesQuery($input);
}
//titlesQuery();
if(isset($_GET["userID"])){
   // $userID = strip_tags($_POST["delete-btn"]);
     $userID = strip_tags($_GET["userID"]);
    // $password = strip_tags($_POST["password"]);
    echo UserDelete($userID);

}
if(isset($_POST["username"]) && isset($_POST["password"]) && strlen($_POST["username"])>0 && strlen($_POST["password"]) >0){

    $username = strip_tags($_POST["username"]);
    $password = strip_tags($_POST["password"]);
    echo UserUpdate($username,$password);
}
else{
    echo "";
}
function UserDelete($userID){
    global $mysql_connection;
    global $mysqli;
    $query = "DELETE FROM `users` WHERE `userID` = $userID";
   // $userID = $mysql_connection->real_escape_
   // $numRows =
     mysqlNonQuery($query);

    //$sql = "DELETE FROM Data WHERE ID=201";
    if($mysqli->query($query) === true){
        echo "Record was deleted successfully.";
    } else{
        echo "ERROR: Could not able to execute $query. " 
                                             . $mysqli->error;
    }
      
    $mysqli->close();



    // if($numRows ==1){
    //     return mysqli_insert_id($mysql_connection);
    // }
    // else{
    //     return -1;
    // }
}
function UserUpdate($username,$password){
    global $mysql_connection;

    $query = "INSERT INTO users (username,password)";
    $query .= "VALUES('$username','$password')";

    $numRows = mysqlQuery($query);

    if($numRows ==1){
        return mysqli_insert_id($mysql_connection);
    }
    else{
        return -1;
    }
}

function titlesQuery($filter = ''){
    global $mysql_connection;
    global $btnnum;
    $btn = "";
    $status = "";
    $filter = $mysql_connection->real_escape_string($filter);
    $query = "Select userID, username, password";
    $query .= " From users";
    if($results = mysqlQuery($query)){
        
        $output = "<table><thead><tr><th>OP</th>"
        ."<th>User ID</th>"
        ."<th>UserName</th>"
        ."<th>Encrypted Password</th> <thead><tbody>";
        
        $NumRows = $results->num_rows;

      
        while($row = $results->fetch_assoc()){
           //$row = $results->fetch_assoc();
            //$output .= "<tr>";
           
            $output .= "<tr><td>";
          
           $output .= "<button id='delete-btn$btnnum' onclick ='getID(this)' name='delete-btn' class='delete-btn$btnnum' >Delete</button>";
            $output .= "</td><td> {$row["userID"]} </td>";
            $output .= "<td> {$row["username"]} </td>";
            $output .= "<td> {$row["password"]} </td>";
            $output .= "</tr>";  
            ++$btnnum;       
        }
        
    }
    else{
        return "Query Error - $query";
    }
   // $output .= "</tbody></table>";
    $output .= "<aside> Retrived $NumRows Users Record </aside>";
    echo $output;
}

