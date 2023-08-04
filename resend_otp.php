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
$userMgmt->userType = $_POST['userType'];

 //Generate OTP
$otp = generate_otp(5);

 //send otp to SMS gateway

$check = true;

if($check)
{
    $check = $userMgmt->saveNewOtpCustomer($userMgmt->id ,$otp,$userMgmt->userType);

    if($check)
    {
        http_response_code(200);
        $response_arr["status"]=200;
        $response_arr["messsage"] = "OTP has been sent to your registered contact number.";
        echo json_encode($response_arr);
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["messsage"]= "Error occured while sending new OTP, please try again.";
        echo json_encode($response_arr);
    }
}

?>

