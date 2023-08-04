<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/deal_details.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$dealDetail = new dealDetail($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$NextRecieptId = $dealDetail->getNextRecieptId();

if($NextRecieptId > 0 )
{
    
    http_response_code(200);
    $response_arr["status"]=200;
    $response_arr["nextRecpId"]=$NextRecieptId;
    $response_arr["messsage"] = "Next trasaction ID";
    echo json_encode($response_arr);
    
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["nextRecpId"]=NULL;
    $response_arr["messsage"]= "No data found.";
    echo json_encode($response_arr);
}





?>

