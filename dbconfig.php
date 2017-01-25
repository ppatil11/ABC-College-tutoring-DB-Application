<?php
$host = "localhost";
$user = "root";
$password = "";
$datbase = "abc college tutoring";
$db = mysqli_connect($host,$user,$password);
mysqli_select_db($db,$datbase);
if( ! $db = mysqli_connect($host,$user,$password) ) {
    die('No connection: ' . mysqli_connect_error());
}
else
	echo "Database Connection is successful";
?>
