<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/rto_mgmt.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$rtomgmt = new rtomgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);


$result = $rtomgmt->readNewrtoagent();

if($result)
{
    $resultArray = array();
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            $resultArray[] = $row;
        }
        $response_arr["data"] = $resultArray;
        echo json_encode($response_arr);
    }
    else
    {
        $response_arr["data"] = $resultArray;
        echo json_encode($response_arr);
    }
    
}
else
{
    echo json_encode($response_arr);
}

?>

