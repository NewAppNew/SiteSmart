<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../config/database.php';
include_once '../models/auto_suggest.php';
include_once '../config/functions.php';

$database = new Database();
$db = $database->get_connection();
$autoSuggest = new autoSuggest($db);

$_POST = json_decode(file_get_contents('php://input'),true);

$dataCategory = $_POST['dataCategory'];

$outputResult = array();

if($dataCategory == 'VehicleType')
{
    $bodyType = $_POST['bodyType'];

    if($bodyType == '' || $bodyType == NULL || empty($bodyType))
    {
        $dataResult = $autoSuggest->getAllVehicleType();

    
        if(mysqli_num_rows($dataResult) > 0)
        {
            while($row = mysqli_fetch_assoc($dataResult))
            {
            
                $outputResult[] = $row;
            }

            http_response_code(200);
            $response_arr["status"]=200;
            $response_arr["autoSuggestData"]=$outputResult;
            echo json_encode($response_arr);
            exit();
        }
    }
    $dataResult = $autoSuggest->getVehicleType($bodyType);

    
    if(mysqli_num_rows($dataResult) > 0)
    {
        while($row = mysqli_fetch_assoc($dataResult))
        {
           
            $outputResult[] = $row;
        }
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["autoSuggestData"]='';
        echo json_encode($response_arr);
        exit();
    }
}

if($dataCategory == 'BrandType')
{
    $brandName = $_POST['brandName'];

    if($brandName == '' || $brandName == NULL || empty($brandName))
    {
        $dataResult = $autoSuggest->getAllBrandName();

    
        if(mysqli_num_rows($dataResult) > 0)
        {
            while($row = mysqli_fetch_assoc($dataResult))
            {
            
                $outputResult[] = $row;
            }

            http_response_code(200);
            $response_arr["status"]=200;
            $response_arr["autoSuggestData"]=$outputResult;
            echo json_encode($response_arr);
            exit();
        }
    }
    $dataResult = $autoSuggest->getBrandName($brandName);

    
    if(mysqli_num_rows($dataResult) > 0)
    {
        while($row = mysqli_fetch_assoc($dataResult))
        {
           
            $outputResult[] = $row;
        }
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["autoSuggestData"]='';
        echo json_encode($response_arr);
        exit();
    }
}

else if($dataCategory == 'FuelType')
{
    $fuelName = $_POST['fuelName'];

    if($fuelName == '' || $fuelName == NULL || empty($fuelName))
    {
        $dataResult = $autoSuggest->getAllFuelType();

    
        if(mysqli_num_rows($dataResult) > 0)
        {
            while($row = mysqli_fetch_assoc($dataResult))
            {
            
                $outputResult[] = $row;
            }

            http_response_code(200);
            $response_arr["status"]=200;
            $response_arr["autoSuggestData"]=$outputResult;
            echo json_encode($response_arr);
            exit();
        }
    }
    $dataResult = $autoSuggest->getFuelType($fuelName);

    
    if(mysqli_num_rows($dataResult) > 0)
    {
        while($row = mysqli_fetch_assoc($dataResult))
        {
            $outputResult[] = $row;
        }
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["autoSuggestData"]='';
        echo json_encode($response_arr);
        exit();
    }
}

else if($dataCategory == 'varientType')
{
    $varient = $_POST['varient'];
    if($varient == '' || $varient == NULL || empty($varient))
    {
        $dataResult = $autoSuggest->getAllvarientType();

    
        if(mysqli_num_rows($dataResult) > 0)
        {
            while($row = mysqli_fetch_assoc($dataResult))
            {
            
                $outputResult[] = $row;
            }

            http_response_code(200);
            $response_arr["status"]=200;
            $response_arr["autoSuggestData"]=$outputResult;
            echo json_encode($response_arr);
            exit();
        }
    }
    $dataResult = $autoSuggest->getvarientType($varient);

    
    if(mysqli_num_rows($dataResult) > 0)
    {
        while($row = mysqli_fetch_assoc($dataResult))
        {
            $outputResult[] = $row;
        }
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["autoSuggestData"]='';
        echo json_encode($response_arr);
        exit();
    }
}

else if($dataCategory == 'Mobile')
{
    $mobileNo = $_POST['mobileNo'];
    $userType = $_POST['userType'];

    if($mobileNo == '' || $mobileNo == NULL || empty($mobileNo))
    {
        $dataResult = $autoSuggest->getAllUserMobileNumbers($userType);

    
        if(mysqli_num_rows($dataResult) > 0)
        {
            while($row = mysqli_fetch_assoc($dataResult))
            {
            
                $outputResult[] = $row;
            }

            http_response_code(200);
            $response_arr["status"]=200;
            $response_arr["autoSuggestData"]=$outputResult;
            echo json_encode($response_arr);
            exit();
        }
    }

    $dataResult = $autoSuggest->getUserMobileNumbers($mobileNo,$userType);

    
    if(mysqli_num_rows($dataResult) > 0)
    {
        while($row = mysqli_fetch_assoc($dataResult))
        {
            $outputResult[] = $row;
        }
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["autoSuggestData"]='';
        echo json_encode($response_arr);
        exit();
    }
}
else if($dataCategory == 'vNumberData')
{
    $vNumber = $_POST['vNumber'];

    if($vNumber == '' || $vNumber == NULL || empty($vNumber))
    {
        $dataResult = $autoSuggest->getUserVehicleNumbers($vNumber);

    
        if(mysqli_num_rows($dataResult) > 0)
        {
            while($row = mysqli_fetch_assoc($dataResult))
            {
            
                $outputResult[] = $row;
            }

            http_response_code(200);
            $response_arr["status"]=200;
            $response_arr["autoSuggestData"]=$outputResult;
            echo json_encode($response_arr);
            exit();
        }
    }


    $dataResult = $autoSuggest->getUserVehicleNumbers($vNumber);

    
    if(mysqli_num_rows($dataResult) > 0)
    {
        while($row = mysqli_fetch_assoc($dataResult))
        {
            $outputResult[] = $row;
        }
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["autoSuggestData"]='';
        echo json_encode($response_arr);
        exit();
    }
}
else if($dataCategory == 'quickReceipt')
{
    $vNumber = $_POST['vehicleNumber'];

    $dataResult = $autoSuggest->getDataForQuickReceipt($vNumber);

    
    if(mysqli_num_rows($dataResult) > 0)
    {
        while($row = mysqli_fetch_assoc($dataResult))
        {
            $outputResult[] = $row;
        }
    }
    else
    {
        http_response_code(200);
        $response_arr["status"] = 404;
        $response_arr["autoSuggestData"]='';
        echo json_encode($response_arr);
        exit();
    }
}

else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["autoSuggestData"]='';
    $response_arr["messsage"]= "Option not available.";
    echo json_encode($response_arr);
    exit();
}

if(count($outputResult) > 0)
{
    http_response_code(200);
    $response_arr["status"]=200;
    $response_arr["autoSuggestData"]=$outputResult;
    echo json_encode($response_arr);
}
else
{
    http_response_code(200);
    $response_arr["status"] = 404;
    $response_arr["autoSuggestData"]='';
    echo json_encode($response_arr);
}


?>