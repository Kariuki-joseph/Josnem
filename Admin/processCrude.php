<?php
//start session
session_start();
//db connection
include '../dbConnect.php';
//classes
include '../classes.php';

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
		$row = mysqli_fetch_array($ol->getAll('payables'));
		$id = $row['id'];
		$name = $row['name'];
		$amount = $row['amount'];

		$payable = new Payable();

		if ($payable->addPayableUpcoming($id,$name,$amount)) {
			//fill in the list items with data and send it to the front end
			$upcoming = new Payable();
				$ups = $upcoming->getUpcoming();
				?>
			<tr><th>Payment Name</th><th>Amount</th></tr>
				<?php
				while ($up = mysqli_fetch_array($ups)) {
		?>
			<tr>
				<td><?php echo $up['name']; ?></td> 
                <td class="ml-1">Ksh. <?php echo $up['amount']; ?></td>
            </tr>	
		<?php
	}
		}
	}elseif($operation == 'remove') {
		//remove the payable if it exists
		$upcoming = new Payable();
		$upcoming->deletePayableUpcoming($id);

		$ups = $upcoming->getUpcoming();
		?>
			<tr><th>Payment Name</th><th>Amount</th></tr>
		<?php
				while ($up = mysqli_fetch_array($ups)) {
		?>
			<tr>
				<td><?php echo $up['name']; ?></td> 
                <td class="ml-1">Ksh. <?php echo $up['amount']; ?></td>
            </tr>
		<?php
	}
	}

}
//////////////////////////////////////////////////////////////
//gets payment records of all students
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
$query = mysqli_query($conn,$sql = "SELECT * FROM students WHERE class LIKE '%$class'");
print_r($query);
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
		$query = mysqli_query($conn, $sql);
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
///////////////////////////////////////////////////////
//gets payment records of one student
elseif (isset($_GET['getOne'])) {
	//get values
	$adm = $_GET['adm'];
	$pymt = $_GET['pymt'];
	$bal_rep = $_GET['bal_rep'];
	//check if the student exists
$sql="SELECT * FROM students WHERE adm='$adm'";
$query = mysqli_query($conn,$sql);
if (mysqli_num_rows($query) == 0) {
	echo '
<div class="alert alert-danger">
<a href="#" class="close" data-dismiss="alert">&times</a>
<i>No student with the provided admission number was found</i>
</div>
	';
return; 
}

if ($bal_rep == 'Balance') {
		//get balance
$bal = $_GET['bal_rep'];

$payment = new Payment();

$student = new Student($adm);
?>
<thead>
	<tr>
	    <th>Name</th>
	    <th>Adm No.</th>
	    <th>Class</th>
	    <th>Amount To Be paid</th>
	    <th>Amount Paid</th>
	    <th>Balance</th>
	 </tr>
	</thead>
	<tbody>
	<tr>
	    <td><?php echo $student->getName(); ?></td>
	    <td><?php echo $student->getAdm(); ?></td>
	    <td><?php echo $student->getClass(); ?></td>
	    <td>Ksh. <?php echo $payment->getAmtToBePaid($pymt); ?></td>
	    <td>Ksh. <?php echo $payment->getTotalAmtPaid($adm,$pymt); ?></td>    
	    <td>Ksh. <?php echo $payment->getBalance($payment->getAmtToBePaid($pymt),$payment->getTotalAmtPaid($adm,$pymt)); ?></td>
	</tr>
</tbody>
<?php
	}
else{
	//get report
	$payment = new Payment();
	$all = $payment->getByPayment($pymt);
	?>
<thead>
    <tr>
        <th>Name</th>
        <th>Adm No.</th>
        <th>Class</th>
        <th>Amount</th>
        <th>Time</th>
        <th>Receipt</th>
     </tr>
</thead>
	<?php
	$rows = $payment->getByPaymentAndAdm($pymt,$adm);
	$student = new Student($adm);
while ( $row = mysqli_fetch_array($rows)) {
?>
<tbody>
	<tr>
		<td><?php echo $student->getName(); ?></td>
		<td><?php echo $student->getAdm(); ?></td>
		<td><?php echo $student->getClass(); ?></td>
		<td><?php echo $row['amount_paid']; ?></td>
		<td><?php echo $row['time']; ?></td>
		<td><?php echo $row['receipt_img']; ?></td>
	</tr>
</tbody>
<?php
}
	}
		}
