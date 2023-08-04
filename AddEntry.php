<?php
include "Connection.php";
include error_reporting(0);
// Check user login or not
if(!isset($_SESSION['uname'])){
    header('Location: Login.php');
}

// logout
if(isset($_POST['but_logout'])){
   unset($_SESSION['name']);
  unset($_SESSION['id']);
  unset($_SESSION['uname']);
  setcookie("admin_login", "", time());
   setcookie("admin_password", "", time());
  
    header('Location: Login.php');
}
if(isset($_POST['submit']))
{

 $UserId = $_POST['UserId'];

  if( $UserId !=""){
      
      
    $sql2="select * from points where UserId='$UserId'";
    $result2=mysqli_query($con,$sql2);
    foreach($result2 as $row2)
		{
		      $userType=$row2['userType'];
      $UserId = $row2['UserId'];
      $BusinessId= $row2['BusinessId'];
      $userName=$row2['userName'];
      
      $userCode=$row2['userCode'];
      $referCode=$row2['referCode'];
      $BusinessId=$row2['BusinessId'];
          $deliveryId=$row2['deliveryId'];
		    $template = $row2['template'];
if( $template=="---Select Custom Template---" ||  $template=="" ||  $template=="NULL"){
    
      $AMBASSADORbuspoint=$row2['AMBASSADORbuspoint'];
           $AMBASSADORbusvalue=1;
              $AMBASSADORbus=$row2['AMBASSADORbus'];
         $AMBASSADORbuspoint=$AMBASSADORbusvalue*  $AMBASSADORbus; 
    
      $AMBASSADORbusprice=179;
      
      $pushc=$row2['pushc'];
      $pushc=$row2['pushc'];
      $pushcvalue=3;
      	$pushcpoint=$pushc * $pushcvalue;
      
      $pushcprice=140;
     
      $pushb=$row2['pushb'];
       	$pushbvalue=2;
      	$pushbpoint=$pushb * $pushbvalue;
         $pusha=$row2['pusha'];
      $pushbprice=90;
      	$pushavalue=1;
      	$pushapoint=$pusha * $pushavalue;
   
      $pushaprice=50;
      
      
      $clientReferralsqty =  $row2['clientReferralsqty'] ;
      $clientReferralvalue=1;
      $clientReferralspoints =$clientReferralsqty * $clientReferralvalue;

      
      
      $clientReferralsprice = 0;
            $clientpurchasecreditqty = $row2['clientpurchasecreditqty'];

      $clientpurchasecreditpoints = $row2['clientpurchasecreditpoints'];
       $clientpurchasecreditvalue=2;
    $clientpurchasecreditpoints =$clientpurchasecreditqty * $clientpurchasecreditvalue;

      
    $clientpurchasecreditprice = 0;

    
  $clientpurchasecashqty = $row2['clientpurchasecashqty'];
 $clientpurchasecashvalue=1;
    $clientpurchasecashpoints = $clientpurchasecashqty *$clientpurchasecashvalue;

  
   $clientpurchasecashprice = 0;
  $clientpurchasedifferqty = $row2['clientpurchasedifferqty'];
  $clientpurchasedifferpoints= $row2['clientpurchasedifferpoints'];
     $clientpurchasediffervalue=1;
    $clientpurchasedifferpoints=  $clientpurchasedifferqty *  $clientpurchasediffervalue;
  
    $clientpurchasedifferprice= 0;
  $clientpurchasedeachqty =$row2['clientpurchasedeachqty'];
  $clientpurchasedeachpoints = $row2['clientpurchasedeachpoints'];
    $clientpurchasedeachprice = 0;

  $businessReferralsqty = $row2['businessReferralsqty'];
  $businessReferralsvalue=2;
  $businessReferralspoints = $businessReferralsqty *  $businessReferralsvalue;
    $businessReferralsprice = 0;

  $businessPurchasedMonthlyqty = $row2['businessPurchasedMonthlyqty'];
  $businessPurchasedMonthlyvalue=1;
  $businessPurchasedMonthlypoints = $businessPurchasedMonthlyqty * $businessPurchasedMonthlyvalue ;
  $businessPurchasedMonthlyprice = 199;

  $businessPurchasedHalfqty = $row2['businessPurchasedHalfqty'];
  $businessPurchasedHalfvalue=6;
  $businessPurchasedHalfpoints = $businessPurchasedHalfqty * $businessPurchasedHalfvalue;
    $businessPurchasedHalfprice = 955;

  $businessPurchasedyearqty = $row2['businessPurchasedyearqty'];
 $businessPurchasedyearvalue=12;

  $businessPurchasedyearpoints =  $businessPurchasedyearqty * $businessPurchasedyearvalue;
  $businessPurchasedyearprice = 1194;

  $businessSoldqty = $row2['businessSoldqty'];
  $businessSoldvalue=1;
  $businessSoldpoints = $businessSoldvalue * $businessSoldqty ;
    $businessSoldprice = 0;

  $businessSaleMonthqty = $row2['businessSaleMonthqty'];
 $businessSaleMonthvalue=1;
  $businessSaleMonthpoints =$businessSaleMonthqty * $businessSaleMonthvalue ;
  
  $businessSaleMonthprice =0;

  
 $businessSoldCreditqty = $row2['businessSoldCreditqty'];
  $businessSoldCreditvalue=1;
    $businessSoldCreditpoints= $businessSoldCreditqty * $businessSoldCreditvalue;
  
$businessSoldCreditprice= 1;
  $businessPurchasedPushqty = $row2['businessPurchasedPushqty'];
  $businessPurchasedPushpoints = $row2['businessPurchasedPushpoints'];
    $businessPurchasedPushprice = 0;

  $businessPurchasedPushNoteqty = $row2['businessPurchasedPushNoteqty'];
  $businessPurchasedPushNotevalue=1;
  $businessPurchasedPushNotepoints =$businessPurchasedPushNoteqty * $businessPurchasedPushNotevalue;
  $businessPurchasedPushNoteprice = 0;

  $deliveryReferralsqty= $row2['deliveryReferralsqty'];
  $deliveryReferralsvalue=1;
  $deliveryReferralspoints =$deliveryReferralsqty *  $deliveryReferralsvalue;
    $deliveryReferralsprice = 0;

  $deliveryItemqty = $row2['deliveryItemqty'];
   $deliveryItemvalue=1;
  $deliveryItempoints = $deliveryItemvalue * $deliveryItemqty ;
    $deliveryitemprice = 0;

  $deliverycompletedqty = $row2['deliverycompletedqty'];
 $deliverycompletedvalue=1;
  $deliverycompletedpoints =  $deliverycompletedqty * $deliverycompletedvalue; 
  $deliverycompletedprice = 0;

  $Totalqty = $row2['Totalqty'];
  $Totalpoint = $row2['Totalpoint'];
    $Totalprice = $row2['Totalprice'];
}
else{
$template = $row2['template'];
$sql3="select * from template where ID='$template' OR Name='$template'";
    $result3=mysqli_query($con,$sql3);
    foreach($result3 as $row3){
        $users=$row3['Name'];
        
        $AMBASSADORbusvalue=$row3['busAMBApoint'];
              $AMBASSADORbus=$row2['AMBASSADORbus'];
         $AMBASSADORbuspoint=$AMBASSADORbusvalue*  $AMBASSADORbus; 
         
      $AMBASSADORbusprice=$row3['busAMBAprice'];
      
      $pushc=$row2['pushc'];
      $pushcvalue=$row3['buspushcpoint'];
      	$pushcpoint=$pushc * $pushcvalue;
      
      $pushcprice=$row3['buspushcprice'];
      
      $pushb=$row2['pushb'];
       	$pushbvalue=$row3['buspushbpoint'];
      	$pushbpoint=$pushb * $pushbvalue;
      
      $pushbprice=$row3['buspushbprice'];
      
      $pusha=$row2['pusha'];
      	$pushavalue=$row3['buspushapoint'];
      	$pushapoint=$pusha * $pushavalue;
      $pushaprice=$row3['buspushaprice'];
      
      
    $clientReferralsqty =  $row2['clientReferralsqty'];
      $clientReferralspoints = $row2['clientReferralspoints'];
      $clientReferralvalue= $row3['Refclientpoint'];
      $clientReferralspoints =$clientReferralsqty * $clientReferralvalue;

      
      
      $clientReferralsprice = $row3['Refclientprice'];
            $clientpurchasecreditqty = $row2['clientpurchasecreditqty'];

      $clientpurchasecreditpoints = $row2['clientpurchasecreditpoints'];
      $clientpurchasecreditvalue=$row3['clientCreditpoint'];
    $clientpurchasecreditpoints =$clientpurchasecreditqty * $clientpurchasecreditvalue;

      
    $clientpurchasecreditprice = $row3['clientCreditprice'];

    
  $clientpurchasecashqty = $row2['clientpurchasecashqty'];
  $clientpurchasecashpoints = $row2['clientpurchasecashpoints'];
    $clientpurchasecashvalue=$row3['clientCashpoint'];
    $clientpurchasecashpoints = $clientpurchasecashqty *$clientpurchasecashvalue;


   $clientpurchasecashprice = $row3['clientCashprice'];
  $clientpurchasedifferqty = $row2['clientpurchasedifferqty'];
  $clientpurchasedifferpoints= $row2['clientpurchasedifferpoints'];
  $clientpurchasediffervalue=$row3['client5busipoint'];
    $clientpurchasedifferpoints=  $clientpurchasedifferqty *  $clientpurchasediffervalue;

  
    $clientpurchasedifferprice= $row3['client5busiprice'];
  $clientpurchasedeachqty =$row2['clientpurchasedeachqty'];
  $clientpurchasedeachpoints = $row2['clientpurchasedeachpoints'];
    $clientpurchasedeachprice = $row3['client5eachprice'];

  $businessReferralsqty = $row2['businessReferralsqty'];
 $businessReferralsvalue=$row3['Refbusinesspoint'];
  $businessReferralspoints = $businessReferralsqty *  $businessReferralsvalue;
      $businessReferralsprice = $row3['Refbusinessprice'];


  $businessPurchasedMonthlyqty = $row2['businessPurchasedMonthlyqty'];
$businessPurchasedMonthlyqty = $row2['businessPurchasedMonthlyqty'];
  $businessPurchasedMonthlyvalue=$row3['busimonthpoint'] ;
  $businessPurchasedMonthlypoints = $businessPurchasedMonthlyqty * $businessPurchasedMonthlyvalue ;
  $businessPurchasedMonthlyprice = $row3['busimonthprice'];

  $businessPurchasedHalfqty = $row2['businessPurchasedHalfqty'];
  $businessPurchasedHalfvalue=$row3['busihalfyearpoint'];
  $businessPurchasedHalfpoints = $businessPurchasedHalfqty * $businessPurchasedHalfvalue;
    $businessPurchasedHalfprice = $row3['busihalfyearprice'];

  $businessPurchasedyearqty = $row2['businessPurchasedyearqty'];
     $businessPurchasedyearvalue=$row3['busiyearpoint'];

  $businessPurchasedyearpoints =  $businessPurchasedyearqty * $businessPurchasedyearvalue;
    $businessPurchasedyearprice = $row3['busiyearprice'];

  $businessSoldqty = $row2['businessSoldqty'];
  $businessSoldvalue=$row3['busi5differpoint'];
  $businessSoldpoints = $businessSoldvalue * $businessSoldqty;
    $businessSoldprice = $row3['busi10saleprice'];

  $businessSaleMonthqty = $row2['businessSaleMonthqty'];
  $businessSaleMonthvalue=$row3['busi10salepoint'];
  $businessSaleMonthpoints =$businessSaleMonthqty * $businessSaleMonthvalue ;
    $businessSaleMonthprice = $row3['busi10saleprice'];

  $businessSoldCreditqty = $row2['businessSoldCreditqty'];
  $businessSoldCreditvalue=$row3['buscreditpoint'];
    $businessSoldCreditpoints= $businessSoldCreditqty * $businessSoldCreditvalue;

$businessSoldCreditprice=$row3['buscreditprice'] ;

  $businessPurchasedPushqty = $row2['businessPurchasedPushqty'];
  $businessPurchasedPushpoints = $row2['businessPurchasedPushpoints'];
    $businessPurchasedPushprice = $row3['busipurpushprice'];

  $businessPurchasedPushNoteqty = $row2['businessPurchasedPushNoteqty'];
  $businessPurchasedPushNotevalue=$row3['busipur5pushpoint'];
  $businessPurchasedPushNotepoints =$businessPurchasedPushNoteqty * $businessPurchasedPushNotevalue;
    $businessPurchasedPushNoteprice = $row3['busipur5pushprice'];

  $deliveryReferralsqty= $row2['deliveryReferralsqty'];
  $deliveryReferralsvalue=$row3['RefDeliverypoint'];
  $deliveryReferralspoints =$deliveryReferralsqty *  $deliveryReferralsvalue;
    $deliveryReferralsprice = $row3['RefDeliveryprice'];

  $deliveryItemqty = $row2['deliveryItemqty'];
  $deliveryItemvalue=$row3['deliveryitempoint'];
  $deliveryItempoints = $deliveryItemvalue * $deliveryItemqty ;
    $deliveryitemprice = $row3['deliveryitemprice'];

  $deliverycompletedqty = $row2['deliverycompletedqty'];
  $deliverycompletedvalue=$row3['delivery5completepoint'];
  $deliverycompletedpoints =  $deliverycompletedqty * $deliverycompletedvalue;
  
    $deliverycompletedprice = $row3['delivery5completeprice'];

  $Totalqty = $row2['Totalqty'];
  $Totalpoint = $row2['Totalpoint'];
    $Totalprice = $row2['Totalprice'];
       
    }
}
    }

  }
  


}
else{
      $UserId = "";
      $businessId= "";
      $userName=""; 

        $AMBASSADORbuspoint=0;
      $AMBASSADORbus=0;
      $AMBASSADORbusprice=179;
      $pushcpoint=0;
      $pushc=0;
      $pushcprice=140;
      $pushbpoint=0;
      $pushb=0;
      $pushbprice=90;
      $pushapoint=0;
      $pusha=0;
      $pushaprice=50;
      $clientReferralvalue=1;
      $businessReferralsvalue=2;
      $deliveryReferralsvalue=1;
      $clientpurchasecreditvalue=2;
       $clientpurchasecashvalue=1;
       $clientpurchasediffervalue=1;
       $AMBASSADORbusvalue=1;
       $businessPurchasedMonthlyvalue=1;
       $businessPurchasedHalfvalue=6;
       $businessPurchasedyearvalue=12;
      
  $clientReferralsqty = 0;
   
  $clientReferralspoints = 0;
  $clientReferralsvalue=0.5;
  $clientReferralsprice = 0;
  $clientpurchasecreditqty = 0;
  $clientpurchasecreditpoints =0;
  $clientpurchasecreditprice =0;
  $clientpurchasecashqty = 0;
  $clientpurchasecashpoints =0;
  $clientpurchasecashprice =0;
  $clientpurchasedifferqty =0;
  $clientpurchasedifferpoints= 0;
  $clientpurchasedifferprice= 0;
  $clientpurchasedeachqty = 0;
  $clientpurchasedeachpoints = 0;

  $clientpurchasedeachprice = 0;
  $businessReferralsqty = 0;
  $businessReferralspoints =0;
  $businessReferralsprice =0;
  $businessPurchasedMonthlyqty = 0;
  $businessPurchasedMonthlypoints = 0;
  $businessPurchasedMonthlyprice = 199;
  $businessPurchasedHalfqty = 0;
  $businessPurchasedHalfpoints =0;
  $businessPurchasedHalfprice =955;
  $businessPurchasedyearqty = 0;
  $businessPurchasedyearpoints = 0;
  $businessPurchasedyearprice = 1194;
  $businessSoldqty =0;
  $businessSoldvalue=1;
  $businessSoldpoints = 0;
   $businessSoldprice = 0;
  $businessSaleMonthqty = 0;
  $businessSaleMonthpoints = 0;
  $businessSaleMonthvalue=1;
  $businessSaleMonthprice = 0;
  $businessSoldCreditqty = 0;
  $businessSoldCreditpoints= 0;
  $businessSoldCreditvalue=1;
  $businessSoldCreditprice=1;
  $businessPurchasedPushqty = 0;
  $businessPurchasedPushpoints = 0;
  $businessPurchasedPushprice = 0;
  $businessPurchasedPushNoteqty = 0;
  $businessPurchasedPushNotepoints = 0;
  $businessPurchasedPushNotevalue=1;
  $businessPurchasedPushNoteprice = 0;
  $deliveryReferralsqty= 0;
  $deliveryReferralspoints = 0;
  $deliveryReferralvalue=1;
  $deliveryReferralsprice = 0;
  $deliveryItemqty =0;
  $deliveryItemvalue=1;
  $deliveryItempoints = 0;
  $deliveryitemprice = 0;
  $deliverycompletedqty = 0;
  $deliverycompletedpoints = 0;
  $deliverycompletedvalue=1;
  $deliverycompletedprice = 0;
  $Totalqty = 0;
  $Totalpoint = 0;
  $Totalprice = 0;
	$pushavalue=1;
	$pushbvalue=2;
	$pushcvalue=3;

}

