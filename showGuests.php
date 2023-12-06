<?php

include("dbcon.php");

$sql = "select * from people";

$result = mysqli_query($conn, $sql);
//echo $sql;

echo "<table border = '1'>";
while($row = mysqli_fetch_assoc($result)) {
    $fn =$row['firstname'];
    $sn = $row['surname'];
    $dob = $row['dateofbirth'];
    $no = $row['phoneNumber'];
    $email = $row['emailAddress'];
    
    echo "<tr><td>$fn</td><td>$sn</td><td>$dob</td><td>$no</td><td>$email</td></tr>";
}
echo "</table>";
mysqli_close($conn);

?>