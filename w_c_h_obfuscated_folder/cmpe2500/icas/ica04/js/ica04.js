
 console.log("connected");
 
 document.addEventListener("DOMContentLoaded", (evt)=>{
     getUsers();
   //  gerUserResult();
     console.log("Dom Content loaded");
     document.querySelector("#loginUser").addEventListener("click",updateUsers);
    
    var bttn;
 
 });
 function getID(btn){
     
     bttn = btn.id;
   //  alert(btn.id);
   deleteUser();
 }
 function deleteUser()
 {
     alert("delete");
     console.log("delete Clicked");
     let data = {};
     data["userID"] = document.querySelector(`#${bttn}`).value; 
     data["username"] = document.querySelector("#username").value; 
     data["password"] = document.querySelector("#password").value;
     data["delete-btn"] = "delete-btn";
     postForm("api/title.php",data,DeleteUser,errorCallback);
    //  alert(fsdfds);
 } 
function updateUsers(){
    console.log("add user clicked!");
    let data ={};
    data["username"] = document.querySelector("#username").value; 
    data["password"] = document.querySelector("#password").value; 
    data["loginUser"] = "loginUser"
     
    postForm("api/title.php",data,userCallback,errorCallback);
}
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
 async function postForm(url,inputData,UserCallback,errorCallback) {
    //build
    let formData = new FormData ();
    for(const  [key,value] of Object.entries(inputData)){
       // console.log(`${key}: ${value}`);
        formData.append(key,value);
    }
    let options = {};
    options["method"] = "post";
    options["body"] = formData;
    
    try{
        const response = await fetch(url,options);
        if (response.status == 500) {
           throw new Error(await response.text());
       }
       UserCallback(await response.text());
   } catch (err) {
       errorCallback(err);
   }
};

//  async function DpostForm(url,inputData,DeleteUser,errorCallback) {
//      //build
//      let formData = new FormData ();
//      for(const  [key,value] of Object.entries(inputData)){
//          console.log(`${key}: ${value}`);
//          formData.append(key,value);
//      }
//      let options = {};
//      options["method"] = "post";
//      options["body"] = formData;
     
//      try{
//          const response = await fetch(url,options);
//          if (response.status == 500) {
// 			throw new Error(await response.text());
// 		}
//         DeleteUser(await response.text());
// 	} catch (err) {
// 		errorCallback(err);
// 	}
//  };
 function userCallback(returnData){
    console.log("Updated Titles"+returnData);
    document.querySelector("#user_table").innerHTML = returnData;
 }
function DeleteUser(returnData){
    console.log("Deleted Users"+returnData);
    var table = document.querySelector(`button[id=${bttn}]`).parentElement.parentElement;
    table.remove();

}
 
 function successCallback (returnData) {
     console.log(returnData);
  
    document.querySelector("#user_table").innerHTML = returnData;
 
 }
 function errorCallback(errorThrown){
     console.log("Failure has ensued"+errorThrown);
     document.querySelector("#results").innerHTML = errorThrown;  
 }