if(isset($_POST['save']))
{
    
    
    $UserId = $_POST['UserId'];
	$userName = $_POST['userName'];
   $userType=$_POST['userType'];
   $BusinessId=$_POST['BusinessId'];
   $users=$_POST['users'];
   $deliveryId=$_POST['deliveryId'];
   
    $hide = '';
    $hide1 = ''; 
    $hide2 = '';// reset $hide variable to avoid to hide other rows
 
    if ($deliveryId !="") 
    {
        $hide2 = 'style=""';
    }
    else{
      $hide2 = 'style="display: none;"';
    }
    if ($BusinessId !="") 
    {
        $hide1 = 'style=""';
    }
    else{
      $hide1 = 'style="display: none;"';
    }
   $userDate=date("Y-m-d h:i:s");
  $AMBASSADORbuspoint=str_replace(',', '',$_POST['AMBASSADORbuspoint']);
   $AMBASSADORbus=str_replace(',', '',$_POST['AMBASSADORbus']);
   $AMBASSADORbusprice=str_replace(',', '',$_POST['AMBASSADORbusprice']);
   $pushcpoint=str_replace(',', '',$_POST['pushcpoint']);
   $pushc=str_replace(',', '',$_POST['pushc']);
   $pushcprice=str_replace(',', '',$_POST['pushcprice']);
   $pushbpoint=str_replace(',', '',$_POST['pushbpoint']);
   $pushb=str_replace(',', '',$_POST['pushb']);
   $pushbprice=str_replace(',', '',$_POST['pushbprice']);
   $pushapoint=str_replace(',', '',$_POST['pushapoint']);
   $pusha=str_replace(',', '',$_POST['pusha']);
   $pushaprice=str_replace(',', '',$_POST['pushaprice']);
  
  
	 $clientReferralsqty = str_replace(',', '',$_POST['clientReferralsqty']);
	 $clientReferralspoints = str_replace(',', '',$_POST['clientReferralspoints']);
	 $clientReferralsprice = str_replace(',', '',$_POST['clientReferralsprice']);
	 $clientpurchasecreditqty = str_replace(',', '',$_POST['clientpurchasecreditqty']);
	 $clientpurchasecreditpoints = str_replace(',', '',$_POST['clientpurchasecreditpoints']);
	$clientpurchasecreditprice = str_replace(',', '',$_POST['clientpurchasecreditprice']);
	 $clientpurchasecashqty = str_replace(',', '',$_POST['clientpurchasecashqty']);
	 $clientpurchasecashpoints = str_replace(',', '',$_POST['clientpurchasecashpoints']);
	 $clientpurchasecashprice = str_replace(',', '',$_POST['clientpurchasecashprice']);
	 $clientpurchasedifferqty = str_replace(',', '',$_POST['clientpurchasedifferqty']);
	 $clientpurchasedifferpoints= str_replace(',', '',$_POST['clientpurchasedifferpoints']);
	 $clientpurchasedifferprice= str_replace(',', '',$_POST['clientpurchasedifferprice']);
	 $clientpurchasedeachqty = str_replace(',', '',$_POST['clientpurchasedeachqty']);
	 $clientpurchasedeachpoints = str_replace(',', '',$_POST['clientpurchasedeachpoints']);
	 $clientpurchasedeachprice = str_replace(',', '',$_POST['clientpurchasedeachprice']);
	 $businessReferralsqty = str_replace(',', '',$_POST['businessReferralsqty']);
	 $businessReferralspoints = str_replace(',', '',$_POST['businessReferralspoints']);
	 $businessReferralsprice = str_replace(',', '',$_POST['businessReferralsprice']);
	 $businessPurchasedMonthlyqty = str_replace(',', '',$_POST['businessPurchasedMonthlyqty']);
	 $businessPurchasedMonthlypoints = str_replace(',', '',$_POST['businessPurchasedMonthlypoints']);
	 $businessPurchasedMonthlyprice = str_replace(',', '',$_POST['businessPurchasedMonthlyprice']);
	 $businessPurchasedHalfqty = str_replace(',', '',$_POST['businessPurchasedHalfqty']);
	 $businessPurchasedHalfpoints = str_replace(',', '',$_POST['businessPurchasedHalfpoints']);
	 $businessPurchasedHalfprice = str_replace(',', '',$_POST['businessPurchasedHalfprice']);
	 $businessPurchasedyearqty = str_replace(',', '',$_POST['businessPurchasedyearqty']);
	 $businessPurchasedyearpoints = str_replace(',', '',$_POST['businessPurchasedyearpoints']);
	 $businessPurchasedyearprice = str_replace(',', '',$_POST['businessPurchasedyearprice']);
	 $businessSoldqty = str_replace(',', '',$_POST['businessSoldqty']);
	 $businessSoldpoints = str_replace(',', '',$_POST['businessSoldpoints']);
	 $businessSoldprice = str_replace(',', '',$_POST['businessSoldprice']);
	 $businessSaleMonthqty = str_replace(',', '',$_POST['businessSaleMonthqty']);
	 $businessSaleMonthpoints = str_replace(',', '',$_POST['businessSaleMonthpoints']);
	 $businessSaleMonthprice = str_replace(',', '',$_POST['businessSaleMonthprice']);
	 $businessSoldCreditqty = str_replace(',', '',$_POST['businessSoldCreditqty']);
	 $businessSoldCreditpoints= str_replace(',', '',$_POST['businessSoldCreditpoints']);
	 $businessSoldCreditprice= str_replace(',', '',$_POST['businessSoldCreditprice']);
	 $businessPurchasedPushqty = str_replace(',', '',$_POST['businessPurchasedPushqty']);
	 $businessPurchasedPushpoints = str_replace(',', '',$_POST['businessPurchasedPushpoints']);
	 $businessPurchasedPushprice = str_replace(',', '',$_POST['businessPurchasedPushprice']);
	 $businessPurchasedPushNoteqty = str_replace(',', '',$_POST['businessPurchasedPushNoteqty']);
	 $businessPurchasedPushNotepoints =str_replace(',', '',$_POST['businessPurchasedPushNotepoints']);
	  $businessPurchasedPushNoteprice =str_replace(',', '',$_POST['businessPurchasedPushNoteprice']);
	 $deliveryReferralsqty= str_replace(',', '',$_POST['deliveryReferralsqty']);
	 $deliveryReferralspoints = str_replace(',', '',$_POST['deliveryReferralspoints']);
	 $deliveryReferralsprice = str_replace(',', '',$_POST['deliveryReferralsprice']);
	 $deliveryItemqty = str_replace(',', '',$_POST['deliveryItemqty']);
	 $deliveryItempoints = str_replace(',', '',$_POST['deliveryItempoints']);
	 $deliveryitemprice = str_replace(',', '',$_POST['deliveryitemprice']);
	 $deliverycompletedqty = str_replace(',', '',$_POST['deliverycompletedqty']);
	 $deliverycompletedpoints = str_replace(',', '',$_POST['deliverycompletedpoints']);
	 $deliverycompletedprice = str_replace(',', '',$_POST['deliverycompletedprice']);
  

   $Totalqty = str_replace(',', '',$_POST['Totalqty']);
   $Totalpoint = str_replace(',', '',$_POST['Totalpoint']);
 $Totalprice = $_POST['Totalprice'];

 $clientReferralvalue = str_replace(',', '',$_POST['clientReferralvalue']);
 $businessReferralsvalue =str_replace(',', '',$_POST['businessReferralsvalue']);
 $deliveryReferralsvalue =str_replace(',', '',$_POST['deliveryReferralsvalue']);
$AMBASSADORbusvalue=str_replace(',', '',$_POST['AMBASSADORbusvalue']);
$pushcvalue=str_replace(',', '',$_POST['pushcvalue']);
$pushbvalue=str_replace(',', '',$_POST['pushbvalue']);
$pushavalue=str_replace(',', '',$_POST['pushavalue']);

$clientpurchasecreditvalue=str_replace(',', '',$_POST['clientpurchasecreditvalue']);
$clientpurchasecashvalue=str_replace(',', '',$_POST['clientpurchasecashvalue']);
$clientpurchasediffervalue=str_replace(',', '',$_POST['clientpurchasediffervalue']);
$businessPurchasedMonthlyvalue=str_replace(',', '',$_POST['businessPurchasedMonthlyvalue']);
$businessPurchasedHalfvalue=str_replace(',', '',$_POST['businessPurchasedHalfvalue']);
$businessPurchasedyearvalue=str_replace(',', '',$_POST['businessPurchasedyearvalue']);
$businessSoldvalue=str_replace(',', '',$_POST['businessSoldvalue']);
$businessSaleMonthvalue=str_replace(',', '',$_POST['businessSaleMonthvalue']);
$businessSoldCreditvalue=str_replace(',', '',$_POST['businessSoldCreditvalue']);
$businessPurchasedPushNotevalue=str_replace(',', '',$_POST['businessPurchasedPushNotevalue']);
$deliveryItemvalue=str_replace(',', '',$_POST['deliveryItemvalue']);
$deliverycompletedvalue=str_replace(',', '',$_POST['deliverycompletedvalue']);

$clientReferralsincome=str_replace(',', '',$_POST['clientReferralsincome']);
$businessReferralsincome=str_replace(',', '',$_POST['businessReferralsincome']);
$deliveryReferralsincome=str_replace(',', '',$_POST['deliveryReferralsincome']);
$clientpurchasecreditincome=str_replace(',', '',$_POST['clientpurchasecreditincome']);
$clientpurchasecashincome=str_replace(',', '',$_POST['clientpurchasecashincome']);
$clientpurchasedifferincome=str_replace(',', '',$_POST['clientpurchasedifferincome']);
$AMBASSADORbusincome=str_replace(',', '',$_POST['AMBASSADORbusincome']);
$businessPurchasedMonthlyincome=str_replace(',', '',$_POST['businessPurchasedMonthlyincome']);
$businessPurchasedHalfincome=str_replace(',', '',$_POST['businessPurchasedHalfincome']);
$businessPurchasedyearincome=str_replace(',', '',$_POST['businessPurchasedyearincome']);
$businessSoldincome=str_replace(',', '',$_POST['businessSoldincome']);
$businessSaleMonthincome=str_replace(',', '',$_POST['businessSaleMonthincome']);
$pushaincome=str_replace(',', '',$_POST['pushaincome']);
$pushbincome=str_replace(',', '',$_POST['pushbincome']);
$pushcincome=str_replace(',', '',$_POST['pushcincome']);
$businessSoldCreditincome=str_replace(',', '',$_POST['businessSoldCreditincome']);
$businessPurchasedPushincome=str_replace(',', '',$_POST['businessPurchasedPushincome']);
$deliveryitemincome=str_replace(',', '',$_POST['deliveryitemincome']);
$deliverycompletedincome=str_replace(',', '',$_POST['deliverycompletedincome']);




$deliveryItemvalue=str_replace(',', '',$_POST['deliveryItemvalue']);
$deliverycompletedvalue=str_replace(',', '',$_POST['deliverycompletedvalue']);

 
  if( $UserId !=""){
    $sql1="select * from admin where UserId='$UserId'";
    $result1=mysqli_query($con,$sql1);
    foreach($result1 as $row)
		{
      $ID=$row['ID'];
    }

  



$sql="update points set userDate='$userDate', clientReferralsqty='$clientReferralsqty' 
,clientReferralspoints='$clientReferralspoints'
,clientReferralsprice='$clientReferralsprice'
,clientpurchasecreditqty='$clientpurchasecreditqty'
,clientpurchasecreditpoints='$clientpurchasecreditpoints'
,clientpurchasecreditprice='$clientpurchasecreditprice'
,clientpurchasecashqty='$clientpurchasecashqty'
,clientpurchasecashpoints='$clientpurchasecashpoints'
,clientpurchasecashprice='$clientpurchasecashprice'
,clientpurchasedifferqty='$clientpurchasedifferqty'
,clientpurchasedifferpoints='$clientpurchasedifferpoints'
,clientpurchasedifferprice='$clientpurchasedifferprice'
,clientpurchasedeachqty='$clientpurchasedeachqty'
,clientpurchasedeachpoints='$clientpurchasedeachpoints'
,clientpurchasedeachprice='$clientpurchasedeachprice'
,businessReferralsqty='$businessReferralsqty'
,businessReferralspoints='$businessReferralspoints'
,businessReferralsprice='$businessReferralsprice'

,businessPurchasedMonthlyqty='$businessPurchasedMonthlyqty'
,businessPurchasedMonthlypoints='$businessPurchasedMonthlypoints'
,businessPurchasedMonthlyprice='$businessPurchasedMonthlyprice'
,businessPurchasedHalfqty='$businessPurchasedHalfqty'
,businessPurchasedHalfpoints='$businessPurchasedHalfpoints'
,businessPurchasedHalfprice='$businessPurchasedHalfprice'
,businessPurchasedyearqty='$businessPurchasedyearqty'
,businessPurchasedyearpoints='$businessPurchasedyearpoints'
,businessPurchasedyearprice='$businessPurchasedyearprice'

,businessSoldqty='$businessSoldqty'
,businessSoldpoints='$businessSoldpoints'
,businessSoldprice='$businessSoldprice'

,businessSaleMonthqty='$businessSaleMonthqty'
,businessSaleMonthpoints='$businessSaleMonthpoints'
,businessSaleMonthprice='$businessSaleMonthprice'

,businessSoldCreditqty='$businessSoldCreditqty'
,businessSoldCreditpoints='$businessSoldCreditpoints'
,businessSoldCreditprice='$businessSoldCreditprice'

,businessPurchasedPushqty='$businessPurchasedPushqty'
,businessPurchasedPushpoints='$businessPurchasedPushpoints'
,businessPurchasedPushprice='$businessPurchasedPushprice'

,businessPurchasedPushNoteqty='$businessPurchasedPushNoteqty',
businessPurchasedPushNotepoints='$businessPurchasedPushNotepoints',
businessPurchasedPushNoteprice='$businessPurchasedPushNoteprice'
, deliveryReferralsqty='$deliveryReferralsqty'
,deliveryReferralspoints='$deliveryReferralspoints'
,deliveryReferralsprice='$deliveryReferralsprice'

,deliveryItemqty='$deliveryItemqty'
,deliveryItempoints='$deliveryItempoints'
,deliveryitemprice='$deliveryitemprice'

,deliverycompletedqty='$deliverycompletedqty'
,deliverycompletedpoints='$deliverycompletedpoints'
,deliverycompletedprice='$deliverycompletedprice'
,Totalqty='$Totalqty',Totalpoint='$Totalpoint' ,Totalprice='$Totalprice' 
,AMBASSADORbuspoint='$AMBASSADORbuspoint'
, AMBASSADORbus='$AMBASSADORbus'
, AMBASSADORbusprice='$AMBASSADORbusprice'
, pushcpoint='$pushcpoint'
, pushc='$pushc'
, pushcprice='$pushcprice'
, pushbpoint='$pushbpoint'
, pushb='$pushb'
, pushbprice='$pushbprice'
,pushapoint='$pushapoint'
,pusha='$pusha',pushaprice='$pushaprice',template='$users',
clientReferralsincome='$clientReferralsincome',
businessReferralsincome='$businessReferralsincome',
deliveryReferralsincome='$deliveryReferralsincome',
clientpurchasecreditincome='$clientpurchasecreditincome',
clientpurchasecashincome='$clientpurchasecashincome',
clientpurchasedifferincome='$clientpurchasedifferincome',
AMBASSADORbusincome='$AMBASSADORbusincome',
businessPurchasedMonthlyincome='$businessPurchasedMonthlyincome',
businessPurchasedHalfincome='$businessPurchasedHalfincome',
businessPurchasedyearincome='$businessPurchasedyearincome',
businessSoldincome='$businessSoldincome',
businessSaleMonthincome='$businessSaleMonthincome',
pushaincome='$pushaincome',
pushbincome='$pushbincome',
pushcincome='$pushcincome',
businessSoldCreditincome='$businessSoldCreditincome',
businessPurchasedPushincome='$businessPurchasedPushincome',
deliveryitemincome='$deliveryitemincome',
deliverycompletedincome='$deliverycompletedincome'


where UserId = '$UserId' ";
if (mysqli_query($con, $sql)) {
  // alert( "");
  echo '<script>alert("Added points successfully !")</script>';

	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($con);
	 }
	 mysqli_close($con);
  }
}

  if(isset($_POST['Connect']))
{

 
  $r=array();
$sql0="select UserId from points";
$result0=mysqli_query($con,$sql0);

 

 while($info = mysqli_fetch_array($result0,MYSQLI_ASSOC)) {

 if (!in_array($info['UserId'], $r)) {
 $r= $info['UserId'];
// print("ID: ".$info["UserId"]."\n");
 }

  $sql2="select * from points where UserId='$r'";
     $result2=mysqli_query($con,$sql2);
     foreach($result2 as $row2)
		{ 
            	  
    		    $template = $row2['template'];
		    
		    if( $template=="---Select Custom Template---" ||  $template=="" ||  $template=="NULL"){
		       $template="Standard Template";
		    }
		    else{
		         $template = $row2['template'];
		    }
		  
		    
	$sql3="select * from template where ID='$template' OR Name='$template'";
    $result3=mysqli_query($con,$sql3);
    foreach($result3 as $row3){
        $users=$row3['Name'];
        
        $AMBASSADORbusvalue=$row3['busAMBApoint'];
              $AMBASSADORbus=$row2['AMBASSADORbus'];
         $AMBASSADORbuspoint=$AMBASSADORbusvalue *  $AMBASSADORbus; 
         
      $AMBASSADORbusprice=$row3['busAMBAprice'];
      
      $pushc=$row2['pushc'];
      $pushcvalue=$row3['buspushcpoint'];
      	$pushcpoint=$pushc * $pushcvalue;
      
      $pushcprice=$row3['buspushcprice'];
      
      $pushb=$row2['pushb'];
       	$pushbvalue=$row3['buspushbpoint'];
      	$pushbpoint=$pushb * $pushbvalue;
      
      $pushbprice=$row3['buspushbprice'];
      
      $pusha=$row2['pusha'];
      	$pushavalue=$row3['buspushapoint'];
      	$pushapoint=$pusha * $pushavalue;
      $pushaprice=$row3['buspushaprice'];
      
      
    $clientReferralsqty =  $row2['clientReferralsqty'];
      $clientReferralspoints = $row2['clientReferralspoints'];
      $clientReferralvalue= $row3['Refclientpoint'];
      $clientReferralspoints =$clientReferralsqty * $clientReferralvalue;


      $clientReferralsprice = $row3['Refclientprice'];
            $clientpurchasecreditqty = $row2['clientpurchasecreditqty'];

      $clientpurchasecreditpoints = $row2['clientpurchasecreditpoints'];
      $clientpurchasecreditvalue=$row3['clientCreditpoint'];
    $clientpurchasecreditpoints =$clientpurchasecreditqty * $clientpurchasecreditvalue;

      
    $clientpurchasecreditprice = $row3['clientCreditprice'];

    
  $clientpurchasecashqty = $row2['clientpurchasecashqty'];
  $clientpurchasecashpoints = $row2['clientpurchasecashpoints'];
    $clientpurchasecashvalue=$row3['clientCashpoint'];
    $clientpurchasecashpoints = $clientpurchasecashqty *$clientpurchasecashvalue;


   $clientpurchasecashprice = $row3['clientCashprice'];
  $clientpurchasedifferqty = $row2['clientpurchasedifferqty'];
  $clientpurchasedifferpoints= $row2['clientpurchasedifferpoints'];
  $clientpurchasediffervalue=$row3['client5busipoint'];
    $clientpurchasedifferpoints=  $clientpurchasedifferqty *  $clientpurchasediffervalue;

  
    $clientpurchasedifferprice= $row3['client5busiprice'];
  $clientpurchasedeachqty =$row2['clientpurchasedeachqty'];
  $clientpurchasedeachpoints = $row2['clientpurchasedeachpoints'];
    $clientpurchasedeachprice = $row3['client5eachprice'];

  $businessReferralsqty = $row2['businessReferralsqty'];
 $businessReferralsvalue=$row3['Refbusinesspoint'];
  $businessReferralspoints = $businessReferralsqty *  $businessReferralsvalue;
      $businessReferralsprice = $row3['Refbusinessprice'];


  $businessPurchasedMonthlyqty = $row2['businessPurchasedMonthlyqty'];
$businessPurchasedMonthlyqty = $row2['businessPurchasedMonthlyqty'];
  $businessPurchasedMonthlyvalue=$row3['busimonthpoint'] ;
  $businessPurchasedMonthlypoints = $businessPurchasedMonthlyqty * $businessPurchasedMonthlyvalue ;
  $businessPurchasedMonthlyprice = $row3['busimonthprice'];

  $businessPurchasedHalfqty = $row2['businessPurchasedHalfqty'];
  $businessPurchasedHalfvalue=$row3['busihalfyearpoint'];
  $businessPurchasedHalfpoints = $businessPurchasedHalfqty * $businessPurchasedHalfvalue;
    $businessPurchasedHalfprice = $row3['busihalfyearprice'];

  $businessPurchasedyearqty = $row2['businessPurchasedyearqty'];
     $businessPurchasedyearvalue=$row3['busiyearpoint'];

  $businessPurchasedyearpoints =  $businessPurchasedyearqty * $businessPurchasedyearvalue;
    $businessPurchasedyearprice = $row3['busiyearprice'];

  $businessSoldqty = $row2['businessSoldqty'];
  $businessSoldvalue=$row3['busi5differpoint'];
  $businessSoldpoints = $businessSoldvalue * $businessSoldqty;
    $businessSoldprice = $row3['busi10saleprice'];

  $businessSaleMonthqty = $row2['businessSaleMonthqty'];
  $businessSaleMonthvalue=$row3['busi10salepoint'];
  $businessSaleMonthpoints =$businessSaleMonthqty * $businessSaleMonthvalue ;
    $businessSaleMonthprice = $row3['busi10saleprice'];

  $businessSoldCreditqty = $row2['businessSoldCreditqty'];
  $businessSoldCreditvalue=$row3['buscreditpoint'];
    $businessSoldCreditpoints= $businessSoldCreditqty * $businessSoldCreditvalue;

$businessSoldCreditprice=$row3['buscreditprice'] ;

  $businessPurchasedPushqty = $row2['businessPurchasedPushqty'];
  $businessPurchasedPushpoints = $row2['businessPurchasedPushpoints'];
    $businessPurchasedPushprice = $row3['busipurpushprice'];

  $businessPurchasedPushNoteqty = $row2['businessPurchasedPushNoteqty'];
  $businessPurchasedPushNotevalue=$row3['busipur5pushpoint'];
  $businessPurchasedPushNotepoints =$businessPurchasedPushNoteqty * $businessPurchasedPushNotevalue;
    $businessPurchasedPushNoteprice = $row3['busipur5pushprice'];

  $deliveryReferralsqty= $row2['deliveryReferralsqty'];
  $deliveryReferralsvalue=$row3['RefDeliverypoint'];
  $deliveryReferralspoints =$deliveryReferralsqty *  $deliveryReferralsvalue;
    $deliveryReferralsprice = $row3['RefDeliveryprice'];

  $deliveryItemqty = $row2['deliveryItemqty'];
  $deliveryItemvalue=$row3['deliveryitempoint'];
  $deliveryItempoints = $deliveryItemvalue * $deliveryItemqty ;
    $deliveryitemprice = $row3['deliveryitemprice'];

  $deliverycompletedqty = $row2['deliverycompletedqty'];
  $deliverycompletedvalue=$row3['delivery5completepoint'];
  $deliverycompletedpoints =  $deliverycompletedqty * $deliverycompletedvalue;
  
    $deliverycompletedprice = $row3['delivery5completeprice'];

$Totalqty = $clientReferralsqty + $businessReferralsqty + $deliveryReferralsqty + $clientpurchasecreditqty + $clientpurchasecashqty + $clientpurchasedifferqty + $AMBASSADORbus + $businessPurchasedMonthlyqty + $businessPurchasedHalfqty + $businessPurchasedyearqty + $businessSoldqty + $businessSaleMonthqty + $pusha + $pushb + $pushc + $businessSoldCreditqty + $businessPurchasedPushNoteqty + $deliveryItemqty + $deliverycompletedqty;
  
   $Totalpoint = $clientReferralspoints + $businessReferralspoints + $deliveryReferralspoints + $clientpurchasecreditpoints+$clientpurchasecashpoints+$clientpurchasedifferpoints+
		     $businessPurchasedMonthlypoints+$businessPurchasedHalfpoints+$businessPurchasedyearpoints+
		     $pushcpoint+$pushbpoint+$pushapoint+$businessSoldCreditpoints+
		     $businessPurchasedPushNotepoints+$deliveryItempoints+$deliverycompletedpoints+$businessSoldpoints+$businessSaleMonthpoints+$AMBASSADORbuspoint;;
 
   
     $sql4="update points set clientReferralsqty='$clientReferralsqty' 
,clientReferralspoints='$clientReferralspoints'
,clientReferralsprice='$clientReferralsprice'
,clientpurchasecreditqty='$clientpurchasecreditqty'
,clientpurchasecreditpoints='$clientpurchasecreditpoints'
,clientpurchasecreditprice='$clientpurchasecreditprice'
,clientpurchasecashqty='$clientpurchasecashqty'
,clientpurchasecashpoints='$clientpurchasecashpoints'
,clientpurchasecashprice='$clientpurchasecashprice'
,clientpurchasedifferqty='$clientpurchasedifferqty'
,clientpurchasedifferpoints='$clientpurchasedifferpoints'
,clientpurchasedifferprice='$clientpurchasedifferprice'
,clientpurchasedeachqty='$clientpurchasedeachqty'
,clientpurchasedeachpoints='$clientpurchasedeachpoints'
,clientpurchasedeachprice='$clientpurchasedeachprice'
,businessReferralsqty='$businessReferralsqty'
,businessReferralspoints='$businessReferralspoints'
,businessReferralsprice='$businessReferralsprice'

,businessPurchasedMonthlyqty='$businessPurchasedMonthlyqty'
,businessPurchasedMonthlypoints='$businessPurchasedMonthlypoints'
,businessPurchasedMonthlyprice='$businessPurchasedMonthlyprice'
,businessPurchasedHalfqty='$businessPurchasedHalfqty'
,businessPurchasedHalfpoints='$businessPurchasedHalfpoints'
,businessPurchasedHalfprice='$businessPurchasedHalfprice'
,businessPurchasedyearqty='$businessPurchasedyearqty'
,businessPurchasedyearpoints='$businessPurchasedyearpoints'
,businessPurchasedyearprice='$businessPurchasedyearprice'

,businessSoldqty='$businessSoldqty'
,businessSoldpoints='$businessSoldpoints'
,businessSoldprice='$businessSoldprice'

,businessSaleMonthqty='$businessSaleMonthqty'
,businessSaleMonthpoints='$businessSaleMonthpoints'
,businessSaleMonthprice='$businessSaleMonthprice'

,businessSoldCreditqty='$businessSoldCreditqty'
,businessSoldCreditpoints='$businessSoldCreditpoints'
,businessSoldCreditprice='$businessSoldCreditprice'
,businessPurchasedPushNoteqty='$businessPurchasedPushNoteqty',
businessPurchasedPushNotepoints='$businessPurchasedPushNotepoints',
businessPurchasedPushNoteprice='$businessPurchasedPushNoteprice', deliveryReferralsqty='$deliveryReferralsqty'
,deliveryReferralspoints='$deliveryReferralspoints'
,deliveryReferralsprice='$deliveryReferralsprice'

,deliveryItemqty='$deliveryItemqty'
,deliveryItempoints='$deliveryItempoints'
,deliveryitemprice='$deliveryitemprice'

,deliverycompletedqty='$deliverycompletedqty'
,deliverycompletedpoints='$deliverycompletedpoints'
,deliverycompletedprice='$deliverycompletedprice'
,Totalqty='$Totalqty',Totalpoint='$Totalpoint' ,Totalprice='$Totalprice' 
,AMBASSADORbuspoint='$AMBASSADORbuspoint'
, AMBASSADORbus='$AMBASSADORbus'
, AMBASSADORbusprice='$AMBASSADORbusprice'
, pushcpoint='$pushcpoint'
, pushc='$pushc'
, pushcprice='$pushcprice'
, pushbpoint='$pushbpoint'
, pushb='$pushb'
, pushbprice='$pushbprice'
,pushapoint='$pushapoint'
,pusha='$pusha',pushaprice='$pushaprice',template='$users',
clientReferralsincome='$clientReferralsincome',
businessReferralsincome='$businessReferralsincome',
deliveryReferralsincome='$deliveryReferralsincome',
clientpurchasecreditincome='$clientpurchasecreditincome',
clientpurchasecashincome='$clientpurchasecashincome',
clientpurchasedifferincome='$clientpurchasedifferincome',
AMBASSADORbusincome='$AMBASSADORbusincome',
businessPurchasedMonthlyincome='$businessPurchasedMonthlyincome',
businessPurchasedHalfincome='$businessPurchasedHalfincome',
businessPurchasedyearincome='$businessPurchasedyearincome',
businessSoldincome='$businessSoldincome',
businessSaleMonthincome='$businessSaleMonthincome',
pushaincome='$pushaincome',
pushbincome='$pushbincome',
pushcincome='$pushcincome',
businessSoldCreditincome='$businessSoldCreditincome',
businessPurchasedPushincome='$businessPurchasedPushincome',
deliveryitemincome='$deliveryitemincome',
deliverycompletedincome='$deliverycompletedincome'
 where UserId = '$r' ";
    $result4=mysqli_query($con,$sql4);
   
		}    
		
		}

    
      
  }
   ?>
                    <script type="text/javascript">
                    alert("Sync Successfully ");
                    
                    window.location.href = "AddEntry.php";
                    </script>
                    <?php
}


