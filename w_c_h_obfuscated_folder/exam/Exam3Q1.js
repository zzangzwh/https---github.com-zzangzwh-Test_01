let PicArray=["./images/Nait.jpg", "./images/Banff.jpg",
               "./images/jasper.jpg", "./images/lakeLouise.jpg","./images/Lethbridge.jpg"];


        $(document).ready( () => {
                //clicking airline symbol populates airline textbox
           if($("#firstSelect").val() == "0"){
               var img1 = $("#picture1");
               img1.attr("src","./images/Nait.jpg");
           }
         if($("#firstSelect").val() == "1"){
            var img1 = $("#picture1");
            img1.attr("src","./images/Banff.jpg");
         }
         if($("#firstSelect").val() ==2){
            var img1 = $("#picture1");
            img1.attr("src", "./images/jasper.jpg");
         }
         if($("#firstSelect").val() ==3){
            var img1 = $("#picture1");
            img1.attr("src","./images/lakeLouise.jpg");
         }
         if($("#firstSelect").val() ==3){
            var img1 = $("#picture1");
            img1.attr("src","./images/Lethbridge.jpg");
         }


         if($("#secondQuadrant").val() == "0"){
            var img1 = $("#picture2");
            img1.attr("src","./images/Nait.jpg");
        }
      if($("#secondQuadran").val() == "1"){
         var img1 = $("#picture2");
         img1.attr("src","./images/Banff.jpg");
      }
      if($("#secondQuadran").val() ==2){
         var img1 = $("#picture2");
         img1.attr("src", "./images/jasper.jpg");
      }
      if($("#secondQuadran").val() ==3){
         var img1 = $("#picture2");
         img1.attr("src","./images/lakeLouise.jpg");
      }
      if($("#secondQuadran").val() ==3){
         var img1 = $("#picture2");
         img1.attr("src","./images/Lethbridge.jpg");
      }
          





      
      if($("#thirdSelect").val() == "0"){
        var img1 = $("#picture3");
        img1.attr("src","./images/Nait.jpg");
    }
  if($("#thirdSelect").val() == "1"){
     var img1 = $("#picture3");
     img1.attr("src","./images/Banff.jpg");
  }
  if($("#thirdSelect").val() ==2){
     var img1 = $("#picture3");
     img1.attr("src", "./images/jasper.jpg");
  }
  if($("#thirdSelect").val() ==3){
     var img1 = $("#picture3");
     img1.attr("src","./images/lakeLouise.jpg");
  }
  if($("#thirdSelect").val() ==3){
     var img1 = $("#picture3");
     img1.attr("src","./images/Lethbridge.jpg");
  }


  if($("#fourthSelect").val() == "0"){
    var img1 = $("#picture4");
    img1.attr("src","./images/Nait.jpg");
}
if($("#fourthSelect").val() == "1"){
 var img1 = $("#picture4");
 img1.attr("src","./images/Banff.jpg");
}
if($("#fourthSelect").val() ==2){
 var img1 = $("#picture4");
 img1.attr("src", "./images/jasper.jpg");
}
if($("#fourthSelect").val() ==3){
 var img1 = $("#picture4");
 img1.attr("src","./images/lakeLouise.jpg");
}
if($("#fourthSelect").val() ==3){
 var img1 = $("#picture4");
 img1.attr("src","./images/Lethbridge.jpg");
}




        
        });