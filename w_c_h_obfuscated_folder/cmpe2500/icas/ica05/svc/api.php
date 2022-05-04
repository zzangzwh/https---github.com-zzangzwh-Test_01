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
     
    }
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