?>
<html lang="en" translate="no">
    <head>
        <link rel="icon" href="./Images/New.png" type="image/png" sizes="128x128" />

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> abierTTo Admin</title> 
    <link href="https://www.smarteyeapps.com/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://www.smarteyeapps.com/assets/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://www.smarteyeapps.com/assets/js/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet"/>

<link href="css/custom.css" rel="stylesheet" />
<style type="text/css">
#display_loading{
    		position: absolute;
    		top: 50%;
    		left: 50%;
    		transform: translate(-50%, 50%);
        display:none;
    	}
  
#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(Images/loading.gif) no-repeat center center;
  z-index: 10000;
}
.mbtable{
display:none;
}
.desktable{
  display:block;
}

input[type=text] {
  width: 100%;
 padding: 14px 5px;
  margin: 8px 0;
  box-sizing: border-box;
  margin-left:auto;
  margin-right:auto;
  border: 1px solid #D3D3D3;
   font-family: 'Montserrat';
}
input[type=text]:focus {
    outline: none;
}
.container1 {
  display: block;
  position: relative;
  padding-left: 25px;
  padding-top:5px;
  cursor: pointer;
  font-size: 15px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;

  user-select: none;
}

/* Hide the browser's default checkbox */
.container1 input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
  
}
.input-symbol-euro {
    position: relative;
}
.input-symbol-euro input {
    padding-left:18px;
}
.input-symbol-euro:before {
    position: absolute;
    top: 0;
    content:"$";
    left: 15px;
}
.input-symbol-euro1:before {
    position: absolute;
    top: 0;
    content:"$";
    left: 15px;
}

/* Create a custom checkbox */
.checkmark {
    margin-top:5px;
  position: absolute;
  top: 0;
  left: 0;
  height: 18px;
  width: 18px;
  border: solid 1px  #2196F3;
 border-radius: 50%;
}


/* When the checkbox is checked, add a blue background */
.container1 input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container1 input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container1 .checkmark:after {
  left: 4px;
  top: 2px;
  width: 7px;
  height: 11px;
  border: .5px solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
div.card {
  width: 80%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
  margin-left:auto;
  margin-right:auto;
  margin-top:20px;
  
}
div.card1 {
  width: 97%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
  margin-left:10px;
  margin-top:20px;
}

.search{
  background-color: #5CC4BA;
 border-radius: 2rem; 
  border: none;
  color: white;
  padding-top:10px;
  padding-bottom:10px;
  /*padding-left:60px;*/
  /*padding-right:60px;*/
  text-decoration: none;
  margin: 4px 2px;
  font-weight:bold;
  cursor: pointer;
}
div.header {
  background-color: #B2B2B2;
  color: black;
  padding: 8px;
  font-size: 1em;
  font-weight: bold;

}

div.container {
  padding: 0px;
  font-size: 2em;
}

.topnav {
  overflow: hidden;
  background-color: #FBB040;
  height:50px;
}
.topnav1 {
  overflow: hidden;
 background-color:#DCDCDC;
  height:60px;
}

.topnav1 a {
    float: right;
  color: #444;
  text-align: center;
  margin: 19px 16px;
  text-decoration: none;
  font-size: 14px;

  font-weight:bold;
}
input[type="submit"] {
border: none;
outline:none;

}
.topnav1 a.active {
  color: #E31E36;
  font-weight:bold;
}

.label{
  margin: 10px;
  
}

.row1{
    border-bottom: 1px solid #E8E8E8;
    height:60px;
    font-size:14px;
}
input:read-only {
  background-color: #F8F8F8;
}
.content {
  position: inherit;
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 50px;
}
.float-container {
  border: solid 1px #ccc;
  display:flex;
}
.float-container input {
  border: none;
  outline: 0;
}
#mdisplay_loading{
    		position: absolute;
    		top: 50%;
    		left: 50%;
    		transform: translate(-50%, 50%);
        display:none;
    	}
  
#loader {
  display: none;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  width: 100%;
  background: rgba(0,0,0,0.75) url(Images/loading.gif) no-repeat center center;
  z-index: 10000;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://www.smarteyeapps.com/assets/js/jquery-3.2.1.min.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    </head>
    <body>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js" /></script>

  <script>
    
     $(document).ready(function () {
            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            $(".txt").each(function () {
                $(this).keyup(function () {
                    calculateSum();
                });
            });
        });

        function calculateSum() {
            var sum = 0;
            //iterate through each textboxes and add the values
            $(".txt").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                                   }
            });
            
            var sumQ = [];
            for (var i=1; i<=3; i++) {
                sumQ[i] = 0;
                $('td:nth-child('+(i+1)+')').find(".txt").each(function () {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sumQ[i] += parseFloat(this.value);
                    }
                });
                $(".span7").find('input').eq(i-1).val(sumQ[i]);
            }

            //.toFixed() method will roundoff the final sum to 2 decimal places
            sum=sum.toLocaleString();
            $("#sum").val(sum);
              var sum1 = 0;
            //iterate through each textboxes and add the values
            $(".txt1").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum1 += parseFloat(this.value);
                }
            });
            
            var sumQ1 = [];
            for (var i=1; i<=3; i++) {
                sumQ1[i] = 0;
                $('td:nth-child('+(i+1)+')').find(".txt1").each(function () {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sumQ1[i] += parseFloat(this.value);
                    }
                });
                $(".span7").find('input1').eq(i-1).val(sumQ1[i]);
            }

            //.toFixed() method will roundoff the final sum to 2 decimal places
            sum1=sum1.toLocaleString();
            $("#sum1").val(sum1);
            var sum2 = 0;
            //iterate through each textboxes and add the values
            $(".txt3").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum2 += parseFloat(this.value);
                }
            });
            
            var sumQ2 = [];
            for (var i=1; i<=3; i++) {
                sumQ2[i] = 0;
                $('td:nth-child('+(i+1)+')').find(".txt3").each(function () {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sumQ2[i] += parseFloat(this.value);
                    }
                });
                $(".span7").find('input2').eq(i-1).val(sumQ2[i]);
            }

            //.toFixed() method will roundoff the final sum to 2 decimal places
            $("#sum2").val(sum2);

        }
  </script>
  
    <script>
    
     $(document).ready(function () {
            //iterate through each textboxes and add keyup
            //handler to trigger sum event
            $(".mtxt").each(function () {
                $(this).keyup(function () {
                    mcalculateSum();
                });
            });
        });

        function mcalculateSum() {
            var sum = 0;
            //iterate through each textboxes and add the values
            $(".mtxt").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                                   }
            });
            
            var sumQ = [];
            for (var i=1; i<=3; i++) {
                sumQ[i] = 0;
                $('td:nth-child('+(i+1)+')').find(".mtxt").each(function () {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sumQ[i] += parseFloat(this.value);
                    }
                });
                $(".span7").find('input').eq(i-1).val(sumQ[i]);
            }

            //.toFixed() method will roundoff the final sum to 2 decimal places
            sum=sum.toLocaleString();
            $("#msum").val(sum);
              var sum1 = 0;
            //iterate through each textboxes and add the values
            $(".mtxt1").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum1 += parseFloat(this.value);
                }
            });
            
            var sumQ1 = [];
            for (var i=1; i<=3; i++) {
                sumQ1[i] = 0;
                $('td:nth-child('+(i+1)+')').find(".mtxt1").each(function () {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sumQ1[i] += parseFloat(this.value);
                    }
                });
                $(".span7").find('input1').eq(i-1).val(sumQ1[i]);
            }

            //.toFixed() method will roundoff the final sum to 2 decimal places
            sum1=sum1.toLocaleString();
            $("#msum1").val(sum1);
            var sum2 = 0;
            //iterate through each textboxes and add the values
            $(".mtxt3").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum2 += parseFloat(this.value);
                }
            });
            
            var sumQ2 = [];
            for (var i=1; i<=3; i++) {
                sumQ2[i] = 0;
                $('td:nth-child('+(i+1)+')').find(".mtxt3").each(function () {
                    if (!isNaN(this.value) && this.value.length != 0) {
                        sumQ2[i] += parseFloat(this.value);
                    }
                });
                $(".span7").find('input2').eq(i-1).val(sumQ2[i]);
            }

            //.toFixed() method will roundoff the final sum to 2 decimal places
            $("#msum2").val(sum2);

        }
  </script>
  
    <div class="desktable">
    <div class="topnav">
    <a href=" https://www.youtube.com/channel/UC2Qc9IlKBZkNDJVp0S1FzYg/videos" target="_blank">
    <img src="./Images/youtube.png" alt="Youtube" width="40" height="40" style="float: right;margin-top:5px;margin-right:5px"></a>
    
     <a href="https://www.linkedin.com/company/28588810/admin/" target="_blank">
    <img src="./Images/linkedin.png" alt="linkedin" width="30" height="30" style="float: right;margin-top:10px;margin-right:1px"></a>
    
     <a href="https://www.instagram.com/abiertto/" target="_blank">
    <img src="./Images/instagram1.png" alt="Instagram" width="30" height="30" style="float: right;margin-top:10px;margin-right:4px"></a>
    
    <a href="https://www.facebook.com/abiertto" target="_blank">
    <img src="./Images/facebook1.png" alt="Facebook"  width="27" height="27" style="float: right;margin-top:11px ;margin-right:5px"> </a>

</div>
<div class="topnav1" id="myHeader">
<img src="./Images/abiertto.png" alt="Girl in a jacket" width="200" height="40" style="margin-top:7px;margin-left:10px">
  <a href="#news" style="font-weight:bold"><form method='POST' action=""><input type="submit" value="Cerrar Sesión" name="but_logout"  class="Logout" style="cursor:pointer;background-color:transparent;color:#444"></form></a>
 <a href="Report.php">Reportes</a>
  <a href="History.php">Historial</a>
    <a  href="template.php">Plantillas</a>
        <a  href="calculation.php">Cálculos</a>
  <a  class="active" href="AddEntry.php">Añadir datos</a>
  <a href="Dashboard.php">Resumen</a>
</div>

<div class="card content">
  <div class="header">
   <h3 style="font-weight:bold;font-family: 'Montserrat';">ADD ENTRY</h3>
  </div>


  <div class="container">
      <table width="100%" style="font-size:15px; font-family: 'Montserrat';margin-top:10px">
         
  
  <tr>
        <td width="13%" style="padding-left:10px;font-size:15px;font-weight:bold">
        Importar Archivo 

      </td>
      <td width="38%" style="text-align:center;vertical-align: bottom;">
           
 <form method="post" action="importdatabse.php" enctype="multipart/form-data" id="uploadform">
<input type="file" name="file" title="Seleccionar archivo" accept=".csv" style="width:85%;" />
 
          </td>
          <td  width="20%">
               <input type="submit"  name="submit_file" value="Importar" class="search" id="submit-btn" style="background-color:#5CC4BA;width:80%;"/> 
          </td>
                    <div id="display_loading"><img src="Images/giphy.gif" height="100px" width="100px"></div>

           </form>
            <form method="post" action="">
           <td width="20%" style="text-align:center">
              
        <input type="submit"  name="Connect" class="search" value="Sincronizar datos" id="sync-btn" style="background-color:#5CC4BA;width:90%;margin-left:1px">
        
      </td>
      <!--     <td width="20%">
               <form method="Post" action="">
        <input type="submit"  name="Connect" class="search" value="Sincronizar datos importados" style="background-color:#5CC4BA;width:100%;display:block;">
        </form>
      </td>-->
       </form>
</div>

      </tr>
  </table>
    <form action="" method="post">

      <table width="100%"  style="font-size:15px; font-family: 'Montserrat';">
    <tr>
     <td width="13%"  style="padding-left:10px;font-size:15px;font-weight:bold">
        Usuario 
      </td>
    
      <td width="38%"  style="text-align:left">
        <input class="w3-input w3-border" style="width:85%;" name="UserId" id="UserId" autocomplete="off" value="<?php echo $UserId; ?>" type="text" required>
      </td>
        
      <td width="20%">
        <input type="submit"  name="submit" class="search" value="Seleccionar entrada" style="background-color:#5CC4BA;width:80%;margin-left:1px">
      </td>
       <td width="20%"></td>
    </tr>
 <table width="100%"  <?php if($userName=="") echo 'style="display:none;"'?> style="font-family: 'Montserrat';">
    <tr>

  <tr>
  <td width="15%"  style="padding-left:10px;font-size:15px;font-weight:bold;">
 User Name
   
  </td>
  </td>
  <td  style="text-align:left">
<input class="w3-input " style=" border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        margin-left:2.7%;
        border-bottom-style: hidden;width:42%;" name="userName" value="<?php echo $userName?>" type="text" readonly>


<!--<label class="label" style="width:100%;margin-right:5px;padding-bottom:2%;padding-top:2%" name = 'userName' value="<?php echo $_Post['userName']?>"><?php echo $userName; ?></label> -->

</td>
</tr>
<tr <?php if($BusinessId=="") echo 'style="display:none;"'?>>
  
  <td width="15%"  style="padding-left:10px;font-size:15px;font-weight:bold;">
 Business Id 
   
  </td>
  </td>
  <td style="text-align:left ;">
<input class="w3-input"  style=" border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        margin-left:2.7%;
        border-bottom-style: hidden;width:42%;" name="BusinessId" value="<?php echo $BusinessId?>" type="text" readonly>

<!--<label class="label" style="width:100%;margin-right:5px;padding-bottom:2%" name = 'BusinessId'><?php echo $BusinessId; ?></label> -->
</td>
<!--   </tr>
  </table>
  <table width="100%"  style="margin-bottom:30px;font-size:17px;">
  <tr>-->
  </tr>
  <tr <?php if($deliveryId=="") echo 'style="display:none;"'?>>
  <td width="15%"  style="padding-left:10px;font-size:15px;font-weight:bold;">
 Delivery Id 
   
  </td>
  </td>
  <td style="text-align:left ;">
<input class="w3-input"  style=" border-top-style: hidden;
        border-right-style: hidden;
        border-left-style: hidden;
        margin-left:2.7%;
        border-bottom-style: hidden;width:42%;" name="deliveryId" value="<?php echo $deliveryId?>" type="text" readonly>
<!--<label class="label" style="margin-right:5px;padding-bottom:2%" name = 'userType'><?php echo $userType; ?></label> -->

  </tr>
  
 
  </table>
 
  
<table  width="100%" <?php if($userName=="") echo 'style="display:none"'?> style="font-size:15px; font-family: 'Montserrat';">
     <tr>
       <td width="15%"  style="padding-left:10px;font-size:15px;font-weight:bold;font-family: 'Montserrat'">
       Template 
      </td>
      <td width="38%" style="padding-left:2%;height:auto">

