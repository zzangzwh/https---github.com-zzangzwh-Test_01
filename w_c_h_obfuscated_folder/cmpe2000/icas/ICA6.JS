window.onload = myOnload;
function myOnload() {
    
    footertext();
    
    var form = document.myForm;
    form.brand.onchange = UpdateBrand;
    
    form.brand_img.setAttribute("src","./images/empty_Motor.jpg");
   
    for(i=0;i<3;i++)
    form.model[i].onclick = UpdateModel; // need to use for loop for radio
    form.ABS.onclick=()=>{
        UpdateStatus();
    }
    form.TCS.onclick=()=>{
        UpdateStatus();
    }
    form.FMM.onclick=()=>{
        UpdateStatus();
    }
    form.downpayment.onchange=()=>{
        UpdateStatus();
    }
    form.onsubmit = Validate;
    UpdateStatus();
}
function ResizeImage(){
    var form = document.myForm;
    var elemStyle = window.getComputedStyle(form.brand);
    var elemHeight = elemStyle.getPropertyValue("height");
    var elemwidth = elemStyle.getPropertyValue("width");
    var myImage = form.querySelector('#brand_img');
    myImage.setAttribute("height",elemHeight);
    myImage.setAttribute("width",elemwidth);
}
function UpdateStatus(){
    ResizeImage();
    var form = document.myForm;
    var str; //= form.totalcost.value;
    var total;
    var optioncount = 0;
    var optioinsum = 0;
    var modelvalue = parseInt(form.model.value).toFixed(2);
    var downpayvalue = parseInt(form.downpayment.value).toFixed(2);
    var balance = 0;
        if(form.ABS.checked){
            optioncount++;
            optioinsum+= parseInt(form.ABS.value);
        }
        if(form.TCS.checked){
            optioncount++;
            optioinsum += parseInt(form.TCS.value);
        }        
        if(form.FMM.checked){
            optioncount++;
            optioinsum += parseInt(form.FMM.value);
        }        
        
        total = parseInt(form.model.value) + parseInt(optioinsum);
        balance = total- parseInt(form.downpayment.value);
    if(form.brand.selectedIndex  == "-1" || form.brand.selectedIndex  == "0")
    {
        str = 'No Brand Selected';
        form.querySelector('#status').value = str;
        return false;
    }
    else if(isNaN(modelvalue) != false)
    {
        str = 'No Model Selected';
        form.querySelector('#status').value = str;
        return false;
    }
    else if(isNaN(downpayvalue) != false){
        str = 'Invalid Downpayment';
        form.querySelector('#status').value = str;
        form.downpayment.focus();
        return false;
    }
    else
    {
    form.totalcost.value = total;
    str = `Selection: ${form.brand.value}: $${modelvalue}: ${optioncount} options selected \n`+ `$${modelvalue} + $${optioinsum.toFixed(2)} - $${downpayvalue} = $${balance.toFixed(2)}`;
    form.querySelector('#status').value = str;
    
    return parseInt(total);
    }
    
}
function UpdateBrand(){
    var form = document.myForm;
    var model = form.model;
    for(i=0;i<3;i++)
    model[i].checked = false;
    UpdateStatus();
}
function UpdateModel(){
    var form = document.myForm;
    var brand = form.brand;
    var model = form.model;
    
    if(this.value < 10000)
    {
        form.ABS.checked = false;
        form.TCS.checked = false;
        form.FMM.checked = false;
    }
    if(brand.value == "")
    form.brand_img.setAttribute("src","./images/empty_Motor.jpg");
    if(brand.value == "Honda")
    switch(model.value){
        case '5000': form.brand_img.setAttribute("src","./images/JapaneseScooter.jpg");
            break;
        case '10000': form.brand_img.setAttribute("src","./images/JapaneseNaked.jpg");
            break;
        case '15000': form.brand_img.setAttribute("src","./images/JapaneseSport.jpg");
            break;
    }
    if(brand.value == "Ducati")
    switch(model.value){
        case '5000': form.brand_img.setAttribute("src","./images/EuroScooter.jpg");
            break;
        case '10000': form.brand_img.setAttribute("src","./images/EuroNaked.jpg");
            break;
        case '15000': form.brand_img.setAttribute("src","./images/EuroSport.jpg");
            break;
    }
    if(brand.value == "Harley")
    switch(model.value){
        case '5000': form.brand_img.setAttribute("src","./images/AmericanScooter.jpg");
            break;
        case '10000': form.brand_img.setAttribute("src","./images/AmericanNaked.jpg");
            break;
        case '15000': form.brand_img.setAttribute("src","./images/AmericanSport.jpg");
            break;
    }
     UpdateStatus();
}
function Validate() {
    var form = document.myForm;
    var downpayment = parseInt(form.downpayment.value);
    if (UpdateStatus() != false) {
        if ((UpdateStatus() / 2) <= downpayment) {
            return true;
        }
        else
            form.querySelector('#status').value += ` Min $${UpdateStatus() / 2}`;
        return false;
    }
    else
        return false;
}
function footertext() {
    var elem = document.querySelector('#Footer');
    elem.innerHTML = "&copy; 2021 by Wonhyuk CHO <br> Last Modified: " + document.lastModified;
    elem.setAttribute("style","text-align:center;");
}