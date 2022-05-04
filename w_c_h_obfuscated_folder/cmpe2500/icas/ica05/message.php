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
    <title>MessageBox Page</title>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <header>
        <h1>ICA 05 - Settings: <?= $_SESSION['user'] ?></h1>
        <nav><a href="home.php">Back Home</a></nav>
    </header>
    <main>
        <div class="content">
           <section id="messageContent">

               <div class="field">
               <label for="filter">Filter:</label>
                    <input placeholder="supply a filter" type="text" name="filter" id="filter" />
                </div>
                <div class="field_">
                <input type="button" id="btn-get-messages" value="Search">
                </div>
                <!-- <div class="error">
                    <?= displayErrors(($error)) ?>
                </div> -->
                
                <div class="field">
                    <label for="message">Message:</label>
                    <input placeholder="enter a message to share" type="text" name="message" id="message">
                </div>
                <div class="field_">
                  <input type="button" id="btn-add-message" value="Send">
                </div>
               <div class="error">
                    <?= displayErrors(($error)) ?>
                </div> 
                
            </section>
            <table id="messages-table">
                <thead>
                    <tr>
                        <th>Op</th>
                        <th>Message ID</th>
                        <th>User</th>
                        <th>Message</th>
                        <th>TimeStamp</th>
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
    <script src="js/message.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>

</html>