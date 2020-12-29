<?php

include 'classes.php';
$adm = $_POST['adm_number'];
$payment = $_POST['payment'];
$amount = $_POST['amount'];
// $receipt = $_FILES['receipt'];
$sql = "SELECT * FROM students WHERE adm = '$adm'";
$query = mysqli_query(DB::conn(), $sql);
if(mysqli_num_rows($query) == 0){
    $resp = [];
    $resp['status']=0;
    $resp['msg']='No student with this admission number was found. Please verify the admission number then try again';
    echo json_encode($resp);
    return;
}else{
    if ($_POST['action'] == 'verify_stud_details') {
    $student = new Student($adm);
    $resp = [];
    $resp['status']=1;
    $resp['name']= $student->getName();
    $resp['payment']= $payment;
    $resp['amount'] = "Ksh ".number_format($amount,2);    

    echo json_encode($resp);
    } elseif($_POST['action'] == 'submit_payment') {
        $student = new Student($adm);
        $resp = [];
        $resp['status']=1;
        $resp['name']= $student->getName();
        $resp['payment']= $payment;
        $resp['amount'] = $amount; 
        $receipt = "IMAGES/image1.jpg";
        $pymt = new Payment();
        //make payment
        $payment_submitted = $pymt->pay($adm,$payment, $amount, $receipt);   
        if($payment_submitted){
            //get balance
           $balance = $pymt->getBalance($pymt->getAmtToBePaid($payment),$pymt->getTotalAmtPaid($adm,$payment));
           $resp['balance'] = "Ksh ".number_format($balance,2);
           echo json_encode($resp); 
        }else{
            // $resp['queryExcecuted'] = 'false';
            echo json_encode($resp);
        }
    }
}

?>