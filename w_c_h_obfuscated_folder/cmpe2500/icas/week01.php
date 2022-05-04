<?php
require_once("util.php");

//print_r(generateNumbers());  test code
$status = '';
if(isset($_GET['hobby'])&& strlen($_GET['hobby'])>0)
{
    $name = strip_tags( $_GET['name']);
    $hobby = strip_tags( $_GET['hobby']);
    $howmuch = strip_tags( $_GET['howmuch']);

    $output = "$name";
    for($i=0; $i<$howmuch; $i++)
    {
        $output .=" Really ";
    }
    $ouput .="loves $hobby";

}
$status .= "+Process Form"

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
    <div class="container">
        <header> 
            <h1>ICA01_php</h1>
         </header>
            <main>
                <section>
                    <h2>PART 1: Server Info</h2>
                <div class="cols">
                    <div>
                    <p>Your IP Address is:</p>
                    <p>$_GET Evaluation:</p>
                    <p>$_POST Evaluation:</p>

                </div>
      
                <div>
                    <p>
                        <?=  $_SERVER["REMOTE_ADDR"]
                        ?>
                    </p>
                    <p>Found <?= count($_GET) ?> entry the $_GET</p>
                    <p>Found <?=  count($_POST)?> entry the $_POST</p>
                    <?php $status .= '+ServerInfo';
                     ?>
                </div>
                </div>
                </section>
                <section>
                   <h2>PART 2: GET DATA</h2>
                   <div class="cols">
                       <div>
                           <p>$GET CONTENTS</p>

                       </div>
                       <div>
                           <?php 
                                if(count($_GET)>0){
                                    echo "<ul>";
                                    foreach($_GET as $key => $value){
                                        echo "<li>[$key] = $value</li>";
                                    }
                                    echo "</ul>";
                                }
                                $status .= "+GETData";
                           ?>
                       </div>

                   </div>
                </section>
                <section>
                   <h2>PART 3: Array Generation</h2>
                   <div class="cols">
                       <div>
                           <p>Array Generated </p>

                       </div>
                       <div>
                           <?php echo makeList(generateNumbers());                    
                         $status .= "+GenerateNumbers+MakeList+ShowNumbers";  ?>                     
                     
                       </div>

                   </div>
                </section>
                <section>
                        <h2>PART 4:  Form Processing</h2>
                        <div style="text-align: center;">
                                <form action="#" method="get">
                                    <div>
                                        <label for="name">
                                            Name: <input type="text" id="name" name="name">
                                        </label>
                                     </div>
                                    <div>
                                        <label for="hobby">
                                            Hobby: <input type="text" id="hobby" name="hobby">
                                        </label>
                                    </div>
                                    <div>
                                        <label for="howmuch">
                                            How Much: <input type="range" min="1" max="10" id="howmuch" name="howmuch">
                                        </label>
                                    </div>
                            
                                    <input type="submit" value="SEND" name="submit">
                                </form>
                         </div>
                </section>

                <section>
                                <p>Status: <?=$output ?></p>
                        
                </section>
                <section>
                                <p>Status: <?=$status ?></p>

                </section>

 
            </main>
    </div>
    
</body>
</html>