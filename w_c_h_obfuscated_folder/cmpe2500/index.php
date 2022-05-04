<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=`, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <!-- <p>this is wh's cmpe2500</p> -->
 <header>
     <?php
        echo("<strong>WEEK_01</strong>");
     ?>   
 </header>
 <section>
      <?php
    $name = "Wonhyuk Cho";
    $age = 25;

    echo ($name ." ". $age);
    //single quote
    echo '<p> hello $name, it looks like you\'re $age years old. </p>';
    //double quote
    echo "<p> hello $name, it looks like you\'re $age years old. </p>";
    // echo;
    echo("<p> Hello this is"." ".$name ."    </p>");

    echo showHeading("cmpe2500");
    showHeading2("CMPE2500");

    function showHeading($value){
        return("<h1>$value</h1>");
    }
    function showHeading2($value2){
        echo("<h1>$value2</h1>");
    }

    $colors = array("red", "green", "blue", "yellow"); 

foreach($colors as $x)
 {
  echo "<ol> <li=>". $x."<br>";
}
$fruits = array("Apple", "Banana", "Orange");
echo $fruits[2]; 
echo "<br>";
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
foreach($age as $y){
    echo $y;
}
?>
</section>

</body>
</html>