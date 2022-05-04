$(document).ready( function(){

   // $("#Btn_Post").text("Post To Make"+ col +"X"+row+ "Table");
   
    $("#addJokeButton").click ( () =>{
        
        let myUrl = "https://icanhazdadjoke.com/search";
        let numV = $("#pageNum").val();
        let termV = $("#search").val()
        let rangeV = $("#limitValue").val();

        let getData ={};
        getData["page"] =numV ;
        getData["term"] = termV;
        getData["limit"] =rangeV;
       
        $.ajax({
            url: myUrl,
            data:getData,
            type:'GET',
            datatype:'json',
            success: getSuccess,
            error: Errors
        });
    });
});



function getSuccess(ajaxData, responseStatus)
{
    console.log('GetSuccess: ' + ajaxData + ': ' + responseStatus);
    //add the response to our webpage!!
    let target = $('#joke');
    target.html(ajaxData);

}

function Errors(ajaxReq, textStatus, errorThrown)
{
    console.log('Error : ' + ajaxReq + ' : ' + textStatus + ' : ' +
      errorThrown);
      alert('Error : ' + ajaxReq + ' : ' + textStatus + ' : ' +
      errorThrown);
}


