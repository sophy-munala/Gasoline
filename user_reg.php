
<?php
if (isset($_POST['submit'])){

	require 'database.php';

	$name=$_POST['name'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];
	$email=$_POST['email'];
	$phoneNumber=$_POST['phone'];
	$usertype=$_POST['user_type'];

    if ($pass !== $cpass) {
		header("Location: register.php?error=passwords do notmatch");
		exit();
	}
    else {
		$sql="SELECT email FROM user_reg WHERE email = ?";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: register.php?error=sqlerrror");
			exit();
		}
        else{
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$rowCount = mysqli_stmt_num_rows($stmt);

			if ($rowcount > 0) {
				header("Location: register.php?error=username_taken");
				exit();
				}
                else{
                    $sql = "INSERT INTO user_reg (name, email, phone_number, user_type, Password) VALUES (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location:  register.php?error=sqlerrror");
                    exit();
                     }
                     else{
                        $hashedPass = password_hash($pass, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ssiss",$name, $email, $phoneNumber, $usertype, $hashedPass);
                        mysqli_stmt_execute($stmt);
                        header("Location:  register.php?success=registered");
                        exit();
                            }
                        }
                    }
                } 
                mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else {
	header("Location:  register.php");
} 

//cart details

<?php 
			$select_cart_number = mysqli_query($conn, "SELECT * FROM 'cart' WHERE customer_id = '$customer_id'") or die(query failed);
			$cart_rows_number = myqli_num_rows($select_cart_number);
			
			 ?> 


