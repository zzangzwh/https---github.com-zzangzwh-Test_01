
// $(document).ready( () => {
//     $('#butIntel').click( function(){

//        let triviaURL = "https://opentdb.com/api.php";
        
//        let getData ={};
//        getData['amount'] = 10;
//        getData['category'] =28;
//        getData['type'] = "multiple";
       
        
//        GroguAJAX(triviaURL,getdata,"GET","json",getSuccess,Error);
//     });
// });

$(document).ready( () =>{
    $("#butIntel").click( function(){
        let triviaUrl = "https://opentdb.com/api.php";

        let getData = {};
        getData["amount"] = 10;
        getData["category"] = 28;
        getData["type"] = "multiple";

        GroguAJAX( triviaUrl,getData,"GET","json",getSuccess,Error);
    });
    $("#butPlay").click(function() {
        let numQs = $("#HowMany").val();

        let triviaUrl = "https://opentdb.com/api.php";

        let getData = {};
        getData["amount"] = numQs;
        getData["category"] = 28;
        getData["type"] = "multiple";
        GroguAJAX( triviaUrl,getData,"GET","json",TriviaGenerator,Error);
    });
});



function GroguAJAX(url, postData, type, dataType, fxnSuccess, fxnError)
{
    let ajaxOptions = {}; //init options object
        //AJAX! This the minimum set of properties to send
        //url - where to send the request
        //type - GET(select)/POST(update)/PUT(insert)/DELETE(delete) -> this is a REST interface
        //type DEFAULTS to GET
        //data - what data are we sending? MUST MATCH WEB SERVICE SPEC
        //dataType - what response do we want back from the WS? html/json/xml
        //success - callback for successful completion
        //error - callback for error in operation
        ajaxOptions['url'] = url;
        ajaxOptions['data'] = postData;
        ajaxOptions['type'] = type;
        ajaxOptions['dataType'] = dataType;
        /*ajaxOptions['success'] = fxnSuccess;
        ajaxOptions['error'] = fxnError;*/
        let concorde = $.ajax(ajaxOptions); //doing the AJAX request, non-blocking
        concorde.done(fxnSuccess);
        concorde.fail(fxnError);
     
} 
function ForEachDance(where,object){
    //recursive
    //where it is jqery object
    let ul = document.createElement('ul');
    where.append(ul);

    for(let item in object){
        //create li for item 
        let li = document.createElement('li');
        let tn = document.createTextNode(item);
        li.appendChild(tn);
        ul.appendChild(li); 

        if(typeof(object[item]) =="object")
        ForEachDance($(li),object[item]);
        else{
            console.log(object[item]);
            let li2 = document.createElement('li');
            let tn2 = document.createTextNode(object[item]);
            li2.appendChild(tn2);
            li.appendChild(li2);


        }
       
    }
}
function TriviaGenerator(ajaxData){
    console.log(ajaxData);
    //$("#Display").html(ajaxData);
    //make section for each question

  //  let question = ajaxData['results'];
    let parent = $("#Display");

    for(let q in  ajaxData['results'] ){
        let qS = document.createElement("section");
        $(qS).append( ajaxData['results'][q]['question'] +"<br>");
       
        //correct answer  : ajaxData["results"][q]["correct_answer"]
           //incorrect answer  : ajaxData["results"][q]["incorrect_answer"][0]
        //now put in the answer
        let rbCorrect = document.createElement("input");
        rbCorrect.setAttribute("type","radio");
        rbCorrect.setAttribute("name","q"+q);

        rbCorrect.setAttribute("id","correct"+ q);
        let labelCoorecst = document.createElement("label");
        labelCoorecst.setAttribute("for","correct"+q);
        $(labelCoorecst).append(ajaxData["results"][q]["correct_answer"]);
       

        let randomSpot = Math.floor(Math.random() *ajaxData["results"][q]["incorrect_answers"].length );


        //different way
       for(let i =0; i < ajaxData["results"][q]["incorrect_answers"].length; i++) {
           if(i ===randomSpot){
            $(qS).append(labelCoorecst);
            $(qS).append(rbCorrect);
            $(rbCorrect).click(() =>{
                alert("correct!");
            });
            parent.append(qS);
           }
        let rbInCorrect = document.createElement("input");
        rbInCorrect.setAttribute("type","radio");
        rbInCorrect.setAttribute("name","q"+q);

        rbInCorrect.setAttribute("id","incorrect"+ q +i);
        let labelInCoorecst = document.createElement("label");
        labelInCoorecst.setAttribute("for","incorrect"+q +i);
        $(labelInCoorecst).append(ajaxData["results"][q]["incorrect_answers"][i]);
        $(qS).append(labelInCoorecst);
        $(qS).append(rbInCorrect);

        $(rbInCorrect).click(() =>{
            alert("incorrect!");
        });
        parent.append(qS);
       }
       
       
     

    }


}

function getSuccess(ajaxData)
{
    console.log(ajaxData );
    
    //add the response to our webpage!!
    ForEachDance($("#SmartDump"),ajaxData)
   
   // $("#SmartDump").html(ajaxData);
 }

function Error(ajaxReq, textStatus, errorThrown)
{
    console.log('Error : ' + ajaxReq + ' : ' + textStatus + ' : ' +
      errorThrown);
}