<form >

            <?php
    
$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}
   $sql_query = "SELECT * from template";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);           
         // $r_set = $con->query("SELECT * from template")
//echo "<input type='text' value='$_POST[users]' >";

echo "<select name='users' id='users' style='height: auto;' onchange='showUser(this.value)'  class='select2 form-control'  value='<?php echo $users?>'>";
if($users!=""){
echo "<option>$users</option>";
}
else{
echo "<option>---Select Custom Template---</option>";
}
 foreach($result as $row) {
//echo "<option value=$row[ID]>$row[Name]</option>";
  echo "<option value=\"".$row["ID"]."\"";
              if($users == $row['ID'])
                    echo 'selected';
              echo ">".$row["Name"]."</option>";        

}
echo "</select>";





?>

</form>
      </td>
      <td >
          
         <input type="submit"  name="submit" class="search" value="Reset" style="background-color:#5CC4BA;margin-left:6%;width:40%;display:block;font-family: 'Montserrat';">  
      </td>
  </tr>
  
</table>
  
  <table width="100%" class="table table-bordered" style="margin-top:5px;">
  <tr style="background-color: #B2B2B2;color:black;font-size:14px;text-align:center;font-family: 'Montserrat';font-size:14px">
  
  <th style="vertical-align:middle ;width:50%">
Total de Número de veces

  </th>
  <th style="vertical-align:middle;width:50%">
Puntos totales en el sistema
  </th>
  </tr>
  <tbody id="geeks" style="font-family: 'Montserrat';font-size:14px;vertical-align:middle">
  
  <tr  class="red box" style=" border-bottom: 1px solid #E8E8E8;height:60px;font-size:14px">
      
        <td  style="text-align:center;vertical-align:middle">
 <input id="sum" type="text"   name="Totalqty" value="<?php echo number_format($Totalqty)?>" class="input-medium"   style="width:50%;margin-left:auto;margin-right:auto;text-align:center;border:1px solid :#E8E8E8;height:10px;border-width:0px;
border:none; background-color:white"  readonly />
    </td>
   <td  style="text-align:center;vertical-align:middle">
  <input id="sum1" type="text"   name="Totalpoint" value="<?php echo number_format($Totalpoint)?>"  class="input-medium1"  style="width:50%;margin-left:auto;margin-right:auto;text-align:center;border:1px solid :#E8E8E8;height:10px;border-width:0px;
border:none; background-color:white"  readonly />
  </td>
  </tr>
  </table>
  

  <?php
      $userType1=explode(",",$row2['userType']);

      if(isset($_POST['submit']))
{
 $UserId = $_POST['UserId'];

  if( $userName !=""){
    $hide = '';
    $hide1 = ''; 
    $hide2 = '';// reset $hide variable to avoid to hide other rows
 if ($userCode!="") 
    {
        $hide = 'style=""';
    }
    else{
      $hide = 'style="display: none;"';
    }
    if ($deliveryId!="") 
    {
        $hide2 = 'style=""';
    }
    else{
      $hide2 = 'style="display: none;"';
    }
    if ($BusinessId!="") 
    {
        $hide1 = 'style=""';
    }
    else{
      $hide1 = 'style="display: none;"';
    }
  
  

  }
  
  else{
      echo '<script>alert("User Not persent")</script>';

  }
}

?>
<div id="txtHint">
<table width="100%" class="table table-bordered table-responsive" style="font-family: 'Montserrat';font-size:14px;margin-top:8px">
    <tr style="background-color: #B2B2B2;height:50px;text-align:center;color:black;font-size:14px;vertical-align:middle">
   <th style="vertical-align:middle;text-align:center;">
        Sr No.
      </th>
    <th style="vertical-align:middle;text-align:center;width:30%">
        Actividad
      </th>
      <th style="vertical-align:middle;text-align:center">   
Conteo 
      </th>
      <th style="vertical-align:middle;text-align:center">
Puntos por actividad

      </th>
      <th style="vertical-align:middle;text-align:center">
        Puntos totales

      </th>
      <th style="vertical-align:middle;text-align:center">
        Precio por actividad
      </th>
      <th style="vertical-align:middle;text-align:center">
        Income
      </th>
  </tr>
  
  <tr  class="red box row2">
      
     <td Style="vertical-align:middle;text-align:center">1</td>
  <td Style="vertical-align:middle">
  Referidos - Nuevo usuario “cliente”
  </td>
  <td  style="text-align:center">
  <input class="txt input-mini" name="clientReferralsqty"   id="textone"  onkeyup="sumclogin();" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;" type="text" autocomplete="off" value="<?php echo $clientReferralsqty?>"/>  
  </td>
  <td  style="text-align:center">
  <input class="w3-input w3-border"  id="texttwo"  name="clientReferralvalue" onkeyup="sumclogin();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;" type="text" value=" <?php echo $clientReferralvalue?>" readonly/>  
  </td>
  <td  style="text-align:center">
  <input  class="txt1 input-mini1"   id="textthree"  name="clientReferralspoints"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $clientReferralspoints?>"  readonly/>  
  </td>
    <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
        <input  class="txt3 input-mini2"   id="clientReferralsprice"  name="clientReferralsprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" readonly  value="<?php echo number_format($clientReferralsprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center ;vertical-align: middle;">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income1"  name="clientReferralsincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($clientReferralsincome);?>" readonly/>  
  </div>
  </td>
  </tr>
  <tr class="green box row2">
       <td Style="vertical-align:middle;text-align:center">2</td>
   <td Style="vertical-align:middle">

Referidos - Nuevo usuario “negocio”
    </td>
    <td  style="text-align:center;">
  <input class="txt input-mini" name="businessReferralsqty"  id="t1" onkeyup="sumblogin();" style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $businessReferralsqty?>"/>  

  </td>
  <td  style="text-align:center">
  <input class="w3-input w3-border" name="businessReferralsvalue"  id="t2"  onkeyup="sumblogin();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" value="<?php echo $businessReferralsvalue?>" type="text" readonly/>  

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1"  name="businessReferralspoints"  id="t3" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessReferralspoints?>" readonly/>  

  </td>
 
    <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txt3 input-mini2"   id="businessReferralsprice"  name="businessReferralsprice" readonly style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessReferralsprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income2"  name="businessReferralsincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($businessReferralsincome);?>" readonly/>  
  </div>
</td>
  </tr>
  <tr class="blue box row2" >
       <td Style="vertical-align:middle;text-align:center">3</td>
  <td Style="vertical-align:middle">

Referidos - Nuevo usuario “repartidor”
    </td>
    <td  style="text-align:center">
  <input class="txt input-mini" name="deliveryReferralsqty"  id="t4" onkeyup="sumdlogin();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text"autocomplete="off"  value="<?php echo $deliveryReferralsqty?>"/>  

  </td>
  <td  style="text-align:center">
  <input class="w3-input w3-border"  name="deliveryReferralsvalue" id="t5" onkeyup="sumdlogin();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $deliveryReferralsvalue?>" readonly/>  

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1"  name="deliveryReferralspoints" id="t6" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $deliveryReferralspoints?>" readonly/>  

  </td>
     <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txt3 input-mini2"   id="deliveryReferralsprice"  name="deliveryReferralsprice" readonly style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($deliveryReferralsprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income3"  name="deliveryReferralsincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($deliveryReferralsincome);?>" readonly/>  
  </div>
</td>
  </tr>
  <tr  class="red box row2"  <?php echo $hide;?> >
       <td Style="vertical-align:middle;text-align:center">4</td>
   <td Style="vertical-align:middle">
  Cliente compra usando Tarjeta de Crédito
    </td>
    <td  style="text-align:center">
  <input class="txt input-mini1" class="calc"  name="clientpurchasecreditqty" id="t7" onkeyup="clientcredit();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" autocomplete="off" type="text" value="<?php echo $clientpurchasecreditqty?>"/>  

  </td>
  <td  style="text-align:center">
  <input class="w3-input w3-border" id="t8" name="clientpurchasecreditvalue"  onkeyup="clientcredit();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text"  value="<?php echo $clientpurchasecreditvalue?>" readonly/>  

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1" id="t9"  name="clientpurchasecreditpoints"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $clientpurchasecreditpoints?>" readonly/>  

  </td>
  
    <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

  <input readonly  class="txt3 input-mini2"   id="clientpurchasecreditprice"  name="clientpurchasecreditprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($clientpurchasecreditprice);?>"  />  
  </div>
  </td>
  <td  style="text-align:center">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income4"  name="clientpurchasecreditincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($clientpurchasecreditincome);?>" readonly/>  
  </div>
</td>

  </tr>
  <tr  class="red box row2" <?php echo $hide;?> >
       <td Style="vertical-align:middle;text-align:center">5</td>
  <td Style="vertical-align:middle">
  Cliente compra usando efectivo

    </td>
    <td  style="text-align:center">
  <input class="txt input-mini"   name="clientpurchasecashqty" id="t10" onkeyup="clientcash();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $clientpurchasecashqty?>"/>  

  </td>
  <td  style="text-align:center">
  <input class="w3-input w3-border" id="t11" name="clientpurchasecashvalue" onkeyup="clientcash();" style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $clientpurchasecashvalue?>" readonly/>  

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1" id="t12" name="clientpurchasecashpoints" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $clientpurchasecashpoints;?>" readonly/>  

  </td>
    <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

  <input readonly class="txt3 input-mini2"   id="clientpurchasecashprice"  name="clientpurchasecashprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center; padding: 5px 10px;" type="text" value="<?php echo number_format($clientpurchasecashprice);?>" readonly/>  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income5"  name="clientpurchasecashincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($clientpurchasecashincome);?>" readonly/>  
  </div>
</td>
  </tr>
  <tr  class="red box row2"  <?php echo $hide;?> >
       <td Style="vertical-align:middle;text-align:center">6</td>
  <td Style="vertical-align:middle">
Cliente compra de 5 negocios diferentes
    </td>
    <td  style="text-align:center">
  <input class="txt input-mini"  name="clientpurchasedifferqty" id="t13" onkeyup="clientbus();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $clientpurchasedifferqty?>"/>  

  </td>
  <td  style="text-align:center">
  <input class="w3-input w3-border"  name="clientpurchasediffervalue" id="t14" onkeyup="clientbus();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $clientpurchasediffervalue?>" readonly/>  

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1"  id="t15"  name="clientpurchasedifferpoints"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $clientpurchasedifferpoints?>" readonly/>  

  </td>
     <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input readonly class="txt3 input-mini2"   id="clientpurchasedifferprice"  name="clientpurchasedifferprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo $clientpurchasedifferprice;?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income6"  name="clientpurchasedifferincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($clientpurchasedifferincome);?>" readonly />  
  </div>
</td>
  </tr>
 
  <tr class="green box row2" <?php echo $hide1;?>>
       <td Style="vertical-align:middle;text-align:center">7</td>
  <td Style="vertical-align:middle">
Negocio Membresía - Referido Embajador (pago mensual)
    <td  style="text-align:center">

  <input class="txt input-mini" name="AMBASSADORbus" id="t49" onkeyup="busAMBA();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $AMBASSADORbus?>"/>  

  </td>
  <td>
  <input class="w3-input w3-border" name="AMBASSADORbusvalue" id="t50" onkeyup="busAMBA();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $AMBASSADORbusvalue?>" readonly/>  

  </td>
  <td style="text-align:center">
  <input class="txt1 input-mini1"  name="AMBASSADORbuspoint" id="t51"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $AMBASSADORbuspoint?>" readonly/>  

  </td>
<td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
   
  <input readonly class="txt3 input-mini2"   id="AMBASSADORbusprice"  name="AMBASSADORbusprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($AMBASSADORbusprice); ?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income7"  name="AMBASSADORbusincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($AMBASSADORbusincome);?>" readonly/>  
  </div>
  </td>
  </tr>


  
  
  <tr class="green box row2" <?php echo $hide1;?> >
       <td Style="vertical-align:middle;text-align:center">8</td>
  <td Style="vertical-align:middle">
Negocio Membresía - pago Mensual
    <td  style="text-align:center">

  <input class="txt input-mini" name="businessPurchasedMonthlyqty" id="t19" onkeyup="busimonth();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $businessPurchasedMonthlyqty?>"/>  

  </td>
  <td>
  <input class="w3-input w3-border" name="businessPurchasedMonthlyvalue" id="t20" onkeyup="busimonth();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $businessPurchasedMonthlyvalue?>" readonly/>  

  </td>
  <td style="text-align:center">
  <input class="txt1 input-mini1"  name="businessPurchasedMonthlypoints" id="t21"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text"  value="<?php echo $businessPurchasedMonthlypoints?>" readonly />  

  </td>
<td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

  <input  class="txt3 input-mini2"   id="businessPurchasedMonthlyprice"  name="businessPurchasedMonthlyprice" readonly style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessPurchasedMonthlyprice);?>" />  
  </div>
  </td>
 <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income8"  name="businessPurchasedMonthlyincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($businessPurchasedMonthlyincome);?>" readonly />  
  </div>
</td>
  </tr>
  <tr class="green box row2" <?php echo $hide1;?> >
       <td Style="vertical-align:middle;text-align:center">9</td>
  <td Style="vertical-align:middle">
Negocio Membresía - pago Semestral
    </td>
    <td  style="text-align:center">

  <input class="txt input-mini" name="businessPurchasedHalfqty" id="t22" onkeyup="busihalf();"    style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $businessPurchasedHalfqty?>"/>  

  </td>
  <td>
  <input class="w3-input w3-border" name="businessPurchasedHalfvalue" id="t23" onkeyup="busihalf();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $businessPurchasedHalfvalue?>" readonly/>  

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1" name="businessPurchasedHalfpoints" id="t24" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessPurchasedHalfpoints?>" readonly/>
  </td>
   <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

  <input  class="txt3 input-mini2" readonly  id="businessPurchasedHalfprice"  name="businessPurchasedHalfprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text"  value="<?php echo number_format($businessPurchasedHalfprice); ?>" /> 
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income9"  name="businessPurchasedHalfincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($businessPurchasedHalfincome);?>" readonly/>  
  </div>
</td>
  </tr>
  <tr class="green box row2"  <?php echo $hide1;?> >
       <td Style="vertical-align:middle;text-align:center">10</td>
  <td Style="vertical-align:middle">
Negocio Membresía - pago Anual
    </td>
    <td  style="text-align:center">

  <input class="txt input-mini" name="businessPurchasedyearqty"   id="t25" onkeyup="busiyear();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $businessPurchasedyearqty?>"/>
  </td>
  <td>
  <input class="w3-input w3-border" name="businessPurchasedyearvalue"  id="t26" onkeyup="busiyear();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $businessPurchasedyearvalue?>" readonly/>
  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1" name="businessPurchasedyearpoints" id="t27"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessPurchasedyearpoints?>" readonly/>

  </td>
   <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

  <input  class="txt3 input-mini3" readonly  id="businessPurchasedyearprice"  name="businessPurchasedyearprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessPurchasedyearprice);?>"/>  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income10"  name="businessPurchasedyearincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($businessPurchasedyearincome);?>" readonly/>  
  </div>
</td>
  </tr>
  <tr class="green box row2"  <?php echo $hide1;?> >
       <td Style="vertical-align:middle;text-align:center">11</td>
   <td Style="vertical-align:middle">
Negocio Ventas - 5 clientes diferentes
    </td>
    <td  style="text-align:center">

  <input class="txt input-mini"   name="businessSoldqty"  id="t28" onkeyup="busi5();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $businessSoldqty?>" />

  </td>
  <td>
  <input class="w3-input w3-border"  name="businessSoldvalue"  id="t29" onkeyup="busi5();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $businessSoldvalue?>" readonly/>

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1"   name="businessSoldpoints"  id="t30"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessSoldpoints?>" readonly/>

  </td>
  <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

  <input  class="txt3 input-mini2" readonly  id="businessSoldprice"  name="businessSoldprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text"  value="<?php echo number_format($businessSoldprice);?>"/> 
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income11"  name="businessSoldincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($businessSoldincome);?>" readonly/>  
  </div>
</td>
  </tr>
  <tr class="green box row2" <?php echo $hide1;?> >
       <td Style="vertical-align:middle;text-align:center">12</td>
  <td Style="vertical-align:middle">
  Negocio Ventas - 10 ventas en el mes

    </td>
    <td  style="text-align:center">

  <input class="txt input-mini" name="businessSaleMonthqty"  id="t31" onkeyup="busisale();" style="width:60%;margin-left:auto;margin-right:auto;text-align:center" autocomplete="off" type="text" value="<?php echo $businessSaleMonthqty?>"/>

  </td>
  <td>
  <input class="w3-input w3-border" name="businessSaleMonthvalue" id="t32" onkeyup="busisale();" style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $businessSaleMonthvalue?>" readonly/>

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1" name="businessSaleMonthpoints" id="t33" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessSaleMonthpoints?>" readonly/>

  </td>
  <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txt3 input-mini2" readonly  id="businessSaleMonthprice"  name="businessSaleMonthprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessSaleMonthprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income12"  name="businessSaleMonthincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($businessSaleMonthincome);?>" readonly/>  
  </div>
</td>
  </tr>
  
  
  <tr class="green box row2" <?php echo $hide1;?>>
       <td Style="vertical-align:middle;text-align:center">13</td>
  <td Style="vertical-align:middle">
Negocio Compra - Paquete notificaciones A (5 avisos)
    <td  style="text-align:center">

  <input class="txt input-mini"  name="pusha" id="t52" onkeyup="buspusha();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" autocomplete="off" value="<?php echo $pusha?>"/>  

  </td>
  <td>
  <input class="w3-input w3-border" name="pushavalue" id="t53" onkeyup="buspusha();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $pushavalue?>" readonly/>  

  </td>
  <td style="text-align:center">
  <input class="txt1 input-mini1"  name="pushapoint" id="t54"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $pushapoint?>" readonly/>  

  </td>
   <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

  <input  class="txt3 input-mini2" readonly  id="pushaprice"  name="pushaprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($pushaprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income13"  name="pushaincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($pushaincome);?>" readonly/>  
  </div>
</td>
  </tr>

  <tr class="green box row2" <?php echo $hide1;?>>
       <td Style="vertical-align:middle;text-align:center">14</td>
  <td Style="vertical-align:middle">
Negocio Compra - Paquete notificaciones B (10 avisos)    <td  style="text-align:center">

  <input class="txt input-mini" name="pushb" id="t55" autocomplete="off" onkeyup="buspushb();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center;" type="text" value="<?php echo $pushb?>"/>  

  </td>
  <td>
  <input class="w3-input w3-border" name="pushbvalue" id="t56" onkeyup="buspushb();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $pushbvalue?>" readonly/>  

  </td>
  <td style="text-align:center">
  <input class="txt1 input-mini1"  name="pushbpoint" id="t57"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $pushbpoint?>" readonly/>  

  </td>
 <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txt3 input-mini2"  readonly  id="pushbprice"  name="pushbprice"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($pushbprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income14"  name="pushbincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($pushbincome);?>" readonly/>  
  </div>
</td>
  </tr>

  <tr class="green box row2" <?php echo $hide1;?>>
       <td Style="vertical-align:middle;text-align:center">15</td>
  <td Style="vertical-align:middle">
Negocio Compra - Paquete notificaciones C (20 avisos)
    <td  style="text-align:center">

  <input class="txt input-mini" autocomplete="off" name="pushc" id="t58" onkeyup="buspushc();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $pushc?>"/>  

  </td>
  <td>
  <input class="w3-input w3-border" name="pushcvalue" id="t59" onkeyup="buspushc();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $pushcvalue?>" readonly/>  

  </td>
  <td style="text-align:center">
  <input class="txt1 input-mini1"  name="pushcpoint" id="t60"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $pushcpoint?>" readonly/>  

  </td>
