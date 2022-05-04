<?php
require_once('./dbUtil.php');

// check for json data
// $data = file_get_contents('php://input');
// $json = json_decode($data);

// print_r($json);

// if (isset($json->filter))
//     echo titlesQueryJSON($json->filter);
// else
//     echo '{"error":"No filter found"}';

// checking for post data
// print_r($_POST);
// check for proper submission, else return 'nothing'

if (isset($_POST["filter"]) && strlen($_POST["filter"]) > 0) {
    $input = strip_tags($_POST["filter"]);
    echo titlesQuery($input);
} else {
    echo '';
}

if (isset($_POST["create"])) {
    $price = strip_tags($_POST["price"]);
    $title = strip_tags($_POST["title"]);
    echo titlesInsert($title, $price);
} else {
    echo '';
}

if (isset($_POST["update"])) {
    $price = strip_tags($_POST["price"]);
    $title = strip_tags($_POST["title"]);
    $id = strip_tags($_POST["title_id"]);
    echo titlesUpdate($id, $title, $price);
} else {
    echo '';
}

// ADDED FOR DEMO04
function titlesUpdate($id, $title, $price)
{
    $query = "UPDATE titles";
    $query .= " SET title = '$title', price = $price";
    $query .= " WHERE title_id = $id";
    return mysqlNonQuery($query);
}

function titlesInsert($title, $price)
{
    global $mysql_connection;

    $query = "INSERT INTO titles (title, price)";
    $query .= " VALUES('$title', $price)";

    $numRows = mysqlNonQuery($query);

    if ($numRows == 1) {
        // need the newly inserted title id
        return mysqli_insert_id($mysql_connection);
    } else {
        return -1;
    }
}

//TODO: create the means to delete a title

// END OF DEMO04 ADD

function titlesQuery($filter)
{
    global $mysql_connection;

    $filter = $mysql_connection->real_escape_string($filter);

    $query = "SELECT title_id, title, price";
    $query .= " FROM titles";
    $query .= " WHERE title like '%$filter%'";

    $output = "<table><thead><th>TitleID</th>"
        . "<th>Title</th>"
        . "<th>Price</th></thead>";
    if ($results = mysqlQuery($query)) {
        while ($row = $results->fetch_assoc()) {
            $output .= "<tr>"
                . "<td>{$row['title_id']}</td>"
                . "<td>{$row['title']}</td>"
                . "<td>$" . number_format($row['price'], 2, '.', ',') . "</td>"
                . "</tr>";
        }
        $output .= "</table>";
    } else {
        return "Query Error : $query";
    }
    $output .= "</table>";

    echo $output;
}

function titlesQueryJSON($filter)
{
    global $mysql_connection;

    $filter = $mysql_connection->real_escape_string($filter);

    $query = "SELECT title_id, title, price";
    $query .= " FROM titles";
    $query .= " WHERE title like '%$filter%'";

    if ($results = mysqlQuery($query)) {
        $rows = array();
        while ($r = $results->fetch_assoc()) {
            $rows[] = $r;
        }
    } else {
        return "Query Error : $query";
    }

    echo json_encode($rows);
}