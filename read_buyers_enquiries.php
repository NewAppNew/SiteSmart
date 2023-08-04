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
include_once '../models/buyers_enquires.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$buyersEnquiry = new buyersEnquiry($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$flag = 0;
$startDate = '00-00-0000 00:00:00';
$endDate = '00-00-0000 23:59:59';
if(isset ($_POST['startDate']))
{
    $startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
    if($startDate == NULL && $endDate == NULL)
    {
        $flag = 0;
    }
    else
    {
        $flag = 1;
    }
}
$buyerData = $buyerRecords = $buyerRecordsPush = array();
$buyerId = 0;
$buyerData = $buyersEnquiry->getAllBuyersRecords($flag,$startDate,$endDate);


    while($row = mysqli_fetch_assoc($buyerData))
    {
        $buyerRecords[] = $row;
    }

    // array_push($buyerRecordsPush,array("SellerData"=>$buyerRecords));

    http_response_code(200);
        $response_arr["SellerData"]=$buyerRecords;
        echo json_encode($response_arr);









?>

