<?php
require_once('../dbUtil.php');

// simple check for authentication
if (!isset($_SESSION['user'])) {
    header('location:index.php');
    die();
}

// initialize global response object
$response = array('data' => array(), 'status' => 'Fail : Action failed to match');

//////////////// GET / POST PROCESSING ////////////////

// check for GET requests
if (count($_GET) > 0 && isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'getUsers':
            getUsers();
            break;
  
    }
}

// check for POST requests
if (count($_POST) > 0) {
    $response['status'] = 'Success: ' . $_POST['action'];
    switch ($_POST['action']) {
        case 'AddUser':           
           // $response['status'] = 'Success: POST(ADD) USERS';       
            $pwd = strip_tags($_POST["password"]);
                $username = strip_tags($_POST["username"]);
                $encrypt = password_hash( $pwd, PASSWORD_DEFAULT);//md5($pass);
               // $encrypt_pwd = md5($pwd); 
            AddUser($username, $encrypt);
            break;
        case 'deleteUser':
           // $response['status'] = 'Success: POST(Delete) USERS';
            $userID = strip_tags($_POST["userID"]);
            DeleteUser($userID);
            break;
    }
}
else{
    echo "";
}

// end of checks, time to return
done();
die();

//////////////// FUNCTION DECLARATIONS ////////////////

function getUsers()
{
    global $response;

    // check user exists
    $query = "SELECT userID, username, password FROM users";

    if ($results = mysqlQuery($query)) {
        $users = array();

        while ($user = $results->fetch_assoc()) {
            $users[] = $user;
        }
    } else {
        return "Query Error : $query";
    }

    $response['data'] = $users;
    $response['status'] = "{$results->num_rows} user records";
}
//done();


function DeleteUser($userID){
    global $mysql_connection;
    global $response;

    $query = "select * from users where username = '{$userID}'";
    
    if(($numRows = mysqlNonQuery($query)) < 0 )
    {
     
        $response['status'] = "{$userID} dose not exist";
    }
    else if($userID == $_SESSION['userID'])
    {        
        $response['status'] = "{$_SESSION['username']}: You can't delete yourself";
    }
    else
    {
        $query = "DELETE FROM users WHERE userID = '{$userID}'";

        $numRows = mysqlNonQuery($query);
        
         //$response['data'] = $numRows;
        $response['status'] = "UserID:{$userID} {$numRows}records deleted";

    }

}
//done();
function AddUser($username,$password){
    global $mysql_connection;
    global $response;

   $query = "select * from users where username = '{$username}'";
   if( ($numRows = mysqlNonQuery( $query )) > 0 )
    {
        $response['status'] = "Username:{$username} already exist";
    }
    else{

        $query = "INSERT INTO users (username,password)";
        $query .= "VALUES('$username','$password')";    
        $numRows= mysqlNonQuery($query);    
        $response['data'] = $numRows;
        $response['status'] = "{$username} is added!!!!!!!!!!!!";
    }

    //$response['status'] = "{$numRows->num_rows} user records";
   
}
//done();


function done()
{
    global $response;
    echo json_encode($response);
}