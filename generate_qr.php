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
include_once '../models/qr.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$masterBodyType = new QrScanner($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$masterBodyType->qrUsername = $_POST['qrUsername'];
$masterBodyType->qrContent = $_POST['qrContent'];
$masterBodyType->qrImg = $_POST['qrImg'];
$masterBodyType->qrlink = $_POST['qrlink'];

$check = $masterBodyType->insertQr();

if($check)
{

        http_response_code(200);
        $response_arr["status"]=200;
        $response_arr["messsage"] = "New QR Added Suceesfully.";
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

