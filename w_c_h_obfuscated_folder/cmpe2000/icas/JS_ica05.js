window.onload =function () {
    // var header = document.getElementById('header');
    // header.style.border = '10px solid black';
    
    //ResultDimension();

    document.getElementById('location').onclick = LocationGoogle;
    document.getElementById('reverse').onclick = ReversePage;
    document.getElementById('secret').onclick = InformationSecret;
    document.getElementById('dimension').onclick = ResultDimension;
    document.querySelector('#counter').onclick = ResultCount;
    document.getElementById('prompt').onclick = ResultPrompt;
    document.getElementById('groovy').onclick = ResultGroovy;
    document.getElementById('table').onclick = ResultTable;
    document.getElementById('x').onchange = ResultX;
    document.getElementById('y').onchange =ResultY;
    document.getElementById('table').onclick = ResultTable;
  
}
function LocationGoogle(){
   location = "https://www.google.com";
}
function ReversePage(){
    window.history.go(-1);
}
function InformationSecret(){
    var info = navigator.userAgent;
    document.getElementById('secret').innerHTML = info;
}
function ResultDimension(){
 
    var x = document.body.clientWidth;
    var y = document.body.clientHeight;
  

    document.getElementById('dimension_Result').innerHTML = "["+x+", "+y+"]"; 
}
function ResultCount(){
    let cnt = document.getElementById("counter").value;
    cnt++;
    document.getElementById("counter").value = cnt;
     alert('Count: '+ cnt);

}
function ResultPrompt(){
    var result = prompt("Please Enter Number: ",5);

    if(isNaN(result)){
        document.getElementById('prompt').innerHTML = "5" ;
    }
    else{

        document.getElementById('prompt').innerHTML = result;
    }

}
function ResultGroovy(){
    var bodyColor = document.getElementById('body_Color');
   bodyColor.style.backgroundColor = 'pink';
   
}
function ResultX(){
    var xValue = document.getElementById('x');
    var xResult = document.getElementById('x_Ans');
 
    xResult.innerHTML = xValue.value;
}
function ResultY(){
    var yValue = document.getElementById('y');
    var yResult = document.getElementById('y_Ans');
    yResult.innerHTML = yValue.value;
}
 function ResultTable(){
    var x = document.getElementById('x').value;
    var y = document.getElementById('y').value;
    
    let text2Add ="";

    for(let i=0; i<x; i++){
        for(let j=0; j<y; j++){
            text2add += "<tr><td>"+x+ "</td></tr>";
            text2add +="<tr><td>"+y+ "</td></tr>";
        }
        document.getElementById('myTable').innerHTML = text2add;

    }


   
 }
    
 
