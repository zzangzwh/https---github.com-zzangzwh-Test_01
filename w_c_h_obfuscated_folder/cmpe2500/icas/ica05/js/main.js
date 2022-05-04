////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

// REST METHOD

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
//"api/webservice.php";
const REST_ENDPOINT = "/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/icas/ica05/svc/";

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
	let url = REST_ENDPOINT + action;

	// data must be key/value object
	if (data == null || typeof data != "object") {
		data = {};
	}

	options["method"] = method;

	switch (method) {
		case "get":
		case "delete":
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

		const json = await response.json();
		if (json.status && json.status.includes("Error")) {
			throw new Error(json.status.split(":")[1]); // strip message
		}
		success(json); // text -> json for JSON response
	} catch (err) {
		error(err);
	}
};

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////

// NON-REST METHOD

////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
const ENDPOINT = "/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/icas/ica05/api/webservice.php/";

/**
 * Send a POST request with data to a server
 * @param {string} action the action to target on the server
 * @param {object} data the data to post to the server
 * @param {function} success callback for success
 * @param {function} error callback for error
 */
const post = async (action, data, success, error) => {
	const options = {};

	// add the action as post form data
	const formData = new FormData();
	formData.append("action", action);

	// add any additional data entries
	for (const [key, value] of Object.entries(data)) {
		formData.append(key, value);
	}

	options["method"] = "post";
	options["body"] = formData;

	try {
		const response = await fetch(ENDPOINT, options);
		if (response.status == 500 || response.status == 403) {
			throw new Error(await response.text());
		}
		// get JSON
		const json = await response.json();

		// manually check for API error
		// if (json.status.includes("Fail")) {
		// 	throw new Error(json.status);
		// }

		success(json);
	} catch (err) {
		error(err);
	}
};

/**
 * Send a GET request with data to a server
 * @param {string} action the action to target on the server
 * @param {object} data the data to send to the server
 * @param {function} success callback for success
 * @param {function} error callback for error
 */
const get = async (action, params, success, error) => {
	const options = {};
	options["method"] = "get";
	options["headers"] = {
		"Content-Type": "application/json",
	};

	// if params is not an object (basic), then build search params
	if (typeof params != "object" || params != null) {
		params = {};
	}

	// set the action param
	params["action"] = action;
	// build the param string for GET
	params = new URLSearchParams(params).toString();

	try {
		const response = await fetch(`${ENDPOINT}?${params}`, options);

		if (response.status == 500 || response.status == 403) {
			throw new Error(await response.text());
		}

		// get JSON
		const json = await response.json();

		// manually check for API error
		// if (json.status.includes("Fail")) {
		// 	throw new Error(json.status);
		// }

		success(json);
	} catch (err) {
		error(err);
	}
};
