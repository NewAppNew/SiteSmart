<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/reports.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$reports = new reports($db);

$_POST = json_decode(file_get_contents('php://input'),true);

/*$reports->startDate = $_POST['startDate'];
$reports->endDate = $_POST['endDate'];
$reports->vehicleNumber = $_POST['vehicleNumber'];*/

$tempArray = $dealArray = $vehicleData = array();

$vehicleData = $reports->readCommissionReport();

if(mysqli_num_rows($vehicleData) > 0 )
{
    while($row = mysqli_fetch_assoc($vehicleData))
    {
        $idBuyer = $row['idBuyer'];
        $idSeller = $row['idSeller'];

        //get name of buyer and seller
        $fullNameBuyer = $reports->getFullNameOfCustomer($idBuyer,'Buyer');

        $fullNameSeller = $reports->getFullNameOfCustomer($idSeller,'Seller');
         $dealArray['id'] = $row['id'];

        $dealArray['vehicleNumber'] = $row['vehicleNumber'];
        $dealArray['vehicleName'] = $row['vehicleName'];
        $dealArray['nameBuyer'] = $fullNameBuyer;
        $dealArray['nameSeller'] = $fullNameSeller;
        $dealArray['commissionBuyer'] = $row['commissionBuyer'];
        $dealArray['commissionSeller'] = $row['commissionSeller'];
        $dealArray['commissionTotal'] = (float)$row['commissionBuyer'] + (float)$row['commissionSeller'];
        $dealArray['dealEntryDate'] = $row['dealEntryDate'];
       
        array_push($tempArray,$dealArray);
    
    }

        http_response_code(200);
        $response_arr["status"]=200;
        $response_arr["vehicleData"]=$tempArray;
        $response_arr["messsage"] = "Deal records found";
        echo json_encode($tempArray);
    
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

