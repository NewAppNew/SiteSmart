<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/dealer_mgmt.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$Dealermgmt = new Dealermgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$Dealermgmt->id = $_POST['id'];
$Dealermgmt->userFullName = $_POST['userFullName'];
$Dealermgmt->address = $_POST['address'];
$Dealermgmt->mobileNo = $_POST['mobileNo'];
$Dealermgmt->emailId = $_POST['emailId'];
$Dealermgmt->aadharNo = $_POST['aadharNo'];
$Dealermgmt->PANNumber = $_POST['PANNumber'];


$check = $Dealermgmt->updatertoDealer();

if($check)
{
    http_response_code(200);
    $response_arr["status"]=200;
    $response_arr["messsage"] = "RTO dealer has been updated successfully.";
    echo json_encode($response_arr);
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["messsage"]= "Error occured, please try again.";
    echo json_encode($response_arr);
}

?>

