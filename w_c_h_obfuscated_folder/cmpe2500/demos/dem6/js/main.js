const ENDPOINT = "/~wcho2222/w_c_h_obfuscated_folder/cmpe2500/demos/dem6/title.php/";

/**
 * Send a POST request with data to a server
 * @param {string} action the action to target on the server
 * @param {object} data the data to post to the server
 * @param {function} success callback for success
 * @param {function} error callback for error
 */
const POST = async (action, data, success, error) => {
	const options = {};

	// add the action as post form data
	const formData = new FormData();
	formData.append("action", action);

	// add any additional data entries
	for (const [key, value] of Object.entries(data)) {
		console.log(`${key}: ${value}`);
		formData.append(key, value);
	}

	options["method"] = "post";
	options["body"] = formData;

	try {
		const response = await fetch(ENDPOINT, options);
		// get JSON
		const json = await response.json();

		// manually check for API error
		if (json.status.includes("Fail")) {
			throw new Error(json.status);
		}

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

		// get JSON
		const json = await response.json();

		// manually check for API error
		if (json.status.includes("Fail")) {
			throw new Error(json.status);
		}

		success(json);
	} catch (err) {
		error(err);
	}
};