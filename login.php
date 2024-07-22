<?php

require 'configuracion.php';

$username = '@' . mysqli_real_escape_string($con, $_POST['username']);
$password = mysqli_real_escape_string($con, $_POST['password']);

$query = "SELECT 
           username, password
        FROM 
            Usuarios u
        WHERE
            u.username like '" . $username . "'
        AND u.password like '" . ($password) . "'
        ";
echo $query;

$resp = mysqli_query($con, $query);

if (mysqli_num_rows($resp) == 1) {
    session_start();
    while ($row = mysqli_fetch_array($resp)) {
        $_SESSION['username'] = $row['username'];
        $_SESSION['token'] = $row['token'];
                
    }
    
} else {
    echo "Error";
}
?>
