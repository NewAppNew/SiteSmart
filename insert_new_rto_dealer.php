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
    header('Content-Type: application/json');;
include_once '../config/database.php';
include_once '../models/dealer_mgmt.php';
include_once '../config/functions.php';

$database = new Database();//Database is a class created in database.php and database is object
$db = $database->get_connection();//get connection is function created in database.php
$Dealermgmt = new Dealermgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);


$Dealermgmt->userFullName= $_POST['userFullName'];
$Dealermgmt->address= $_POST['address'];
$Dealermgmt->mobileNo= $_POST['mobileNo'];
$Dealermgmt->emailId= $_POST['emailId'];
$Dealermgmt->aadharNo= $_POST['aadharNo'];
$Dealermgmt->dealerAgency= $_POST['dealerAgency'];

$check = $Dealermgmt->addNewrtoDealer();

if($check)
{

    http_response_code(200);
    $response_arr["status"]=200;
    //$response_arr["id"]=$id;
    $response_arr["messsage"] = "Data Saved Successfully";
    echo json_encode($response_arr);//array to string
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
       //  $response_arr["id"]=$id;
        $response_arr["messsage"]= "Error Inserting Record";
        echo json_encode($response_arr);
    }

?>