<td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txt3 input-mini2" readonly  id="pushcprice"  name="pushcprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($pushcprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income15"  name="pushcincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($pushcincome);?>" readonly/>  
  </div>
</td>
  </tr>

  
  <tr class="green box row2"  <?php echo $hide1;?> >
       <td Style="vertical-align:middle;text-align:center">16</td>
  <td Style="vertical-align:middle">
Negocio Ventas - Transacción con Tarjetas de Crédito
 
    </td>
    <td  style="text-align:center">

  <input class="txt input-mini" autocomplete="off" name="businessSoldCreditqty" id="t34" onkeyup="busisoldcre();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $businessSoldCreditqty?>"/>

  </td>
  <td  style="text-align:center">

  <input class="w3-input w3-border"  id="t35" name="businessSoldCreditvalue" onkeyup="busisoldcre();"  style="width:60%;margin-left:auto;margin-right:auto;;text-align:center" type="text" value="<?php echo $businessSoldCreditvalue?>" readonly/>

  </td>
  <td  style="text-align:center">

  <input class="txt1 input-mini1"  name="businessSoldCreditpoints"  id="t36"  style="width:60%;margin-left:auto;margin-right:auto;;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessSoldCreditpoints?>" readonly/>

  </td>
 <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txt3 input-mini2" readonly  id="businessSoldCreditprice"  name="businessSoldCreditprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessSoldCreditprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income16"  name="businessSoldCreditincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($businessSoldCreditincome);?>" readonly/>  
  </div>
</td>
  </tr>
  
  <tr class="green box row2" <?php echo $hide1;?> >
       <td Style="vertical-align:middle;text-align:center">17</td>
  <td Style="vertical-align:middle">
Negocio Compra - 5 Paquetes de notificaciones 
    </td>
    <td  style="text-align:center">

  <input class="txt input-mini" autocomplete="off" name="businessPurchasedPushNoteqty"   id="t40"  onkeyup="busi5push();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $businessPurchasedPushNoteqty?>"/>

  </td>
  <td>
  <input class="w3-input w3-border"  id="t41" name="businessPurchasedPushNotevalue" onkeyup="busi5push();" style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $businessPurchasedPushNotevalue?>" readonly/>

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1"  name="businessPurchasedPushNotepoints"   id="t42" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessPurchasedPushNotepoints?>" readonly/>

  </td>
    <td  style="text-align:center">
          <span class="input-symbol-euro">

  <input readonly class="txt2 input-mini3"   id="businessPurchasedPushNoteprice"  name="businessPurchasedPushNoteprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;" type="text" value="<?php echo number_format($businessPurchasedPushNoteprice);?>" />  
  </span>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income17"  name="businessPurchasedPushincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($businessPurchasedPushincome);?>" readonly/>  
  </div>
</td>
  </tr>
  <tr class="blue box row2" <?php echo $hide2;?> >
       <td Style="vertical-align:middle;text-align:center">18</td>
  <td Style="vertical-align:middle">
Reparto - Entregas exitosas
    </td>
    <td  style="text-align:center">

  <input class="txt input-mini" autocomplete="off" name="deliveryItemqty"  id="t43"  onkeyup="divitem();"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $deliveryItemqty?>"/>

  </td>
  <td>
 <input class="w3-input w3-border" id="t44"  onkeyup="divitem();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" name="deliveryItemvalue" value="<?php echo $deliveryItemvalue?>" readonly />

  </td>
  <td  style="text-align:center">
  <input class="txt1 input-mini1"    name="deliveryItempoints"  id="t45"  style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;"  type="text" value="<?php echo $deliveryItempoints?>" readonly/>

  </td>
 <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input readonly class="txt3 input-mini2"   id="deliveryitemprice"  name="deliveryitemprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($deliveryitemprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income18"  name="deliveryitemincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($deliveryitemincome);?>" readonly/>  
  </div>
</td>
  </tr>
  <tr class="blue box row2" <?php echo $hide2;?> >
       <td Style="vertical-align:middle;text-align:center ">19</td>
  <td Style="vertical-align:middle">
Reparto - 5 entregas exitosas
    </td>
    <td  style="text-align:center">

  <input class="txt input-mini" autocomplete="off" name="deliverycompletedqty"  id="t46" onkeyup="div5item();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $deliverycompletedqty?>"/>

  </td>
  <td  style="text-align:center">

  <input class="w3-input w3-border"  name="deliverycompletedvalue"  id="t47"  onkeyup="div5item();"   style="width:60%;margin-left:auto;margin-right:auto;text-align:center" type="text" value="<?php echo $deliverycompletedvalue?>" readonly/>

  </td>
  
  <td  style="text-align:center">
  <input  class="txt1 input-mini1"  name="deliverycompletedpoints"  id="t48" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $deliverycompletedpoints?>" readonly/>

  </td>
 <td  style="text-align:center ;vertical-align: middle;">
             <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
        <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input readonly class="txt3 input-mini2"   id="deliverycompletedprice"  name="deliverycompletedprice"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($deliverycompletedprice);?>" />  
  </div>
  </td>
  <td  style="text-align:center; vertical-align:middle">
  <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
  <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
  <input  class="txti input-mini1"   id="income19"  name="deliverycompletedincome"  style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;"  type="text" value="<?php echo number_format($deliverycompletedincome);?>" readonly/>  
  </div>
</td>
  </tr>
  </table>
  
  </div>

  <input type="submit" name="save" class="search" type="submit" style="background-color:#5CC4BA;margin-top:20px;width:20%;margin-left:auto;margin-right:auto;font-family: 'Montserrat';font-size: 15px;"  value="Cambios" id="but_submit"/>

 

  </div>
  </form>
   </div> 
      </div> 
      <div id="loader"></div>
<!-- INCLUDE "t2228.php:PHP" -->
 
<script src="http://code.jquery.com/jquery.js"></script>
 
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script>
/*var spinner = $('#loader');
$(function() {
  $('#uploadform').submit(function(e) {
    e.preventDefault();
    spinner.show();
    $.ajax({
      url: 'importdatabse.php',
      data: $(this).serialize(),
      method: 'post',
      dataType: 'JSON'
    }).done(function(resp) {
      spinner.hide();
      alert(resp.status);
    });
  });
});*/
</script>
<script>
$("#submit-btn").click(function(){

$("#display_loading").show();

});

$("#sync-btn").click(function(){

$("#display_loading").show();

});
</script>
      <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<script>

  
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});
</script>
<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
</script>


<!-- Mobile View -->
<style>
        @media only screen and (max-width: 800px) {
            .mbtable {
                display: block;
            }

            .desktable {
                display: none;
            }

            div.mcard {
                width: 95%;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
                margin-top: 20px;
                box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);

            }

            .topnav {
                overflow: hidden;
                background-color: FBB040;
                height: 50px;
            }

            body {
                margin: 0 auto;
            }

            header {
                height: 60px;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            header>h1 {
                width: calc(100% - 160px);
                text-align: center;
                font-size: 20px;
                color: white;
            }

            header>.top {
                position: absolute;
                left: 20px;
                width:95%;
            }

            header>.top a.menu_icon i {
                color: #000;
                font-size: 40px;
                padding-top: 5px;
                transition: .2s ease;
            }

            header>.top a.menu_icon:hover i {
                color: #fff;
            }

            nav.menu {
                width: 200px;
                min-height: calc(100vh - 121px);
                background-color: rgba(242, 242, 242, 255);
                position: absolute;
                left: -300px;
                transition: .3s all;
            }

            nav.menu>a {
                display: block;
                padding: 5px;
                margin: 15px 0 0px 20px;
                color: #494949;
                text-transform: uppercase;
            }

            main {
                width: 100%;
                /* padding: 30px; */
                box-sizing: border-box;
            }

            footer {
                height: 50px;
                background-color: #494949;
                color: #fff;
                display: flex;
                align-items: center;
                justify-content: center;
                bottom: 0;
                position: fixed;
                width: 100%;
            }

            .menu_show {
                left: 0 !important;
            }

            @media screen and (max-width: 425px) {
                div.mcard {
                    width: 95%;
                    text-align: center;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 20px;
                    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
                }

                header h1 {
                    font-size: 16px;
                }
            }

            @media screen and (max-width: 360px) {
                div.mcard {
                    width: 95%;
                    text-align: center;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 20px;
                    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
                }

                nav.menu {
                    width: 200px;
                    min-height: calc(100vh - 121px);
                    background-color: rgba(242, 242, 242, 255);
                    position: absolute;
                    left: -300px;
                    transition: .3s all;
                }
            }

            .topnav1 {
                overflow: hidden;
                background-color: rgba(242, 242, 242, 255);
                height: 50px;
            }

            .topnav1 a {
                color: #444;
                /* text-align: center; */
                padding: 14px 16px;
                text-decoration: none;
                font-size: 10px;
            }

            .topnav1 a.active {
                color: #d27c85;
                font-weight: bold;
            }

            div.card1 {
                width: 95%;
                text-align: center;
                margin-left: 10px;
                margin-top: 20px;

            }

            @media screen and (max-width: 800px) {
                div.mcard {
                    width: 95%;
                    text-align: center;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 20px;
                    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
                }

                body {
                    margin: 0 auto;
                }

                header {
                    height: 60px;
                    background-color: #B2B2B2;

                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                header>h1 {
                    width: calc(100% - 160px);
                    text-align: center;
                    font-size: 20px;
                    color: white;
                }

                header>.top {
                    position: absolute;
                    left: 20px;
                }

                header>.top a.menu_icon i {
                    color: #000;
                    font-size: 40px;
                    padding-top: 5px;
                    transition: .2s ease;
                }

                header>.top a.menu_icon:hover i {
                    color: #fff;
                }

                nav.menu {
                    width: 200px;
                    min-height: calc(100vh - 121px);
                    background-color: rgba(242, 242, 242, 255);
                    position: absolute;
                    left: -300px;
                    transition: .3s all;
                    font-family: Montserrat;
                }

                nav.menu>a {
                    display: block;
                    padding: 5px;
                    margin: 15px 0 0px 20px;
                    color: #494949;
                    text-transform: uppercase;
                    font-family: Montserrat;
                }

                main {
                    width: 100%;
                    /* padding: 30px; */
                    box-sizing: border-box;

                }

                .menu_show {
                    left: 0 !important;
                }

                @media screen and (max-width: 425px) {
                    div.mcard {
                        width: 95%;
                        text-align: center;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 20px;
                        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
                    }

                    header h1 {
                        font-size: 16px;
                    }
                }

                @media screen and (max-width: 360px) {
                    div.mcard {
                        width: 95%;
                        text-align: center;
                        margin-left: auto;
                        margin-right: auto;
                        margin-top: 20px;
                        box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);
                    }

                    nav.menu {
                        width: 200px;
                        min-height: calc(100vh - 121px);
                        background-color: rgba(242, 242, 242, 255);
                        position: absolute;
                        left: -300px;
                        transition: .3s all;
                        font-family: Montserrat;
                    }
                }

                .topnav1 a.icon {
                    float: right;
                    display: block;
                }

                .fa-1x {
                    font-size: 1.5rem;
                }

                .navbar-toggler.toggler-example {
                    cursor: pointer;
                }

                .dark-blue-text {
                    color: #0A38F5;
                }

                .dark-pink-text {
                    color: #AC003A;
                }

                .dark-amber-text {
                    color: #ff6f00;
                }

                .dark-teal-text {
                    color: #004d40;
                }

            }

            @media screen and (max-width: 800px) {
                div.mcard {
                    width: 95%;
                    text-align: center;
                    margin-left: auto;
                    margin-right: auto;
                    margin-top: 20px;
                    box-shadow: 0 4px 8px 0 rgb(0 0 0 / 20%), 0 6px 20px 0 rgb(0 0 0 / 19%);

                }

                .fa-1x {
                    font-size: 1.5rem;
                }

                .navbar-toggler.toggler-example {
                    cursor: pointer;
                }

                .dark-blue-text {
                    color: #0A38F5;
                }

                .dark-pink-text {
                    color: #AC003A;
                }

                .dark-amber-text {
                    color: #ff6f00;
                }

                .dark-teal-text {
                    color: #004d40;
                }

                .topnav1.responsive {
                    position: relative;
                }

                .topnav1.responsive .icon {
                    position: absolute;
                    right: 0;
                    top: 0;
                }

                .topnav1.responsive a {
                    float: none;
                    display: block;
                    text-align: left;
                }

                .topnav1.responsive .dropdown {
                    float: none;
                }

                .topnav1.responsive .dropdown-content {
                    position: relative;
                }

                .topnav1.responsive .dropdown .dropbtn {
                    display: block;
                    width: 100%;
                    text-align: left;
                }
            }
        }

        input[type=checkbox] {
            margin: 5px;
            width: 1.3em;
            height: 1.3em;
            background-color: white;
            border-radius: 50%;
            vertical-align: middle;
            border: 1px solid #ddd;
            outline: none;
            cursor: pointer;
        }

        .row2 {
            border-bottom: 1px solid #E8E8E8;
            height: 60px;
            font-size: 14px;
        }

        .logout {
            background: transparent;
            padding-left: 1px;
            cursor: pointer;
        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: middle;
            border-top: 1px solid #dee2e6;
        }

        .inputhg {
            height: 50px;
            padding: 0px;
        }

        nav.menu .active {
            color: #E31E36;
            font-weight: bold;
        }
    </style>

<div class="mbtable">
        <div class="topnav">
            <a href=" https://www.youtube.com/channel/UC2Qc9IlKBZkNDJVp0S1FzYg/videos" target="_blank">
                <img src="./Images/youtube.png" alt="Youtube" width="40" height="40" style="float: right;margin-top:5px;margin-right:5px"></a>

            <a href="https://www.linkedin.com/company/28588810/admin/" target="_blank">
                <img src="./Images/linkedin.png" alt="linkedin" width="30" height="30" style="float: right;margin-top:10px;margin-right:1px"></a>

            <a href="https://www.instagram.com/abiertto/" target="_blank">
                <img src="./Images/instagram1.png" alt="Instagram" width="30" height="30" style="float: right;margin-top:10px;margin-right:4px"></a>

            <a href="https://www.facebook.com/abiertto" target="_blank">
                <img src="./Images/facebook1.png" alt="Facebook" width="27" height="27" style="float: right;margin-top:11px ;margin-right:5px"> </a>

        </div>
        <header>

            <div class="top">
                <table width="100%">
                    <tr>
                        <td width="50%" style="text-align:left">
                            <a href="#" class="menu_icon"><i style=" float: left;" class="material-icons">dehaze</i></a>

                        </td>
                        <td width="50%" style="text-align:right">
                            <img src="./Images/abiertto.png" alt="Girl in a jacket" width="200" height="40" style="margin-right:10px">


                        </td>
                    </tr>
                </table>

            </div>
        </header>
        <nav class="menu">
            <a class="item_menu" href="Dashboard.php">Dashboard</a>
            <a class="item_menu active" href="AddEntry.php">Add Entry</a>
            <a class="item_menu" href="calculation.php">Calculation</a>
            <a class="item_menu" href="template.php">Create Template</a>
            <a class="item_menu" href="History.php">History</a>
            <a class="item_menu" class="active" href="Report.php">Report</a>
            <a href="#" class="item_menu">
                <form method='post' action="">
                    <input type="submit" value="LOGOUT" class="logout" name="but_logout" style="background-color: transparent;color: #444;font-family:Montserrat;text-transform: uppercase;padding: 0;">
                </form>
            </a>
        </nav>
        <div class="mcard">
            <div class="header">
                <h3 style="font-weight:bold;font-family: 'Montserrat';">ADD ENTRY</h3>
            </div>
  
            <div>
                <table width="100%" style="margin-bottom:10px;font-size:17px;">
                    <tr style="width:24%;padding-left:10px;padding-top:10px;font-size:13px;font-weight:bold;font-family: 'Montserrat';">
                        <td style="width:24%;padding-left:10px;padding-top:10px;font-size:14px;font-weight:bold;font-family: 'Montserrat';">
                            Import File
                        </td>
                        <div id="wrapper">
                            <form method="post" id="uploadform" action="importdatabse.php" enctype="multipart/form-data" style="font-size:15px;font-family: 'Montserrat';">
                                <td style="text-align:left;width:80%;font-family: 'Montserrat';padding-left:20px;">

                                    <input type="file" name="file" accept=".csv" style="width:90%;" />
                                </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="submit_file" value="Submit" id="msubmit-btn" class="search" style="background-color:#5CC4BA;margin-left:auto;margin-right:auto;width:45%;display:block" />
                        </td>
                        <div id="mdisplay_loading"><img src="Images/giphy.gif" height="100px" width="100px"></div>
                        </form>

            </div>
            </tr>

            </table>
            <table width="100%">
                <tr>
                    <td colspan="2">

                        <form method="Post" action="">
                            <input type="submit" name="Connect" value="Sincronizar datos importados" class="search" style="background-color:#5CC4BA;margin-left:auto;margin-right:auto;width:90%;display:block" />
                        </form>
                    </td>
                </tr>
            </table>


  
  
            <form action="" method="post">

<table width="100%" style="margin-bottom:10px;font-size:15px;">
    <tr>
        <td style="width:20%;padding-left:10px;padding-top:10px;font-size:14px;font-weight:bold;font-family: 'Montserrat';">
            User Id 

        </td>

        <td style="text-align:left;width:80%;">

            <input class="w3-input w3-border" style="width:85%;" name="UserId" id="UserId" autocomplete="off" value="<?php echo $UserId; ?>" type="text" required>
            <!--<input class="w3-input w3-border" value="<?php echo $UserId; ?>" type="text" style="width:90%;" id="UserId" name="UserId" type="text" required>  
-->
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" name="submit" class="search" value="Enter" style="background-color:#5CC4BA;margin-left:auto;margin-right:auto;width:50%;display:block">
        </td>
    </tr>
</table>
<table width="100%" <?php if ($userName == "") echo 'style="display:none;margin-bottom:30px;font-size:17px;vertical-align: middle;"' ?>>
    <tr>

        <td style="width:20%;padding-left:10px;padding-top:10px;font-size:14px;font-weight:bold;font-family: 'Montserrat';">
            User Name 
        </td>

        <td style="text-align:left;width:80%;">
            <input class="w3-input" style="width:90%;margin-right:5px;border-top-style: hidden;
border-right-style: hidden;
border-left-style: hidden;
border-bottom-style: hidden;" name="userName" value="<?php echo $userName ?>" type="text" readonly>


        </td>
    <tr <?php if ($BusinessId == "") echo 'style="display:none;"' ?>>
        <td style="width:20%;padding-left:10px;padding-top:10px;font-size:14px;font-weight:bold;font-family: 'Montserrat';">
            Business Id :
        </td>

        <td style="text-align:left;width:80%;">
            <input class="w3-input " style="width:90%;margin-right:5px;border-top-style: hidden;
border-right-style: hidden;
border-left-style: hidden;
border-bottom-style: hidden;" name="BusinessId" value="<?php echo $BusinessId ?>" type="text" readonly>
        </td>

    <tr>
    <tr <?php if ($deliveryId == "") echo 'style="display:none;"' ?>>
        <td style="width:20%;padding-left:10px;padding-top:10px;font-size:14px;font-weight:bold;font-family: 'Montserrat';">
            Delivery Id 

        </td>
        </td>
        <td style="text-align:left;width:80%;">
            <input class="w3-input" style="width:90%;margin-right:5px;border-top-style: hidden;
border-right-style: hidden;
border-left-style: hidden;
border-bottom-style: hidden;" name="deliveryId" value="<?php echo $deliveryId ?>" type="text" readonly>
        </td>


    </tr>

