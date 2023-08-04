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

// $dealDetail->vehicleName = $_POST['vehicleName'];
// $dealDetail->varient = $_POST['varient'];

$vehicleData = array();

$vehicleData = $dealDetail->getVehicleInformationByVNameVerient();

if(mysqli_num_rows($vehicleData) > 0 )
{
    while($row = mysqli_fetch_assoc($vehicleData))
    {
        $response_arr[]=$row;
     
    
    }
    echo json_encode($response_arr);
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

