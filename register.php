<?php

 //session_start();

include 'config.php';

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
    $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
    $user_type = $_POST['user_type'];
   

   $select_users = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' && password = '$pass'")or die ('query failed');

   //$result = mysqli_query($conn, $select);

   if(mysqli_num_rows($select_users) > 0){

      $message[] = 'user already exist!';

   }else{

      if($pass != $cpass){
         $message[] = 'password not matched!';
      }else{
        mysqli_query($conn, "INSERT INTO `user`(name, email, password, user_type) VALUES('$name','$email', '$pass','$user_type')")or die('query failed');
            $message[] = 'Registration Succesfull!!';
            header('location:login.php');
      }
   }

}


?>

<!DOCTYPE html>
<html>
    <head>
       <title>Register Page</title> 
       <link rel="stylesheet" href="style.css">
    </head>
    <body>


        <?php
                if(isset($message)){
                    foreach($message as $message){
             echo '<div class="message"> <span>'.$message.'</span>
            <i class="fas fa-times".onclick="this.parentElement.remove();"></i>
        </div>';
                    };
                };
         ?>

        <div class="form-container">
            <form action="" method="post">
                <h3>Sign up</h3>
                <input type="text" name="name" required placeholder="enter your name">
                <input type="email" name="email" required placeholder="example@gmail.com">
                <input type="password" name="password"required placeholder="enter your password">
                <input type="password" name="cpassword" required placeholder="confirm your password">
                <select name="user_type" id="">
                    <option value="admin">admin</option>
                    <option value="customer">customer</option>
                </select>
                <input type="submit" name="submit" value="sign up now" class="form-btn">
                <p>already have an account? <a href="login.php">login now</a></p>
            </form> 
        </div>
    </body>
</html>