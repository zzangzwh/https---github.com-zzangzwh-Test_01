document.addEventListener("DOMContentLoaded", (evt) => {
	document.querySelector("#test").addEventListener("click", (evt) => {
		sendTest();
	});
});

// Test function
const sendTest = () => {
	ajax("get", "test/1", { foo: "bar" }, success, error);
};

function success(returnedData) {
	console.log(returnedData);
}

function error(errorThrown) {
	console.log(errorThrown);
}

const ENDPOINT = "/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/demos/rest-demo/rest/";

/**
 * Sends an ajax request.
 * @param {string} method the HTTP method to target on the server
 * @param {string} action the action to target on the server
 * @param {object} data the data to send to the server
 * @param {function} success callback for success
 * @param {function} error callback for error
 */
const ajax = async (method, action, data, success, error) => {
	const options = {};
	let url = ENDPOINT + action;

	options["method"] = method;

	switch (method) {
		case "get":
		case "delete":
			// if params is not an object (basic), then build search params
			if (typeof data != "object" || data == null) {
				data = {};
			}
			// build the param string for GET
			data = new URLSearchParams(data).toString();

			// set the URL
			url += `?${data}`;
			break;
		case "post":
		case "put":
			// add data as post form data
			const formData = new FormData();
			for (const [key, value] of Object.entries(data)) {
				formData.append(key, value);
			}
			options["body"] = formData;
			break;
		default:
			throw new Error(`Unsupported method: ${method}`);
			break;
	}

	try {
		const response = await fetch(url, options);
		//TODO: check response.status to manually check for API error
		success(await response.text()); // text -> json for JSON response
	} catch (err) {
		error(err);
	}
};

/* jQuery Method for AJAX
$(document).ready(function () {
	$("#test").click(Testing);
});

function Testing() {
	var getData = {};

	var options = {};
	options["method"] = "POST";
	options["url"] = "https://thor.net.nait.ca/~natehump/cmpe2500/temp/rest/test";
	options["dataType"] = "text";
	options["data"] = getData;
	options["success"] = successCallback;
	options["error"] = errorCallback;
	$.ajax(options);
}

function successCallback(returnedData) {
	console.log(returnedData);
}

function errorCallback(jqObject, returnedStatus, errorThrown) {
	console.log(returnedStatus + " : " + errorThrown);
}
*/
