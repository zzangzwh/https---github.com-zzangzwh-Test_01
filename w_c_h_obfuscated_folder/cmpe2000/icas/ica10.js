let Result = [];

$(document).ready(function (){
    var select = [
        {"value": "Honda", "text": "Honda"},
        {"value": "Toyota", "text": "Toyota"},
        {"value": "BMW", "text": "BMW" },
        {"value": "Suzuki", "text": "Suzuki"},
        {"value": "Yamaha", "text": "Yamaha"}
    ];

    var manu = $( "#brands" );
  manu.append('<label for="brand_list">ManuFacturer  </label>');
  var selectName = $("<select></select>").attr("id", "brand_list").attr("size", "5");
           $.each(select,function(index,select){
            selectName.append($("<option></option>").attr("value", select.value).text(select.text));
           });  
           $( "#brands" ).append(selectName);
    


        var selectYears = [
            {"value": "1990", "text": "1990" },
            {"value": "2000", "text": "2000" },
            {"value": "2001", "text": "2001" },
            {"value": "2002", "text": "2002" },
            {"value": "2003", "text": "2003" },
            {"value": "2004", "text": "2004" },
            {"value": "2005", "text": "2005" },
            {"value": "2006", "text": "2006" },
            {"value": "2007", "text": "2007" },
            {"value": "2008", "text": "2008" },
            {"value": "2009", "text": "2009" },
            {"value": "2010", "text": "2010" },
            {"value": "2011", "text": "2011" },
            {"value": "2012", "text": "2012" },
            {"value": "2013", "text": "2013" },
            {"value": "2014", "text": "2014" },
            {"value": "2015", "text": "2015" },
            {"value": "2016", "text": "2016" },
            {"value": "2017", "text": "2017" }
        ];

  var year = $("#year");
          year.append("<label for='year_list'>   Year   </label>");
          
           var yearList = $("<select></select>").attr("id", "year_list");
           $.each(selectYears,function(i,selectYears){
            yearList.append($("<option></option>").attr("value", selectYears.value).text(selectYears.text));
           });  
           $("#year").append(yearList);
            
      
    var vehicleYear = [
        {"value": "Car", "text": "Car" },
        {"value": "Truck", "text": "Truck" },
        {"value": "Motorcycle", "text": "Motorcycle" },
        {"value": "mpv", "text": "mpv" }

    ];

    var vehicle = $( "#vehicles" );
    vehicle.append('<label for="vehicle_list"> Type  </label>');
    var selectVehicle = $("<select></select>").attr("id", "vehicle_list");
       $.each(vehicleYear,function(index,vehicleYear){
        selectVehicle.append($("<option></option>").attr("value", vehicleYear.value).text(vehicleYear.text));
       });  
       $("#vehicles").append(selectVehicle);
       
       $("#Btn").click(()=>{

           let vehicleValue = $("#vehicle_list").val();
        let brandValue = $("#brand_list").val();
        let yearValue = $("#year_list").val();
            let getData = {};
           getData['format'] = 'json';
      
        let suburl = '/GetModelsForMakeYear/make/'+ brandValue +'/modelyear/'+ yearValue +'/vehicletype/'+vehicleValue;
        let base = '//vpic.nhtsa.dot.gov/api/vehicles/';
        let myURL = base + suburl;

        $.ajax({url: myURL,data:getData,type:'GET',datatype:'json',success: PopulateModels,error:ErrorHandler});
       });
    
       
       
});

function PopulateModels(responseData){
    console.log(responseData); 
    let target =  $("#divInput");
    let count = responseData['Count'];
    let message =responseData['Message'];
    let SearchCriteria = responseData['SearchCriteria'];
    var textDiv = $("#textId");
    target.html("");

 textDiv.html("for Search: "+ count + "<br>"+message + "<br> "+SearchCriteria);


    for(let r in responseData['Results']){
        let rS = document.createElement("div");
        rS.setAttribute("id","resultId");
        $(rS).append( responseData['Results'][r] );

        let rbCorrect = document.createElement("input");
        rbCorrect.setAttribute("type","radio");
        rbCorrect.setAttribute("name","r");
       
        let labelRb = document.createElement("label");
        labelRb.append( responseData['Results'][r]['Model_Name']);
        $(rS).append(rbCorrect);
        $(rS).append(labelRb);
  
        target.append(rS);
      
    }
   

}

function ErrorHandler(ajaxReq, textStatus, errorThrown)
{
    console.log( 'jsonError' + textStatus + " : " + errorThrown );
    // reset UI if necessary, alert user, other stuff...
}