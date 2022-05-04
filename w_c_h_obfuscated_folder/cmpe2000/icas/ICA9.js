$(document).ready( () =>{
    let Scores = [];
    let row = $("#RowCount").val();
    let col = $("#ColCount").val();
   // $("#Btn_Post").text("Post To Make"+ col +"X"+row+ "Table");
  
    $("#Btn_Call").click( () =>{
         let name = $("#Name_Text").val();
         let hobby = $("#Hobby_Text").val();
         let howMuch = $("#Range").val();
  
         let postData ={};
         postData["Name"] = name;
         postData["Hobby"] = hobby;
         postData["HowMuch"] = howMuch;
        
 
        let url = "/~demo/cmpe2000/ica_Hobby.php";

       
        ResultAjax(url,postData,"GET","html",getSuccess,Error);
    });

    $("#Btn_Post").click( () =>{
         row = $("#RowCount").val();
         col = $("#ColCount").val();
      $("#Btn_Post").text("Post To Make"+ col +"X"+row+ "Table");
     
   
        let postData2  = {};
        postData2["RowCount"] = row;
        postData2["ColumnCount"] = col;
        let url = "/~demo/cmpe2000/ica_Table.php";
     

        ResultAjax(url,postData2,"POST","html",TableSuccess,Error);
        
    });
    $("#Btn_GS").click( () =>{
     
        for (let index=1; index <21; index++){
            //Math.floor(Math.random() *21)
            Scores.push(Math.floor(Math.random() *21));
        }
        $('#Div_Empty3').html(Scores+"," );
  
    });
    $("#Btn_PS").click( () =>{
      
        let getData ={};
        getData["Numbers"] =Scores ;
        let url = " /~demo/cmpe2000/ica_Numbers.php";
        ResultAjax(url,getData,"POST","html",NumberSuccess,Error);
    });
    $("#Btn_Fail").click ( () =>{

    let getData ={};
        getData["Numbers"] =Scores ;
        let url = " /~demo/cmpe2000/ica_Numbers.phpFail";
       
        ResultAjax(url,getData,"POST","html",NumberSuccess,Error);
    });
});
function ResultAjax(url,postData,type,dataType,fxnSuccess,fxnError){
    let ajaxOption = {};

    ajaxOption["url"] = url;
    ajaxOption["data"] =postData;
    ajaxOption["type"] = type
    ajaxOption["dataType"] = dataType;
    // ajaxOption['success'] = getSuccess;
    // ajaxOption['error'] = Error;

    let concorde = $.ajax(ajaxOption); //doing the AJAX request, non-blocking
     concorde.done(fxnSuccess);
    concorde.fail(fxnError);
    concorde.always(alwaysDoThis);
}
function alwaysDoThis(){
    console.log("Console has been activated");
}
function NumberSuccess(ajaxData, responseStatus)
{
    console.log('GetSuccess: ' + ajaxData + ': ' + responseStatus);
    //add the response to our webpage!!
    let target = $('#Div_Empty4');
    target.html(ajaxData);

}
function TableSuccess(ajaxData, responseStatus)
{
    console.log('GetSuccess: ' + ajaxData + ': ' + responseStatus);
    //add the response to our webpage!!
    let target = $('#Div_Empty2');
    target.html(ajaxData);

}

function getSuccess(ajaxData, responseStatus)
{
    console.log('GetSuccess: ' + ajaxData + ': ' + responseStatus);
    //add the response to our webpage!!
    let target = $('#L_Empty');
    target.html(ajaxData);

}

function Error(ajaxReq, textStatus, errorThrown)
{
    console.log('Error : ' + ajaxReq + ' : ' + textStatus + ' : ' +
      errorThrown);
      alert('Error : ' + ajaxReq + ' : ' + textStatus + ' : ' +
      errorThrown);
}

