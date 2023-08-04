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

$buyerData = $buyerRecords = array();
$buyersEnquiry->id = $_POST['id'];
$buyerData = $buyersEnquiry->getBuyersEditRecordsById();

if(mysqli_num_rows($buyerData) > 0)
{
    while($row = mysqli_fetch_assoc($buyerData))
    {
        $buyerRecords["address"] = $row["address"];
        $buyerRecords["bodyType"] = $row["bodyType"];    
        $buyerRecords["budget"] = $row["budget"];
        $buyerRecords["budgetWords"] = trim(getIndianCurrency($row["budget"]));   
        $buyerRecords["enqId"] = $row["enqId"];
        $buyerRecords["entryDate"] = date("d-M-Y  g:i A", strtotime($row["entryDate"]));
        $buyerRecords["fuelType"] = $row["fuelType"];
        $buyerRecords["mobileNo"] = $row["mobileNo"];  
        $buyerRecords["modelYear"] = $row["modelYear"];
        $buyerRecords["passingStatus"] = $row["passingStatus"];  
        $buyerRecords["userFullName"] = $row["userFullName"];
        $buyerRecords["varient"] = $row["varient"];  
        $buyerRecords["vehicleColor"] = $row["vehicleColor"];
        $buyerRecords["vehicleName"] = $row["vehicleName"]; 
        $buyerRecords["numberOfOwner"] = $row["numberOfOwner"]; 

        

    }
        echo json_encode($buyerRecords);
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["messsage"]= "No record found.";
    echo json_encode($response_arr);
}





?>

