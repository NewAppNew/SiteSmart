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
include_once '../models/user_mgmt.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$buyersEnquiry = new buyersEnquiry($db);

$userMgmt = new userMgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);


$buyersEnquiry->userFullName = $_POST['userFullName'];
$buyersEnquiry->mobileNo = $_POST['mobileNo'];
$buyersEnquiry->address = $_POST['address'];
$buyersEnquiry->budget = $_POST['budget'];
$buyersEnquiry->vehicleName = $_POST['vehicleName'];
$buyersEnquiry->varient = $_POST['varient'];
$buyersEnquiry->fuelType = $_POST['fuelType'];
$buyersEnquiry->vehicleColor = $_POST['vehicleColor'];
$buyersEnquiry->modelYear = $_POST['modelYear'];
$buyersEnquiry->passingStatus = $_POST['passingStatus'];
$buyersEnquiry->bodyType = $_POST['bodyType'];
$buyersEnquiry->numberOfOwner = $_POST['numberOfOwner'];

$buyerId = 0;
$buyerId = $buyersEnquiry->addNewByuer();

if($buyerId != 0)
{
    $check = $buyersEnquiry->addNewByuersEnquiryDetails($buyerId);

    if($check)
    {
        
        //Generate OTP
        $otp = generate_otp(5);

        //send otp to SMS gateway

        $check = true;

        if($check)
        {
            //save otp to user's db table
            
            $check = $userMgmt->saveNewOtpCustomer($buyerId,$otp,'Buyer');

            if($check)
            {
                http_response_code(200);
                $response_arr["status"]=200;
                $response_arr["buyerId"] = $buyerId;
                $response_arr["messsage"] = "New vehicle enquiery has been added successfully.";
                echo json_encode($response_arr);
            }
            else
            {
                http_response_code(200);
                $response_arr["status"] = 404;
                $response_arr["buyerId"] = 0;
                $response_arr["messsage"]= "Error occured, please try again.";
                echo json_encode($response_arr);
            }
        
        }
 
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["buyerId"] = 0;
        $response_arr["messsage"]= "Error occured, please try again.";
        echo json_encode($response_arr);
    }
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["buyerId"] = 0;
    $response_arr["messsage"]= "Error occured, please try again.";
    echo json_encode($response_arr);
}

?>

