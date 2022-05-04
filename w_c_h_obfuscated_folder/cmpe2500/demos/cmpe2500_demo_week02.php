<?php
    
    require_once("demo2_util.php");
$error = array();
$user ="";


    if(!empty($_POST)){
        if(isset($_POST["login"])){
            // login form submitted
            $user = strip_tags( $_POST["username"]);
            $pass = strip_tags($_POST["password"]) ;

            //simpe form validation check empty
            if(empty($user) || strlen($user) ==0){
                // bad username
                $error[0] ="Must provide a username";
            }
            if(empty($pass) || strlen($pass) ==0){
                // bad username
                $error[1] ="Must provide a password";
            }
            if(count($error)==0){
              // valid submission check for a valid user
              $params = array();
              $params["user"] = $user;
              $params["password"] = $pass;
              
              $response = autherticateUser($params);
              
              if($response["status"]){
                //valid store the user in the session
                $_SESSION["user"] = $response["user"];
                $_SESSION["valid"] = true;

                //redirect to the protected page
                header("location:protected.php");
                die();

              }else{

                $error[0] = $response["response"];

              }
                // TO DO : authenticate the user 
            }

        }else if(isset($_POST['logout'])){
            session_unset();
            session_destroy();

        }
    }else{
        //check if the user is logged in
        if(isset($_SESSION["user"])){
            //redirect to the procted page
            header("location:protected.php");
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
    <title>week02 DEMO</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header> <h1>Basoic Form Auth</h1>    </header>


    <form action="" method="post" id="login-form">
        <div class="field">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value=<?="$user"?>>
        </div>
        <div class="field">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="field">
        <input type="submit" name="login" value="Login">
        </div>
        <div class="error">
        <?= displayErro($error)?>
        </div>
    </form>
</body>
</html>