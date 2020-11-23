<?php
//include db connection
include 'dbConnect.php';

class DB{
	function __construct(){
		$this->conn = mysqli_connect("localhost","root","","j_academy");
		if (!$this->conn) {
			echo "Unable to connect to the database".mysql_connect_error();
		}
	}

	//general query
function query($sql){
	$qry = mysqli_query($this->conn,$sql);
	return $qry;
}
	//static db connection\
public static function conn(){
return mysqli_connect("localhost","root","","j_academy");
}

}
///////////////////////////////////////////////////////////////
class feeUpload extends DB{

function insert($adm,$name,$amt,$class){
$sql = "INSERT INTO fees_payments(adm,students_name,amount_paid,class) VALUES('$adm','$name','$amt','$class')";
$query = mysqli_query($this->conn,$sql);
if ($query) {
	return true;
}else{
	return false;
}
}	
	
}

//////////////////////////////////////////////////////////////////
class Result extends DB{

function login($adm,$password){
$sql = "SELECT * FROM students WHERE adm='$adm' AND password='$password'";
$query=mysqli_query($this->conn,$sql);
return $query;
}


}

////////////////////////////////////////////////////////////
class Slip{

function __construct($name,$class,$adm_no,$slip_img){
$this->name = $name;
$this->class = $class;
$this->adm = $adm_no;
$this->slip = $slip_img;
	}
	//getters
function getName(){
	return $this->name;
}

function getClass(){
	return $this->class;
}

function getAdm(){
	return $this->adm;
}

function getSlip(){
	return $this->slip;
}
}

///////////////////////////////////////////////////////////////
class Student extends DB{

function __construct($adm){
// $this->conn = mysqli_connect("localhost","root","","j_academy");
 
$sql="SELECT * FROM students WHERE adm='$adm'";

if ($query=mysqli_query(DB::conn(),$sql)) {
	//check if the student exists
	if (mysqli_num_rows($query) == 0) {
	return false;
	}	
$stud = mysqli_fetch_array($query);
//initialize stdent details
$this->name=$stud['name'];
$this->adm=$stud['adm'];
$this->class=$stud['class'];

}else{
//set error
	echo "error";
}
}
function isCreated(){
	return $this->isCreated;
}
//getters
function getName(){
	return $this->name;
}

function getAdm(){
	return $this->adm;
}

function getClass(){
	return $this->class;
}

//getting result slip of the student
function getResultSlip(){
	$adm = $this->getAdm();
	$sql="SELECT result_slip FROM exam_results WHERE adm='$adm'";
	$query = mysqli_query($this->conn,$sql);
	$row=mysqli_fetch_array($query);

	return $row['result_slip'];
}

}
class Student1 extends DB{
	//getting all records of students
function getAllStudents(){
	$sql = "SELECT * FROM students";
	$query = $this->query($sql);
	return $query;
}
//getting sum paid
function getSum($adm,$pymt){
	$sql = "SELECT SUM(amount_paid) as amt FROM fees_payments WHERE adm = '$adm' AND p_for='$pymt'";
	$query = $this->query($sql);
	while ($row = mysqli_fetch_array($query)) {
		return $row['amt'];
	}
	
}

}
//////////////////////////////////////////////////////////////////////////

