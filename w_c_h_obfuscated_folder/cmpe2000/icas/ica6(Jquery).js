/*var iAlertNum = 0;

function GoToGoogle()
{
    window.location.href = 'http://www.google.ca';
} */

function UpdateImage()
{
    let imgUrl = "./images/";
    switch (document.myForm.motoType.value)
    {
        case "Honda":
            imgUrl += "Japanese";
            break;
        case "Aprilia":
            imgUrl += "Euro";
            break;
        case "Harley":
            imgUrl += "American";
            break;
        default:
            imgUrl = "./images/ghostbikes.jpg";
            break;
    }

    switch (document.myForm.model.value)
    {
        case "5000":
            imgUrl += "Scooter.jpg";
            break;
        case "10000":
            imgUrl += "Naked.jpg";
            break;
        case "15000":
            imgUrl += "Sport.jpg";
            break;
        default:
            imgUrl = "./images/ghostbikes.jpg"
            break;    
    }

    // let img = document.querySelector("#thePic");
    // img.src = imgUrl;
    // let cs = window.getComputedStyle(document.querySelector("[name=motoType]"));
    // img.style.height = cs.height;

    let img = $("#thePic");
    img.hide("blind",() =>{

        img.prop("src",imgUrl);

        img.css("height", $("motoType").css("height"));
        img.show("puff");
    });
    //now shw new image


}

function UpdateStatus()
{
    //updates the status displayed to the user

    //if downpayment is NaN, output "Invalid Downpayment"
    //put focus on Prepayment and highlight the bad input
    if (isNaN(parseFloat(document.myForm.downpayment.value)))
    {
       $("#feedback").html( "Invalid Downpayment");
        // document.myForm.downpayment.focus();
        // document.myForm.downpayment.select();
        $("[name = downpayment]").focus();
       // $("[name = downpayment]").select();
        return false;
    }
    //If no brand is selected (selectedIndex) output "No Brand Selected"
    if ($("[name=motoType]").prop("selectedIndex") == 0) //because defaulted, only check 0 otherwise also check -1
    {
        $("#feedback").html("No Brand Selected"); 
        return false;
    }

    //if no model is selected, output "No Model Selected"
    if ($("[name=model]:checked").val() == "")
    {
        $("#feedback").html("No Model Selected"); 
        return false;
    }

    //otherwise build output string:
    //"Selection: BRAND: $MODELVALUE: N options selected
    //$MODELVALUE + $OPTIONSUM - $DOWNPAYMENT = $BALANCE"
    var outputString = "Selection: " + document.getElementById("motoType").value;
    outputString += ": $" + parseFloat(document.myForm.model.value).toFixed(2);

    //find how many checkboxes are checked
   // var inputElements = document.getElementsByTagName("input");
    var numOptions = 0;
    var sumOptions = 0;
    // [...inputElements].forEach( function(inp) {
    //     if (inp.type == "checkbox" && inp.checked == true)
    //     {
    //         numOptions++;
    //         sumOptions += parseFloat(inp.value);
    //     }
    // })
    $("[type=checkbox]:checked").each( (i,inp) =>{
        numOptions ++;
        sumOptions += parseFloat(inp.value);

    });
     

    outputString += ": " + numOptions + " options selected<br>";
    outputString += "$" + parseFloat(document.myForm.model.value).toFixed(2) + " + $" + parseFloat(sumOptions).toFixed(2);
    outputString += " - $" + parseFloat(document.myForm.downpayment.value).toFixed(2) + " = $";

    var theSum = parseFloat(document.myForm.model.value) + parseFloat(sumOptions) - parseFloat(document.myForm.downpayment.value);

    outputString += theSum.toFixed(2);
    document.getElementById("feedback").innerHTML = outputString;
    UpdateImage();

    return Number(document.myForm.model.value) + Number(sumOptions) - Number(document.myForm.downpayment.value);
}

function UpdateBrand()
{
    //fires when Moto Brand is changed
    //unchecks all Model radio buttons
    var radioButtons = document.getElementsByName("model");
    for (var i=0; i < radioButtons.length; i++)
        radioButtons[i].checked = false;
    
    //and calls UpdateStatus()
    UpdateStatus();
}

function UpdateModel()
{
    //fires when a radio button is clicked
    //unchecks all the option checkboxes if the current radio button value (this)
    //is less than 10000
    if (this.value < 10000)
    {
        //uncheck the option checkboxes
        //ABS, TCS, FMM
        
        // document.myForm.ABS.checked = false;
        // document.getElementsByName("TCS")[0].checked = false;
        // document.getElementsByName("FMM")[0].checked = false;
        $("[type=checkbox]:checked").each((i,inp)=>{
            inp.checked = false;
        });
         
    }
    //then UpdateStatus
    UpdateStatus();
}

function Validate()
{
    let returnVal = UpdateStatus();

    if (!returnVal) return false;

    //only let the form submit if the downpayment is at least half the total cost
    //if not, append to status message (Min $MinValue), set focus and select downpayment
    //total cost = returnVal + downpayment
    let downPayment = Number(document.myForm.downpayment.value);
    let totalCost = Number(returnVal) + downPayment;

    if ((totalCost / 2) > downPayment)
    {
        document.getElementById("feedback").innerHTML += " Min $" + (totalCost/2).toFixed(2);
        document.myForm.downpayment.focus();
        document.myForm.downpayment.select();
        return false;
    }

    //otherwise set the total cost into the hidden field and submit
    document.myForm.total.value = totalCost;
    return true;
}


/* Main section */
window.onload = function() {
    //document.myForm.btnRedirect.onclick = GoToGoogle;
    document.myForm.motoType.onchange = UpdateBrand;
    /*var radioButtons = document.getElementsByName("model");
    for (var i=0; i < radioButtons.length; i++)
        radioButtons[i].onclick = UpdateModel;*/
    //equivalent method:
    document.myForm.model.forEach(function(but) {but.onclick = UpdateModel;}); //Updates Model whenever a radiobutton is updated
    document.myForm.ABS.onclick = UpdateStatus;
    document.getElementsByName("TCS")[0].onclick = UpdateStatus;
    document.getElementsByName("FMM")[0].onclick = UpdateStatus; //**Why does Herb use anonymous method here? */
    document.myForm.downpayment.onchange = UpdateStatus;
    document.myForm.onsubmit = Validate;
    UpdateStatus();
    UpdateImage();
}