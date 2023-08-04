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
include_once '../models/deal_details.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$dealDetail = new dealDetail($db);

$_POST = json_decode(file_get_contents('php://input'),true);


//update seller details
$dealDetail->idSeller = $_POST['idSeller'];
$dealDetail->S_occupation = $_POST['S_occupation'];
$dealDetail->S_aadharNo = $_POST['S_aadharNo'];
$dealDetail->S_PANNumber = $_POST['S_PANNumber'];
$dealDetail->S_licenseNo = $_POST['S_licenseNo'];
$dealDetail->S_address = $_POST['S_address'];
$dealDetail->owner = $_POST['owner'];
//update buyer details
$dealDetail->idBuyer = $_POST['idBuyer'];
$dealDetail->B_occupation = $_POST['B_occupation'];
$dealDetail->B_aadharNo = $_POST['B_aadharNo'];
$dealDetail->B_PANNumber = $_POST['B_PANNumber'];
$dealDetail->B_licenseNo = $_POST['B_licenseNo'];
$dealDetail->B_address = $_POST['B_address'];

//update vehicle details
$dealDetail->idVehicle = $_POST['idVehicle'];
$dealDetail->dealAmount = $_POST['dealAmount'];
$dealDetail->advancedAmount = $_POST['advancedAmount'];
$dealDetail->amountPaid = $_POST['amountPaid'];
$dealDetail->amountWithUs = $_POST['amountWithUs'];
$dealDetail->receivableAmount = $_POST['receivableAmount'];
$dealDetail->paybleAmount = $_POST['paybleAmount'];
$dealDetail->CASEAmount = $_POST['CASEAmount'];
$dealDetail->commissionBuyer = $_POST['commissionBuyer'];
$dealDetail->commissionSeller = $_POST['commissionSeller'];
$dealDetail->insurance = $_POST['insurance'];
$dealDetail->tax = $_POST['tax'];
$dealDetail->taxdue = $_POST['taxdue'];
$dealDetail->accidental = $_POST['accidental'];
$dealDetail->noc = $_POST['noc'];
$dealDetail->loan = $_POST['loan'];
$dealDetail->loanAmount = $_POST['loanAmount'];
$dealDetail->bankname = $_POST['bankname'];
$dealDetail->branch = $_POST['branch'];
$dealDetail->loanInstallments = $_POST['loanInstallments'];
$dealDetail->stepany = $_POST['stepany'];
$dealDetail->exraKey = $_POST['exraKey'];
$dealDetail->tyreCondition = $_POST['tyreCondition'];

//insert RTO work
$dealDetail->idDealer = $_POST['idDealer'];
$dealDetail->trasnfer = $_POST['trasnfer'];
$dealDetail->NOC = $_POST['NOC'];
$dealDetail->HP = $_POST['HP'];
$dealDetail->PUC = $_POST['PUC'];
$dealDetail->paperTransferDate = $_POST['paperTransferDate'];
$dealDetail->registerDate = $_POST['registerDate'];
$dealDetail->transactionMode = $_POST['transactionMode'];
$dealDetail->transactionId = $_POST['transactionId'];
$dealDetail->transRemark = $_POST['transRemark'];
$dealDetail->chequeNo = $_POST['chequeNo'];

$dealId = $dealDetail->confirmNewDeal();

if($dealId)
{
    http_response_code(200);
    $response_arr["status"] = 200;
    $response_arr["dealId"] = $dealId;
    $response_arr["messsage"]= "Congratulations! Deal has been confirmed.";
    echo json_encode($response_arr);    
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["dealId"] = NULL;
    $response_arr["messsage"]= "Error occured, please try again.";
    echo json_encode($response_arr);
}

?>

