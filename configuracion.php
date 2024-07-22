    <?php

$server =   "localhost";
$user =     "root";
$pass = "";
$database_name = "escuela_UNEDL";


$con = mysqli_connect($server, $user, $pass);

mysqli_select_db($con, $database_name);

?>

