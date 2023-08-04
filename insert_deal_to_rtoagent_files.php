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
// $_REQUEST = json_decode(file_get_contents('php://input'),true);
$rtoWorkId = $_POST['rtoWorkId'];
$RECPfileUploadStatus=0;
$DESCLfileUploadStatus=0;
if($rtoWorkId > 0 )
{
    if(isset($_FILES['RECPfileUploadStatus']))
    {
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES["RECPfileUploadStatus"]["name"][0]);
        $uploadOk = 1;
        $temp = explode(".", $_FILES["RECPfileUploadStatus"]["name"][0]);
        //$temp = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $imageFileType = end($temp);
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" ) 
        {
            $uploadOk = 0;
        }
        else
        { 
            $RECPTnewfilename = "RECPT_No".$rtoMgmt->idDeal."-".$rtoWorkId."_".round(microtime(true)) . '.' . end($temp);
            if(move_uploaded_file($_FILES["RECPfileUploadStatus"]["tmp_name"][0], $target_dir.$RECPTnewfilename)) 
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
    if(isset($_FILES['DESCLfileUploadStatus']))
    {
        $target_dir = "../assets/images/";
        $target_file = $target_dir . basename($_FILES["DESCLfileUploadStatus"]["name"][0]);
        $uploadOk = 1;
        $temp = explode(".", $_FILES["DESCLfileUploadStatus"]["name"][0]);
        //$temp = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $imageFileType = end($temp);
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf" ) 
        {

            $uploadOk = 0;
        }
        else
        {
           
            $DESCLnewfilename = "DESCL_No".$rtoMgmt->idDeal."-".$rtoWorkId."_".round(microtime(true)) . '.' . end($temp);
            
            if(move_uploaded_file($_FILES["DESCLfileUploadStatus"]["tmp_name"][0], $target_dir.$DESCLnewfilename)) 
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

