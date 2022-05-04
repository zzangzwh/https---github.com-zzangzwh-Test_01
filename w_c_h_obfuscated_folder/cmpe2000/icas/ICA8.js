var nameArray = ["Fennec Fox","Cheetah","Whale","Goat","Camel"];
var myArray = [];
var currentPicIndex = 0;
var auto = false;
var timerID = 0;
var opacity =0;
var intervalID =0;
let num=0;
var PicFrame = function(name,num){
    this.displayName = name;
    this.viewCount = 0;
    var pathname = "images/";
    var imagename = pathname + "pic_" + num + ".jpg"; 
    this.image = new Image();
    this.image.src = imagename;
}

// window.onload=function(){
$(function(){

    fInit();
    showPic();
    footertext();
    $("#next_btn").click(function(){
        FNext();
    });

    $("#previous_btn").click(function(){    
        FPrev();
    }); 
        
    $("#puase_play_btn").click(function (){
        FAuto();
    }); 
  

 
});

function fInit(){
    for(i=0;i<nameArray.length;i++){
        var picture = new PicFrame(nameArray[i],i+1);
        myArray.push(picture);
    }
}
function showPic(){
    
   
            if($("#radio1").prop("checked")){
                num=300;
            }
            else if($("#radio2").prop("checked")){
                num=900;
            }
            else if($("#radio3").prop("checked")){
                num=2000;
            }
      
        if($('#fadeOut').prop('selected'))
        {
           $('#main_image').fadeOut(function(){
               $('#main_image').prop("src",myArray[currentPicIndex].image.src).fadeIn(num);
           });
           myArray[currentPicIndex].viewCount = myArray[currentPicIndex].viewCount + 1;
           var count = myArray[currentPicIndex].viewCount;
           
           var elem2 = $("#lbl_image_desc");
           elem2.html("Name: "+myArray[currentPicIndex].displayName + ", View count:" + count);  
           
        }
        else{
            //noaffect
            var elem = $("#main_image");
            elem.prop("src",myArray[currentPicIndex].image.src);
        
            myArray[currentPicIndex].viewCount = myArray[currentPicIndex].viewCount + 1;
            var count = myArray[currentPicIndex].viewCount;
            
            var elem2 = $("#lbl_image_desc");
            elem2.html("Name: "+myArray[currentPicIndex].displayName + ", View count:" + count);  

        }
  
 
}
function FNext(){
    currentPicIndex = (currentPicIndex+1)%5;
    showPic();
}
function FPrev(){
    currentPicIndex = (((currentPicIndex-1)%5)+5)%5;
    showPic();
}
function FAuto(){

    if($("#radio1").prop("checked")){
        num=300;
    }
    else if($("#radio2").prop("checked")){
        num=900;
    }
    else if($("#radio3").prop("checked")){
        num=2000;
    }
    if(auto == false)
    {
    auto = true;
    timerID = setInterval(FNext,num*2+500);
    }
    else
    {
    auto = false;
    clearInterval(timerID);
    }
}
function footertext() {
    var elem = $("#Footer");

    elem.html("&copy; 2021 by Wonhyuk Cho<br> Last Modified: " + document.lastModified);

    elem.attr("style","text-align:center;");
}