</table>
<table width="100%" <?php if ($userName == "") echo 'style="display:none"' ?> style="font-size:15px; font-family: 'Montserrat';">
                <tr>
                    <td style="width:20%;padding-left:10px;padding-top:10px;font-size:14px;font-weight:bold;font-family: 'Montserrat';">
                        Template 
                    </td>
                    <td style="text-align:center;width:80%;padding-left:20px;">

                        <form>

                            <?php

                            $con = mysqli_connect($host, $user, $password, $dbname);
                            // Check connection
                            if (!$con) {
                                die("Connection failed: " . mysqli_connect_error());
                            }
                            $sql_query = "SELECT * from template";
                            $result = mysqli_query($con, $sql_query);
                            $row = mysqli_fetch_array($result);
                            $count = mysqli_num_rows($result);
                            // $r_set = $con->query("SELECT * from template")
                            //echo "<input type='text' value='$_POST[users]' >";

                            echo "<select name='users' id='users1' style='height: auto;width:90%' onchange='mshowUser(this.value)'  class='select2 form-control'  value='<?php echo $users?>'>";
                            if ($users != "") {
                                echo "<option>$users</option>";
                            } else {
                                echo "<option>---Select Custom Template---</option>";
                            }
                            foreach ($result as $row) {
                                //echo "<option value=$row[ID]>$row[Name]</option>";
                                echo "<option value=\"" . $row["ID"] . "\"";
                                if ($users == $row['ID'])
                                    echo 'selected';
                                echo ">" . $row["Name"] . "</option>";
                            }
                            echo "</select>";





                            ?>

                        </form>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">

                        <input type="submit" name="submit" class="search" value="Reset" style="background-color:#5CC4BA;margin-left:auto;margin-right:auto;width:50%;display:block">
                    </td>
                </tr>

            </table>


            </table>
            <table width="100%" class="table table-bordered" style="margin-top:5px;">
                <tr style="background-color: #B2B2B2;color:black;font-size:14px;text-align:center;font-family: 'Montserrat';font-size:14px">

                    <th style="vertical-align:middle ;width:50%">
                        Total de Número de veces

                    </th>
                    <th style="vertical-align:middle;width:50%">
                        Puntos totales en el sistema
                    </th>
                </tr>
                <tbody id="geeks" style="font-family: 'Montserrat';font-size:14px;vertical-align:middle">

                    <tr class="red box" style=" border-bottom: 1px solid #E8E8E8;height:60px;font-size:14px">

                        <td style="text-align:center;vertical-align:middle">
                            <input id="msum" type="text" name="Totalqty" value="<?php echo number_format($Totalqty) ?>" class="input-medium" style="width:50%;margin-left:auto;margin-right:auto;text-align:center;border:1px solid :#E8E8E8;height:10px;border-width:0px;border:none; background-color:white" readonly />
                        </td>
                        <td style="text-align:center;vertical-align:middle">
                            <input id="msum1" type="text" name="Totalpoint" value="<?php echo number_format($Totalpoint) ?>" class="input-medium1" style="width:50%;margin-left:auto;margin-right:auto;text-align:center;border:1px solid :#E8E8E8;height:10px;border-width:0px;border:none; background-color:white" readonly />
                        </td>
                    </tr>
            </table>
























            <div id="txtHint1">
                    <table width="100%" class="table table-bordered table-responsive" style="font-family: 'Montserrat';font-size:14px;margin-top:8px">
                        <tr style="background-color: #B2B2B2;height:50px;text-align:center;color:black;font-size:14px;vertical-align:middle">
                            <th Style="vertical-align:middle;text-align:center;width:5%">Sr No.</th>

                            <th style="vertical-align:middle;text-align:center;width:20%;padding-left: 20px;padding-right: 20px;">
                                Actividad
                            </th>
                            <th style="vertical-align:middle;text-align:center;width:15%;padding-left: 20px;padding-right: 20px;">
                                Conteo

                            </th>
                            <th style="vertical-align:middle;text-align:center;width:15%;padding-left: 20px;padding-right: 20px;">
                                Puntos por actividad
                            </th>
                            <th style="vertical-align:middle;text-align:center;width:15%;padding-left: 20px;padding-right: 20px;">
                                Puntos totales

                            </th>
                            <th style="vertical-align:middle;text-align:center;width:15%;padding-left: 20px;padding-right: 20px;">
                                Precio por actividad
                            </th>
                            <th style="vertical-align:middle;text-align:center;width:15%;padding-left: 30px;padding-right: 30px;">
                                Income
                            </th>
                        </tr>
                        <tr class="red box row2">

                            <td Style="vertical-align:middle;text-align:center">1</td>
                            <td Style="vertical-align:middle">
                                Referidos - Nuevo usuario “cliente”
                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt input-mini" name="clientReferralsqty" id="textmone" onkeyup="msumclogin();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $clientReferralsqty ?>" />
                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border " id="textmtwo" name="clientReferralvalue" onkeyup="msumclogin();" style="width:100%;text-align:center;" type="text" value=" <?php echo $clientReferralvalue ?>" readonly />
                            </td>
                            <td style="text-align:center">
                                <input class="mtxt1 input-mini1" id="textmthree" name="clientReferralspoints" style="width:100%;text-align:center;" type="text" value="<?php echo $clientReferralspoints ?>" readonly />
                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="mtxt3 input-mini2" id="mclientReferralsprice" name="clientReferralsprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" readonly value="<?php echo number_format($clientReferralsprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome1" name="clientReferralsincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($clientReferralsincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>
                        <tr class="green box row2">
                            <td Style="vertical-align:middle;text-align:center">2</td>
                            <td Style="vertical-align:middle">

                                Referidos - Nuevo usuario “negocio”
                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt input-mini" name="businessReferralsqty" id="mt1" onkeyup="msumblogin();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $businessReferralsqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="businessReferralsvalue" id="mt2" onkeyup="msumblogin();" style="width:100%;text-align:center;" value="<?php echo $businessReferralsvalue ?>" type="text" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="businessReferralspoints" id="mt3" style="width:100%;text-align:center;" type="text" value="<?php echo $businessReferralspoints ?>" readonly />

                            </td>

                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="mtxt3 input-mini2" id="mbusinessReferralsprice" name="businessReferralsprice" readonly style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessReferralsprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome2" name="businessReferralsincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($businessReferralsincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="blue box row2">
                            <td Style="vertical-align:middle;text-align:center">3</td>
                            <td Style="vertical-align:middle">

                                Referidos - Nuevo usuario “repartidor”
                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt input-mini" name="deliveryReferralsqty" id="mt4" onkeyup="msumdlogin();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $deliveryReferralsqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="deliveryReferralsvalue" id="mt5" onkeyup="msumdlogin();" style="width:100%;text-align:center;" type="text" value="<?php echo $deliveryReferralsvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="deliveryReferralspoints" id="mt6" style="width:100%;text-align:center;" type="text" value="<?php echo $deliveryReferralspoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="mtxt3 input-mini2" id="mdeliveryReferralsprice" name="deliveryReferralsprice" readonly style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($deliveryReferralsprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome3" name="deliveryReferralsincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($deliveryReferralsincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>
                        <tr class="red box row2" <?php echo $hide; ?>>
                            <td Style="vertical-align:middle;text-align:center">4</td>
                            <td Style="vertical-align:middle">
                                Cliente compra usando Tarjeta de Crédito
                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt input-mini1" class="calc" name="clientpurchasecreditqty" id="mt7" onkeyup="mclientcredit();" style="width:100%;text-align:center;" autocomplete="off" type="text" value="<?php echo $clientpurchasecreditqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" id="mt8" name="clientpurchasecreditvalue" onkeyup="mclientcredit();" style="width:100%;text-align:center;" type="text" value="<?php echo $clientpurchasecreditvalue ?>" readonly />

                            </td>
                            <td style="text-align:center">
                                <input class="mtxt1 input-mini1" id="mt9" name="clientpurchasecreditpoints" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $clientpurchasecreditpoints ?>" readonly />

                            </td>

                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input readonly class="mtxt3 input-mini2" id="mclientpurchasecreditprice" name="mclientpurchasecreditprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($clientpurchasecreditprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome4" name="clientpurchasecreditincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($clientpurchasecreditincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>
                        <tr class="red box row2" <?php echo $hide; ?>>
                            <td Style="vertical-align:middle;text-align:center">5</td>
                            <td Style="vertical-align:middle">
                                Cliente compra usando efectivo

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt input-mini" name="clientpurchasecashqty" id="mt10" onkeyup="mclientcash();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $clientpurchasecashqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" id="mt11" name="clientpurchasecashvalue" onkeyup="mclientcash();" style="width:100%;text-align:center;" type="text" value="<?php echo $clientpurchasecashvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" id="mt12" name="clientpurchasecashpoints" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $clientpurchasecashpoints; ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input readonly class="mtxt3 input-mini2" id="mclientpurchasecashprice" name="clientpurchasecashprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center; padding: 5px 10px;" type="text" value="<?php echo number_format($clientpurchasecashprice); ?>" readonly />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome5" name="clientpurchasecashincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($clientpurchasecashincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>
                        <tr class="red box row2" <?php echo $hide; ?>>
                            <td Style="vertical-align:middle;text-align:center">6</td>
                            <td Style="vertical-align:middle">
                                Cliente compra de 5 negocios diferentes
                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt input-mini" name="clientpurchasedifferqty" id="mt13" onkeyup="mclientbus();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $clientpurchasedifferqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="clientpurchasediffervalue" id="mt14" onkeyup="mclientbus();" style="width:100%;text-align:center;" type="text" value="<?php echo $clientpurchasediffervalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" id="mt15" name="clientpurchasedifferpoints" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $clientpurchasedifferpoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input readonly class="mtxt3 input-mini2" id="mclientpurchasedifferprice" name="clientpurchasedifferprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($clientpurchasedifferprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome6" name="clientpurchasedifferincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($clientpurchasedifferincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">7</td>
                            <td Style="vertical-align:middle">
                                Negocio Membresía - Referido Embajador (pago mensual)
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" name="AMBASSADORbus" id="mt49" onkeyup="mbusAMBA();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $AMBASSADORbus ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="AMBASSADORbusvalue" id="mt50" onkeyup="mbusAMBA();" style="width:100%;text-align:center;" type="text" value="<?php echo $AMBASSADORbusvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="AMBASSADORbuspoint" id="mt51" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $AMBASSADORbuspoint ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input readonly class="mtxt3 input-mini2" id="mAMBASSADORbusprice" name="AMBASSADORbusprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($AMBASSADORbusprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome7" name="AMBASSADORbusincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($AMBASSADORbusincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>




                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">8</td>
                            <td Style="vertical-align:middle">
                                Negocio Membresía - pago Mensual
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" name="businessPurchasedMonthlyqty" id="mt19" onkeyup="mbusimonth();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $businessPurchasedMonthlyqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="businessPurchasedMonthlyvalue" id="mt20" onkeyup="mbusimonth();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessPurchasedMonthlyvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="businessPurchasedMonthlypoints" id="mt21" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessPurchasedMonthlypoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input class="mtxt3 input-mini2" id="mbusinessPurchasedMonthlyprice" name="businessPurchasedMonthlyprice" readonly style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessPurchasedMonthlyprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome8" name="businessPurchasedMonthlyincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($businessPurchasedMonthlyincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">9</td>
                            <td Style="vertical-align:middle">
                                Negocio Membresía - pago Semestral
                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" name="businessPurchasedHalfqty" id="mt22" onkeyup="mbusihalf();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $businessPurchasedHalfqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="businessPurchasedHalfvalue" id="mt23" onkeyup="mbusihalf();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessPurchasedHalfvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="businessPurchasedHalfpoints" id="mt24" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessPurchasedHalfpoints ?>" readonly />
                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input class="mtxt3 input-mini2" readonly id="mbusinessPurchasedHalfprice" name="businessPurchasedHalfprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessPurchasedHalfprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome9" name="businessPurchasedHalfincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($businessPurchasedHalfincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>
                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">10</td>
                            <td Style="vertical-align:middle">
                                Negocio Membresía - pago Anual
                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" name="businessPurchasedyearqty" id="mt25" onkeyup="mbusiyear();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $businessPurchasedyearqty ?>" />
                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="businessPurchasedyearvalue" id="mt26" onkeyup="mbusiyear();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessPurchasedyearvalue ?>" readonly />
                            </td>
                            <td style="text-align:center">
                                <input class="mtxt1 input-mini1" name="businessPurchasedyearpoints" id="mt27" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessPurchasedyearpoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input class="mtxt3 input-mini3" readonly id="mbusinessPurchasedyearprice" name="businessPurchasedyearprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessPurchasedyearprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome10" name="businessPurchasedyearincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($businessPurchasedyearincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">11</td>
                            <td Style="vertical-align:middle">
                                Negocio Ventas - 5 clientes diferentes
                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" name="businessSoldqty" id="mt28" onkeyup="mbusi5();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $businessSoldqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="businessSoldvalue" id="mt29" onkeyup="mbusi5();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessSoldvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="businessSoldpoints" id="mt30" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessSoldpoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input class="mtxt3 input-mini2" readonly id="mbusinessSoldprice" name="businessSoldprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessSoldprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome11" name="businessSoldincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($businessSoldincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>
                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">12</td>
                            <td Style="vertical-align:middle">
                                Negocio Ventas - 10 ventas en el mes

                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" name="businessSaleMonthqty" id="mt31" onkeyup="mbusisale();" style="width:100%;text-align:center;" autocomplete="off" type="text" value="<?php echo $businessSaleMonthqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="businessSaleMonthvalue" id="mt32" onkeyup="mbusisale();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessSaleMonthvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="businessSaleMonthpoints" id="mt33" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessSaleMonthpoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="mtxt3 input-mini2" readonly id="mbusinessSaleMonthprice" name="businessSaleMonthprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessSaleMonthprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome12" name="businessSaleMonthincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($businessSaleMonthincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">13</td>
                            <td Style="vertical-align:middle">
                                Negocio Compra - Paquete notificaciones A (5 avisos)
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" name="pusha" id="mt52" onkeyup="mbuspusha();" style="width:100%;text-align:center;" type="text" autocomplete="off" value="<?php echo $pusha ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="pushavalue" id="mt53" onkeyup="mbuspusha();" style="width:100%;text-align:center;" type="text" value="<?php echo $pushavalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="pushapoint" id="mt54" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $pushapoint ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input class="mtxt3 input-mini2" readonly id="mpushaprice" name="pushaprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($pushaprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome13" name="pushaincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($pushaincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">14</td>
                            <td Style="vertical-align:middle">
                                Negocio Compra - Paquete notificaciones B (10 avisos)
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" name="pushb" id="mt55" autocomplete="off" onkeyup="mbuspushb();" style="width:100%;text-align:center;" type="text" value="<?php echo $pushb ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="pushbvalue" id="mt56" onkeyup="mbuspushb();" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $pushbvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="pushbpoint" id="mt57" style="width:100%;text-align:center;" type="text" value="<?php echo $pushbpoint ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="mtxt3 input-mini2" readonly id="mpushbprice" name="pushbprice" style="width:60%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($pushbprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome14" name="pushbincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($pushbincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">15</td>
                            <td Style="vertical-align:middle">
                                Negocio Compra - Paquete notificaciones C (20 avisos)
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" autocomplete="off" name="pushc" id="mt58" onkeyup="mbuspushc();" style="width:100%;text-align:center;" type="text" value="<?php echo $pushc ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" name="pushcvalue" id="mt59" onkeyup="mbuspushc();" style="width:100%;text-align:center;" type="text" value="<?php echo $pushcvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="pushcpoint" id="mt60" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $pushcpoint ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="mtxt3 input-mini2" readonly id="mpushcprice" name="pushcprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($pushcprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome15" name="pushcincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($pushcincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>


                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">16</td>
                            <td Style="vertical-align:middle">
                                Negocio Ventas - Transacción con Tarjetas de Crédito

                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" autocomplete="off" name="businessSoldCreditqty" id="mt34" onkeyup="mbusisoldcre();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessSoldCreditqty ?>" />

                            </td>
                            <td style="text-align:center;">

                                <input class="w3-input w3-border" id="mt35" name="businessSoldCreditvalue" onkeyup="mbusisoldcre();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessSoldCreditvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt1 input-mini1" name="businessSoldCreditpoints" id="mt36" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessSoldCreditpoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="mtxt3 input-mini2" readonly id="mbusinessSoldCreditprice" name="businessSoldCreditprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessSoldCreditprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome16" name="businessSoldCreditincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($businessSoldCreditincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="green box row2" <?php echo $hide1; ?>>
                            <td Style="vertical-align:middle;text-align:center">17</td>
                            <td Style="vertical-align:middle">
                                Negocio Compra - 5 Paquetes de notificaciones
                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" autocomplete="off" name="businessPurchasedPushNoteqty" id="mt40" onkeyup="mbusi5push();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessPurchasedPushNoteqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" id="mt41" name="businessPurchasedPushNotevalue" onkeyup="mbusi5push();" style="width:100%;text-align:center;" type="text" value="<?php echo $businessPurchasedPushNotevalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="businessPurchasedPushNotepoints" id="mt42" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $businessPurchasedPushNotepoints ?>" readonly />

                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>

                                    <input readonly class="mtxt2 input-mini3" id="mbusinessPurchasedPushNoteprice" name="businessPurchasedPushNoteprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($businessPurchasedPushNoteprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome17" name="businessPurchasedPushincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($businessPurchasedPushincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>

                        <tr class="blue box row2" <?php echo $hide2; ?>>
                            <td Style="vertical-align:middle;text-align:center">18</td>
                            <td Style="vertical-align:middle">
                                Reparto - Entregas exitosas
                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" autocomplete="off" name="deliveryItemqty" id="mt43" onkeyup="mdivitem();" style="width:100%;text-align:center;" type="text" value="<?php echo $deliveryItemqty ?>" />

                            </td>
                            <td style="text-align:center;">
                                <input class="w3-input w3-border" id="mt44" onkeyup="mdivitem();" style="width:100%;text-align:center;" type="text" name="deliveryItemvalue" value="<?php echo $deliveryItemvalue ?>" readonly />

                            </td>
                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="deliveryItempoints" id="mt45" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $deliveryItempoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input readonly class="mtxt3 input-mini2" id="mdeliveryitemprice" name="deliveryitemprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($deliveryitemprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome18" name="deliveryitemincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($deliveryitemincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>
                        <tr class="blue box row2" <?php echo $hide2; ?>>
                            <td Style="vertical-align:middle;text-align:center ">19</td>
                            <td Style="vertical-align:middle">
                                Reparto - 5 entregas exitosas
                            </td>
                            <td style="text-align:center;">

                                <input class="mtxt input-mini" autocomplete="off" name="deliverycompletedqty" id="mt46" onkeyup="mdiv5item();" style="width:100%;text-align:center;" type="text" value="<?php echo $deliverycompletedqty ?>" />

                            </td>
                            <td style="text-align:center;">

                                <input class="w3-input w3-border" name="deliverycompletedvalue" id="mt47" onkeyup="mdiv5item();" style="width:100%;text-align:center;" type="text" value="<?php echo $deliverycompletedvalue ?>" readonly />

                            </td>

                            <td style="text-align:center;">
                                <input class="mtxt1 input-mini1" name="deliverycompletedpoints" id="mt48" style="width:100%;text-align:center;background: #F8F8F8;" type="text" value="<?php echo $deliverycompletedpoints ?>" readonly />

                            </td>
                            <td style="text-align:center ;vertical-align: middle;">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input readonly class="mtxt3 input-mini2" id="mdeliverycompletedprice" name="deliverycompletedprice" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;" type="text" value="<?php echo number_format($deliverycompletedprice); ?>" />
                                </div>
                            </td>
                            <td style="text-align:center; vertical-align:middle">
                                <div id="floatContainer" class="float-container" style="background: #F8F8F8;text-align:center">
                                    <label for="floatField" style="margin-top: 10px; margin-left: 10px;">$</label>
                                    <input class="txti input-mini1" id="mincome19" name="deliverycompletedincome" style="width:100%;margin-left:auto;margin-right:auto;text-align:center;padding: 5px 10px;background: #F8F8F8;" type="text" value="<?php echo number_format($deliverycompletedincome); ?>" readonly />
                                </div>
                            </td>
                        </tr>
                    </table>
 </div>
                    <input type="submit" name="save" class="search" type="submit" style="background-color:#5CC4BA;margin-top:20px;width:50%;margin-left:auto;margin-right:auto;font-size:17px" name="save" value="SUBMIT"  id="but_submit"/>
       

   

  </form>
   </div> 
      </div> 

 </div>
       <script>
  $(document).ready(function() {
	$("body").on('click', '.top', function() {
		$("nav.menu").toggleClass("menu_show");
	});
});
  </script>
<script>
function sumclogin() {
           var txtFirstNumberValue = document.getElementById('textone').value;
           var txtSecondNumberValue = document.getElementById('texttwo').value;
           var result = txtFirstNumberValue * txtSecondNumberValue;
           if (!isNaN(result)) {
               document.getElementById('textthree').value = result.toLocaleString();
           var clientReferralsprice = document.getElementById('clientReferralsprice').value;

           var i1 =(document.getElementById('textthree').value.replace(/,/g, ""));
           var result= i1 * clientReferralsprice;
           document.getElementById('income1').value = result.toLocaleString();

           }
total();
       }
       function sumblogin() {
           var txtFirstNumberValue1 = document.getElementById('t1').value;
           var txtSecondNumberValue2 = document.getElementById('t2').value;
           var result = txtFirstNumberValue1 * txtSecondNumberValue2;
           if (!isNaN(result)) {
               document.getElementById('t3').value = result.toLocaleString();
               var i2 =(document.getElementById('t3').value.replace(/,/g, ""));
           var businessReferralsprice = (document.getElementById('businessReferralsprice').value.replace(/,/g, ""));
         var result2= i2 * businessReferralsprice;
           
           document.getElementById('income2').value = result2.toLocaleString();

           }
           total();
       }
       function sumdlogin() {
           var txtFirstNumberValue3 = document.getElementById('t4').value;
           var txtSecondNumberValue4 = document.getElementById('t5').value;
           var result = txtFirstNumberValue3 * txtSecondNumberValue4;
           if (!isNaN(result)) {
               document.getElementById('t6').value = result.toLocaleString();
               var i3 =(document.getElementById('t6').value.replace(/,/g, ""));
           var deliveryReferralsprice =(document.getElementById('deliveryReferralsprice').value.replace(/,/g, ""));
           var result3= i3 * deliveryReferralsprice;
           
           document.getElementById('income3').value =result3.toLocaleString();
           }
           total();
       }
       function clientcredit() {
           var txtFirstNumberValue5 = document.getElementById('t7').value;
           var txtSecondNumberValue6 = document.getElementById('t8').value;
           var result = txtFirstNumberValue5 * txtSecondNumberValue6;
           if (!isNaN(result)) {
               document.getElementById('t9').value = result.toLocaleString();
               var clientpurchasecreditprice = (document.getElementById('clientpurchasecreditprice').value.replace(/,/g, ""));
           var i4 =(document.getElementById('t9').value.replace(/,/g, ""));
          var result4= i4 * clientpurchasecreditprice;

 document.getElementById('income4').value =result4.toLocaleString();
total();
           }
       }
       function clientcash() {
           var txtFirstNumberValue7 = document.getElementById('t10').value;
           var txtSecondNumberValue8 = document.getElementById('t11').value;
           var result = txtFirstNumberValue7 * txtSecondNumberValue8;
           if (!isNaN(result)) {
               document.getElementById('t12').value = result.toLocaleString();
           }

           var clientpurchasecashprice = (document.getElementById('clientpurchasecashprice').value.replace(/,/g, ""));
           var i5 =(document.getElementById('t12').value.replace(/,/g, ""));
          var result5= i5 * clientpurchasecashprice;
           
            document.getElementById('income5').value =result5.toLocaleString();
           total();
       }
       function clientbus() {
           var txtFirstNumberValue9 = document.getElementById('t13').value;
           var txtSecondNumberValue10 = document.getElementById('t14').value;
           var result = txtFirstNumberValue9 * txtSecondNumberValue10;
           if (!isNaN(result)) {
               document.getElementById('t15').value = result.toLocaleString();
           }
           

           var clientpurchasedifferprice = (document.getElementById('clientpurchasedifferprice').value.replace(/,/g, ""));
           var i6 =(document.getElementById('t15').value.replace(/,/g, ""));
          var result6= i6 * clientpurchasedifferprice;
            document.getElementById('income6').value = result6.toLocaleString();
           
           total();
       }
       function clienteach() {
           var txtFirstNumberValue11 = document.getElementById('t16').value;
           var txtSecondNumberValue12 = document.getElementById('t17').value;
           var result = txtFirstNumberValue11 * txtSecondNumberValue12;
           if (!isNaN(result)) {
               document.getElementById('t18').value = result;
           }
           total();
             }
       function busimonth() {
           var txtFirstNumberValue13 = document.getElementById('t19').value;
           var txtSecondNumberValue14 = document.getElementById('t20').value;
           var result = txtFirstNumberValue13 * txtSecondNumberValue14;
           if (!isNaN(result)) {
               document.getElementById('t21').value = result.toLocaleString();
           }
           var businessPurchasedMonthlyprice = (document.getElementById('businessPurchasedMonthlyprice').value.replace(/,/g, ""));
           var i8 =(document.getElementById('t21').value.replace(/,/g, ""));
           var result8 = i8 * businessPurchasedMonthlyprice;
           document.getElementById('income8').value = result8.toLocaleString();
           total();
       }
       

       function busihalf () {
           var txtFirstNumberValue15 = document.getElementById('t22').value;
           var txtSecondNumberValue16 = document.getElementById('t23').value;
           var result = txtFirstNumberValue15 * txtSecondNumberValue16;
           if (!isNaN(result)) {
               document.getElementById('t24').value = result.toLocaleString();
           }
           var businessPurchasedHalfprice = (document.getElementById('businessPurchasedHalfprice').value.replace(/,/g, ""));
           var i9 =(document.getElementById('t24').value.replace(/,/g, ""));
       var result9= i9 * businessPurchasedHalfprice;
           
           document.getElementById('income9').value =  result9.toLocaleString();
           total();
       }
       

       function busiyear () {
           var txtFirstNumberValue17 = document.getElementById('t25').value;
           var txtSecondNumberValue18 = document.getElementById('t26').value;
           var result = txtFirstNumberValue17 * txtSecondNumberValue18;
           if (!isNaN(result)) {
               document.getElementById('t27').value = result.toLocaleString();
           }
           var businessPurchasedyearprice = (document.getElementById('businessPurchasedyearprice').value.replace(/,/g, ""));
           var i10 =(document.getElementById('t27').value.replace(/,/g, ""));
          var result10 = i10 * businessPurchasedyearprice;
          document.getElementById('income10').value = result10.toLocaleString();
           total();
       }
       

       function busi5() {
           var txtFirstNumberValue18= document.getElementById('t28').value;
           var txtSecondNumberValue19 = document.getElementById('t29').value;
           var result = txtFirstNumberValue18 * txtSecondNumberValue19;
           if (!isNaN(result)) {
               document.getElementById('t30').value = result.toLocaleString();
           }
           var businessSoldprice = (document.getElementById('businessSoldprice').value.replace(/,/g, ""));
           var i11 =(document.getElementById('t30').value.replace(/,/g, ""));
           var result11= i11 * businessSoldprice;
  document.getElementById('income11').value = result11.toLocaleString();

     total();
       }
       

       function busisale() {
           var txtFirstNumberValue21 = document.getElementById('t31').value;
           var txtSecondNumberValue22 = document.getElementById('t32').value;
           var result = txtFirstNumberValue21 * txtSecondNumberValue22;
           if (!isNaN(result)) {
               document.getElementById('t33').value = result.toLocaleString();
           }
           var businessSaleMonthprice = (document.getElementById('businessSaleMonthprice').value.replace(/,/g, ""));
           var i12 =(document.getElementById('t33').value.replace(/,/g, ""));
           var result12= i12 * businessSaleMonthprice;
           document.getElementById('income12').value =result12.toLocaleString();
     total();
       }
       

       function busisoldcre() {
           var txtFirstNumberValue22 = document.getElementById('t34').value;
           var txtSecondNumberValue23 = document.getElementById('t35').value;
           var result = txtFirstNumberValue22 * txtSecondNumberValue23;
           if (!isNaN(result)) {
               document.getElementById('t36').value = result.toLocaleString();
           }
           var businessSoldCreditprice = (document.getElementById('businessSoldCreditprice').value.replace(/,/g, ""));
           var i16 =(document.getElementById('t36').value.replace(/,/g, ""));
             var result16= i16 * businessSoldCreditprice;
      document.getElementById('income16').value = result16.toLocaleString();
     total();
       }
       

       function busipush() {
           var txtFirstNumberValue23 = document.getElementById('t37').value;
           var txtSecondNumberValue24 = document.getElementById('t38').value;
           var result = txtFirstNumberValue23 * txtSecondNumberValue24;
           if (!isNaN(result)) {
               document.getElementById('t39').value = result;
           }
           total();
       }
       

       function busi5push() {
           var txtFirstNumberValue25 = document.getElementById('t40').value;
           var txtSecondNumberValue26 = document.getElementById('t41').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('t42').value = result.toLocaleString();
           }
           var businessPurchasedPushNoteprice = (document.getElementById('businessPurchasedPushNoteprice').value.replace(/,/g, ""));
           var i17 =(document.getElementById('t42').value.replace(/,/g, ""));
           var result17 = i17 * businessPurchasedPushNoteprice; 
           document.getElementById('income17').value = result17.toLocaleString();
      total();
       }
       

       function divitem() {
           var txtFirstNumberValue27 = document.getElementById('t43').value;
           var txtSecondNumberValue28 = document.getElementById('t44').value;
           var result = txtFirstNumberValue27 * txtSecondNumberValue28;
           if (!isNaN(result)) {
               document.getElementById('t45').value = result.toLocaleString();
           }
           var deliveryitemprice = (document.getElementById('deliveryitemprice').value.replace(/,/g, ""));
           var i18 =
           (document.getElementById('t45').value.replace(/,/g, ""));
          var result18= i18 * deliveryitemprice; 
          document.getElementById('income18').value = result18.toLocaleString();
      total();
       }
       
        function busAMBA() {
           var txtFirstNumberValue25 = document.getElementById('t49').value;
           var txtSecondNumberValue26 = document.getElementById('t50').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('t51').value = result.toLocaleString();
               var AMBASSADORbusprice = (document.getElementById('AMBASSADORbusprice').value.replace(/,/g, ""));
           var i7 =(document.getElementById('t51').value.replace(/,/g, ""));
          var result7 = i7 * AMBASSADORbusprice;
          document.getElementById('income7').value = result7.toLocaleString();
     
           }
            total();
       }
      
       function buspusha() {
           var txtFirstNumberValue25 = document.getElementById('t52').value;
           var txtSecondNumberValue26 = document.getElementById('t53').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('t54').value = result.toLocaleString();
           }
           var pushaprice = (document.getElementById('pushaprice').value.replace(/,/g, ""));
           var i13 =(document.getElementById('t54').value.replace(/,/g, ""));

              var result13 =i13 * pushaprice;
           document.getElementById('income13').value = result13.toLocaleString();

            total();
       }
     
       function buspushb() {
           var txtFirstNumberValue25 = document.getElementById('t55').value;
           var txtSecondNumberValue26 = document.getElementById('t56').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('t57').value = result.toLocaleString();
           }
           var pushbprice = (document.getElementById('pushbprice').value.replace(/,/g, ""));
           var i14 =(document.getElementById('t57').value.replace(/,/g, ""));
            var result14  = i14 * pushbprice;
           document.getElementById('income14').value = result14.toLocaleString();
        
     total();
       }
       function mbuspushb() {
           var txtFirstNumberValue25 = document.getElementById('mt55').value;
           var txtSecondNumberValue26 = document.getElementById('mt56').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('mt57').value = result;
           }
           total();
       }
       function buspushc() {
           var txtFirstNumberValue25 = document.getElementById('t58').value;
           var txtSecondNumberValue26 = document.getElementById('t59').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('t60').value = result.toLocaleString();
           }
           var pushcprice = (document.getElementById('pushcprice').value.replace(/,/g, ""));
           var i15 =(document.getElementById('t60').value.replace(/,/g, ""));
          var result15 = i15 * pushcprice;
         document.getElementById('income15').value = result15.toLocaleString();

     total();
       }
  

       function div5item() {
           var txtFirstNumberValue28 = document.getElementById('t46').value;
           var txtSecondNumberValue29 = document.getElementById('t47').value;
           var result = txtFirstNumberValue28 * txtSecondNumberValue29;
           if (!isNaN(result)) {
               document.getElementById('t48').value = result.toLocaleString();
           }
           var deliverycompletedprice = (document.getElementById('deliverycompletedprice').value.replace(/,/g, ""));
           var i19 =(document.getElementById('t48').value.replace(/,/g, ""));
             var result19= i19 * deliverycompletedprice;
           document.getElementById('income19').value = result19.toLocaleString();
     total();
     
       }
      
       
       function totalpoint() {
           var txtFirstNumberValue1 = document.getElementById('t1').value;
           var txtFirstNumberValue28 = document.getElementById('t46').value;
           var txtFirstNumberValue27 = document.getElementById('t43').value;

           var result = txtFirstNumberValue1 + txtFirstNumberValue28 + txtFirstNumberValue27;
           if (!isNaN(result)) {
               document.getElementById('t3').value = result;
           }
       }
       
       function total() {
           var sum = 0;
      //iterate through each textboxes and add the values
      $(".txt").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                  
                }
            });
      sum=sum.toLocaleString();
          $("#sum").val(sum);
      var sum1 = 0;
      //iterate through each textboxes and add the values
      $(".txt1").each(function() {
         this.value=(this.value.replace(/,/g, ""));
        //add only if the value is number
         if (!isNaN((this.value.replace(/,/g, ""))) && (this.value.replace(/,/g, "")).length != 0) {
                   sum1 += parseFloat(this.value);
                   //sum1 += parseInt($("#quantity").val().replace(',', ''));
                }
               
      });
      sum1=sum1.toLocaleString();
          $("#sum1").val(sum1);
          }
       
</script>

<script>
 onload = function () 
 { var sum = 0;
            //iterate through each textboxes and add the values
            $(".txt").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                  
                }
            });
                  sum=sum.toLocaleString();
                    $("#sum").val(sum);
            var sum1 = 0;
            //iterate through each textboxes and add the values
            $(".txt1").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum1 += parseFloat(this.value);
           
                }
                 
            });
                    sum1=sum1.toLocaleString();
                    $("#sum1").val(sum1);




    var sum = 0;
      //iterate through each textboxes and add the values
      $(".mtxt").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                  
                }
            });
      sum=sum.toLocaleString();
          $("#msum").val(sum);
       var sum1 = 0;
      //iterate through each textboxes and add the values
      $(".mtxt1").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum1 += parseFloat(this.value);
                  
                }
            });
      sum1=sum1.toLocaleString();
          $("#msum1").val(sum1);
          }


          var clientReferralsprice = (document.getElementById('clientReferralsprice').value.replace(/,/g, ""));
          var i1 =(document.getElementById('textthree').value.replace(/,/g, ""));
            var result= i1 * clientReferralsprice;
           document.getElementById('income1').value = result.toLocaleString();
           
          var i2 =(document.getElementById('t3').value.replace(/,/g, ""));
           var businessReferralsprice = (document.getElementById('businessReferralsprice').value.replace(/,/g, ""));
         var result2= i2 * businessReferralsprice;
           document.getElementById('income2').value = result2.toLocaleString();

          var i3 =(document.getElementById('t6').value.replace(/,/g, ""));
           var deliveryReferralsprice =(document.getElementById('deliveryReferralsprice').value.replace(/,/g, ""));
           var result3= i3 * deliveryReferralsprice;
           document.getElementById('income3').value =result3.toLocaleString();

             var clientpurchasecreditprice = (document.getElementById('clientpurchasecreditprice').value.replace(/,/g, ""));
           var i4 =(document.getElementById('t9').value.replace(/,/g, ""));
          var result4= i4 * clientpurchasecreditprice;
        document.getElementById('income4').value =result4.toLocaleString();

          var clientpurchasecashprice = (document.getElementById('clientpurchasecashprice').value.replace(/,/g, ""));
           var i5 =(document.getElementById('t12').value.replace(/,/g, ""));
          var result5= i5 * clientpurchasecashprice;
            document.getElementById('income5').value =result5.toLocaleString();

            var clientpurchasedifferprice = (document.getElementById('clientpurchasedifferprice').value.replace(/,/g, ""));
           var i6 =(document.getElementById('t15').value.replace(/,/g, ""));
          var result6= i6 * clientpurchasedifferprice;
            document.getElementById('income6').value = result6.toLocaleString();
           
            var AMBASSADORbusprice = (document.getElementById('AMBASSADORbusprice').value.replace(/,/g, ""));
           var i7 =(document.getElementById('t51').value.replace(/,/g, ""));
          var result7 = i7 * AMBASSADORbusprice;
          document.getElementById('income7').value = result7.toLocaleString();

         var businessPurchasedMonthlyprice = (document.getElementById('businessPurchasedMonthlyprice').value.replace(/,/g, ""));
           var i8 =(document.getElementById('t21').value.replace(/,/g, ""));
           var result8 = i8 * businessPurchasedMonthlyprice;
           document.getElementById('income8').value = result8.toLocaleString();

            var businessPurchasedHalfprice = (document.getElementById('businessPurchasedHalfprice').value.replace(/,/g, ""));
           var i9 =(document.getElementById('t24').value.replace(/,/g, ""));
       var result9= i9 * businessPurchasedHalfprice;
           document.getElementById('income9').value =  result9.toLocaleString();

           var businessPurchasedyearprice = (document.getElementById('businessPurchasedyearprice').value.replace(/,/g, ""));
           var i10 =(document.getElementById('t27').value.replace(/,/g, ""));
          var result10 = i10 * businessPurchasedyearprice;
          document.getElementById('income10').value = result10.toLocaleString();
     
           var businessSoldprice = (document.getElementById('businessSoldprice').value.replace(/,/g, ""));
           var i11 =(document.getElementById('t30').value.replace(/,/g, ""));
           var result11= i11 * businessSoldprice;
  document.getElementById('income11').value = result11.toLocaleString();
     
            var businessSaleMonthprice = (document.getElementById('businessSaleMonthprice').value.replace(/,/g, ""));
           var i12 =(document.getElementById('t33').value.replace(/,/g, ""));
           var result12= i12 * businessSaleMonthprice;
           document.getElementById('income12').value =result12.toLocaleString();

           var businessSoldCreditprice = (document.getElementById('businessSoldCreditprice').value.replace(/,/g, ""));
           var i16 =(document.getElementById('t36').value.replace(/,/g, ""));
             var result16= i16 * businessSoldCreditprice;
      document.getElementById('income16').value = result16.toLocaleString();
     
            var businessPurchasedPushNoteprice = (document.getElementById('businessPurchasedPushNoteprice').value.replace(/,/g, ""));
           var i17 =(document.getElementById('t42').value.replace(/,/g, ""));
           var result17 = i17 * businessPurchasedPushNoteprice; 
           document.getElementById('income17').value = result17.toLocaleString();
     
          var deliveryitemprice = (document.getElementById('deliveryitemprice').value.replace(/,/g, ""));
           var i18 =
           (document.getElementById('t45').value.replace(/,/g, ""));
          var result18= i18 * deliveryitemprice; 
          document.getElementById('income18').value = result18.toLocaleString();
     
          
             var pushaprice = (document.getElementById('pushaprice').value.replace(/,/g, ""));
           var i13 =(document.getElementById('t54').value.replace(/,/g, ""));
              var result13 =i13 * pushaprice;
           document.getElementById('income13').value = result13.toLocaleString();
     
          var pushbprice = (document.getElementById('pushbprice').value.replace(/,/g, ""));
           var i14 =(document.getElementById('t57').value.replace(/,/g, ""));
            var result14  = i14 * pushbprice;
           document.getElementById('income14').value = result14.toLocaleString();
     
          var pushcprice = (document.getElementById('pushcprice').value.replace(/,/g, ""));
           var i15 =(document.getElementById('t60').value.replace(/,/g, ""));
          var result15 = i15 * pushcprice;
         document.getElementById('income15').value = result15.toLocaleString();

           var deliverycompletedprice = (document.getElementById('deliverycompletedprice').value.replace(/,/g, ""));
           var i19 =(document.getElementById('t48').value.replace(/,/g, ""));
             var result19= i19 * deliverycompletedprice;
           document.getElementById('income19').value = result19.toLocaleString();
     
 }
 
