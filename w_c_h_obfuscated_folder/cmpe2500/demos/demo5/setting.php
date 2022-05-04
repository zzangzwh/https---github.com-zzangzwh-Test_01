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
    <title>Settings Page</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <h1>ICA 04 - Settings: <?= $_SESSION['user'] ?></h1>
        <nav><a href="home.php">Back Home</a></nav>
    </header>
    <main>
        <div class="content">
            <form action="" method="post" id="add-user-form">
                <div class="field">
                    <label for="username">Username:</label>
                    <input placeholder="supply a username" type="text" name="username" id="username" value="<?= $user ?>">
                </div>
                <div class="field">
                    <label for="password">Password:</label>
                    <input placeholder="supply a password" type="password" name="password" id="password">
                </div>
                <div class="field_">
                    <input type="submit" name="add" id="add" value="Add User">
                </div>
                <div class="error">
                    <?= displayErrors(($error)) ?>
                </div>
            </form>
            <table id="user-table">
                <thead>
                    <tr>
                        <th>Op</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Encrypted Password</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </main>
    <footer>
        <p>Page Status: <span id="page-status"></span></p>
        <p><span id="pageZ"> </span></p>
        <p>&copy; Copyright <?= date("Y") ?></p>
        <p>Last Modified: <?= date("m/d/Y H:i:s", filemtime('home.php')) ?></p>
    </footer>
    <script src="js/main.js"></script>
    <script src="js/setting.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>