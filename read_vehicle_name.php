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



$result = $masterNewVehicleArrival->readArrivedVehicleNames();

if($result)
{
    $resultArray = array();
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            //$resultArray[] = $row;
            
             array_push($resultArray,array("vId"=>$row['id'],"vehicleName"=>$row['vehicleName']));
        }

        http_response_code(200);
        $response_arr["status"] = 200;
        $response_arr["data"] = $resultArray;
        $response_arr["messsage"]= "Data found.";
        echo json_encode($response_arr);
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["data"] = $resultArray;
        $response_arr["messsage"]= "Error occured, No data found.";
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

