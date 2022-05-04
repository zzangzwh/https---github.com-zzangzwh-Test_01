<?php
require_once("webservice.php");

//simple check for authentication
if(!isset($_SESSION["user"])){
    header("location:ica03_index.php");
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
    <link rel="stylesheet" href="css/ica03.css">
</head>
<body>
    <header> 
        <h1>ICA03_Setting:<?= $_SESSION["user"] ?></h1>
    <nav>
        <a href="home.php">Back Home</a>
    </nav> 
    
</header>
    <form action="" method="post" id="login">
        <div class="field"> 
            <label for="username">UserName: </label>
            <input placeholder="supply a username" type="text" name="username" id="username" value="<?= $user ?>">
        </div>
        <div class="field">
            <label for="password">Password:</label>
            <input type="pasword" name="password" id="password" placeholder="Supply your password">        
        </div>
        <div class="Endfield">
            <input type="submit" name="login" id="login" value="Add User">
        </div>
        
    </form>
    <section id="user_table">
        <table id="user_TABLE">
            <thead>
            <tr>
                <th>Op</th>
                <th>User ID</th>
                <th>Username</th>
                <th>Encrypted Password</th>
            </tr>
        </thead>
        <tbody id="user_tbody">
            

            </tbody>

    </table>

    <section class="results"></section>
    
</section>

<footer id="error">
      <p>Page Status: <?= DisplayError($error); ?></p>
  
      <?php  echo"<pre>&copy;2021 by wonhyuk cho\nLast Modified:".date("F d Y H:i:s.", getlastmod())?>
  </footer>
  <script src="js/ica03.js"></script>
</body>
</html>