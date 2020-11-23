<?php
$conn = mysqli_connect('localhost','root','','j_academy');
//check if connect
if (!$conn) {
	echo "Unable to connect to the database. Error: ".mysql_connect_error();
}
?>