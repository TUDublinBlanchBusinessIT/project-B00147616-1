<?php
$fn = $_POST['fname'];
$sn = $_POST['sname'];
$dob = $_POST['dob'];
$no = $_POST['phoneno'];
$email = $_POST['emailadd'];

include("dbcon.php");

$sql = "INSERT INTO people (firstname, surname, dateofbirth, phoneNumber, emailAddress) 
        VALUES ('$fn', '$sn', '$dob', '$no', '$email')";

//echo $sql;
mysqli_query($con,$sql);
mysqli_close();
?>