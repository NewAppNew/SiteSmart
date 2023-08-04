<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
    }
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
include_once '../config/database.php';
include_once '../models/brandname_mgmt.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$masterBrandName = new masterBrandName($db);

$_POST = json_decode(file_get_contents('php://input'),true);


$result = $masterBrandName->readNewBrandName();

if($result)
{
    $resultArray = array();
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $resultArray[] = $row;
        }

        http_response_code(200);
        $response_arr["status"] = 200;
        $response_arr["data"] = $resultArray;
        $response_arr["messsage"]= "Data found.";
        echo json_encode($response_arr);
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["data"] = $resultArray;
        $response_arr["messsage"]= "Error occured, No data found.";
        echo json_encode($response_arr);
    }
    
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["messsage"]= "Error occured, please try again.";
    echo json_encode($response_arr);
}

?>

