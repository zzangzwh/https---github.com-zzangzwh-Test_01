<?php
$status = "";
$error = array();
if(isset($_GET)){
    $name = strip_tags($_GET['name']);
    $hobby = $_GET['hobby'];
    $howmuch = $_GET['howmuch'];
    $submit = $_GET['gonow'];

    $output = "$name ";
    for($i =0; $i<$howmuch; $i++){
        $output .= "love ";
    }
    $output .= "likes  $hobby";
    
}
else{

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
<header> <h1>GETGETGET</h1>    </header>

<section>
                <form action="accept.php" method="get">
                    <div>
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name">
                    </div>
                    <div>
                        <label for="hobby">Hobby</label>
                        <input type="text" id="hobby" name="hobby">
                    </div>
                    <div>
                        <label for="howmuch">How much i like it</label>
                        <input type="range" id="howmuch" max= "10" min= "0" name="howmuch">
                    </div>
                    <div>
                        <input type="submit" value="gonow" id="gonow" name="gonow">
                    </div>
                    <div>

                    </div>

                </form>


    </section>

    
</body>
</html>