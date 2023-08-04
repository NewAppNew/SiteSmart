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
$sellerEnquiry->id = $_POST['id'];

$sellerData = $sellerRecords = array();

$sellerData = $sellerEnquiry->getSellersRecordsById();

if(mysqli_num_rows($sellerData) > 0)
{
    while($row = mysqli_fetch_assoc($sellerData))
    {

     
        $sellerRecords["userFullName"] = $row["userFullName"];
        $sellerRecords["address"] = $row["address"];
        $sellerRecords["mobileNo"] = $row["mobileNo"];
        $sellerRecords["id"] = $row["id"];
        $sellerRecords["sellerId"] = $row["sellerId"];
        $sellerRecords["vehicleName"] = $row["vehicleName"];
        $sellerRecords["vehicleNumber"] = $row["vehicleNumber"];    
        $sellerRecords["varient"] = $row["varient"];  
        $sellerRecords["bodyType"] = $row["bodyType"];
        $sellerRecords["modelYear"] = $row["modelYear"];   
        $sellerRecords["fuelType"] = $row["fuelType"];    
        $sellerRecords["passing"] = $row["passing"];
        $sellerRecords["numberOfOwner"] = $row["numberOfOwner"];    
        $sellerRecords["kmsDriven"] = $row["kmsDriven"];
        $sellerRecords["color"] = $row["color"];    
        $sellerRecords["average"] = $row["average"];
        $sellerRecords["expectedPrice"] = $row["expectedPrice"];
        $sellerRecords["expectedPriceWords"] = trim(getIndianCurrency($row["expectedPrice"]));
        $sellerRecords["chassisNo"] = $row["chassisNo"];
        $sellerRecords["EngineNo"] = $row["EngineNo"];
        $sellerRecords["entryDate"] = $row["entryDate"];
        $sellerRecords["lastUpdate"] = $row["lastUpdate"];    
        $sellerRecords["status"] = $row["status"];
        $sellerRecords["insurance"] = $row["insurance"];
        $sellerRecords["tax"] = $row["tax"];    
        $sellerRecords["taxDue"] = $row["taxDue"];
        $sellerRecords["accidental"] = $row["accidental"];
        $sellerRecords["noc"] = $row["noc"];
        $sellerRecords["loan"] = $row["loan"];
        $sellerRecords["loanAmount"] = $row["loanAmount"];
        $sellerRecords["bankName"] = $row["bankName"];
        $sellerRecords["branch"] = $row["branch"];
        $sellerRecords["loanInstallments"] = $row["loanInstallments"];
        $sellerRecords["stepany"] = $row["stepany"];
        $sellerRecords["extraKey"] = $row["extraKey"];
        $sellerRecords["tyreCondition"] = $row["tyreCondition"];
        $sellerRecords["occupation"] = $row["occupation"];
        $sellerRecords["licenseNo"] = $row["licenseNo"];
    }
        echo json_encode($sellerRecords);
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["messsage"]= "No record found.";
    echo json_encode($response_arr);
}





?>