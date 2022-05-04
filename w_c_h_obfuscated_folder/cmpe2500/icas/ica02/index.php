<?php
require_once("util.php");
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
            if(count($error)==0){
                $param =array();
                $param["user"] = $user;
                $param["password"] = $pass;


              $response = Authenticate($param);
                if($response["status"]){
                    $_SESSION["user"] = $response["user"];
                    $_SESSION["valid"] = true;
                    header("location:home.php");
                    die();
                }
                else{
                    $error[0] = $response["response"];
                }
            }
        }else if(isset($_POST["logout"])){
            session_unset();
            session_destroy();
        }
    }else{
          //check if the user is logged in
          if(isset($_SESSION["user"])){
            //redirect to the procted page
            header("location:home.php");
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
    <title>ICA02</title>
    <link rel="stylesheet" href="css/ica02.css">
</head>

<body>
    <header> <h1>ICA02_LOGIN</h1> </header>
  <form action="" method="post" id="login">
        <div class="field"> 
            <label for="username">UserName: </label>
            <input type="text" name="username" id="username" placeholder="Supply a username" value=<?="$user"?>>(admin)
        </div>
        <div class="field">
        <label for="password">Password:</label>
        <input type="pasword" name="password" id="password" placeholder="Supply your password">(god)        
        </div>
        <div class="Endfield">
        <input type="submit" name="login" id="login" value="login">
        </div>
  
  </form>
  <footer>
      <p>Page Status: <?= DisplayError($error); ?></p>
 
      <?php  echo"<pre>&copy;2021 by wonhyuk cho\nLast Modified:".date("F d Y H:i:s.", getlastmod())?>
  </footer>
</body>
</html>