</script>
<script>
  $(document).ready(function(){
    $('.calc').change(function(){
        var total = 0;
        $('.calc').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total').html(total);
    });
})(jQuery);
</script>
<script>
  $(document).ready(function() {
	$("body").on('click', '.top', function() {
		$("nav.menu").toggleClass("menu_show");
	});
});
  </script>
  
  
<!-- <input type="text" class="calc" value="">
<input type="text" class="calc" value="">
<input type="text" class="calc" value="">
<input type="text" class="calc" value="">
<input type="text" class="calc" value="">

<span id="total"></span> -->
<script>
  $(document).ready(function(){
    $('.calc').change(function(){
        var total = 0;
        $('.calc').each(function(){
            if($(this).val() != '')
            {
                total += parseInt($(this).val());
            }
        });
        $('#total').html(total);
    });
})(jQuery);
</script>
<script>
  $(document).ready(function() {
	$("body").on('click', '.top', function() {
		$("nav.menu").toggleClass("menu_show");
	});
});
  </script>
  <script>
$(document).ready(function(){
    $('input[type="checkbox"]').click(function(){
        var inputValue = $(this).attr("value");
        $("." + inputValue).toggle();
    });
});
</script>
<script>
$('#textone').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
  $('#t1').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
    $('#t4').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
 $('#t7').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t10').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t13').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t16').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});

$('#t19').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t22').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t25').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t28').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t31').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t34').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t37').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t40').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t43').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t46').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t49').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t52').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});

$('#t55').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#t58').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});

</script>
<!DOCTYPE html>
<html>
<head>
<script>
function showUser(ID) {
  if (ID=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
      total();
    }
  }
