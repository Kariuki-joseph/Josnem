<?php
include 'dbConnect.php';
$class = $_POST['class'];
$payment = $_POST['payment'];
$amount = $_POST['amount'];
$condition = $_POST['condition'];
 if($class == 'any'){
     $sql = "SELECT * FROM students";
 }else{
     $sql = "SELECT * FROM students WHERE class='$class'";
 }
$studentsQuery = mysqli_query($conn, $sql);
//loop through all the students
while($student = mysqli_fetch_array($studentsQuery)){
//check against payments table for the payment
$adm = $student['adm'];
$sql = "SELECT * FROM fees_payments WHERE adm = '$adm' AND p_for = '$payment'";
$query = mysqli_query($conn, $sql);
//check if any rows returned-made some payments
if (mysqli_num_rows($query) == 0) {
    //no payment has been made
    //update payments summary table-no payments has been made
    //check if no records already exists and add new
    $updateSelectSql = "SELECT * FROM payments_summary WHERE adm='$adm' AND p_for = '$payment'";
    $updateSelectQuery = mysqli_query($conn, $updateSelectSql);
    if (mysqli_num_rows($updateSelectQuery) == 0) {
        //insert new record with payment amount 0
        $insertQuery = mysqli_query($conn, "INSERT INTO payments_summary(adm, p_for, amount) VALUES('$adm','$payment','0')");
        
    }else{
        //update the amount to zero
    $updateSql = "UPDATE payments_summary SET amount = '0' WHERE adm = '$adm' AND p_for = '$payment'";
    $updateQuery = mysqli_query($conn, $updateSql);
    }
    
}else{
    //some payment has been made
    //get sum of payment
    $selectSumQuery = mysqli_query($conn, "SELECT SUM(amount_paid) AS sum FROM fees_payments WHERE adm = '$adm' AND p_for = '$payment'");
    $sumRow = mysqli_fetch_array($selectSumQuery);
    $sum = $sumRow['sum'];

    //check if this student record already exists in the payments summary table 
    $selectInsertSumQuery = mysqli_query($conn, "SELECT * FROM payments_summary WHERE adm='$adm' AND p_for = '$payment'");
    if (mysqli_num_rows($selectInsertSumQuery) == 0) {
       //insert new data with updated sum 
       $insertSumQuery = mysqli_query($conn, "INSERT INTO payments_summary(adm, p_for, amount) VALUES ('$adm','$payment','$sum')");
       
    } else {
        //update payment summary with new sum
    $updatedSumSql = "UPDATE payments_summary SET amount = '$sum' WHERE adm = '$adm' AND p_for = '$payment'";
    $updatedSumQuery  = mysqli_query($conn, $updatedSumSql);
    }
   
}
}


//fetch based on the specified criteria
include '../classes.php';
$resp = [];
//loop through classes
//check if class variable holds 'any'
if ($class == 'any') {
    $selectByClassesQuery = mysqli_query($conn, "SELECT * FROM students");
}else{
    $selectByClassesQuery = mysqli_query($conn, "SELECT * FROM students WHERE class = '$class'");
}

while ($classRow = mysqli_fetch_array($selectByClassesQuery)) {
    $adm_c = $classRow['adm'];
    $student = new Student($adm_c);
    $reportQuery = mysqli_query($conn, "SELECT * FROM payments_summary WHERE adm = '$adm_c' AND p_for = '$payment' AND amount $condition $amount");
    if (mysqli_num_rows($reportQuery) != 0) {
     $reportData = mysqli_fetch_array($reportQuery);
    //push the data into the array
    $report = array(
        'name'=>$student->getName(),
        'adm'=>$student->getAdm(),
        'class'=>$student->getClass(),
        'amt'=>number_format($reportData['amount'],2)
    );
    array_push($resp, $report);
    }
}
// echo json response
echo json_encode($resp);
?>
