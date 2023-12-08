<?php

$usr = $_POST['user'];
$pwrd = $_POST['pass'];


require('dbcon.php');

echo "Username: " . $usr . "<br>";
echo "Password: " . $pwrd . "<br>";

$sql = "SELECT pwrd FROM registeredUsers WHERE userName = '$usr'";
    
$result = mysqli_query($conn, $sql);
$dBpwrd = '';

// helped in telling m =e exact error
if (!$result) {
    die("Error in SQL: " . mysqli_error($conn));
}

while($row = $result->fetch_assoc()) {
    $dBpwrd = $row['pwrd'];
}


if ($pwrd == $dBpwrd) {
    session_start();
    $_SESSION['user'] = $usr;
    header("Location: loggedIn.html");
    echo 'the password matches';
}
else {
    header("Location: loginTryAgain.html");
    echo 'the password does not match';
}
?>