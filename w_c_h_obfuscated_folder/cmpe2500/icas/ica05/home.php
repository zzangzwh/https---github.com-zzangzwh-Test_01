<?php
require_once('util.php');

// simple check for authentication
if (!isset($_SESSION['user'])) {
    header('location:index.php');
    die();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <h1>ICA 05 - Authentication: <?= $_SESSION['user'] ?></h1>
    </header>
    <main>

        <div class="content">

            <div class="links">
                <a href="settings.php">Settings</a>
                <a href="message.php">Messages</a>
                <a href="#">Tag Admin</a>
                <a href="#">Real Time Monitor</a>
            </div>


            <form action="index.php" method="post" id="logout-form">
                <div class="field_">
                    <input type="submit" value="Logout" name="logout" id="logout">
                </div>
            </form>
        </div>
    </main>
    <footer>
        <p>Page Status: </p>
        <p>&copy; Copyright <?= date("Y") ?></p>
        <p>Last Modified: <?= date("m/d/Y H:i:s", filemtime('home.php')) ?></p>
    </footer>
</body>

</html>