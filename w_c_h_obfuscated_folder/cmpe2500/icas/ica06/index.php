<?php
require_once('util.php');
require_once('dbUtil.php');

$error = array();
$user = '';

if (!empty($_POST)) {
    if (isset($_POST['login'])) {
        // login form submitted
        $user = strip_tags($_POST['username']);
        $pass = strip_tags($_POST['password']);

        // simple form validation (check empty)
        if (empty($user) || strlen($user) == 0) {
            // bad username
            $error[0] = 'Must provide a username';
        }

        if (empty($pass) || strlen($pass) == 0) {
            // bad password
            $error[1] = 'Must provide a password';
        }

        if (count($error) == 0) {
            // valid submission, check for a valid user
            $params = array();
            $params['user'] = $user;
            $params['password'] = $pass;
            $params['response'] = '';
            $params['status'] = false;

            $response = authenticate($params);

            if ($response['status']) {
                // valid, store the user in the session
                $_SESSION['user'] = $response['user'];
                $_SESSION['userID'] = $response['userID'];
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
    <title>ICA 06 - PHP MySQL Authentication</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <h1>ICA 06 - MySQL Login</h1>
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