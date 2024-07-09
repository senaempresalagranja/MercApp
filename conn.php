<?php

$conn = mysqli_connect("localhost","root","","dbmercapp");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>