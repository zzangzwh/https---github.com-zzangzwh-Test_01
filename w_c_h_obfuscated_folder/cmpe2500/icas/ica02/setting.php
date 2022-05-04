 <?php
require_once("util.php");
// if(!isset($_SESSION["user"])){
//     header("location:index.php");
//     die();
// }

?>   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/ica02.css">
</head>
<body>
    <header> <h1>ICA02_Setting:<?= $_SESSION["user"] ?></h1> </header>
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
            <input type="submit" name="login" id="login" value="Add User">
        </div>
        
    </form>
    <section id="user-table">
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
    
</section>

<footer>
      <p>Page Status: <?= DisplayError($error); ?></p>
  
      <?php  echo"<pre>&copy;2021 by wonhyuk cho\nLast Modified:".date("F d Y H:i:s.", getlastmod())?>
  </footer>
  <script src="setting.js" ></script>
</body>
</html>