//  var UserId=document.getElementById("UserId");
  var UserId = document.getElementById("UserId").value;
  xmlhttp.open("GET","getuser.php?ID="+ID+"&UserId="+UserId,true);
  
  xmlhttp.send();
  
}
</script>
<script>


if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>



<!--Mobile-->

<script>
$("#msubmit-btn").click(function(){

$("#mdisplay_loading").show();

});
</script>


<script>
function mshowUser(ID) {
  if (ID=="") {
    document.getElementById("txtHint1").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint1").innerHTML=this.responseText;
      mtotal();
    }
  }
//  var UserId=document.getElementById("UserId");
  var UserId = document.getElementById("UserId").value;
  xmlhttp.open("GET","getUser1.php?ID="+ID+"&UserId="+UserId,true);
  
  xmlhttp.send();
  
}
</script>

<script>
function msumclogin() {
           var txtFirstNumberValue = document.getElementById('textmone').value;
           var txtSecondNumberValue = document.getElementById('textmtwo').value;
           var result = txtFirstNumberValue * txtSecondNumberValue;
           if (!isNaN(result)) {
               document.getElementById('textmthree').value = result;
           var clientReferralsprice = document.getElementById('mclientReferralsprice').value;

           var i1 =(document.getElementById('textmthree').value.replace(/,/g, ""));
           var result= i1 * clientReferralsprice;
           document.getElementById('mincome1').value = result.toLocaleString();
 mtotal();
           }

       }
     function msumblogin() {
           var txtFirstNumberValue1 = document.getElementById('mt1').value;
           var txtSecondNumberValue2 = document.getElementById('mt2').value;
           var result = txtFirstNumberValue1 * txtSecondNumberValue2;
           if (!isNaN(result)) {
               document.getElementById('mt3').value = result;
               var i2 =(document.getElementById('mt3').value.replace(/,/g, ""));
           var businessReferralsprice = (document.getElementById('mbusinessReferralsprice').value.replace(/,/g, ""));
         var result2= i2 * businessReferralsprice;
           
           document.getElementById('mincome2').value = result2.toLocaleString();

           }
           mtotal();
       }
       function msumdlogin() {
           var txtFirstNumberValue3 = document.getElementById('mt4').value;
           var txtSecondNumberValue4 = document.getElementById('mt5').value;
           var result = txtFirstNumberValue3 * txtSecondNumberValue4;
           if (!isNaN(result)) {
               document.getElementById('mt6').value = result;
               var i3 =(document.getElementById('mt6').value.replace(/,/g, ""));
           var deliveryReferralsprice =(document.getElementById('mdeliveryReferralsprice').value.replace(/,/g, ""));
           var result3= i3 * deliveryReferralsprice;
           
           document.getElementById('mincome3').value =result3.toLocaleString();
           }
           mtotal();
       }
       function mclientcredit() {
           var txtFirstNumberValue5 = document.getElementById('mt7').value;
           var txtSecondNumberValue6 = document.getElementById('mt8').value;
           var result = txtFirstNumberValue5 * txtSecondNumberValue6;
           if (!isNaN(result)) {
               document.getElementById('mt9').value = result;
               var clientpurchasecreditprice = (document.getElementById('mclientpurchasecreditprice').value.replace(/,/g, ""));
           var i4 =(document.getElementById('mt9').value.replace(/,/g, ""));
          var result4= i4 * clientpurchasecreditprice;

 document.getElementById('mincome4').value =result4.toLocaleString();
mtotal();
           }
       }
       function mclientcash() {
           var txtFirstNumberValue7 = document.getElementById('mt10').value;
           var txtSecondNumberValue8 = document.getElementById('mt11').value;
           var result = txtFirstNumberValue7 * txtSecondNumberValue8;
           if (!isNaN(result)) {
               document.getElementById('mt12').value = result;
           }

           var clientpurchasecashprice = (document.getElementById('mclientpurchasecashprice').value.replace(/,/g, ""));
           var i5 =(document.getElementById('mt12').value.replace(/,/g, ""));
          var result5= i5 * clientpurchasecashprice;
           
            document.getElementById('mincome5').value =result5.toLocaleString();
           mtotal();
       }
       function mclientbus() {
           var txtFirstNumberValue9 = document.getElementById('mt13').value;
           var txtSecondNumberValue10 = document.getElementById('mt14').value;
           var result = txtFirstNumberValue9 * txtSecondNumberValue10;
           if (!isNaN(result)) {
               document.getElementById('mt15').value = result;
           }
           

           var clientpurchasedifferprice = (document.getElementById('mclientpurchasedifferprice').value.replace(/,/g, ""));
           var i6 =(document.getElementById('mt15').value.replace(/,/g, ""));
          var result6= i6 * clientpurchasedifferprice;
            document.getElementById('mincome6').value = result6.toLocaleString();
           
           mtotal();
       }
     
       function mbusimonth() {
           var txtFirstNumberValue13 = document.getElementById('mt19').value;
           var txtSecondNumberValue14 = document.getElementById('mt20').value;
           var result = txtFirstNumberValue13 * txtSecondNumberValue14;
           if (!isNaN(result)) {
               document.getElementById('mt21').value = result;
           }
           var businessPurchasedMonthlyprice = (document.getElementById('mbusinessPurchasedMonthlyprice').value.replace(/,/g, ""));
           var i8 =(document.getElementById('mt21').value.replace(/,/g, ""));
           var result8 = i8 * businessPurchasedMonthlyprice;
           document.getElementById('mincome8').value = result8.toLocaleString();
           mtotal();
       }
       

       function mbusihalf () {
           var txtFirstNumberValue15 = document.getElementById('mt22').value;
           var txtSecondNumberValue16 = document.getElementById('mt23').value;
           var result = txtFirstNumberValue15 * txtSecondNumberValue16;
           if (!isNaN(result)) {
               document.getElementById('mt24').value = result;
           }
           var businessPurchasedHalfprice = (document.getElementById('mbusinessPurchasedHalfprice').value.replace(/,/g, ""));
           var i9 =(document.getElementById('mt24').value.replace(/,/g, ""));
       var result9= i9 * businessPurchasedHalfprice;
           
           document.getElementById('mincome9').value =  result9.toLocaleString();
           mtotal();
       }
       

       function mbusiyear () {
           var txtFirstNumberValue17 = document.getElementById('mt25').value;
           var txtSecondNumberValue18 = document.getElementById('mt26').value;
           var result = txtFirstNumberValue17 * txtSecondNumberValue18;
           if (!isNaN(result)) {
               document.getElementById('mt27').value = result;
           }
           var businessPurchasedyearprice = (document.getElementById('mbusinessPurchasedyearprice').value.replace(/,/g, ""));
           var i10 =(document.getElementById('mt27').value.replace(/,/g, ""));
          var result10 = i10 * businessPurchasedyearprice;
          document.getElementById('mincome10').value = result10.toLocaleString();
           total();
       }
       

       function mbusi5() {
           var txtFirstNumberValue18= document.getElementById('mt28').value;
           var txtSecondNumberValue19 = document.getElementById('mt29').value;
           var result = txtFirstNumberValue18 * txtSecondNumberValue19;
           if (!isNaN(result)) {
               document.getElementById('mt30').value = result;
           }
           var businessSoldprice = (document.getElementById('mbusinessSoldprice').value.replace(/,/g, ""));
           var i11 =(document.getElementById('mt30').value.replace(/,/g, ""));
           var result11= i11 * businessSoldprice;
  document.getElementById('mincome11').value = result11.toLocaleString();

     mtotal();
       }
       

       function mbusisale() {
           var txtFirstNumberValue21 = document.getElementById('mt31').value;
           var txtSecondNumberValue22 = document.getElementById('mt32').value;
           var result = txtFirstNumberValue21 * txtSecondNumberValue22;
           if (!isNaN(result)) {
               document.getElementById('mt33').value = result;
           }
           var businessSaleMonthprice = (document.getElementById('mbusinessSaleMonthprice').value.replace(/,/g, ""));
           var i12 =(document.getElementById('mt33').value.replace(/,/g, ""));
           var result12= i12 * businessSaleMonthprice;
           document.getElementById('mincome12').value =result12.toLocaleString();
     mtotal();
       }
       

       function mbusisoldcre() {
           var txtFirstNumberValue22 = document.getElementById('mt34').value;
           var txtSecondNumberValue23 = document.getElementById('mt35').value;
           var result = txtFirstNumberValue22 * txtSecondNumberValue23;
           if (!isNaN(result)) {
               document.getElementById('mt36').value = result;
           }
           var businessSoldCreditprice = (document.getElementById('mbusinessSoldCreditprice').value.replace(/,/g, ""));
           var i16 =(document.getElementById('mt36').value.replace(/,/g, ""));
             var result16= i16 * businessSoldCreditprice;
      document.getElementById('mincome16').value = result16.toLocaleString();
     mtotal();
       }
       

   

       function mbusi5push() {
           var txtFirstNumberValue25 = document.getElementById('mt40').value;
           var txtSecondNumberValue26 = document.getElementById('mt41').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('mt42').value = result;
           }
           var businessPurchasedPushNoteprice = (document.getElementById('mbusinessPurchasedPushNoteprice').value.replace(/,/g, ""));
           var i17 =(document.getElementById('mt42').value.replace(/,/g, ""));
           var result17 = i17 * businessPurchasedPushNoteprice; 
           document.getElementById('mincome17').value = result17.toLocaleString();
      mtotal();
       }
       

       function mdivitem() {
           var txtFirstNumberValue27 = document.getElementById('mt43').value;
           var txtSecondNumberValue28 = document.getElementById('mt44').value;
           var result = txtFirstNumberValue27 * txtSecondNumberValue28;
           if (!isNaN(result)) {
               document.getElementById('mt45').value = result;
           }
           var deliveryitemprice = (document.getElementById('mdeliveryitemprice').value.replace(/,/g, ""));
           var i18 =
           (document.getElementById('mt45').value.replace(/,/g, ""));
          var result18= i18 * deliveryitemprice; 
          document.getElementById('mincome18').value = result18.toLocaleString();
      mtotal();
       }
       
        function mbusAMBA() {
           var txtFirstNumberValue25 = document.getElementById('mt49').value;
           var txtSecondNumberValue26 = document.getElementById('mt50').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('mt51').value = result;
               var AMBASSADORbusprice = (document.getElementById('mAMBASSADORbusprice').value.replace(/,/g, ""));
           var i7 =(document.getElementById('mt51').value.replace(/,/g, ""));
          var result7 = i7 * AMBASSADORbusprice;
          document.getElementById('mincome7').value = result7.toLocaleString();
     
           }
            mtotal();
       }
   
       
       function mbuspusha() {
           var txtFirstNumberValue25 = document.getElementById('mt52').value;
           var txtSecondNumberValue26 = document.getElementById('mt53').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('mt54').value = result;
           }
           var pushaprice = (document.getElementById('mpushaprice').value.replace(/,/g, ""));
           var i13 =(document.getElementById('mt54').value.replace(/,/g, ""));

              var result13 =i13 * pushaprice;
           document.getElementById('mincome13').value = result13.toLocaleString();

           mtotal();
       }
     
       function mbuspushb() {
           var txtFirstNumberValue25 = document.getElementById('mt55').value;
           var txtSecondNumberValue26 = document.getElementById('mt56').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('mt57').value = result;
           }
           var pushbprice = (document.getElementById('mpushbprice').value.replace(/,/g, ""));
           var i14 =(document.getElementById('mt57').value.replace(/,/g, ""));
            var result14  = i14 * pushbprice;
           document.getElementById('mincome14').value = result14.toLocaleString();
        
     mtotal();
       }
      
       function mbuspushc() {
           var txtFirstNumberValue25 = document.getElementById('mt58').value;
           var txtSecondNumberValue26 = document.getElementById('mt59').value;
           var result = txtFirstNumberValue25 * txtSecondNumberValue26;
           if (!isNaN(result)) {
               document.getElementById('mt60').value = result;
           }
           var pushcprice = (document.getElementById('mpushcprice').value.replace(/,/g, ""));
           var i15 =(document.getElementById('mt60').value.replace(/,/g, ""));
          var result15 = i15 * pushcprice;
         document.getElementById('mincome15').value = result15.toLocaleString();

 mtotal();       }
      

       function mdiv5item() {
           var txtFirstNumberValue28 = document.getElementById('mt46').value;
           var txtSecondNumberValue29 = document.getElementById('mt47').value;
           var result = txtFirstNumberValue28 * txtSecondNumberValue29;
           if (!isNaN(result)) {
               document.getElementById('mt48').value = result;
           }
           var deliverycompletedprice = (document.getElementById('mdeliverycompletedprice').value.replace(/,/g, ""));
           var i19 =(document.getElementById('mt48').value.replace(/,/g, ""));
             var result19= i19 * deliverycompletedprice;
           document.getElementById('mincome19').value = result19.toLocaleString();
     mtotal();
     
       }
     
       
       function mtotalpoint() {
           var txtFirstNumberValue1 = document.getElementById('mt1').value;
           var txtFirstNumberValue28 = document.getElementById('mt46').value;
           var txtFirstNumberValue27 = document.getElementById('mt43').value;

           var result = txtFirstNumberValue1 + txtFirstNumberValue28 + txtFirstNumberValue27;
           if (!isNaN(result)) {
               document.getElementById('mt3').value = result;
           }
       }
       
       function mtotal() {
        //   document.getElementById('msum').value = 6;
           var sum = 0;
      //iterate through each textboxes and add the values
      $(".mtxt").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                  
                }
            });
      sum=sum.toLocaleString();
          $("#msum").val(sum);
       var sum1 = 0;
      //iterate through each textboxes and add the values
      $(".mtxt1").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum1 += parseFloat(this.value);
                  
                }
            });
      sum1=sum1.toLocaleString();
          $("#msum1").val(sum1);
          }
       
</script>
<script>
/*onload = function () 
 { var sum = 0;
            //iterate through each textboxes and add the values
            $(".mtxt").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum += parseFloat(this.value);
                  
                }
            });
                  sum=sum.toLocaleString();
                    $("#msum").val(sum);
            var sum1 = 0;
            //iterate through each textboxes and add the values
            $(".mtxt1").each(function () {
                //add only if the value is number
                if (!isNaN(this.value) && this.value.length != 0) {
                    sum1 += parseFloat(this.value);
           
                }
                 
            });
                    sum1=sum1.toLocaleString();
                    $("#msum1").val(sum1);

       /*   var clientReferralsprice = (document.getElementById('mclientReferralsprice').value.replace(/,/g, ""));
          var i1 =(document.getElementById('textmthree').value.replace(/,/g, ""));
            var result= i1 * clientReferralsprice;
           document.getElementById('mincome1').value = result.toLocaleString();
           
          var i2 =(document.getElementById('t3').value.replace(/,/g, ""));
           var businessReferralsprice = (document.getElementById('businessReferralsprice').value.replace(/,/g, ""));
         var result2= i2 * businessReferralsprice;
           document.getElementById('income2').value = result2.toLocaleString();

          var i3 =(document.getElementById('t6').value.replace(/,/g, ""));
           var deliveryReferralsprice =(document.getElementById('deliveryReferralsprice').value.replace(/,/g, ""));
           var result3= i3 * deliveryReferralsprice;
           document.getElementById('income3').value =result3.toLocaleString();

             var clientpurchasecreditprice = (document.getElementById('clientpurchasecreditprice').value.replace(/,/g, ""));
           var i4 =(document.getElementById('t9').value.replace(/,/g, ""));
          var result4= i4 * clientpurchasecreditprice;
        document.getElementById('income4').value =result4.toLocaleString();

          var clientpurchasecashprice = (document.getElementById('clientpurchasecashprice').value.replace(/,/g, ""));
           var i5 =(document.getElementById('t12').value.replace(/,/g, ""));
          var result5= i5 * clientpurchasecashprice;
            document.getElementById('income5').value =result5.toLocaleString();

            var clientpurchasedifferprice = (document.getElementById('clientpurchasedifferprice').value.replace(/,/g, ""));
           var i6 =(document.getElementById('t15').value.replace(/,/g, ""));
          var result6= i6 * clientpurchasedifferprice;
            document.getElementById('income6').value = result6.toLocaleString();
           
            var AMBASSADORbusprice = (document.getElementById('AMBASSADORbusprice').value.replace(/,/g, ""));
           var i7 =(document.getElementById('t51').value.replace(/,/g, ""));
          var result7 = i7 * AMBASSADORbusprice;
          document.getElementById('income7').value = result7.toLocaleString();

         var businessPurchasedMonthlyprice = (document.getElementById('businessPurchasedMonthlyprice').value.replace(/,/g, ""));
           var i8 =(document.getElementById('t21').value.replace(/,/g, ""));
           var result8 = i8 * businessPurchasedMonthlyprice;
           document.getElementById('income8').value = result8.toLocaleString();

            var businessPurchasedHalfprice = (document.getElementById('businessPurchasedHalfprice').value.replace(/,/g, ""));
           var i9 =(document.getElementById('t24').value.replace(/,/g, ""));
       var result9= i9 * businessPurchasedHalfprice;
           document.getElementById('income9').value =  result9.toLocaleString();

           var businessPurchasedyearprice = (document.getElementById('businessPurchasedyearprice').value.replace(/,/g, ""));
           var i10 =(document.getElementById('t27').value.replace(/,/g, ""));
          var result10 = i10 * businessPurchasedyearprice;
          document.getElementById('income10').value = result10.toLocaleString();
     
           var businessSoldprice = (document.getElementById('businessSoldprice').value.replace(/,/g, ""));
           var i11 =(document.getElementById('t30').value.replace(/,/g, ""));
           var result11= i11 * businessSoldprice;
  document.getElementById('income11').value = result11.toLocaleString();
     
            var businessSaleMonthprice = (document.getElementById('businessSaleMonthprice').value.replace(/,/g, ""));
           var i12 =(document.getElementById('t33').value.replace(/,/g, ""));
           var result12= i12 * businessSaleMonthprice;
           document.getElementById('income12').value =result12.toLocaleString();

           var businessSoldCreditprice = (document.getElementById('businessSoldCreditprice').value.replace(/,/g, ""));
           var i16 =(document.getElementById('t36').value.replace(/,/g, ""));
             var result16= i16 * businessSoldCreditprice;
      document.getElementById('income16').value = result16.toLocaleString();
     
            var businessPurchasedPushNoteprice = (document.getElementById('businessPurchasedPushNoteprice').value.replace(/,/g, ""));
           var i17 =(document.getElementById('t42').value.replace(/,/g, ""));
           var result17 = i17 * businessPurchasedPushNoteprice; 
           document.getElementById('income17').value = result17.toLocaleString();
     
          var deliveryitemprice = (document.getElementById('deliveryitemprice').value.replace(/,/g, ""));
           var i18 =
           (document.getElementById('t45').value.replace(/,/g, ""));
          var result18= i18 * deliveryitemprice; 
          document.getElementById('income18').value = result18.toLocaleString();
     
          
             var pushaprice = (document.getElementById('pushaprice').value.replace(/,/g, ""));
           var i13 =(document.getElementById('t54').value.replace(/,/g, ""));
              var result13 =i13 * pushaprice;
           document.getElementById('income13').value = result13.toLocaleString();
     
          var pushbprice = (document.getElementById('pushbprice').value.replace(/,/g, ""));
           var i14 =(document.getElementById('t57').value.replace(/,/g, ""));
            var result14  = i14 * pushbprice;
           document.getElementById('income14').value = result14.toLocaleString();
     
          var pushcprice = (document.getElementById('pushcprice').value.replace(/,/g, ""));
           var i15 =(document.getElementById('t60').value.replace(/,/g, ""));
          var result15 = i15 * pushcprice;
         document.getElementById('income15').value = result15.toLocaleString();

           var deliverycompletedprice = (document.getElementById('deliverycompletedprice').value.replace(/,/g, ""));
           var i19 =(document.getElementById('t48').value.replace(/,/g, ""));
             var result19= i19 * deliverycompletedprice;
           document.getElementById('income19').value = result19.toLocaleString();*/
     
 }
 
</script>


<script>
$('#textmone').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
  $('#mt1').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
    $('#mt4').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
 $('#mt7').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt10').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt13').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt16').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});

$('#mt19').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt22').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt25').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt28').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt31').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt34').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt37').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt40').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt43').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt46').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt49').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt52').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});

$('#mt55').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});
$('#mt58').on('keydown keyup', function() {
  this.oldVal = this.value.replace(/\D/g, '');
  this.value = Number(this.oldVal);
});

</script>





</head>
<body>

</body>
</html>
</body>
</html>
