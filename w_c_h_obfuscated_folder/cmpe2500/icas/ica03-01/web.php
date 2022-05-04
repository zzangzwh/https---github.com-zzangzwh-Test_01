<?php
require_once("db.php");

//TO DO isset post check

//todo : call the api function and pass the filter value from $_post
titlesQuery();

// if (isset($_POST["login"]) && strlen($_POST["login"]) > 0) {
//     $input = strip_tags($_POST["login"]);
//     echo titlesQuery($input);
// } else {
//     echo '';
// }
// mock API data for testing the table display


// let testData = {
// 	data: [
// 		{ userID: "123", username: "Kirk", password: "NCC1701" },
// 		{ userID: "667", username: "Spock", password: "Fascinating" },
// 	],
// 	status: "Passed",
// };

// let createCell = (text = "") => {
// 	let cell = document.createElement("td");
// 	if (text.length > 0) {
// 		cell.appendChild(document.createTextNode(text));
// 	}
// 	return cell;
// };

// document.addEventListener("DOMContentLoaded", () => {

// 	let userTable = document.querySelector("#user_TABLE>tbody");

// 	testData.data.forEach((user) => {
// 		let row = document.createElement("tr");
// 		row.appendChild(createCell());
// 		row.appendChild(createCell(user.userID));
// 		row.appendChild(createCell(user.username));
// 		row.appendChild(createCell(user.password));

// 		userTable.appendChild(row);
// 	});
// });
$ajaxData = array(); 

function titlesQuery($filter = ''){
    global $mysql_connection;
    $outArray = array(); // return dictionary
    $status = "";


    $filter = $mysql_connection->real_escape_string($filter);
    $query = "Select userID, username, password";
    $query .= " From users";
 
    error_log($query);
    
    if($results = mysqlQuery($query)){
        $output = "<tr>";

        $NumRows = $results->num_rows;
        while($row = $results->fetch_assoc()){
           //$row = $results->fetch_assoc();
            
            $output .= "<td></td>";
            $output .= "<td> {$row["userID"]} </td>";
            $output .= "<td>  {$row["username"]} </td>";
            $output .= "<td>  {$row["password"]} </td>";
            $output .= "</tr>";
         
        
        
       }
       $status = "{$NumRows} are found";
    }else{
        return"Query Error - $query";
    }
    $output .= "</tr>";
    echo $output;



    // var tBody = document.getElementById("user_tbody");
    
    // for(var i =0; i<data.length; i++){
    //     var tr = document.createElement("tr");
    //     var td1 = document.createElement("td");
    //     td1.innerHTML ="";
    //     //td1.innerHTML(`${data[i].userID}`);
    //     var td2 = document.createElement("td");
    //     td2.innerHTML= `${data[i].userID}`;   
    //     //tr.appendChild(td2);     
    //     var td3 = document.createElement("td");
    //     td3.innerHTML=`${data[i].username}`;
    //     var td4 = document.createElement("td");
    //     td4.innerHTML=`${data[i].password}`;
    //     tr.appendChild(td1);
    //     tr.appendChild(td2);
    //     tr.appendChild(td3);
    //     tr.appendChild(td4);
    //     tBody.appendChild(tr);
    //     }
    $ajaxData["jsonData"] = $outArray;
    $ajaxData["status"] = $status;
    
}
error_log("Made it !!!");
echo json_encode( $ajaxData );
die(); 