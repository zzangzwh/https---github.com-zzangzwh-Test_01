let preload;
var i = 0;
let timerID = 0;
var running = false;
var interval;
//var viewCount =0;

// var nameArray = ["Paragon","karma","Whale","Goat","Camel"];
// var myArray = [];
function PicFrame(imageFile,cnt){
    this.imageFile = imageFile;
    this.cnt = cnt;
    this.viewCount = 0;
    
}
var images =[];
images.push(new PicFrame('band1_paragon.jpg',"Pargon"));
images.push(new PicFrame('band2_karma.jpg',"Karama"));
images.push(new PicFrame('band3_brown.jpg',"Brown"));
images.push(new PicFrame('band4_run.jpg',"Run"));
images.push(new PicFrame('band5_royalty.jpg',"Royalty"));

console.log(images);

window.onload = function Finit(){

        document.querySelector('#section_img').src="./images/" +images[0].imageFile;
        document.querySelector('#lbl_Result').innerHTML = images[i].cnt;

        document.querySelector('#right_btn').onclick = FNext;
        document.querySelector("#left_btn").onclick = FPrev;
        document.querySelector("#load_btn").onclick = FAuto;
}
function FAuto()
{
    if(running){        
        clearInterval(interval);   
       document.querySelector("#load_btn").value = "START";

    }
    else  {
        interval= setInterval(FNext,500);
        document.querySelector("#load_btn").value = "STOP";
    }      
    
    running = !running;

}
 function FNext()
 {
    i = (i+1)%5;
 
    return ShowPic();
 }
 function FPrev(){
 
   i = (((i-1)%5)+5)%5;
  
   
  return ShowPic();
}


function ShowPic(){
    document.querySelector('#section_img').src= "./images/" +images[i].imageFile;
  images[i].viewCount = images[i].viewCount+1;
    var count = images[i].viewCount;
    document.querySelector('#lbl_Result').innerHTML ="Name :" + images[i].cnt + " Count : "+ count;
 
}

