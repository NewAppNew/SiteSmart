<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/rto_mgmt.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$rtoMgmt = new rtoMgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$rtoMgmt->vehicleNumber = $_POST['vehicleNumber'];

$vehicleData = array();

$vehicleData = $rtoMgmt->getDealDetailsForRtoWork();

if(mysqli_num_rows($vehicleData) > 0 )
{
    $workArray = array();
    while($row = mysqli_fetch_assoc($vehicleData))
    {

        if($row['trasnfer'] == 'Yes')
        {
            $workArray[] = 'Transfer';
        }

        if($row['NOC'] == 'Yes')
        {
            $workArray[] = "NOC";
        }

        if($row['HP'] == 'Yes')
        {
            $workArray[] = "HP";
        }

        if($row['PUC'] == 'Yes')
        {
            $workArray[] = "PUC";
        }

        //$workStr = $transferStr.",".$nocStr.",".$hpStr.",".$pucStr;

        $workStr = implode(",",$workArray);
        $vehicleDataResponce["idDeal"] = $row['id'];
        $vehicleDataResponce["vehicleNumber"] = $row['vehicleNumber'];
        $vehicleDataResponce["vehicleName"] = $row['vehicleName'];
        $vehicleDataResponce["varient"] = $row['varient'];
        $vehicleDataResponce["work"] = $workStr;
        $vehicleDataResponce["paperTransferDate"] = $row['paperTransferDate'];
        $vehicleDataResponce["registerDate"] = $row['registerDate'];
        
    
    }
    echo json_encode($vehicleDataResponce);

    
    
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

