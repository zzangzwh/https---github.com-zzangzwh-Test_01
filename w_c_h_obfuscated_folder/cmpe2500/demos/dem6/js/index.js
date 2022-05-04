document.addEventListener("DOMContentLoaded", (evt) => {
	console.log("evet");
	readTitles();
	document.querySelector("#getTitles").addEventListener("click", readTitles);
	document.querySelector("#create").addEventListener("click", createTitle);
	document.querySelector("#update").addEventListener("click", updateTitle);
});

// ADDED/UPDATED FOR DEMO 04
const ENDPOINT = "/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/demos/dem6/title.php/";

function readTitles() {
	var data = {};
	// grab the filter value, or '%' wildcard
	data["filter"] = document.querySelector("#filter").value || "%";
	postForm(ENDPOINT, data, readCallback, errorCallback);
}

function createTitle() {
	var data = {};
	// grab the new title and price
	data["title"] = document.querySelector("#title").value;
	data["price"] = document.querySelector("#price").value;
	data["create"] = "create";
	postForm(ENDPOINT, data, createCallback, errorCallback);
}

function updateTitle() {
	var data = {};

	data["title_id"] = document.querySelector("#title-id").value;
	data["title"] = document.querySelector("#title").value;
	data["price"] = document.querySelector("#price").value;
	data["update"] = "update";
	postForm(ENDPOINT, data, updateCallback, errorCallback);
}

function createCallback(returnedData) {
	console.log("New title created id: " + returnedData);
	// query for all, including new, titles
	readTitles();
}

function updateCallback(returnedData) {
	console.log("Title updated: " + returnedData);
	// query for all, including updated, titles
	readTitles();
}



// classic form data post
async function postForm(url, inputData, successCallback, errorCallback) {
	// Build formData object
	let formData = new FormData();

	for (const [key, value] of Object.entries(inputData)) {
		console.log(`${key}: ${value}`);
		formData.append(key, value);
	}

	let options = {};
	options["method"] = "post";
	options["body"] = formData;

	try {
		const response = await fetch(url, options);

		if (response.status == 500) {
			throw new Error(await response.text());
		}

		successCallback(await response.text());
	} catch (err) {
		errorCallback(err);
	}
}
function successCallback(returnData){
	console.log("success:" +returnedData);
	document.querySelector(".results").innerHTML = returnedData;
}

function readCallback(returnedData) {
	// insert the returned table
	document.querySelector(".results").innerHTML = returnedData;
	// add the ability to edit the price
}

function errorCallback(errorThrown) {
	console.error("Failure has ensued! " + errorThrown);
	document.querySelector(".error").innerHTML = errorThrown;
}