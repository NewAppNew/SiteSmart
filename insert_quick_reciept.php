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
include_once '../models/deal_details.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$dealDetail = new dealDetail($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$dealDetail->vehicleNumber = $_POST['vehicleNumber'];
$dealDetail->transactionMode = $_POST['transactionMode'];
$dealDetail->amountPaid = $_POST['amountPaid'];
$dealDetail->transRemark = $_POST['transRemark'];
$dealDetail->dealId = $_POST['idDeal'];
$dealDetail->dealAmount = $_POST['dealAmount'];
$dealDetail->dueAmount = $_POST['dueAmount'];
$dealDetail->chequeNo = $_POST['chequeNo'];


$vehicleData = array();

$vehicleData = $dealDetail->saveQuickReciept();

if(mysqli_num_rows($vehicleData) > 0 )
{
    while($row = mysqli_fetch_assoc($vehicleData))
    {

        http_response_code(200);
        $response_arr["status"]=200;
        $response_arr["vehicleData"]=$row;
        $response_arr["messsage"] = "User profile data found";
        echo json_encode($response_arr);
    
    }
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["vehicleData"]=NULL;
    $response_arr["messsage"]= "No data found.";
    echo json_encode($response_arr);
}





?>

