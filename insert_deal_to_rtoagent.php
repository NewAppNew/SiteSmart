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
include_once '../models/rto_mgmt.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$rtoMgmt = new rtoMgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);


$rtoMgmt->idDeal = $_POST['idDeal'];
$rtoMgmt->idAgent = $_POST['idAgent'];
$rtoMgmt->work = $_POST['work'];
$rtoMgmt->amountPaid = $_POST['amountPaid'];
$rtoMgmt->amountPending = $_POST['amountPending'];
$rtoMgmt->recieptNo = $_POST['recieptNo'];
$rtoMgmt->transferDate = $_POST['transferDate'];
$rtoMgmt->reportDate = $_POST['reportDate'];
$rtoMgmt->reportStatus = $_POST['reportStatus'];


$rtoWorkId = 0;

$vehicleData = array();

$rtoWorkId = $rtoMgmt->assignDealRtoWorkToRTOAgent();

if($rtoWorkId > 0 )
{

    //upload recept and disclaimer files and update the rto_work table for the newly created work id
   
    if(isset($_FILES['receiptFile']))
    {
        
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES["receiptFile"]["name"]);
        $uploadOk = 1;
        $temp = explode(".", $_FILES["receiptFile"]["name"]);

        //$temp = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $imageFileType = end($temp);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" ) 
        {
            
            $uploadOk = 0;
        }
        else
        {
           
            $RECPTnewfilename = "RECPT_No".$rtoMgmt->idDeal."-".$rtoWorkId."_".round(microtime(true)) . '.' . end($temp);
            
            if(move_uploaded_file($_FILES["receiptFile"]["tmp_name"], $target_dir.$RECPTnewfilename)) 
            {
                $check = $rtoMgmt->updateRECPTnewfilename($rtoWorkId,$RECPTnewfilename);
            } 
            else 
            {
                $uploadOk = 0;
            }
        }

        $RECPfileUploadStatus = "Success";

    }
    else
    {
        $RECPfileUploadStatus = "Error";
    }

    if(isset($_FILES['disclaimerFile']))
    {
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES["disclaimerFile"]["name"]);
        $uploadOk = 1;
        $temp = explode(".", $_FILES["disclaimerFile"]["name"]);

        //$temp = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $imageFileType = end($temp);

        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" ) 
        {
            
            $uploadOk = 0;
        }
        else
        {
           
            $DESCLnewfilename = "DESCL_No".$rtoMgmt->idDeal."-".$rtoWorkId."_".round(microtime(true)) . '.' . end($temp);
            
            if(move_uploaded_file($_FILES["disclaimerFile"]["tmp_name"], $target_dir.$DESCLnewfilename)) 
            {
               $check = $rtoMgmt->updateDESCLnewfilename($rtoWorkId,$DESCLnewfilename);
            } 
            else 
            {
                $uploadOk = 0;
            }
        }

        $DESCLfileUploadStatus = "Success";



    }
    else
    {
        $DESCLfileUploadStatus = "Error";
    }

    

    http_response_code(200);
    $response_arr["status"]=200;
    $response_arr["rtoWorkId"] = $rtoWorkId;
    $response_arr["RECPfileUploadStatus"] = $RECPfileUploadStatus;
    $response_arr["DESCLfileUploadStatus"] = $DESCLfileUploadStatus;
    $response_arr["messsage"] = "RTO work assigned to RTO Agent successfully.";
    echo json_encode($response_arr);
    
    
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["rtoWorkId"] = $rtoWorkId;
    $response_arr["RECPfileUploadStatus"] = $RECPfileUploadStatus;
    $response_arr["DESCLfileUploadStatus"] = $DESCLfileUploadStatus;
    $response_arr["messsage"]= "Error occured! Please try again.";
    echo json_encode($response_arr);
}





?>