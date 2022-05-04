// mock API data for testing the table display
let testData = {
	data: [
		{ userID: "123", username: "Kirk", password: "NCC1701" },
		{ userID: "667", username: "Spock", password: "Fascinating" },
	],
	status: "Passed",
};

let createCell = (text = "") => {
	let cell = document.createElement("td");
	if (text.length > 0) {
		cell.appendChild(document.createTextNode(text));
	}
	return cell;
};

document.addEventListener("DOMContentLoaded", () => {
	// eventually, send a request to the API and display response
	let userTable = document.querySelector("#user_TABLE>tbody");

	testData.data.forEach((user) => {
		let row = document.createElement("tr");
		row.appendChild(createCell());
		row.appendChild(createCell(user.userID));
		row.appendChild(createCell(user.username));
		row.appendChild(createCell(user.password));

		userTable.appendChild(row);
	});
});