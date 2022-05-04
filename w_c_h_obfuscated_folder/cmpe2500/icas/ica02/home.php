<?php
require_once("util.php");

//simple check for authentication
if(!isset($_SESSION["user"])){
    header("location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ICA02-Login</title>
    <link rel="stylesheet" href="css/ica02.css">
</head>
<body>
    <header>
        <h1>ICA02 Authentication :  <?= $_SESSION["user"] ?></h1>
    </header>
<main>
    <p>Hello <?= $_SESSION["user"] ?> you are currently logged in</p>
    <form action="index.php"method="post" id="logout">
    <div class="field-logout">
            <p><a href="setting.php" class="home_setting"> Settings</a></p>
            <p><a href="#" class="home_setting"> Messages</a></p>
            <p><a href="#" class="home_setting"> Tag Admin</a></p>
            <p><a href="#" class="home_setting"> RealTime Monitor</a></p>
        </div>
    <div class="field-logout_">
        <input type="submit" name="logout" value="logout">
    </div>
    </form>
</main>
<footer>
      <p>Page Status: <?= $_SESSION["user"] ?> you are currently logged in</p>
 

      <?php  echo"<pre>&copy;2021 by wonhyuk cho\nLast Modified:".date("F d Y H:i:s.", getlastmod())?>
    
</body>
</html>