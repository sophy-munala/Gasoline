<?php
/*if (isset($_POST['register'])) {
    // code...

  //session_start();
 
 include("connect.php");
 include("functions.php");

 if($_SERVER['REQUEST_METHOD'] == "POST"){
    //something was posted
    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    if(!is_numeric($name,$user_name,$email,$number,$address)){
        //save to the database
        $query = "inser into customer_reg (name,user_name,email,phone number, address,password) values ('$name','$user_name','$email','&number', '$address','$password')";

        mysqli_query($con, $query);

        header("Location: customer_login.php");
        die;
    }else{
        echo"Please enter a valid information";
    }
 }
}
?>
*/

if (isset($_POST['login'])) {
    // code...
    require 'connect.php';

    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    if ($password !== $cpassword) {
        header("Location: customer_reg.php?error=password does not match");
        exit();
    }
    else {
        $sql="SELECT user_name FROM customer_reg WHERE user_name = ?";
        $stmt=mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: customer_login.php.php?error=sqlerrror");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt, "s", $user_name);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $rowCount = mysqli_stmt_num_rows($stmt);

        if ($rowcount > 0) {
                header("Location: customer_login.php?error = username has been taken");
                exit();
                }
        else{
                $sql = "INSERT INTO customer_reg (name, user_name, email, phonenumber, address, password_) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: customer_login.php?error=sqlerrror");
                exit();
                        }
        else{
                $hashedPass = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "ssssss",$name, $user_name, $email, $number, $address, $hashedPass);
                mysqli_stmt_execute($stmt);
                header("Location: customer_login.php?success=registered");
                exit();
                    }
            }
        }
    }

mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else {
    header("Location: customer_login.php");
}

?>