<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>week01 demo</title>
    <link rel="stylesheet" href="css/demo01.css">
</head>
<body>
        <header>
            <h1> ICA01 - DEMO</h1>
        </header>
        <section>
            <div class="cols"> <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. 
                
                </p>
        <?php echo "Your Server request time is : {$_SERVER["REMOTE_ADDR"]} " ;  ?>

        </div>
                
        </section>
        <section>
            <div class="cols">
                <p>MakeArray() done, made: </p>

        
              <?php
              function generateNum(){
                  $arr = array();
                  for($i=0; $i<8; $i++){
                    $arr[$i]= $i;
                  }
                  shuffle($arr);
                 return $arr;
              }
              function makeList($num){
                  $outPut = "<ul>";
                  foreach($num as $val){
                      $outPut .= "<li>$val</li>";
                    
                }
                $outPut .= "</ul>";
                return $outPut;
              }
            
                echo makeList(generateNum());
                   
              ?>

            </div>
            <form action="">
                <div class="cols"><p>whats your name :</p>
              <input type="text" name="fName" placeholder="name">

              <p>How much you need?</p>
              <input type="text" name="howMuch" placeholder="money">
              <input type="submit" value="submit">
              </div>
              
            </form>
        </section>

        <footer>
            <a href="index.php">indexPage</a>
        </footer>
   
</body>
</html>