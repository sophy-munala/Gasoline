<?php

 //session_start();

include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    
   

   $select_users = mysqli_query($conn, "SELECT * FROM customer_reg WHERE email = '$email' && password = '$pass'")or die ('query failed');

   //$result = mysqli_query($conn, $select);

   if(mysqli_num_rows($select_users) > 0){

      $message[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $message[] = 'password not matched!';
      }else{
        mysqli_query($conn, "INSERT INTO `customer_reg`(name, email, phone, address, password) VALUES('$name','$email', '$phone','$address', $pass')")or die('query failed');
            $message[] = 'Registration Succesfull!!';
            header('location:customer_login.php');
      }
   }

}


?>
<!DOCTYPE html>
<html >
    <head>
        
        <title>Customer Registration</title>
        <link rel="stylesheet" href="customer_login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
           
            <form action="#">
                <div class="form-content">
                    <div class="form-content">
                       
        
                        <div class="signup-form">
                            <div class="title">Signup</div>
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-user"></i>
                                    <input type="text" name="name" placeholder="Enter your name" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-phone"></i>
                                    <input type="number" name="number" placeholder="Enter your phone number" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-location"></i>
                                    <input type="text" name="address" placeholder="Enter your street address" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="cpassword" placeholder="Confirm your password" required>
                                </div>
        
                                <div class=" btn input-box">
                                    <input type="submit" value="Signup" name="submit">
                                </div>
                                <p class="text">Already have an account! <a href="customer_login.php">Login now</a></p>
                            </div>
                        </div>
                </div>
            </form>
        </div>
    </body>

</html>



































