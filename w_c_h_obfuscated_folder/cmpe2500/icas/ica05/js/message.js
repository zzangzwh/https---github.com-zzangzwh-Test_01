
document.addEventListener("DOMContentLoaded", (evt) => {
	
	getMessages("", showMessages, showError);
//	sendText();
	document.querySelector("#btn-get-messages").addEventListener("click", (evt) => {
		const filter = document.querySelector("#filter").value;
			getMessages(filter.trim(), showMessages, showError);
		});

	document.querySelector("#btn-add-message").addEventListener("click", (evt) => {
			// capture fields
			const message = document.querySelector("#message").value;

			// validate fields
			if (message.trim().length == 0) {
				alert("Message required");
			} else {
				addMessage(
					message,
					() => {
						getMessages("", showMessages, showError);
					},
					showError
				);
			}
		});

	document.querySelector("tbody").addEventListener("click", (evt) => {
		if (evt.target.classList.contains("delete-btn")) {
			if (confirm(`Delete message ID: ${evt.target.value}?`)) {
				// delete a message
				deleteMessage(
					evt.target.value,
					() => {
						getMessages("", showMessages, showError);
					},
					showError
				);
			}
		}
	});
});
// const sendText = () =>{
// 	ajax("get","messages",{foo:"bark"}, successMessags, error);
// };
// function successMessage(){
// alert("iam succeesed");
// }
// function errorMEssage()

/**
 * Creates a table cell
 * @param {strig|object} node - a string for the textNode, or a child node
 * @returns a HTMLTableCellElement
 */
const createCell = (node) => {
	const cell = document.createElement("td");
	if (typeof node == "string") {
		if (node.length > 0) {
			cell.appendChild(document.createTextNode(node));
		}
	} else if (node && node.nodeType) {
		cell.appendChild(node);
	}

	return cell;
};

/**
 * Builds the rows of the message display table
 * @param {Array[object]} response array of message objects
 */
const showMessages = (response) => {
	const messageTable = document.querySelector("#messages-table>tbody");
	console.log(response);
	//return;
	
		if (response.data.length > 0) {
			messageTable.innerHTML = "";
			const buildDeleteButton = (id) => {
				const btn = document.createElement("button");
				btn.innerHTML = "Delete";
				btn.value = id;
				btn.className = "delete-btn";
				return btn;
			};
		response.data.forEach((message) => {
			const row = document.createElement("tr");

			row.appendChild(createCell(buildDeleteButton(message.messageID)));
			row.appendChild(createCell(message.messageID));
			row.appendChild(createCell(message.username));
			row.appendChild(createCell(message.message));
			row.appendChild(createCell(message.messageTime));

			messageTable.appendChild(row);
		});
	}
	// update the page status area
	document.querySelector("#page-status").innerHTML = `${response.status}`;
};

/**
 * Logs and displays an error
 * @param {Error} errorThrown error object
 */
const showError = (errorThrown) => {
	try {
		const tmp = JSON.parse(errorThrown.message);
		console.log(tmp);
		errorThrown = tmp.status || errorThrown;
	} catch {}
	//alert("erorrmessage");
	console.error("Error - " + errorThrown);
	document.querySelector(".error").innerHTML = errorThrown;
};

/**
 * Retrieve all users in the database
 * @param {function} success callback for success
 * @param {function} error callback for error
 */
const getMessages = (search, success, error) => {
	ajax("get", `messages/${search}`, null, success, error);
};

/**
 * Create a new user in the database
 * @param {function} success callback for success
 * @param {function} error callback for error
 */
const addMessage = (message, success, error) => {
	ajax("post", "messages", { message: message }, success, error);
};

/**
 * Delete a message in the database
 * @param {function} success callback for success
 * @param {function} error callback for error
 */
const deleteMessage = (id, success, error) => {
	ajax("delete", `messages/${id}`, null, success, error);
};
