<?php

$usr = $_POST['user'];
$pwrd = $_POST['pass'];


require('dbcon.php');

echo "Username: " . $usr . "<br>";
echo "Password: " . $pwrd . "<br>";

$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT pwrd FROM registeredUsers WHERE userName = '$usr'";
    
$result = mysqli_query($conn, $sql);
$dBpwrd = '';

while($row = $result->fetch_assoc()) 
{
    $dBpwrd = $row['pwrd'];
}

if (dBpwrd == $prwd)
{
    echo "the password matches";
}
else
{
    echo "the password does not match";
}
?>