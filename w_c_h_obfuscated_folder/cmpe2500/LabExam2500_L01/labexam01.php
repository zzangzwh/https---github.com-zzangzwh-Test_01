<?php
require_once("labexam01_inc.php");
// Part A : build and process output here



// Part B :
// Requirement : ProcessForm function, it accepts an argument representing the array_length required
//  Create and populate an array with #array_lenght random values between 0 and array_length ( non-inclusive )
//  Sort the array and return it - No globals may be used.



// Part C : 
// Requirement : for partC processing, interrogate your form elements here, and if valid with length > 0,
//  assign your partC variable to appropriately build and inject the html


// Part D : form processing code goes here

?>
<html>
  <head>
    <title>Exam 01</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href='//fonts.googleapis.com/css?family=Comfortaa|Roboto+Mono' rel='stylesheet' type='text/css'>
    <style type="text/css">
      body {
        font-family: "Roboto Mono", monospace;
        font-size: large;
      }
      h1 { font-family: Comfortaa, sans-serif; font-size: xx-large; }
      h2, input, button, select {
        font-family: Comfortaa, sans-serif;
        font-size: x-large;
        margin : 5px 5px; /* top/bottom left/right */
      }
      .header, .footer { font-family: Comfortaa; text-align: center;}
      .header { font-size: x-large; }
      div.q { border: 2px solid blue; margin : 5px; padding : 5px; border-radius: 3px; }
      input { border : 1px solid red; }
      input[type=text] { border: 2px groove red; }
      img { border: 1px solid green; width: 200px; height: 200px; }
      select, span { width: 300px; display: inline-block; background-color: #0f0; }
    </style>
  </head>
  <body>
  <div class='header'><h1>Lab Exam 01 - Your Name</h1></div>
  <div>All user/form data MUST be sanitized before use.</div>
<!-- Part A  -->
<div class="q">
  <div><h2>A: +<?="$breadcrumb"?> </h2>
  <?php echo count($_SERVER) ;
     
     if(count($_SERVER) >0){
        echo "<ul>";
         foreach($_SERVER as $key => $value){
             echo "<li> [$key]= $value</li>"; 
         }
         echo "</ul>";
        
    }


  ?>
  
  </div>
    <div>
<!-- Place required inline php elements here -- you may use a function too -->
   

     


    </div><!-- End of Part A output div -->
  </div><!-- End of Part A container -->
    <!-- Part B  -->
    <div class="q">
    <div><h2>B: +</h2></div>
    <fieldset>
      <legend>Part B - Form</legend>
    <form method="get">
      <fieldset>
        <legend>Output Type</legend>
        <div><label>Sum : <input type="radio" name="rbListType" value="rbSum"></label></div>
        <div><label>Average : <input type="radio" name="rbListType" value="rbAverage"></label></div>
      </fieldset>
      <div>Elements Required : <input size="6" maxlength="6" type="text" name="numReq" value="15"/><input type="submit" name="ProcessForm" /></div>
    </form>
    </fieldset>
    <div>
        
     <?php
  //  if(isset($_GET["ProcessForm"])){
  //    $num = strip_tags($_GET("numReq"));
  //    $num =  rand(1,1000);
  //    echo $num;
  //  }
   $sum = $_GET["rbSum"];
   $avg = $_GET["rbAverage"];
   
      $num = rand(1,1000);
      echo $num;

    // }
    //   echo rand(1,1000);
    //   $a = array()
     ?>
  
    <!-- Place function ProcessForm() at the top of the file where designated, then                -->
    <!-- Place required php elements here : extract the GET form text element numReq and           -->
    <!--  invoke ProcessForm() function then with the returned array,                              -->
    <!--  iterate through the array making a comma separated list                                  -->
    </div> <!-- End of Part B output col -->
  </div> <!-- End of Part B container -->
 <img src="" alt="">
  <!-- Part C  -->
  <div class="q">
    <div>C: + </div>
    <form method="post">
      <div><input type="checkbox" name="c1" value="guitar"> Guitar ?</div>
      <div><input type="checkbox" name="c2" value="drums"> Drums ?</div>
      <div><input type="text" name="c3" placeholder="instrument"> Hint : piano or horns</div>
      <div><input type="submit" name="partc" /></div>
    </form>
    <div>Requested Images are :</div>
    <div>
      <?php
          if(isset($_POST["partc"]));
            {
              $gutar = strip_tags( $_POST["c1"]);
              $drums = strip_tags($_POST["c2"]);
              $insta = strip_tags($_POST["c3"]);
              if($gutar)
              {
                echo "<img src ='drums.png'>";
              }
              else if($drums)
              {
                echo "<img src ='guitar.png'>";
              }
              else if($insta){
                echo "<img src ='piano.png'>";
              }
            }
      ?>
	    <!-- Part C : to satisfy the question requirements -->
      <!-- Your PHP will populate this div with the requested images as specified in c1, c2, c3,  -->
      <!-- images must show for marks, NOTE : the file extension(.png) should be added in your processing -->
      <!-- Text box input does not require file existence validation, ie. "DUH" would result in still create an image -->
      <!-- Using PHP only, have checkbox and textbox state persist between Part C submits -->
    </div>
  </div><!-- End of Part C container -->
  <!-- Part D  -->
  <div class="q">
    <div>D: + </div>
    <form method="post">
      <div><input type="text" name="findValue" value="0"></div>
      <div><input type="submit" name="partd" /></div>
    </form>
    <div>
    <?php

// if(!empty($_POST)){
//   if(isset($_POST["login"])){
//       // login form submitted
//       $user = strip_tags( $_POST["username"]);
//       $pass = strip_tags($_POST["password"]) ;
  // $items = array();
  // if(!isset($_POST)){
  //   if(isset($_POST["partd"])){
  //     $file = strip_tags($_POST["findValue"]);
     
  //       for($i = 0; $i<count($items); $i ++){
  //         echo $items[$i];
  //       }
  //     }
  //   }

  $items=json_decode('[{"tagId":"1","tagDescription":"ACTIVEX","tagMin":"30","tagMax":"218"},{"tagId":"2","tagDescription":"ADA","tagMin":"22","tagMax":"71"},{"tagId":"3","tagDescription":"ADO","tagMin":"-4","tagMax":"163"},{"tagId":"4","tagDescription":"AGILE","tagMin":"22","tagMax":"40"},{"tagId":"5","tagDescription":"ALERT","tagMin":"11","tagMax":"56"},{"tagId":"6","tagDescription":"ALGOL","tagMin":"1","tagMax":"82"},{"tagId":"7","tagDescription":"ALGORITHM","tagMin":"2","tagMax":"220"},{"tagId":"8","tagDescription":"API","tagMin":"34","tagMax":"29"},{"tagId":"9","tagDescription":"APPLET","tagMin":"30","tagMax":"149"},{"tagId":"10","tagDescription":"ARGUMENT","tagMin":"41","tagMax":"139"},{"tagId":"11","tagDescription":"ARRAY","tagMin":"-10","tagMax":"80"},{"tagId":"12","tagDescription":"ASCII","tagMin":"34","tagMax":"42"},{"tagId":"13","tagDescription":"ASP","tagMin":"-19","tagMax":"57"},{"tagId":"14","tagDescription":"ASPI","tagMin":"16","tagMax":"78"},{"tagId":"15","tagDescription":"ASSEMBLER","tagMin":"27","tagMax":"152"},{"tagId":"16","tagDescription":"ASSEMBLY","tagMin":"-16","tagMax":"165"},{"tagId":"17","tagDescription":"BATCH","tagMin":"-15","tagMax":"135"},{"tagId":"18","tagDescription":"BINARY","tagMin":"1","tagMax":"49"},{"tagId":"19","tagDescription":"BITS","tagMin":"15","tagMax":"86"},{"tagId":"20","tagDescription":"BITWISE","tagMin":"45","tagMax":"174"},{"tagId":"21","tagDescription":"BOOL","tagMin":"44","tagMax":"103"},{"tagId":"22","tagDescription":"BOOLEAN","tagMin":"-12","tagMax":"168"},{"tagId":"23","tagDescription":"BRACKET","tagMin":"-22","tagMax":"35"},{"tagId":"24","tagDescription":"BRANCH","tagMin":"-15","tagMax":"127"},{"tagId":"25","tagDescription":"BUG","tagMin":"-13","tagMax":"75"},{"tagId":"26","tagDescription":"BUGFAIRY","tagMin":"34","tagMax":"63"},{"tagId":"27","tagDescription":"BYTECODE","tagMin":"19","tagMax":"93"},{"tagId":"28","tagDescription":"CAMELCASE","tagMin":"47","tagMax":"183"},{"tagId":"29","tagDescription":"CHAR","tagMin":"-21","tagMax":"204"},{"tagId":"30","tagDescription":"CIRCUIT","tagMin":"-1","tagMax":"208"},{"tagId":"31","tagDescription":"CLASS","tagMin":"21","tagMax":"86"},{"tagId":"32","tagDescription":"CLASSPATH","tagMin":"27","tagMax":"130"},{"tagId":"33","tagDescription":"CLOSURE","tagMin":"18","tagMax":"80"},{"tagId":"34","tagDescription":"CLR","tagMin":"25","tagMax":"123"},{"tagId":"35","tagDescription":"COBOL","tagMin":"9","tagMax":"186"},{"tagId":"36","tagDescription":"COMMENT","tagMin":"24","tagMax":"197"},{"tagId":"37","tagDescription":"COMPILATION","tagMin":"1","tagMax":"49"},{"tagId":"38","tagDescription":"CONCAT","tagMin":"18","tagMax":"132"},{"tagId":"39","tagDescription":"CONSTANT","tagMin":"46","tagMax":"50"},{"tagId":"40","tagDescription":"CONSTRUCTOR","tagMin":"33","tagMax":"127"},{"tagId":"41","tagDescription":"CRAPPLET","tagMin":"-9","tagMax":"134"},{"tagId":"42","tagDescription":"CSS","tagMin":"-19","tagMax":"181"},{"tagId":"43","tagDescription":"DDE","tagMin":"24","tagMax":"206"},{"tagId":"44","tagDescription":"DEBUG","tagMin":"18","tagMax":"57"},{"tagId":"45","tagDescription":"DEBUGGER","tagMin":"-20","tagMax":"202"},{"tagId":"46","tagDescription":"DECLARE","tagMin":"-10","tagMax":"97"},{"tagId":"47","tagDescription":"DECREMENT","tagMin":"-11","tagMax":"202"},{"tagId":"48","tagDescription":"DELIMITER","tagMin":"38","tagMax":"139"},{"tagId":"49","tagDescription":"DHTML","tagMin":"-1","tagMax":"197"},{"tagId":"50","tagDescription":"DIE","tagMin":"3","tagMax":"77"},{"tagId":"51","tagDescription":"DIFF","tagMin":"-11","tagMax":"54"},{"tagId":"52","tagDescription":"DISSEMBLER","tagMin":"-12","tagMax":"110"},{"tagId":"53","tagDescription":"DIV","tagMin":"21","tagMax":"187"},{"tagId":"54","tagDescription":"DJANGO","tagMin":"-10","tagMax":"143"},{"tagId":"55","tagDescription":"DML","tagMin":"0","tagMax":"204"},{"tagId":"56","tagDescription":"DO","tagMin":"11","tagMax":"165"},{"tagId":"57","tagDescription":"DOM","tagMin":"-20","tagMax":"73"},{"tagId":"58","tagDescription":"DUMP","tagMin":"-25","tagMax":"81"},{"tagId":"59","tagDescription":"DWORD","tagMin":"6","tagMax":"64"},{"tagId":"60","tagDescription":"ELEMENT","tagMin":"31","tagMax":"55"},{"tagId":"61","tagDescription":"ELLIPSIS","tagMin":"13","tagMax":"43"},{"tagId":"62","tagDescription":"ELSE","tagMin":"45","tagMax":"98"},{"tagId":"63","tagDescription":"ENCAPSULATION","tagMin":"-22","tagMax":"51"},{"tagId":"64","tagDescription":"ENCODE","tagMin":"13","tagMax":"55"},{"tagId":"65","tagDescription":"ENDIAN","tagMin":"-7","tagMax":"170"},{"tagId":"66","tagDescription":"EOF","tagMin":"44","tagMax":"105"},{"tagId":"67","tagDescription":"EQUAL","tagMin":"-6","tagMax":"37"},{"tagId":"68","tagDescription":"ERROR","tagMin":"15","tagMax":"126"},{"tagId":"69","tagDescription":"ESCAPE","tagMin":"44","tagMax":"37"},{"tagId":"70","tagDescription":"EVAL","tagMin":"16","tagMax":"141"},{"tagId":"71","tagDescription":"EVENT","tagMin":"-7","tagMax":"118"},{"tagId":"72","tagDescription":"EXEC","tagMin":"20","tagMax":"143"},{"tagId":"73","tagDescription":"EXCEPTION","tagMin":"-13","tagMax":"29"},{"tagId":"74","tagDescription":"EXISTS","tagMin":"22","tagMax":"35"},{"tagId":"75","tagDescription":"EXPONENT","tagMin":"5","tagMax":"189"},{"tagId":"76","tagDescription":"EXPRESSION","tagMin":"44","tagMax":"47"},{"tagId":"77","tagDescription":"FALSE","tagMin":"36","tagMax":"176"},{"tagId":"78","tagDescription":"FLAG","tagMin":"-2","tagMax":"85"},{"tagId":"79","tagDescription":"FOR","tagMin":"17","tagMax":"207"},{"tagId":"80","tagDescription":"FOREACH","tagMin":"40","tagMax":"143"},{"tagId":"81","tagDescription":"FORTRAN","tagMin":"2","tagMax":"26"},{"tagId":"82","tagDescription":"FRAMEWORK","tagMin":"47","tagMax":"177"},{"tagId":"83","tagDescription":"FUNCTION","tagMin":"46","tagMax":"113"},{"tagId":"84","tagDescription":"GCC","tagMin":"2","tagMax":"126"},{"tagId":"85","tagDescription":"GITHUB","tagMin":"7","tagMax":"145"},{"tagId":"86","tagDescription":"GOTO","tagMin":"31","tagMax":"205"},{"tagId":"87","tagDescription":"HASH","tagMin":"-4","tagMax":"169"},{"tagId":"88","tagDescription":"HASKELL","tagMin":"31","tagMax":"140"},{"tagId":"89","tagDescription":"HEAP","tagMin":"23","tagMax":"118"},{"tagId":"90","tagDescription":"HTML","tagMin":"5","tagMax":"150"},{"tagId":"91","tagDescription":"IMMUTABLE","tagMin":"44","tagMax":"174"},{"tagId":"92","tagDescription":"INCREMENT","tagMin":"46","tagMax":"125"},{"tagId":"93","tagDescription":"INDIRECTION","tagMin":"25","tagMax":"189"},{"tagId":"94","tagDescription":"INHERITANCE","tagMin":"-17","tagMax":"44"},{"tagId":"95","tagDescription":"INLINE","tagMin":"-15","tagMax":"102"},{"tagId":"96","tagDescription":"INSTANCE","tagMin":"14","tagMax":"118"},{"tagId":"97","tagDescription":"INSTANTIATION","tagMin":"31","tagMax":"95"},{"tagId":"98","tagDescription":"INT","tagMin":"14","tagMax":"127"},{"tagId":"99","tagDescription":"INTEGER","tagMin":"-23","tagMax":"138"},{"tagId":"100","tagDescription":"INTERPRETED","tagMin":"33","tagMax":"54"},{"tagId":"101","tagDescription":"INTERPRETER","tagMin":"6","tagMax":"152"},{"tagId":"102","tagDescription":"JAVASCRIPT","tagMin":"44","tagMax":"171"},{"tagId":"103","tagDescription":"JAVA","tagMin":"40","tagMax":"53"},{"tagId":"104","tagDescription":"JAVABEAN","tagMin":"-17","tagMax":"44"},{"tagId":"105","tagDescription":"JBUILDER","tagMin":"-12","tagMax":"137"},{"tagId":"106","tagDescription":"JCL","tagMin":"-3","tagMax":"180"},{"tagId":"107","tagDescription":"JDBC","tagMin":"50","tagMax":"157"},{"tagId":"108","tagDescription":"JDK","tagMin":"-1","tagMax":"147"},{"tagId":"109","tagDescription":"JIT","tagMin":"-17","tagMax":"160"},{"tagId":"110","tagDescription":"JRE","tagMin":"-20","tagMax":"85"},{"tagId":"111","tagDescription":"JSON","tagMin":"-2","tagMax":"156"},{"tagId":"112","tagDescription":"JSP","tagMin":"1","tagMax":"179"},{"tagId":"113","tagDescription":"JSR","tagMin":"35","tagMax":"163"},{"tagId":"114","tagDescription":"KLUDGE","tagMin":"-21","tagMax":"59"},{"tagId":"115","tagDescription":"LAMBDA","tagMin":"28","tagMax":"34"},{"tagId":"116","tagDescription":"LEXICAL","tagMin":"-19","tagMax":"79"},{"tagId":"117","tagDescription":"LINKER","tagMin":"-16","tagMax":"184"},{"tagId":"118","tagDescription":"LISP","tagMin":"20","tagMax":"147"},{"tagId":"119","tagDescription":"LITERAL","tagMin":"-5","tagMax":"123"},{"tagId":"120","tagDescription":"LLVM","tagMin":"23","tagMax":"178"},{"tagId":"121","tagDescription":"LOOP","tagMin":"41","tagMax":"49"},{"tagId":"122","tagDescription":"LOOPHOLE","tagMin":"46","tagMax":"98"},{"tagId":"123","tagDescription":"LIBRARY","tagMin":"49","tagMax":"192"},{"tagId":"124","tagDescription":"MAP","tagMin":"-9","tagMax":"143"},{"tagId":"125","tagDescription":"MATH","tagMin":"-4","tagMax":"158"},{"tagId":"126","tagDescription":"MATLAB","tagMin":"9","tagMax":"86"},{"tagId":"127","tagDescription":"MEMOIZATION","tagMin":"-15","tagMax":"183"},{"tagId":"128","tagDescription":"METHOD","tagMin":"15","tagMax":"83"},{"tagId":"129","tagDescription":"MIDDLEWARE","tagMin":"39","tagMax":"101"},{"tagId":"130","tagDescription":"MODULO","tagMin":"1","tagMax":"147"},{"tagId":"131","tagDescription":"MSDN","tagMin":"-25","tagMax":"64"},{"tagId":"132","tagDescription":"MUTEX","tagMin":"47","tagMax":"71"},{"tagId":"133","tagDescription":"NEWLINE","tagMin":"-5","tagMax":"152"},{"tagId":"134","tagDescription":"NODELIST","tagMin":"4","tagMax":"27"},{"tagId":"135","tagDescription":"NULL","tagMin":"42","tagMax":"117"},{"tagId":"136","tagDescription":"OBJECTODBC","tagMin":"21","tagMax":"158"},{"tagId":"137","tagDescription":"OOP","tagMin":"12","tagMax":"115"},{"tagId":"138","tagDescription":"OPCODE","tagMin":"34","tagMax":"140"},{"tagId":"139","tagDescription":"OPERAND","tagMin":"14","tagMax":"204"},{"tagId":"140","tagDescription":"OPERATOR","tagMin":"43","tagMax":"189"},{"tagId":"141","tagDescription":"OVERLOAD","tagMin":"4","tagMax":"124"},{"tagId":"142","tagDescription":"PACKAGE","tagMin":"-2","tagMax":"32"},{"tagId":"143","tagDescription":"PARENTHESIS","tagMin":"-6","tagMax":"60"},{"tagId":"144","tagDescription":"PARSE","tagMin":"-17","tagMax":"30"},{"tagId":"145","tagDescription":"PASCAL","tagMin":"35","tagMax":"209"},{"tagId":"146","tagDescription":"PERL","tagMin":"-9","tagMax":"83"},{"tagId":"147","tagDescription":"PHP","tagMin":"37","tagMax":"71"},{"tagId":"148","tagDescription":"PIPE","tagMin":"26","tagMax":"173"},{"tagId":"149","tagDescription":"POINTER","tagMin":"23","tagMax":"225"},{"tagId":"150","tagDescription":"POLYMORPHISM","tagMin":"-21","tagMax":"86"},{"tagId":"151","tagDescription":"POP","tagMin":"0","tagMax":"178"},{"tagId":"152","tagDescription":"PRIVATE","tagMin":"37","tagMax":"187"},{"tagId":"153","tagDescription":"PROCEDURE","tagMin":"19","tagMax":"124"},{"tagId":"154","tagDescription":"PROCESS","tagMin":"28","tagMax":"41"},{"tagId":"155","tagDescription":"PROGRAM","tagMin":"-6","tagMax":"35"},{"tagId":"156","tagDescription":"PROLOG","tagMin":"12","tagMax":"81"},{"tagId":"157","tagDescription":"PSEUDOCODE","tagMin":"46","tagMax":"202"},{"tagId":"158","tagDescription":"PUBLIC","tagMin":"19","tagMax":"81"},{"tagId":"159","tagDescription":"PUSH","tagMin":"23","tagMax":"92"},{"tagId":"160","tagDescription":"PYTHON","tagMin":"34","tagMax":"204"},{"tagId":"161","tagDescription":"QT","tagMin":"-15","tagMax":"218"},{"tagId":"162","tagDescription":"RANDOM","tagMin":"7","tagMax":"72"},{"tagId":"163","tagDescription":"RECURSION","tagMin":"43","tagMax":"191"},{"tagId":"164","tagDescription":"REGEX","tagMin":"7","tagMax":"154"},{"tagId":"165","tagDescription":"RUBY","tagMin":"45","tagMax":"175"},{"tagId":"166","tagDescription":"RUST","tagMin":"45","tagMax":"111"},{"tagId":"167","tagDescription":"SANDBOX","tagMin":"0","tagMax":"107"},{"tagId":"168","tagDescription":"SDK","tagMin":"-22","tagMax":"218"},{"tagId":"169","tagDescription":"SEED","tagMin":"28","tagMax":"154"},{"tagId":"170","tagDescription":"SEGFAULT","tagMin":"-17","tagMax":"141"},{"tagId":"171","tagDescription":"SEQUENCE","tagMin":"20","tagMax":"70"},{"tagId":"172","tagDescription":"SERVLET","tagMin":"1","tagMax":"37"},{"tagId":"173","tagDescription":"SGML","tagMin":"-5","tagMax":"50"},{"tagId":"174","tagDescription":"SOCKET","tagMin":"38","tagMax":"184"},{"tagId":"175","tagDescription":"SOURCE","tagMin":"11","tagMax":"30"},{"tagId":"176","tagDescription":"SQL","tagMin":"26","tagMax":"89"},{"tagId":"177","tagDescription":"STACK","tagMin":"17","tagMax":"194"},{"tagId":"178","tagDescription":"STYLESHEET","tagMin":"16","tagMax":"60"},{"tagId":"179","tagDescription":"SUBSTRING","tagMin":"-6","tagMax":"174"},{"tagId":"180","tagDescription":"SUBVERSION","tagMin":"46","tagMax":"131"},{"tagId":"181","tagDescription":"SYNTAX","tagMin":"34","tagMax":"100"},{"tagId":"182","tagDescription":"TCL","tagMin":"12","tagMax":"93"},{"tagId":"183","tagDescription":"THREAD","tagMin":"-8","tagMax":"50"},{"tagId":"184","tagDescription":"TOKEN","tagMin":"46","tagMax":"89"},{"tagId":"185","tagDescription":"TRUNK","tagMin":"34","tagMax":"221"},{"tagId":"186","tagDescription":"TUPLE","tagMin":"16","tagMax":"177"},{"tagId":"187","tagDescription":"UNARY","tagMin":"-11","tagMax":"150"},{"tagId":"188","tagDescription":"UNDEFINED","tagMin":"19","tagMax":"37"},{"tagId":"189","tagDescription":"UNDERFLOW","tagMin":"14","tagMax":"117"},{"tagId":"190","tagDescription":"VALUE","tagMin":"28","tagMax":"61"},{"tagId":"191","tagDescription":"VAR","tagMin":"33","tagMax":"94"},{"tagId":"192","tagDescription":"VARIABLE","tagMin":"4","tagMax":"202"},{"tagId":"193","tagDescription":"VB","tagMin":"-5","tagMax":"165"},{"tagId":"194","tagDescription":"VECTOR","tagMin":"26","tagMax":"86"},{"tagId":"195","tagDescription":"VOID","tagMin":"11","tagMax":"126"},{"tagId":"196","tagDescription":"WHILE","tagMin":"-20","tagMax":"191"},{"tagId":"197","tagDescription":"XML","tagMin":"46","tagMax":"72"},{"tagId":"198","tagDescription":"XNA","tagMin":"1","tagMax":"29"},{"tagId":"199","tagDescription":"XSL","tagMin":"-20","tagMax":"78"},{"tagId":"200","tagDescription":"XSLT","tagMin":"-15","tagMax":"197"},{"tagId":"201","tagDescription":"YAML","tagMin":"0","tagMax":"100"},{"tagId":"9240","tagDescription":"ADASDASD","tagMin":"1","tagMax":"3"}]', true );
//$items = array();
$arrayobject = new ArrayObject($items);
foreach($items as $key => $value)
echo var_dump($key,$value);

foreach($items as $key => $value){
  echo $key .":". array_values($value)  . "<br>";
}

  // foreach($_SERVER as $key => $value){
  //            echo "<li> [$key]= $value</li>"; 
// Open the file using the HTTP headers set above
// $file = file_get_contents('http://www.example.com/', false, $context);


// $file = file_get_contents('labexam01_inc.php', true);

// $file = file_get_contents('labexam01_inc.php', FILE_USE_INCLUDE_PATH);
// echo $file;
  //   if(isset($_POST["partd"]))
  //   {
  //     $items = array();
  //     if($items == true){
  //       for($i =0; $i<count($items); $i++){
  //           echo $items[$i];
  //       }
      
  //   }
  // }

  
    
    ?>
    <!-- if(isset($_GET["hobby"]) && strlen($_GET["hobby"])>0){
    $name = strip_tags($_GET['name']);
    $hobby = $_GET['hobby'];
    $howmuch = $_GET['howmuch'];
    $submit = $_GET['gonow'];

    $output = "$name "; -->
	    <!-- Part D : to satisfy the question requirements, make the labexam01_inc.php file contents available for access in this file -->
	    <!-- find all entries in $items which have a tagMin with 10 of the input text box value -->
	    <!-- First line : output number found as : "Found N tags using M" -->

      <!-- Example output with 56 in text box :  -->
      <!-- Found 5 tags using 56 : -->
      <!-- CAMELCASE, FRAMEWORK, JDBC, LIBRARY, MUTEX,  -->
    </div>
  </div><!-- End of Part D container -->
  <div class="ftr">&copy; 2021</div>
  </body>
</html>