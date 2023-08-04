<?php

class sellerEnquiry
{
    
    public $db;
    public $id;
    public $db_userTable = "user";
    public $db_car_details = "car_details";
    public $userType;
    public $userFullName;
    public $mobileNo;
    public $address;
    public $status;
    public $budget;
    public $vehicleName;
    public $vehicleNumber;
    public $varient;
    public $fuelType;
    public $color;
    public $modelYear;
    public $passing;
    public $bodyType;
    public $kmsDriven;
    public $numberOfOwner;
    public $enqStatus;
    public $todaysDate;
    public $result;
    public $average;
    public $expectedPrice;
    public $chassisNo;
    public $EngineNo;
    public $tyreCondition;
    public function __construct($db)
    {
        $this->db = $db;
        $this->todaysDate = date("Y-m-d H:i:s");
    }

    public function searchSellerInfo()
    {
        $sql = "SELECT US.userFullName,US.address,US.mobileNo,US.occupation,CD.*
        FROM car_details AS CD
        INNER JOIN user AS US ON CD.sellerId = US.id
        INNER JOIN deal_details AS DD ON DD.idVehicle = CD.id
        WHERE US.userType='Seller' 
        AND US.mobileNo='$this->mobileNo' 
        AND CD.vehicleNumber='$this->vehicleNumber'";
        $this->result = $this->db->query($sql);

        if(mysqli_num_rows($this->result) > 0)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
    
    public function addNewSeller()
    {
        $sql = "SELECT id FROM $this->db_userTable WHERE mobileNo='$this->mobileNo' AND userType='Seller'";
        $this->result = $this->db->query($sql);
        
        if(mysqli_num_rows($this->result) > 0)
        {
            while($row=mysqli_fetch_assoc($this->result))
            {
                $id = $row['id'];
            }
            return $id;
        }
        else
        {
            $this->address = addslashes($this->address);
            $sql_check_in = "INSERT INTO $this->db_userTable (userType, userFullName, mobileNo, address, entryDate, lastUpdate, status) VALUES ('Seller','$this->userFullName','$this->mobileNo','$this->address','$this->todaysDate','$this->todaysDate','Active')";
            $this->result = $this->db->query($sql_check_in);
            $last_id = $this->db->insert_id;
            return $last_id;
        }
    }

    function addNewSellersVehicleDetails($sellerId)
    {
        $this->vehicleName = addslashes($this->vehicleName);
        $sql = "INSERT INTO $this->db_car_details (sellerId, vehicleName, vehicleNumber, varient, bodyType, modelYear, fuelType, passing, numberOfOwner, kmsDriven, color, average, expectedPrice, chassisNo, EngineNo, entryDate, lastUpdate, status) 
                VALUES ($sellerId,'$this->vehicleName','$this->vehicleNumber','$this->varient','$this->bodyType','$this->modelYear','$this->fuelType','$this->passing','$this->numberOfOwner','$this->kmsDriven','$this->color','$this->average','$this->expectedPrice','$this->chassisNo','$this->EngineNo','$this->todaysDate','$this->todaysDate','Active')";
        $this->result = $this->db->query($sql);
        return $this->db; 
    }

    public function getAllSellersRecords($flag,$startDate=0,$endDate=0)
    {

        if($flag == 1)
        {
            $sql = "SELECT CD.id AS vehicleId,US.userFullName,CD.vehicleName,CD.varient,CD.vehicleNumber,
                CD.expectedPrice,CD.entryDate
                FROM car_details AS CD
                INNER JOIN user AS US ON CD.sellerId = US.id
                WHERE US.userType='Seller' and AND CD.entryDate >= '$startDate 00:00:00' AND CD.entryDate <= '$endDate 23:59:59'";
        }
        else
        {
            $sql = "SELECT CD.id AS vehicleId,US.userFullName,CD.vehicleName,CD.varient,CD.vehicleNumber,
                CD.expectedPrice,CD.entryDate
                FROM car_details AS CD
                INNER JOIN user AS US ON CD.sellerId = US.id
                WHERE US.userType='Seller'";
        }
       
        $this->result = $this->db->query($sql);
        
        if(mysqli_num_rows($this->result) > 0)
        {
            return $this->result;
        }
        else
        {
            return false;
        }
    }

    public function getSellersRecordsById()
    {
        $sql = "SELECT US.userFullName,US.address,US.mobileNo,US.occupation,CD.*
        FROM car_details AS CD
        INNER JOIN user AS US ON CD.sellerId = US.id
        WHERE CD.id=$this->id AND US.userType='Seller' AND US.status='Active'";
        $this->result = $this->db->query($sql);

        if(mysqli_num_rows($this->result) > 0)
        {
            return $this->result;
        }
        else
        {
            return false;
        }
    }

}