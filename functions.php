<?php

function check_login($con){
	if (isset($_SESSION['user_name'])) {
		// code...
		$id = $_SESSION['user_name'];
		$query = "Select * from patner where user_name = $id limit 1";
		$result = mysqli_query($con,$query);
		if ($result && mysqli_num_rows($result) > 0) {

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}
	//redirect to login
	header("Location: customer_login.php");
	die;
}