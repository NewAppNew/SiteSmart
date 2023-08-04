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
include_once '../models/master_new_vehicle_arrival.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$masterNewVehicleArrival = new masterNewVehicleArrival($db);

$_POST = json_decode(file_get_contents('php://input'),true);
$masterNewVehicleArrival->vehicleName = $_POST['vehicleName'];
$masterNewVehicleArrival->varient = $_POST['varient'];
$masterNewVehicleArrival->bodyType = $_POST['bodyType'];
$masterNewVehicleArrival->fuelType = $_POST['fuelType'];
$masterNewVehicleArrival->brandName = $_POST['brandName'];
$masterNewVehicleArrival->modelYear = $_POST['modelYear'];
$masterNewVehicleArrival->vehicleType = $_POST['vehicleType'];
$check = $masterNewVehicleArrival->addNewVehicleArrivalType();

if($check)
{
    if($check == 'Existed')
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["messsage"]= "Error occured, ".$masterNewVehicleArrival->vehicleName." vehicle is already existed.";
        echo json_encode($response_arr);
    }
    else if($check == 'VExisted') //if verient existed
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["messsage"]= "Error occured, ".$masterNewVehicleArrival->varient." verient is already existed.";
        echo json_encode($response_arr);
    }
    else
    {
        http_response_code(200);
        $response_arr["status"]=200;
        $response_arr["messsage"] = "New vehicle name has been added successfully.";
        echo json_encode($response_arr);
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
