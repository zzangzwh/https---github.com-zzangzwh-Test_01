
 console.log("connected");
document.addEventListener("DOMContentLoaded", (evt)=>{
    getTitles();
   // console.log("Dom Content loaded")
    document.querySelector("#filter-btn").addEventListener("click",getTitles);

});
const getTitles =() =>{
    let data = {};
    data["filter"] = document.querySelector("#filter").value; 
    postForm(
        "/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/demos/demo3/api/titles.php",
        data,
        successCallback,
        errorCallback

    );
};
const postForm = async (url,inputData,success,error) => {
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

const successCallback = (returnData) =>{
    console.log(returnData);
    document.querySelector(".results").innerHTML = returnData;

};
const errorCallback = (errorThrown) =>{
    console.log(returnData);
    document.querySelector(".error").innerHTML = errorThrown;  
};