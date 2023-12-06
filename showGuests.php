<?php

include("dbcon.php");

$sql = "select * from people)";

$result = mysqli_query($conn, $sql);
while(mysqli_fetch_assoc($result)) {
    $fn =$row['firstname'];
    $sn = $row['surname'];
    $dob = $row['dateofbirth'];
    $no = $row['phoneNumber'];
    $email = $row['emailAddress'];
}
mysqli_close($conn);

echo "Guest inserted";
?>