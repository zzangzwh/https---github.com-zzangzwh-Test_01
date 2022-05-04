


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
    <header>EXAM practice</header>
    <section>
        <div>
         <?php
                echo "<p>HI,iam wonhyuk... from phpland are we <br> on a new line?<br>"
                .  " hi .{\$me}. from pphland <br>are we on a new line? \$ \$1</p>"
         ?>

        </div>
        <div>
            <?php
                    echo " <p> The Server request time is : $_SERVER[REQUEST_TIME] </p>" ;
            ?>
        </div>
        <div>
            <?php 
            function generateNum(){
               $arr =array();
               for($i =1; $i <10; $i++){
                    $arr[$i] = $i;

               } 
               shuffle($arr);
               return $arr;
            }
            function makeList($num){
                $result = "<ul>";
                foreach($num as $val){
                    $result.= "<li>$val </li>"; 
                }
                $result .= "</ul>";
                return $result;
            }
            echo makeList(generateNum());
                        
            
            ?>


        </div>
        <div>
            <?php

                $x =4;
                $y =12;
                $z;
                //$z =3;
                function add(){
                    global $x;
                    global $y;
                    global $z;
                  if($x==$y)                  
                  echo " x and y is same number ";
                 else{
                     echo "we are not same number " ;
                 }
                    //return $z;
                }
                echo add();
                echo "<br>";
               // echo $z;
            
            ?>

            <?php
                $x =10;
                while($x < 15){
                    echo "The number is ! $x </br> ";
                    ++$x;
                }
                
            ?>

            <?php 
                for($x =0; $x <10; ++$x){
                    echo "<br>The number ins for loop $x ";
                }
            ?>
            <?php

            $clr = array("RED","GREEN","BLUE");
           // var_dump($clr);
            foreach($clr as $value){
                echo "<br>The Color is Array is $value<br>";
            }
         
            ?>

            <?php
                function showArray($arr){
                    foreach($arr as $value){
                        echo " Value ins Array $value <br>";
                    }
                }
                $clr = array("Pink","2","Night");
                showArray($clr);

            ?>
        </div>
        <div>

            <?php
                function showArray2($arr){
                    for($i=0; $i <=count($arr); ++$i){
                        echo " $arr[$i] <br>";
                    }
                }
                $clr = array("fsd","aaaaa","12321321");
              
                showArray2($clr);
            ?>

        </div>
        <div>
                <?php
                    function arrays($arr){
                        foreach($arr as $name =>$age){
                            echo "KEYS= ". $name .",Value =". $age. "<br>";
                        }
                    }
                    $ages = array("JD"=>"52","marc"=>"50","Bill"=>"30");
                    // $ages["ROSS"] = "55";
                    // $ages["Taylor"] = "33";
             
                    sort($ages);
                    arrays($ages);
                   
                ?>
                <?php
                    foreach($_SERVER["ADDR"] as $key => $value){
                        echo $key .":". $value . "<br>";
                    }
                ?>


        </div>

    </section>
    <footer>
        <?php echo "<a href='#'>form page </a>" ?>
        <?php echo "<br> $_SERVER[REMOTE_ADDR]" ?>
    </footer>
</body>
</html>