<?php
//start session
session_start();
//db connection
include 'dbConnect.php';
//classes
include 'classes.php';

if (isset($_POST['add_payment_method'])) {
	//retrieve form values
$name = mysqli_real_escape_string($conn, $_POST['name']);
$amount = mysqli_real_escape_string($conn, $_POST['amount']);
$payable = new Payable();

if ($payable->addPayable($name,$amount)) {
	//set sesion 
	$_SESSION['success']='Payment added successfully';
	header('Location:Admin/addPayment.php');
}else{
	echo "Unable to add the records. Please try again";
}

}
/////////////////////////////////////////////////////////////////////////
elseif (isset($_GET['payableId'])) {
	$id = htmlentities($_GET['payableId']);
	$operation = htmlentities($_GET['operation']);

	if ($operation == 'add') {
		//check whether the records exixts in the upcoming payables
		$data = new GetById($id);
		if (mysqli_num_rows($data->getAll("payables_upcoming"))>=1) {
			//return
			die("");
		}
		//add the records to the upcoming payables
		$ol = new GetById($id);
		$ol1 = $ol->getAll('payables');
		$row = mysqli_fetch_array($ol1);
		$id = $row['id'];
		$name = $row['name'];
		$amount = $row['amount'];

		$payable = new Payable();

		if ($payable->addPayableUpcoming($id,$name,$amount)) {
			//fill in the list items with data and send it to the front end
			$upcoming = new Payable();
				$ups = $upcoming->getUpcoming();
				while ($up = mysqli_fetch_array($ups)) {
		?>
		<li><?php echo $up['name'] ?> <b> Ksh. </b><?php echo $up['amount'] ?></li>
		<?php
	}
		}
	}elseif($operation == 'remove') {
		//remove the payable if it exists
		$upcoming = new Payable();
		$upcoming->deletePayableUpcoming($id);

		$ups = $upcoming->getUpcoming();
				while ($up = mysqli_fetch_array($ups)) {
		?>
			<li><?php echo $up['name'] ?> <b> Ksh. </b><?php echo $up['amount'] ?></li>
		<?php
	}
	}

}
//////////////////////////////////////////////////////////////
elseif (isset($_GET['getAll'])) {
//gets reports of all students
	$class = $_GET['class'];
	$payment = $_GET['pymt'];
	$condition = $_GET['cnd'];
	$amt = $_GET['amt'];
	if ($class == 'any') {
	$sql = "SELECT * FROM students";
	}else{
	$sql = "SELECT * FROM students WHERE class LIKE '%$class'";
	}
	$query = mysqli_query($conn, $sql);

	//loop through all the students to update payment summary information
	while ($row = mysqli_fetch_array($query)) {
		$adm = $row['adm'];
		$sql = "SELECT * FROM fees_payments WHERE adm = '$adm' AND p_for ='$payment'";
		$query = mysqli_query($conn, $sql);
		//no payments made yet
		if(mysqli_num_rows($query) == 0){
			//insert into payment summary- no payment made
			$adm = $row['adm'];
			$sql = "INSERT INTO payments_summary(adm, p_for, amount) VALUES('$adm', '$payment','0')";
			$query = mysqli_query($conn, $sql);
		}else{
			//get sum paid per the payment by a student
			$pay = new Payment();
			$paid = $pay->getTotalAmtPaid($row['adm'], $payment);
			//update payment
			$sql = "UPDATE payments_summary SET amount = '$paid' WHERE adm = '$adm' AND p_for = '$payment'";
			$query = mysqli-query($conn, $sql);
		}

	}

	//get reports data
	$summarySql = "SELECT * FROM payments_summary WHERE adm = (SELECT adm FROM students WHERE class LIKE '$class') AND p_for = '$payment' AND amount $condition $amt";
	$query = mysqli_query($conn, $summarySql);
	//fill in the response into an array
	$response = [];
	while($row = mysqli_fetch_array($query)){
		$student = new Student($row['adm']);
		$data = array(
			'name' => $student->getName(),
			'adm' => $student->getAdm(),
			'class' => $student->getClass(),
			'amount' => $row['amount']
		);
		array_push($response, $data);
	}

	//echo json data
	echo json_encode($response);
	return;
}
/////////////////////////////////////////////////////////////
//getting users feedback
elseif (isset($_POST['send_feedback'])) {
	//get form values
	$fName = mysqli_real_escape_string($conn,$_POST['first_name']);
	$lName = mysqli_real_escape_string($conn,$_POST['last_name']);
	$phone = mysqli_real_escape_string($conn,$_POST['phone']);
	$email = mysqli_real_escape_string($conn,$_POST['email']);
	$message = mysqli_real_escape_string($conn,$_POST['comments']);

	//insert
	if (mysqli_query($conn,"INSERT INTO feedbacks(f_name,l_name,phone,email,message) VALUES('$fName','$lName','$phone','$email','$message')")) {
		//success
		$_SESSION['success']='Your message was successfully submitted. You will be contacted soon. Thank you!';
		header('Location:contacts.php');
	}else{
		//error
		$_SESSION['error']='Unable to submit your message.Please try again';
		header('Location:contacts.php');
	}
}
?>