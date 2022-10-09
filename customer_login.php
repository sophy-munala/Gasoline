<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_users = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' && password = '$pass'")or die ('query failed');

   //$result = mysqli_query($conn, $select);

   if(mysqli_num_rows($select_users) > 0){
     $row = mysqli_fetch_assoc($select_users);
     if ($row['user_type'] == 'admin') {
         // code...
        $_SESSION['admin_name'] = $row['name'];
        $_SESSION['admin_email'] = $row['email'];
        $_SESSION['admin_id'] = $row['id'];
        header('location:admin_page.php')
     }
     elseif ($row['user_type'] == 'station') {
         // code...
        $_SESSION['station_name'] = $row['name'];
        $_SESSION['station_email'] = $row['email'];
        $_SESSION['station_id'] = $row['id'];
        header('location:station.php')
     }
       
   }else{
      $message[] = 'Incorrect email or password!';

   }

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <title>Customer Login</title>
        <link rel="stylesheet" href="customer_login.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div class="container">
         
            <form action="#">
                    <div class="form-content">
                        <div class="login-form">
                            <div class="title">Login</div>
                            <div class="input-boxes">
                                <div class="input-box">
                                    <i class="fas fa-envelop"></i>
                                    <input type="email" name="email" placeholder="Enter your email" required>
                                </div>
                                <div class="input-box">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" name="password" placeholder="Enter your password" required>
                                </div>
                                <div class="text"><a href="#">Forgot Password?</a></div>
                                <div class=" btn input-box">
                                    <input type="submit" value="submit" name="submit">
                                </div>
                                <p class="text">Don't have an account! <a href="customer_reg.php">Signup now</a></p>
                            </div>
                        </div>
        
                </div>
            </form>
        </div>
    </body>

</html>