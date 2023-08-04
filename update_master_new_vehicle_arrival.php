<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/master_new_vehicle_arrival.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$masterNewVehicleArrival = new masterNewVehicleArrival($db);

$_POST = json_decode(file_get_contents('php://input'),true);
$masterNewVehicleArrival->id = $_POST['id'];
$masterNewVehicleArrival->idCar = $_POST['idCar'];
$masterNewVehicleArrival->vehicleName = $_POST['vehicleName'];
$masterNewVehicleArrival->varient = $_POST['varient'];
$masterNewVehicleArrival->brandName = $_POST['brandName'];
$masterNewVehicleArrival->modelYear = $_POST['modelYear'];
$masterNewVehicleArrival->vehicleType = $_POST['vehicleType'];
$masterNewVehicleArrival->bodyType = $_POST['bodyType'];
$masterNewVehicleArrival->fuelType = $_POST['fuelType'];


$check = $masterNewVehicleArrival->updateVehicleArrivalType();

if($check)
{
    http_response_code(200);
    $response_arr["status"]=200;
    $response_arr["messsage"] = "Vehicle details has been updated successfully.";
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

