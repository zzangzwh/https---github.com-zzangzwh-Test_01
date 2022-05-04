document.addEventListener("DOMContentLoaded", (evt) => {
	getUsers(showUsers, showError);
	document.querySelector("#add").addEventListener("click",(e) =>{
		updateUsers();
		e.preventDefault();
	});

	
});

function updateUsers(){
	alert(document.querySelector("#username").value +"-----Added");
	//document.querySelector("#pageZ").innerHTML = `vxvx`;
    console.log("add user clicked!");
	
    let data ={};
    data["username"] = document.querySelector("#username").value; 
    data["password"] = document.querySelector("#password").value; 
    data["action"] = "AddUser";
	
	post("api/webservice.php",data,handleStatus,showError);
}
function handleStatus(data){
	document.querySelector("#pageZ").innerHTML ="";
	document.querySelector("#pageZ").append(data["status"]);
	alert(data["status"]+"i am in handlestatus");
	getUsers(showUsers,showError);
}
function deleteUser($btn){
	console.log("deletebtn clicked");
	let data ={};
	data["action"] = "deleteUser";
	data["userID"] = $btn.getAttribute("value");
	post("/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/icas/ica04-Re/api/webservice.php/",data,handleStatus,showError);

}

/**
 * Creates a table cell
 * @param {string} text - the value to use for the textNode
 * @returns a HTMLTableCellElement
 */
const createCell = (text = "") => {
	const cell = document.createElement("td");
	if (text.length > 0) {
		cell.appendChild(document.createTextNode(text));
	}
	return cell;
};

/**
 * Builds the rows of the user display table
 * @param {Array[object]} response array of user objects
 */
const showUsers = (response) => {
	const userTable = document.querySelector("#user-table>tbody");
	// var btn = `<button id='delete-btn$btnnum' onclick ='getID(this)' name='delete-btn' class='delete-btn$btnnum' >Delete</button>`;
	// var btn = document.createElement("BUTTON");
	document.querySelector("#user-table>tbody").innerHTML ="";
	//btn.type
	response.data.forEach((user) => {
		const row = document.createElement("tr");
		const btn = document.createElement("BUTTON");
		btn.innerHTML = "DELETE";	
		btn.setAttribute("class","delete-btn");		
		btn.setAttribute("value",user.userID);	
		row.appendChild(createCell().appendChild(btn));
		row.appendChild(createCell(user.userID));
		row.appendChild(createCell(user.username));
		row.appendChild(createCell(user.password));

		userTable.appendChild(row);
	});
	// update the page status area
	var btns = document.querySelectorAll(".delete-btn");
	for(var i =0; i< btns.length; i++){
		btns[i].onclick = function(){
			deleteUser(this);
		}
	}

	document.querySelector("#page-status").innerHTML = `${response.status}`;

	
};

/**
 * Logs and displays an error
 * @param {Error} errorThrown error object
 */
const showError = (errorThrown) => {
	console.log("Error - " + errorThrown);
	document.querySelector(".error").innerHTML = errorThrown;
};

/**
 *
 * @param {function} success callback for success
 * @param {function} error callback for error
 */
const getUsers = (success, error) => {
	get("getUsers", "", success, error);
};
// const addUsers =(success,error) =>{
// 	post("addUsers","",success,error);
// }
