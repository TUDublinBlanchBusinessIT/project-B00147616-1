<?php

include("dbcon.php");

$sql = "select * from people";

$result = mysqli_query($conn, $sql);
//echo $sql;
while($row = mysqli_fetch_assoc($result)) {
    $fn =$row['firstname'];
    $sn = $row['surname'];
    $dob = $row['dateofbirth'];
    $no = $row['phoneNumber'];
    $email = $row['emailAddress'];
    
    echo "$fn, $sn, $dob, $no, $email<br>";
}
mysqli_close($conn);

?>