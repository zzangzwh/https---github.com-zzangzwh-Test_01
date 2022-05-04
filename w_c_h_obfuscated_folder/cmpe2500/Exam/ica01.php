<?php
require_once("util.php");
$status = "";
if(isset($_GET["hobby"]) && strlen($_GET["hobby"])>0){
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
$status .= "+processform";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <header>
        <?php
            echo "<h1> ICA01 - php</h1>"
           
        ?>
    <header>
      

        
        <?php echo "<h2> Part1 server info <h2>" ?>
    
    <section>
        
    <div>
        <p>Your Ip AddRess is :  </p> 
        <p>$_GET EVALUATION:       </p>
        <p>$_Post Evaluation :      </p>
        
     </div>         
        
     <div>
         <p>    <?php echo $_SERVER["REMOTE_ADDR"] ?></p> 
         <p>  <?php echo "FOUND ".count($_GET) ." In the \$_GET" ?> </p>
         <p>  <?php echo "FOUND ".count($_POST). "IN the \$_POST" ?></p>
         <?php $status .= "+part1";?>
         
    </div>
    
</section>
        <?php echo "<h2> part2 form processing <h2>" ?>
    <section>
        <div>
            <p>$GET Contents: </p>
            
            
        </div>
        <div>
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
    
        </div>
        <div>
            <p>from utilget</p>
          <?php echo getKeyValue() ?>

        </div>
        
    </section>
                <?php echo "<h2>part 3 ArrayGeneration </h2>" ?>
    <section>
                <div>
                        <p>Array Generated</p>
                </div>
                <div>

                    <?php echo makeList(randNum()); ?>
                    <?php $status .= "+part3 "; ?>
                </div>


    </section>
                <h2> part 4 formprocessing</h2>
    <section>
                <form action="" method="get">
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

                </form>
                <?php $status += "+part4";?>

    </section>
    <section>


    <p><?php echo   $output  ?> </p>  

    </section>
    <section>
        <?php echo "<p> Status: $status  </p>"?>

    </section>
    <section>
        <?php 
            echo allGetEntries();
        ?>
    </section>
    
    <section>

    <?php
      
          echo mergeArray(randNum(),randNum());
         
    ?>
    <?php
      $ar1 =array(1,2,3,4,5);
      $ar2 = array(8,9,10,11,12);
      echo mergeArray($ar1,$ar2);
    ?>

    </section>
                
            <section>

            <?php
  
                // $a1 = array(
                //     "a" => 2
                // ,"b" => 0
                // ,"c" => 5
                // );

                // $a2 = array(
                //     "a" => 3
                // ,"b" => 9
                // ,"c" => 7
                // ,"d" => 10
                // );
                // $sums = array();
                // foreach (array_keys($a1 + $a2) as $key) {
                //    echo $sums[$key] = (isset($a1[$key]) ? $a1[$key] : 0) + (isset($a2[$key]) ? $a2[$key] : 0)."<br>";
                // }
               echo arraySum(randNum(),randNum());


?>
            </section>
    
         


    
</body>
</html>