<?php



require_once("util.php");
$status = "";
$error = array();
if(isset($_GET["hobby"]) && strlen($_GET["hobby"])>0 &&strip_tags($_GET['name'])>0){
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
$status .= "+processform";
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
    <header>
    fsdfds
    </header>
    <section>

            <?php echo allGetEntries();  ?>

    </section>
<?php 
           if(count($_GET) >0){
               echo "<ul>";
                foreach($_GET as $key => $value){
                    echo "<li> [$key]= $value</li>"; 
                }
                echo "</ul>";
                $status .= "+part2";
           }
           ?>
              <p>from utilget</p>
          <?php echo getKeyValue() ?>
</body>
</html>