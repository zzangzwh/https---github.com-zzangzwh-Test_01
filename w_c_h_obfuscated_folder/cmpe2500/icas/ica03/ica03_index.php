<?php
require_once("webservice.php");
    $error = array();
    $user = "";
    if(!empty($_POST)){
        if(isset($_POST["login"])){
            $user = strip_tags($_POST["username"]);
            $pass = strip_tags($_POST["password"]);
            if(empty($user)|| strlen($user) ==0){
                $error[0] = "Must provide the username";
            }
            if(empty($pass) || strlen($pass) ==0){
                $error[1] = "Must provide the password";
            }
            if (count($error) == 0) {
                // valid submission, check for a valid user
                $params = array();
                $params['user'] = $user;
                $params['password'] = $pass;
                $params['response'] = '';
                $params['status'] = false;
    
                $response = Authenticate($params);
    
                if ($response['status']) {
                    // valid, store the user in the session
                    $_SESSION['user'] = $response['user'];
                    $_SESSION['valid'] = true;
    
                    // redirect to the home page
                    header('location:home.php');
                    die();
                }
            }
        } else if (isset($_POST['logout'])) {
            // logout form submitted
            session_unset();
            session_destroy();
        }
    } else {
        // check if the user is logged in
        if (isset($_SESSION['user'])) {
            // redirect to the home page
            header('location:home.php');
            die();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICA03</title>
    <link rel="stylesheet" href="css/ica03.css">
</head>

<body>
    <header> <h1>ICA03_LOGIN</h1> </header>
  <form action="" method="post" id="login">
        <div class="field"> 
            <label for="username">UserName: </label>
            <input type="text" name="username" id="username" placeholder="Supply a username" value=<?="$user"?>>(admin)
        </div>
        <div class="field">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Supply your password">(god)        
        </div>
        <div class="Endfield">
        <input type="submit" name="login" id="login" value="login">
        </div>
  
  </form>
  <footer>
 
 
         <p>Page Status: <?= DisplayError($error); ?></p>
        <p>&copy; Copyright wonhyuk Cho <?= date("Y") ?></p>
        <p>Last Modified: <?= date("m/d/Y H:i:s", filemtime('home.php')) ?></p>
  </footer>
</body>
</html>