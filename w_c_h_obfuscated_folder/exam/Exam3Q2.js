let Scores = [];
let Nums = [];
let num =0;
$(document).ready( function(){
    // $("#Btn_Post").text("Post To Make"+ col +"X"+row+ "Table");
    for (let index=1; index <2; index++){
        //Math.floor(Math.random() *21)
      
        Scores.push(Math.floor(Math.random() *21));
    }
    $('#random1').html(Scores);

     $("#showButton").click ( () =>{
    //  let  myUrl =  "https://thor.net.nait.ca/~oveeyenm/LabExams3Winter2021/Exam3Q2.php";
        
      for (let index=1; index <21; index++){
        //Math.floor(Math.random() *21)
        Scores.push(Math.floor(Math.random() *21));
         $('#initialSet1').html( Scores+"," );
    }
    for (let index=1; index <21; index++){
        //Math.floor(Math.random() *21)
        Scores.push(Math.floor(Math.random() *21));
         $('#initialSet2').html( Scores+"," );
    }

    if($("#operationLevel").val() == 0){
        num =0;
    }
    else if($("#operationLevel").val() == 1){
        num =1;
    }  
    else if($("#operationLevel").val() == 2)
    {
        num =2;
    }

    $("#fetchResButton").click ( () =>{

        let myUrl = "https://thor.net.nait.ca/~oveeyenm/LabExams3Winter2021/Exam3Q2.php";
     let getData ={};
         getData["set1"] =  $('#initialSet1').val();
         getData["set2"] =  $('#initialSet2').val();
         getData["lavel"] =$("#operationLevel").val();
    
        
         $.ajax({
             url: myUrl,
             data:getData,
             type:'POST',
             datatype:'json',
             success: getSuccess,
             error: Errors
         });
     });
    });
});
    
    //  $("#fetchResButton").click ( () =>{

 
 function getSuccess(ajaxData, responseStatus)
 {
     console.log('GetSuccess: ' + ajaxData + ': ' + responseStatus);
     //add the response to our webpage!!
     let target = $('#obtainedValues1');
     target.html(ajaxData);
 
 }
 
 function Errors(ajaxReq, textStatus, errorThrown)
 {
     console.log('Error : ' + ajaxReq + ' : ' + textStatus + ' : ' +
       errorThrown);
       alert('Error : ' + ajaxReq + ' : ' + textStatus + ' : ' +
       errorThrown);
 }
 