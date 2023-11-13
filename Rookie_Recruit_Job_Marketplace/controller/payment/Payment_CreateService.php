<?php

session_start();

include_once '../../model/PaymentRepo.php';



$Admin_Dashboard_page = "/Rookie_Recruit_Job_Marketplace/view/admin/Admin_Dashboard.php";
$Applicant_Dashboard_page = "/Rookie_Recruit_Job_Marketplace/view/applicant/Applicant_Dashboard.php";
$HR_Dashboard_page = "/Rookie_Recruit_Job_Marketplace/view/hr/HR_Dashboard.php";


$Admin_Payment_page = "/Rookie_Recruit_Job_Marketplace/view/payment/Payment_Create_Admin.php";
$Applicant_Payment_page = "/Rookie_Recruit_Job_Marketplace/view/payment/Payment_Create_Applicant.php";
$HR_Payment_page = "/Rookie_Recruit_Job_Marketplace/view/payment/Payment_Create_HR.php";

$HOLY_FIRST_PAGE = "/Rookie_Recruit_Job_Marketplace/view/HOLY_FIRST_PAGE.php";


$amount = $_POST["amount"];
$user_id = $_SESSION["user_id"];


echo "Amount = ".$amount."  ";
echo "User id = ".$user_id." ";

$payment_id = createPayment($amount, $user_id);
if($payment_id > 0){

    if($_SESSION["data"]["type"] === "HR"){
        header("Location: {$HR_Dashboard_page}");
    }elseif ($_SESSION["data"]["type"] === "Applicant"){
        header("Location: {$Applicant_Dashboard_page}");
    }elseif(($_SESSION["data"]["type"] === "Admin")){
        header("Location: {$Admin_Dashboard_page}");
    }else{
        header("Location: {$HOLY_FIRST_PAGE}");
    }


}else{

    if($_SESSION["data"]["type"] === "HR"){
        header("Location: {$HR_Payment_page}");
    }elseif ($_SESSION["data"]["type"] === "Applicant"){
        header("Location: {$Applicant_Payment_page}");
    }elseif(($_SESSION["data"]["type"] === "Admin")){
        header("Location: {$Admin_Payment_page}");
    }else{
        header("Location: {$HOLY_FIRST_PAGE}");
    }

}