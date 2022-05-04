<?php
// Put your other needed requires here
require_once 'abstractRestAPI.php';  // include our base abstract class
require_once('../dbUtil.php');

class ConcreteAPI extends AbstractAPI
{
  // initialize response object
  private $defaultResponse = array('data' => array(), 'status' => 'Invalid request');

  // Since we don't allow CORS, we don't need to check Key Tokens
  // We will ensure that the user has logged in using our SESSION authentication
  // Constructor - use to verify our authentication, uses _response
  public function __construct($request, $origin)
  {
    parent::__construct($request);

    // Uncomment for authentication verification with your session
    if (!isset($_SESSION["userID"]))
      return $this->_response("Unauthorized Access", 403);
  }

  /**
   * Messages endpoint
   */
  protected function messages()
  {
    switch ($this->method) {
      case 'GET':
        return getMessages($this->verb);      
        break;
      case 'POST':
        //  $message = strip_tags($_POST['message']);
        return postMessages($this->request['message']);
        break;  
      case 'DELETE':
        $args = $this->args; 
        if(count($args) ==1)
        {
          return DeleteMessage($args[0]);
        }
        break;

    }
    // if($this->method =='DELETE' && count($args)==1){

    // }
    
    return $this->defaultResponse;
  }
}

// The actual functionality block here
try {
  // Construct instance of our derived handler here
  $API = new ConcreteAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
  // invoke our dynamic method, should find the endpoint requested.
  echo $API->processAPI();
} catch (Exception $e) {   // OOPs - we have a problem
  echo json_encode(array('error' => $e->getMessage()));
}

function getMessages($search = '')
{
  $response['data'] = [];

  // protect against sql injection
  //$search = dbEscapeString($search);

  $query = "SELECT m.messageID, u.username, m.message, m.messageTime";
  $query .= " FROM messages as m";
  $query .= " INNER JOIN users as u USING(userID)";
  $query .= " WHERE m.message LIKE '%$search%' OR u.username LIKE '%$search%'";
  $query .= " ORDER BY m.messageID ASC";
  if ($results = mysqlQuery($query)) {
    $messages = array();

    while ($message = $results->fetch_assoc()) {
      $messages[] = $message;
    }
    $response['data'] = $messages;
    $response['status'] = "{$results->num_rows} messages";
  } else {
    $response['status'] = "Error: $query";
  }

  return $response;
}
function postMessages($message)
{
  
  global $mysql_connection;
  global $response;
 // $response['data'] = [];
  $response['status'] = [];

  // $query = "select * from messages where userID = '{$_SESSION['user']}'";
  // if( ($numRows = mysqlNonQuery( $query )) > 0 )
  //  {
  //      $response['status'] = "Username:{$_SESSION['user']} already exist";
  //  }
  //  else{
    $id = $_SESSION['userID'];
     $query = "INSERT INTO messages (userID,message)";
   //  $query .= " select * projects.ID FROM projects WHERE projects.PROJECT_NAME = 'BOX';";
     $query .= " VALUES('".$_SESSION['userID']."','$message')";
     // $query .= " Select messageID,username,message,messageTime";
     // $query .= " from messages LEFT JOIN users as m on userID = m.messageID";
 
     $numRows= mysqlNonQuery($query);
 
     $response['data'] = $numRows;
     $response['status'] = "{$message} is added!!!!!!!!!!!!";
 //}
  // }
  return $response;
  //$response['status'] = "{$numRows->num_
}
function DeleteMessage($messageID)
{
  global $mysql_connection;
  global $response;
  $response['status'] = [];
 // $messageID =$_SESSION['userID'];
  // $query = "select * from messages where userID = '{$userID}'";
  
  // if(($numRows = mysqlNonQuery($query)) < 0 )
  // {
   
  //     $response['status'] = "{$userID} dose not exist";
  // }
  // else if($userID == $_SESSION['userID'])
  // {        
  //     $response['status'] = "{$_SESSION['username']}: You can't delete yourself";
  // }
  // else
  // {
      $query = "DELETE FROM messages WHERE messageID = '{$messageID}'";

      $numRows = mysqlNonQuery($query);
      
       //$response['data'] = $numRows;
      $response['status'] = "UserID:{$messageID} {$numRows}records deleted";

  //}
    return $response;
}