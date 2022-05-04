<?php

function generateNumber(){
    $arr = array();
    for($i =1; $i<=10; $i++){
        $arr[$i] = $i;
    }
    shuffle($arr);
    return $arr;
}
function makeList($arr){

     $ouput  = "<ol>";
    foreach($arr as $value){
          $ouput .= "<li> $value </li>";
    }
     $ouput .="</ol>";
     return $ouput;
 
}
function randNum(){
    $arr_ = array(); 
    for($i=0; $i <10; $i++){
        $arr[$i] = rand(100,200);
    }
    shuffle($arr);
    return $arr;
}
function allGetEntries(){
    $out = "<ul>";
    foreach($_GET as $key => $value){
        $out .= "<li> $key : $value </li>" ;
        $out .= "<br>";
    }
    $out .= "</ul>";
    return $out;
}
function mergeArray($arr1,$arr2){
    $mergeArr = array_merge($arr1,$arr2);
    shuffle($mergeArr);
    $ouput  = "<ol>";
    foreach($mergeArr as $value){
        $ouput .="<li> $value </li>";
    }
    $ouput .= "</ol>";
    return $ouput;
}

function acceptTwoArray($arr,$arr2){
  
    $nums = array();
    $arr =array();
    $arr2 = array();
    for($i = 0; $i<count($arr); $i++){
        $nums[$i] = $arr[$i] + $arr2[$i];
       
    }
    return $nums;
}
function getKeyValue(){
    if(count($_GET) >0){
        $out = "<ul>";
         foreach($_GET as $key => $value){
            $out .= "<li> [$key]= $value</li>"; 
         }
         $out .= "</ul>";
        
    }
    return $out;
}

function arraySum($a1,$a2){
    $sums = array();
    $out_ ="<ul>";
                foreach (array_keys($a1 + $a2) as $key) {
                    $out_ .="<li>" . $sums[$key] = (isset($a1[$key]) ? $a1[$key] : 0) + (isset($a2[$key]) ? $a2[$key] : 0)."</li>";
                }
                $out_ .= "</ul>";
                return   $out_;
}


// function addArray($array1,$array2){
//     $array1 = array();
//     $array2 = array();
//     $length = count($array1) < count($array2) ? count($array1) : count($array2);
//     $result = array();
//     $result = $length;

//     for($i =0; $i<$result; $i++){
//         $result[$i] = $array1[$i] +$array2[$i];
//     }
//     return $result;
// }

// function custom_array_merge(&$array1, &$array2) {
//     $result = Array();
//     foreach ($array1 as $key_1 => &$value_1) {
//         // if($value['name'])
//         foreach ($array2 as $key_1 => $value_2) {
//             if($value_1['name'] ==  $value_2['name']) {
//                 $result[] = array_merge($value_1,$value_2);
//             }
//         }

//     }
//     return $result;


?>