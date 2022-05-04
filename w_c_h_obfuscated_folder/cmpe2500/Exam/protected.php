<?php
require_once("loginUtil.php");
if(!isset($_SESSION["user"])){
    header("location:login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header> Hello <?= $_SESSION["user"] ?> you are currently logged in </header>

    <main>
    <form action="login.php" method="post" name="logout-form">
    <div>
        <input type="submit" id="logout" name="logout" value="logout">

    </div>

    </form>
</main>
</body>
</html>