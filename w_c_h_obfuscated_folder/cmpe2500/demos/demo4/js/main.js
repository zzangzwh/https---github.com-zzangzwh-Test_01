
 console.log("connected");
document.addEventListener("DOMContentLoaded", (evt)=>{
    getTitles();
   // console.log("Dom Content loaded")
    document.querySelector("#filter-btn").addEventListener("click",getTitles);
    document.querySelector("#create").addEventListener("click",createTitles);
    document.querySelector("#update").addEventListener("click",updateTitles);

});
const ENDPOINT =   "/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/demos/demo4/api/titles.php";
function getTitles(){
    let data = {};
    data["filter"] = document.querySelector("#filter").value || "%";  
    postForm(
        "/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/demos/demo4/api/titles.php",
        data,
        readCallback,
        errorCallback

    ); 
};
function updateTitles (){

    console.log("create Clicked!");

    let data = {};
    //grab the new title and price
    data["title-id"] = document.querySelector("#title-id").value; 
    data["title"] = document.querySelector("#title").value; 
    data["price"] = document.querySelector("#price").value; 
    data["update"] = "update"; 
    postForm(ENDPOINT,data,updateCallback,errorCallback);
}
function createTitles(){

    console.log("create Clicked!");

    let data = {};
    //grab the new title and price
    data["title"] = document.querySelector("#title").value; 
    data["price"] = document.querySelector("#price").value; 
    data["create"] = "create"; 
    postForm(ENDPOINT, data,createCallback, errorCallback);
}
function createTitle(returnData){
    console.log("New Title Created,ID:" +returnData);
    getTitles();
}
const postForm = async (url,inputData,SuccessCallBack,errorCallback) => {
    //build
    let formData = new FormData ();
    for(const  [key,value] of Object.entries(inputData)){
        console.log(`${key}: ${value}`);
        formData.append(key,value);
    }
    let options = {};
    options["method"] = "post";
    options["body"] = formData;
    
    try{
        const response = await fetch(url,options);
        if(response.status ==500){
            throw new Error(await response.text());
        }
        SuccessCallBack(await response.text());
    }catch(err){
        errorCallback(err);
    }
}
function updateCallback(returnData) {
    console.log("Updated Titles:" +returnData);
    getTitles();

}
function createCallback(returndData){
    console.log("New Title, TD Created"+returndData);
   // document.querySelector(".results").innerHTML = returndData;
   getTitles();

}
function readCallback(returnData){
    console.log(returnData);
    document.querySelector(".results").innerHTML = returnData ;

}
function SuccessCallBack(returnData){
    console.log(returnData);
    document.querySelector(".results").innerHTML = returnData;
}
function errorCallback (errorThrown){
    console.log("Failure has ensued" + errorThrown);
    document.querySelector(".error").innerHTML = errorThrown;  
}