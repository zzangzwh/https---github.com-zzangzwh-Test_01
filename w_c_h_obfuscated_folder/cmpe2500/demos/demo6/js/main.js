console.log("connected");
document.addEventListener("DOMContentLoaded", (evt)=>{
     getTitles();
console.log("Dom Content loaded")
//     document.querySelector("#filter-btn").addEventListener("click",getTitles);
//     document.querySelector("#create").addEventListener("click",createTitles);
//     document.querySelector("#update").addEventListener("click",updateTitles);

});
function getTitles(){
    let data = {};
    data["filter"] = document.querySelector("#filter").value || "%";
   postForm("/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/demos/demo6/api/service.php",data,SuccessCallBack,errorCallback);
}
function SuccessCallBack(returnData){
    console.log(returnData);
    document.querySelector(".results").innerHTML = returnData;
}
function errorCallback (errorThrown){
    console.log("Failure has ensued" + errorThrown);
    document.querySelector(".error").innerHTML = errorThrown;  
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