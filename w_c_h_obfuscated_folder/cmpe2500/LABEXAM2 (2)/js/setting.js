document.addEventListener("DOMContentLoaded", (evt) => {
	getTitles();
	getAvg();
	SumRow();
	Insertion();
	deletetion();
	largetLowAndWOrd();

});
function largetLowAndWOrd(){
	let data= {};
	postForm("/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/LABEXAM2/api/webservice.php",
				data,showUser,showError);
}

function deletetion(){
	let data= {};
	postForm("/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/LABEXAM2/api/webservice.php",
				data,showUser,showError);
}

function Insertion(){
	let data= {};
	postForm("/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/LABEXAM2/api/webservice.php",
				data,showUser,showError);
}

function getTitles(){
	let data= {};
	postForm("/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/LABEXAM2/api/webservice.php",
				data,showUser,showError);
	
}
function getAvg(){
	let data= {};
	postForm("/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/LABEXAM2/api/webservice.php",
				data,showUser,showError);
	
}
function SumRow(){
	let data= {};
	postForm("/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/LABEXAM2/api/webservice.php",
				data,showUser,showError);
}
const postForm = async (url,inputData,showUser,showError) => {
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
		showUser(await response.text());
    }catch(err){
        showError(err);
    }
}
function showUser4(returnData){
	console.log("Error - " + returnData);
	document.querySelector("#Question1").innerHTML = returnData;
}

function showUser(returnData){
	console.log("Error - " + returnData);
	document.querySelector("#Question1").innerHTML = returnData;
}
function showUser2(returnData){
	console.log("Error - " + returnData);
	document.querySelector("#Question2").innerHTML = returnData;
}
function showUser3(returnData){
	console.log("Error - " + returnData);
	document.querySelector("#Question0").innerHTML =  returnData;
}
function showError(errorThrown){
	console.log("Error - " + errorThrown);
	document.querySelector(".error").innerHTML = errorThrown;
}


