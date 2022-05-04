
 console.log("connected");
 document.addEventListener("DOMContentLoaded", (evt)=>{
     getUsers();
    
     console.log("Dom Content loaded")
    // document.querySelector("#user_tbody").addEventListener("click",getTitles);
 
 });
 function getUsers(){
     let data = {};
     data["login"] = document.querySelector("#login").value; 
     postForm(
         "api/title.php",
         data,
         successCallback,
         errorCallback
 
     );
 };
 async function postForm(url,inputData,success,error) {
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
         success(await response.text());
     }catch(err){
         error(err);
     }
 };
 
 function successCallback (returnData) {
     console.log(returnData);
    document.querySelector("#user_TABLE>tbody").innerHTML = returnData;
 
 };
 function errorCallback(errorThrown){
     console.log(returnData);
     document.querySelector("#error").innerHTML = errorThrown;  
 };