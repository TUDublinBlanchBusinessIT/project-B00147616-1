<?php

$usr = $_POST['user'];
$pwrd = $_POST['pass'];


require('dbcon.php');

$conn = mysqli_connect($mysql_servername, $mysql_username, $mysql_password, $mysql_dbname);

$sql = "select pwrd from registeredUsers where userName = '$usr'";
    
$result = mysqli_query($conn, $sql);

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