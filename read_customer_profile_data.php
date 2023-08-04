<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/buyers_enquires.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$buyersEnquiry = new buyersEnquiry($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$buyersEnquiry->mobileNo = $_POST['mobileNo'];
$buyersEnquiry->userType = $_POST['userType'];
$buyerData = array();
$buyerId = 0;
$buyerData = $buyersEnquiry->searchByuerId();

if(mysqli_num_rows($buyerData) > 0 AND mysqli_num_rows($buyerData) < 2 )
{
    while($row = mysqli_fetch_assoc($buyerData))
    {
        echo json_encode($row);
    
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

