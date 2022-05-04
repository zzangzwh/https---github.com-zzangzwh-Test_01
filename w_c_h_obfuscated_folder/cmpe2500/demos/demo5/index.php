<?php
    require_once("util.php");
    require_once("dbUtil.php");

    $error = array();
    $user = "";

    if(!empty($_POST)){
        if(isset($_POST['login'])){
            $user = strip_tags($_POST['username']);
            $pass = strip_tags($_POST['password']);

            if(strlen($user) ==0){
                $error[0] = "provide user ~";
            }
            if(strlen($pass)==0){
                $error[1] = "porivde pass~";
            }
            if(count($error) == 0){
                $v = array();
                $v['user'] = $user;
                $v['pass'] = $pass;
                $v['response'] = '';
                $v['status'] = false;

                $response = autoFunc($v);

                if($response['status']){
                    $_SESSION["user"] =  $response["user"];
                    $_SESSION["userID"] =  $response["userID"];
                    $_SESSION["valid"] = true;
                    header('location:home.php');
                    die();
                }
            }
        }
        else if(isset($_POST['logout'])){
            session_unset();
            session_destroy();

        }
    }
    else{
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
    <title>ICA 04 - PHP MySQL Authentication</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <h1>ICA 04 - MySQL Login</h1>
    </header>
    <main>
      
        <form action="index.php" method="post" id="login-form">
            <div class="field">
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" value="<?= $user ?>">(admin)
            </div>
            <div class="field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">(god)
            </div>
            <div class="field" id="login-div">
                <input type="submit" name="login" value="Login">
            </div>
            <div class="error">
                <?= displayErrors(($error)) ?>
            </div>
        </form>
    </main>
    <footer>
        <p>Page Status: <?= $response['response'] ?></p>
        <p>&copy; Copyright <?= date("Y") ?></p>
        <p>Last Modified: <?= date("m/d/Y H:i:s", filemtime('home.php')) ?></p>
    </footer>
</body>

</html>