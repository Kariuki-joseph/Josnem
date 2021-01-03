<?php
include 'dbConnect.php';

$name = $_POST['fullNames'];
$adm = $_POST['adm'];
$class = $_POST['class'];

 $sql = "SELECT * FROM students WHERE adm ='$adm'";
 $query = mysqli_query($conn,$sql);
 $numRows = mysqli_num_rows($query);
 if($numRows == 0){
    //add
    $sql = "INSERT INTO students (name,adm,class) VALUES('$name','$adm','$class')";
    $query = mysqli_query($conn, $sql);
 }
    //fetch
    $sql = "SELECT * FROM students ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    $studsArr = [];
    while($row = mysqli_fetch_array($query)){
         $arrayName = array(
             'name' =>$row['name'],
             'adm' =>$row['adm'],
             'class' =>$row['class']
         );
         array_push($studsArr,$arrayName);
    }
    echo json_encode($studsArr);


?>