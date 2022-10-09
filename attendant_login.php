<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select_attendants = mysqli_query($conn, "SELECT * FROM attendant WHERE email = '$email' && password = '$pass'")or die ('query failed');

   //$result = mysqli_query($conn, $select);

   if(mysqli_num_rows($select_attendants) > 0){
     $row = mysqli_fetch_assoc($select_attendants);
     if ($row['att_type'] == 'attendant') {
         // code...
        $_SESSION['attendant_name'] = $row['name'];
        $_SESSION['attendant_email'] = $row['email'];
        $_SESSION['attendant_id'] = $row['id'];
        header('location:attendant_page.php');
      }
     
   }else{
      $message[] = 'Incorrect email or password!';

   }

}

?>

<!DOCTYPE html>
<html>
    <head>
       <title> Attendant Login Page</title> 
       <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="form-container">
            <form action="" method="post">
                <h3>Sign in</h3>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <input type="email" name="email" required placeholder="enter your name">
                <input type="password" name="password"required placeholder="enter your password">
                <input type="submit" name="submit"value="sign in now" class="form-btn">
                <br>
                <a href="#">Reset password</a>
                 
            </form> 
        </div>
    </body>
</html>