class Payable extends DB{

//adding records
function addPayable($name,$amt){
	$sql = "INSERT INTO payables(name,amount) VALUES('$name','$amt')";
	$query = mysqli_query($this->conn, $sql);
	if ($query) {
		return true;
	}else{
		return false;
	}
}

//getting all the records
function getAvailable(){
	$sql = "SELECT * FROM payables";
	$query = $this->query($sql);
	return $query;
}
	
//getting the upcoming
function getUpcoming(){
	$sql = "SELECT * FROM payables_upcoming";
	$query = $this->query($sql);
	return $query;
}

//adding an upcoming payable
function addPayableUpcoming($id,$name,$amount){
$sql = "INSERT INTO payables_upcoming(id,name,amount) VALUES('$id','$name','$amount')";
$query = $this->query($sql);
if ($query) {
	return true;
}else{
	return false;
}

}

// deleting an upcoing payable
function deletePayableUpcoming($id){
	$sql = "DELETE FROM payables_upcoming WHERE id='$id'";
	$query = $this->query($sql);
	if ($query) {
		return true;
	}else{
		return false;
	}

}

}
////////////////////////////////////////////////////////////////////////
class Payment extends DB{
	//total amt by a student
function getTotalAmtPaid($adm,$for){
$amt = 0;
$sql = "SELECT * FROM fees_payments WHERE adm='$adm' AND p_for='$for'";
$query = $this->query($sql);

while ($row = mysqli_fetch_array($query)) {
	$amt += $row['amount_paid'];
}
return $amt;
}

//fees balance
function getBalance($TotalAmt,$AmtPaid){
	$bal = $TotalAmt-$AmtPaid;
	return $bal;
}
//amount to be paid
function getAmtToBePaid($payable){
	$sql = "SELECT amount FROM payables WHERE name like '$payable'";
	$query = $this->query($sql);
	$row = mysqli_fetch_array($query);
	$amt = $row['amount'];
	return $amt;
}
//get all records
function getByPayment($pymt){
	$sql = "SELECT * FROM fees_payments WHERE p_for = '$pymt'";
	$query = $this->query($sql);
	return $query;
}

//gets total amt paid per a certain payment
function getAmtPaid($pymt){
	$rows = $this->getByPayment($pymt);
	$amt = 0;
	while ($row = mysqli_fetch_array($rows)) {
		$amt += $row['amount_paid'];
	}
	return $amt;
}

//get records per a certain student
function getByPaymentAndAdm($pymt,$adm){
	$sql = "SELECT * FROM fees_payments WHERE p_for = '$pymt' AND adm='$adm'";
	$query = $this->query($sql);
	return $query;
}

function getSummary($pymt,$condition,$amt){
		$sql = "SELECT * FROM payments_summary WHERE p_for='$pymt' AND amount $condition $amt";

		$query = mysqli_query($this->conn,$sql);
		return $query;
	}
}
/////////////////////////////////////////////////////////////////////
class Report extends DB{
	//setters 
	function setName($name){
		$this->name = $name;
	}
	function setAdm($adm){
		$this->adm = $adm;
	}
function setClass($class){
		$this->class = $class;
	}
	function setBalance($bal){
		$this->bal = $bal;
	}
	//getters
	function getName(){
		return $this->name;
	}
	function getAdm(){
		return $this->adm;
	}
	function getClass(){
		return $this->class;
	}
	function getBalance(){
		return $this->bal;
	}

}

//returns the id of specified table
class GetById{
function __construct($id){
	$this->id = $id;
	// $this->conn=mysqli_connect('localhost','root','','j_academy');
}
function getAll($tableName){
$sql = "SELECT * FROM $tableName WHERE id='$this->id'";
$query = mysqli_query(DB::conn(),$sql);
return $query;
}

}

////////////////////////////////////////////////////////
class User extends DB{
	function __construct($email){
		// $this->conn = mysqli_connect("localhost","root","","j_academy");
		$sql = "SELECT * FROM users WHERE email='$email'";
		$query = mysqli_query(DB::conn(),$sql);
		$row = mysqli_fetch_array($query);
		//initialize variables
		$this->id=$row['id'];
		$this->username=$row['username'];
		$this->email=$row['email'];
		$this->phone=$row['phone'];
		$this->password=$row['password'];
		$this->status=$row['status'];
		$this->profile_pic=$row['profile_pic'];

	}
	//getters
	function getId(){
		return $this->id;
	}
	function getUsername(){
		return $this->username;
	}
	function getEmail(){
		return $this->email;
	}
	function getPhone(){
		return $this->phone;
	}
	function getPassword(){
		return $this->password;
	}
	function getStatus(){
		return $this->status;
	}
	function getProfilePic(){
		return $this->profile_pic;
	}
}

//////////////////////////////////////////////////////////////
//payment summary
class PaymentSummary extends DB{
	function __construct($adm,$pymt,$amount){
		$this->adm = $adm;
		$this->pymt = $pymt;
		$this->amount = $amount;
		// $this->conn = mysqli_connect("localhost","root","","j_academy");
		$sql = "SELECT * FROM payments_summary WHERE adm='$adm' AND p_for='$pymt'";
		// die($sql);
		$query = mysqli_query(DB::conn(),$sql);
		if (mysqli_num_rows($query) > 0) {
			//update
			$sql = "UPDATE payments_summary SET amount ='$amount' WHERE adm='$adm' AND p_for='$pymt'";
			$query = mysqli_query(DB::conn(),$sql);
		}else{
			//insert
			$sql ="INSERT INTO payments_summary(adm,p_for,amount) VALUES('$adm','$pymt','$amount') ";
			$query = mysqli_query(DB::conn(),$sql);
		}
	}
	//setters
	function setAmount($amount){
		$this->amount = $amount;
	}
	function getSummary($adm,$pymt,$condition,$amt){
		$sql = "SELECT * FROM payments_summary WHERE adm ='$adm' AND p_for='$pymt' AND amount $condition $amt";

		$query = mysqli_query(DB::conn(),$sql);
		return $query;
	}
	
}
////////////////////////////////////////////////////////////////////
//gallery
class Gallery extends DB{
	//getting available  categories
	function getAvailable(){
		$sql = "SELECT name FROM gallery_categories";
		$query = $this->query($sql);

		return $query;
	}

