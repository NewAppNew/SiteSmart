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
include_once '../models/user_mgmt.php';
include_once '../config/functions.php';

$database = new Database();//Database is a class created in database.php and database is object
$db = $database->get_connection();//get connection is function created in database.php
$userMgmt = new userMgmt($db);

$_POST = json_decode(file_get_contents('php://input'),true);//convert string to array

$userMgmt->mobileNo = $_POST['mobileNo'];

$check_otp=$userMgmt->sendOtpSMS('Admin');


if(mysqli_num_rows($check_otp) > 0)
{
    while($row = mysqli_fetch_assoc($check_otp))
    {
        $mobileNo = $row['mobileNo'];
        $adminId = $row['id'];
        //Generate OTP
        $otp = generate_otp(5);

        //send otp to SMS gateway

        $check = true;

        if($check)
        {
            //save otp to user's db table
            
            $check = $userMgmt->saveNewOtp($otp);

            if($check)
            {
                http_response_code(200);
                $response_arr["status"]=200;
                $response_arr["adminId"]=$adminId;
                $response_arr["mobileNo"]=$mobileNo;
                $response_arr["otp"]=$otp;
                $response_arr["messsage"] = "OTP sent successfully";
                echo json_encode($response_arr);//array to string
            }
            else
            {
                http_response_code(200);
                $response_arr["status"] = 404;
                $response_arr["adminId"]=$adminId;
                $response_arr["otp"]=$otp;
                $response_arr["messsage"]= "Due to technical error SMS has not been sent. Please try again.";
                echo json_encode($response_arr);
            }
            

        }
        else
        {
            http_response_code(200);
            $response_arr["status"] = 404;
            $response_arr["adminId"]=$adminId;
            $response_arr["messsage"]= "Error! Please try again.";
            echo json_encode($response_arr);

        }
    }
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["adminId"]=0;
    $response_arr["messsage"]= "Invalid mobile number.";
    echo json_encode($response_arr);
}

