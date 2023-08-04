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
include_once '../models/seller_entry.php';
include_once '../models/user_mgmt.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$sellerEnquiry = new sellerEnquiry($db);

$userMgmt = new userMgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);



$sellerEnquiry->userFullName = $_POST['userFullName'];
$sellerEnquiry->mobileNo = $_POST['mobileNo'];
$sellerEnquiry->address = $_POST['address'];
$sellerEnquiry->EngineNo = $_POST['EngineNo'];
$sellerEnquiry->expectedPrice = $_POST['expectedPrice'];
$sellerEnquiry->vehicleName = $_POST['vehicleName'];
$sellerEnquiry->brand = $_POST['brand'];
$sellerEnquiry->vehicleNumber = $_POST['vehicleNumber'];
$sellerEnquiry->varient = $_POST['varient'];
$sellerEnquiry->bodyType = $_POST['bodyType'];
$sellerEnquiry->fuelType = $_POST['fuelType'];
$sellerEnquiry->vehicleColor = $_POST['vehicleColor'];
$sellerEnquiry->modelYear = $_POST['modelYear'];
$sellerEnquiry->passing = $_POST['passing'];
$sellerEnquiry->numberOfOwner = $_POST['numberOfOwner'];
$sellerEnquiry->kmsDriven = $_POST['kmsDriven'];
$sellerEnquiry->color = $_POST['color'];
$sellerEnquiry->average = $_POST['average'];
$sellerEnquiry->chassisNo = $_POST['chassisNo'];
$sellerEnquiry->EngineNo = $_POST['EngineNo'];
$sellerEnquiry->occupation = $_POST['occupation'];
$sellerId = 0;
$sellerId = $sellerEnquiry->addNewSeller();

if($sellerId != 0)
{

    $check = $sellerEnquiry->addNewSellersVehicleDetails($sellerId);

    if($check)
    {
        
        //Generate OTP
        $otp = generate_otp(5);

        //send otp to SMS gateway

        $check = true;

        if($check)
        {
            //save otp to user's db table
            
            $check = $userMgmt->saveNewOtpCustomer($sellerId,$otp,'Seller');

            if($check)
            {
                http_response_code(200);
                $response_arr["status"]=200;
                $response_arr["sellerId"] = $sellerId;
                $response_arr["messsage"] = "New vehicle enquiery has been added successfully.";
                echo json_encode($response_arr);
            }
            else
            {
                http_response_code(200);
                $response_arr["status"] = 404;
                $response_arr["sellerId"] = 0;
                $response_arr["messsage"]= "Error occured, please try again.";
                echo json_encode($response_arr);
            }
        
        }
 

        
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["sellerId"] = 0;
        $response_arr["messsage"]= "Error occured, please try again.";
        echo json_encode($response_arr);
    }
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["sellerId"] = 0;
    $response_arr["messsage"]= "Error occured, please try again.";
    echo json_encode($response_arr);
}



?>