	//adding gallery categories
	function addCategory($categoryName){
		$sql = "INSERT INTO gallery_categories(name) VALUES ('$categoryName') ";
		$query = $this->query($sql);

		if (!$query) {
			return false;
		}
		return true;
	}

	//adding records to galleries table
	function insert($category,$description,$image){
		$sql = "INSERT INTO gallery(category,description,img_url) VALUES('$category','$description','$image')";
		$query = $this->query($sql);

		if (!$query) {
			return false;
		}
		return true;
	}

	//getting distict categories
	function getDistinctCategories(){
		$sql = "SELECT DISTINCT category FROM gallery";
		$query = $this->query($sql);
		
		return $query;
	}

	//getting by category
	function getByCategory($categoryName){
		$sql = "SELECT * FROM gallery WHERE category='$categoryName'";
		$query = $this->query($sql);

		return $query;
	}

}
////////////////////////////////////////////////////////////////////////
class Department extends DB{
	//getting available departments
	function getAvailable(){
		$sql = "SELECT * FROM department_categories";
		$query = $this->query($sql);

		return $query;
}
//adding department category
function addCategory($categoryName){
	$sql = "INSERT INTO department_categories(name) VALUES('$categoryName') ";
	$query = $this->query($sql);

	if (!$query) {
		return false;
	}
	return true;
}

//adding a new department entry
function add($categoryName,$name,$position,$message,$avator){
	$sql = "INSERT INTO department_entries(category,name,position,message,avator) VALUES('$categoryName','$name','$position','$message','$avator') ";
	$query = $this->query($sql);

	if (!$query) {
		return false;
	}
	return true;
}

//getting distict categories
	function getDistinctCategories(){
		$sql = "SELECT DISTINCT category FROM department_entries";
		$query = $this->query($sql);
		
		return $query;
	}

	//getting entries by category
	function getByCategory($categoryName){
		$sql = "SELECT * FROM department_entries WHERE category = '$categoryName'";
		$query = $this->query($sql);

		return $query;
	}
}
//////////////////////////////////////////////////////////
//collecting user feedbacks
class Feedback extends DB{
	function __construct($id){
// $this->conn = mysqli_connect("localhost","root","","j_academy");
$sql = "SELECT * FROM feedbacks WHERE id='$id'";
$query = mysqli_query(DB::conn(),$sql);
$row = mysqli_fetch_array($query);

//set variables
$this->firstName = $row['f_name'];
$this->lastName = $row['l_name'];
$this->email = $row['email'];
$this->phone = $row['phone'];
$this->message = $row['message'];
$this->time = $row['time'];
	}

	//getters
	function getFirstName(){
		return $this->firstName;
	}
	function getLastName(){
		return $this->lastName;
	}
	function getEmail(){
		return $this->email;
	}
	function getPhone(){
		return $this->phone;
	}
	function getMessage(){
		return $this->message;
	}
	function getTime(){
		return $this->time;
	}
}

/////////////////////////getting kcpe results////////////
class KCPEResult extends DB{
function __construct($year){
// $this->conn = mysqli_connect("localhost","root","","j_academy");
$sql = "SELECT * FROM kcpe_results WHERE year = '$year'";
$query = mysqli_query($this->conn, $sql);
//fetch an array instance
$row = mysqli_fetch_array($query);

///setters
$this->year=$row['year'];
$this->image=$row['img_url'];
$this->name=$row['name'];

}

//getters
function getName(){
	return $this->name;
}
function getImage(){
	return $this->image;
}
function getYear(){
	return $this->year;
}

}
////get all instances of kcpe results
class KCPEResults extends DB{
	//adding kcpe results
	function insert($name,$year,$fileName){
		$sql = "INSERT INTO kcpe_results(name,year,img_url) VALUES('$name','$year','$fileName') ";
		$query = $this->query($sql);

		if (!$query) {
			return false;
		}
		return true;
	}
	
	//getting all kcpe results
	function getAll(){
		$sql = "SELECT * FROM kcpe_results";
		$query = $this->query($sql);

		return $query;
	}
}
?>