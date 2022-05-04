<?php
require_once("demo2_util.php");

//simple check for authentication
if(!isset($_SESSION["user"])){
    header("location:cmpe2500_demo_week02.php");
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
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <header><h1>Protected Page</h1></header>
    <main>
    <p>Hello <?php echo $_SESSION["user"] ?> you are currently logged in</p>

        <form action="cmpe2500_demo_week02.php" method="post" id="logout-form">
            <div class="field">
            <input type="submit" value="logout" name="logout">
            </div>
        </form>

    </main> 
</body>
</html>