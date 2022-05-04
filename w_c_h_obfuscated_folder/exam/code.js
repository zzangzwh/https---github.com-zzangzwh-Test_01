
let flights = [];
let wsUrl = 'http://api.aviationstack.com/v1/flights';
let access_key = '7dd965c19de13716f2ab619497053686'; // will only work for limited time...
//to make a call with this web service, it would look like this (for yeg and WestJet)
//http://api.aviationstack.com/v1/flights?access_key=7dd965c19de13716f2ab619497053686&dep_iata=yeg&airline_iata=WS

$(document).ready( () =>{
//     $("#Canadian").click( function(){
 
//    $("#airline").prop("value",$("#Canadian").prop("id"));
//     });
//     $("#WestJet").click( function(){
//         $("#airline").prop("value",  $("#WestJet").prop("id"));
//     });
//     $("#Swoop").click(function(){
//         $("#airline").prop("value", $("#Swoop").prop("id"));
//     });
//     $("#AirCanada").click( ()=>{
//         $("#airline").prop("value",$("#AirCanada").prop("id"));
//     });
//     $("#Flair").click( () =>{
//         $("#airline").prop("value",$("#Flair").attr("id"));
//     });
    $("img").each( function(i,x){
        $(x).click( function(){
            $("#airline").prop("value", $(x).prop("id"));
        });
    });
    // $("#yeg").click( ()=>{
    //     $("#departAirport").prop("value",$("#yeg").prop("id"));
    // });
    // $("#yvr").click( ()=>{
    //     $("#departAirport").prop("value", $("#yvr").prop("id"));
    // });
    // $("#yyz").click(function(){
    //     $("#departAirport").prop("value" ,$(this).prop("class"));
    // });
    // $(".airport").click(function(){
    //     $("#departAirport").prop("value",$(this).prop("id"));
    // });
    $(".airport").each(function(i,x){
        $(x).click(function (){
            $("#departAirport").prop("value",$(x).prop("id"));
        });
    });
    $("button").click(function() {
        let from = $("#departAirport").prop("value");
        let airLine = $("#airline").prop("value");
        let iata = $("#"+airLine).prop("alt");
        let getData={};
        getData["access_key"] = '7dd965c19de13716f2ab619497053686';
        getData["dep_iata"] = from;
        getData["airline_iata"] = iata;

        ExamAjax(wsUrl,getData,"GET","json",Success,Error);
    });


});
function ExamAjax(url,postData,type,dataType,Success,Fail){
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
        ajaxOptions['success'] = Success;
        ajaxOptions['error'] = Fail;
        let concorde = $.ajax(ajaxOptions); //doing the AJAX request, non-blocking
        // concorde.done(Success);
        // concorde.fail(Fail);
     
}
function Flight(code, fromCode, fromCity, toCode, toCity,airline)
{
    this.FlightNumber = code;
    this.Airline = airline;
    this.DepartAirport = fromCode;
    this.DepartCity = fromCity;
    this.ArriveAirport = toCode;
    this.ArriveCity = toCity;

    this.DisplayMe = () => {
        // console.log("work");
        // let myTable = $("#" + this.DepartAirport.toLowerCase()+">figure>table");
        // let newRow = document.createElement("tr");

        // let newCol = document.createElement("td");
        // let theText = document.createTextNode(this.FlightNumber);
        // newCol.appendChild(theText);
        // newRow.appendChild(newCol);

        // newCol = document.createElement("td");
        // theText = document.createTextNode(this.Airline);
        // newCol.appendChild(theText);
        // newRow.appendChild(newCol);

        // newCol = document.createElement("td");
        // newtext = document.createTextNode(`${this.ArriveCity} ${this.ArriveAirport.toUpperCase()}`);
        // newCol.appendChild(theText);
        // newRow.appendChild(newCol);
        // myTable.append(newRow);
        let myTable = $(`#${this.DepartAirport.toLowerCase()}>figure>table`);
        // console.log(theSpot);
        let newrow = document.createElement('tr');
        // flihgt number
        let newcol = document.createElement('td');
        let newtext = document.createTextNode(this.FlightNumber);
        $(newcol).append(newtext);
        $(newrow).append(newcol);
        // airline
        newcol = document.createElement('td');
        newtext = document.createTextNode(this.Airline);
        $(newcol).append(newtext);
        $(newrow).append(newcol);
        // destination
        newcol = document.createElement('td');
        newtext = document.createTextNode(`${this.ArriveCity} ${this.ArriveAirport.toUpperCase()}`);
        $(newcol).append(newtext);
        $(newrow).append(newcol);
        myTable.append(newrow);
    };
}
function Success(ajaxData)
{
  console.log(ajaxData);
    let flightCode, fromCode, fromCity, toCode, toCity, airline;

    let flightData = ajaxData['data'];
    for(let flightInfo in flightData){
     //   flightCode = flightData[flightInfo]['flight']['iata'];
    // ajaxData['data'].forEach((flight,i)=>{
        flightCode = flightData[flightInfo]['flight']['iata'];
        console.log(flightCode);
        fromCode = flightData[flightInfo]['departure']['iata'];
        fromCity = flightData[flightInfo]['departure']['airport'];
        toCode = flightData[flightInfo]['arrival']['iata'];
        toCity = flightData[flightInfo]['arrival']['airport'];
        airline = flightData[flightInfo]['airline']['name'];
        

        let newFlight = new Flight(flightCode, fromCode, fromCity, toCode, toCity, airline);
        flights.push(newFlight);
        newFlight.DisplayMe();
    };
    //add the response to our webpage!!
    // ForEachDance(ajaxData);
   // $("#SmartDump").html(ajaxData);
 }
// responseData will be in the form requested by dataType option : json !!! not html

function Error(ajaxReq, textStatus, errorThrown)
{
    console.log('Error : ' + ajaxReq + ' : ' + textStatus + ' : ' +
      errorThrown);
}