<?php
try{
$dbHost = "localhost";
$dbuser = "root";
$dbPass = "";
$dbname = "patner";

if ($con = mysqli_connect($dbHost,$dbuser,$dbPass,$dbname)) {
	// code...
	die("Failed to connect to database!!");
}
}
catch(Exception $e) {

}

