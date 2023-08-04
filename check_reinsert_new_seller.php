<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/seller_entry.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$sellerEnquiry = new sellerEnquiry($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$sellerEnquiry->mobileNo = $_POST['mobileNo'];
$sellerEnquiry->vehicleNumber = $_POST['vehicleNumber'];


$checkSellerData = $sellerEnquiry->searchSellerInfo();

if($checkSellerData)
{
        http_response_code(200);
        $response_arr["status"]=200;
        $response_arr["mobileNo"]=$sellerEnquiry->mobileNo;
        $response_arr["vehicleNumber"]=$sellerEnquiry->vehicleNumber;
        $response_arr["messsage"] = "Fresh record.";
        echo json_encode($response_arr);
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["mobileNo"]=$sellerEnquiry->mobileNo;
    $response_arr["vehicleNumber"]=$sellerEnquiry->vehicleNumber;
    $response_arr["messsage"]= "Seller data with the cr details are already exist.";
    echo json_encode($response_arr);
}





?>