//////////////////////////////////////////////////////////
elseif (isset($_GET['getOverall'])) {
	//get values
	$pymt = htmlentities($_GET['pymt']);
	$bal_rep = htmlentities($_GET['bal_rep']);

	$payment = new Payment();
	$all = $payment->getByPayment($pymt);
	?>
	<thead>
    <tr>
        <th>Name</th>
        <th>Adm No.</th>
        <th>Class</th>
        <th>Amount</th>
        <th>Time</th>
        <th>Receipt</th>
     </tr>
</thead>
	<?php
	while ($row = mysqli_fetch_array($all)) {
		$student = new Student($row['adm']);
	?>
<tbody>
    <tr>
        <td><?php echo $student->getName(); ?></td>
        <td><?php echo $student->getAdm(); ?></td>
        <td><?php echo $student->getClass(); ?></td>
        <td><i></i> <?php echo number_format($row['amount_paid'], 2); ?></td>
        <td><?php echo $row['time']; ?></td>
        <td onclick="openReceiptPreview(this)" receipt-img="<?php echo $row['receipt_img']; ?>" data-for="<?php echo $student->getName(); ?>" style="cursor: pointer;">View Receipt</td>
    </tr>
</tbody>
	<?php
}
}
///////////////////////////////////////////////
elseif (isset($_GET['getSummary'])) {
	//get values
	$pymt = htmlentities($_GET['pymt']);
	$payment = new Payment();
	?>
 <h3 class="text-center pb-3">Payment Summary</h3>
 <div class="row">
<div class="col-md-8">
         <b>Total Amount To Be Paid:</b>
        </div>
        <div class="col-md-4">
 <i>Ksh.</i><input type="text" name="" id="totalAmt" class="form-control" value="<?php echo number_format($payment->getAmtToBePaid($pymt), 2); ?>"> 
</div>
<div class="col-md-8">
        <b>Total Amount Paid:</b>
    </div>
    <div class="col-md-4">
  <i>Ksh.</i><input type="text" name="" id="amtPaid" class="form-control" value="<?php echo number_format($payment->getAmtPaid($pymt), 2); ?>"> 
</div>
 <div class="col-md-8">
         <b>Balance:</b>
    </div>
    <div class="col-md-4">
   <i>Ksh.</i><input type="text" name="" id="balance" class="form-control" value="<?php echo number_format($payment->getAmtToBePaid($pymt)-$payment->getAmtPaid($pymt),2); ?>"> 
</div>
 </div>
	<?php
}
/////////////////////////////////////////////////////////////
//add gallery categories
elseif (isset($_GET['add_gallery_category'])) {
	//get values
	$categoryName = htmlentities($_GET['category']);
	//new gallery instance
	$gallery = new Gallery();

	if ($gallery->addCategory($categoryName)) {
		//return the available categories
        $availCategories = new Gallery();
        $categories = $availCategories->getAvailable();

        while ($category = mysqli_fetch_array($categories)) {
        ?>
          	<li>
          	<?php echo $category['name']; ?>
          	</li>
          <?php
      }
                                          
	}else{
		echo "Unable to add the category. Please try again";
	}
}
///////////////////////////////////////////////////////////////
//add gallery photo
if (isset($_POST['add_gallery_photos'])) {
	//get form data
	$category = mysqli_real_escape_string($conn,$_POST['category']);
	$description = mysqli_real_escape_string($conn,$_POST['description']);

	//get the photo
	$folder = "gallery/";
	$fileName = $folder.basename($_FILES['photo']['name']);
	$fileExt = pathinfo($fileName,PATHINFO_EXTENSION);
	//validate for the right media type
	if ($fileExt != 'png' && $fileExt != 'jpg' && $fileExt != 'jpeg' && $fileExt != 'pdf') {
		//set error
		$_SESSION['error']='Invalid file format. Only png, jpg, jpeg or pdf formats allowed.';
		header('Location:add-gallery-photos.php');
	}
	//insert data
	$gallery = new Gallery();
	if ($gallery->insert($category,$description,$fileName)) {
		//upload the photo
		move_uploaded_file($_FILES['photo']['tmp_name'] , "../".$fileName);
		//set session success
		$_SESSION['success']='Photo added successfully.';
		header('Location:add-gallery-photos.php');
	}else{
		//set error
		$_SESSION['error']='Unable to upload your photo. Please try again';
		header('Location:add-gallery-photos.php');
	}
}
///////////////////////////////////////////////////////////////
//adding department categories
elseif (isset($_GET['addDeptCategory'])) {
	//get dept name
	$category = $_GET['deptName'];

	//new instance of department
	$dept = new Department();
	if ($dept->addCategory($category)) {
		//get available categories
		$departments = $dept->getAvailable();
		while ($department = mysqli_fetch_array($departments)) {
			?>
			<li>
          	<?php echo $department['name']; ?>
          	</li>
			<?php
		}
	}else{
		$_SESSION['error']='Unable to add the category.';
	}
}
////////////////////////////////////////////////////////////////
//adding department entries
elseif (isset($_POST['add_department_entry'])) {
	//capture data
	$categoryName = htmlentities($_POST['category']);
	$name = htmlentities($_POST['name']);
	$position = htmlentities($_POST['position']);
	$message = htmlentities($_POST['message']);
	//image upload
	$folder = "images/";
	$fileName = $folder.basename($_FILES['photo']['name']);
	$fileExt = pathinfo($fileName,PATHINFO_EXTENSION);
	//validate file extension
	if ($fileExt != 'png' && $fileExt != 'jpg' && $fileExt != 'jpeg' && $fileExt != 'pdf') {
		//error
		$_SESSION['error']='Invalid file format. Only png, jpg, jpeg or pdf formats are allowed.';
		header('Location:add-department-entries.php');
		return;
	}

	//new instance of department
	$dept = new Department();
	if ($dept->add($categoryName,$name,$position,$message,$fileName)) {	//upload
	move_uploaded_file($_FILES['photo']['tmp_name'], "../".$fileName);
		//success
		$_SESSION['success']='Entry added successfully';
		header('Location:add-department-entries.php');
	}else{
		//error
		$_SESSION['error']='Unable to add your entry. Please try again.';
		header('Location:add-department-entries.php');
	}
}
//////////////////////adding kcpe results/////////////////
elseif (isset($_POST['add_kcpe_result'])) {
	//get form values
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$year = mysqli_real_escape_string($conn, $_POST['year']);

	//get the image
	//get the photo
	$folder = "results/";
	$fileName = $folder.basename($_FILES['photo']['name']);
	$fileExt = pathinfo($fileName,PATHINFO_EXTENSION);
	//validate for the right media type
	if ($fileExt != 'png' && $fileExt != 'jpg' && $fileExt != 'jpeg' && $fileExt != 'pdf') {
		//set error
		$_SESSION['error']='Invalid file format. Only png, jpg, jpeg or pdf formats allowed.';
		header('Location:kcpe-results.php');
	}
	//insert data

	$result = new KCPEResults();
	if ($result->insert($name,$year,$fileName)) {
		//upload the image
		move_uploaded_file($_FILES['photo']['tmp_name'] , "../".$fileName);
		//set success
		$_SESSION['success']='Results added successfully.';
		header('Location:kcpe-results.php');
	}else{
		//set error
		$_SESSION['error']='Unble to add the results.Please try again';
		header('Location:kcpe-results.php');
	}

}


?>