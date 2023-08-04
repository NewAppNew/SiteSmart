<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/user_mgmt.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$userMgmt = new userMgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$userMgmt->id = $_POST['id'];
$userMgmt->otp = $_POST['otp'];

$verify_otp = $userMgmt->checkSubmittedOTPForCustomer();

if($verify_otp)
{
    http_response_code(200);
    $response_arr["status"]=200;
    $response_arr["messsage"] = "OTP verified.";
    echo json_encode($response_arr);
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["messsage"]= "Wrong OTP";
    echo json_encode($response_arr);
}

?>

