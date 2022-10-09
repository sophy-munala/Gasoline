<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>

    <head>
       <title>Station</title>
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ftscroller/0.7.0/ftscroller.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"> 
       <link rel="stylesheet" href="admin.css">
    </head>
    
    <body>
        <?php include 'admin_header.php'?>

        <!-- admin add station section-->

        <section class="add-products">
            <h1 class="heading">Fuel Stations</h1>
            <form method="post" enctype="multipart/form-data">
               
                <input type="text" name="name" class="box" placeholder="station name" required>
                <input type="email" name="email" class="box" placeholder="station emal" required>
                <input type="number" name="id" class="box" placeholder="station number" required>
                <input type="submit" name="add_product" value="Add station" class="btn">
            </form>
        </section>

        


       







        <script src="admin_script.js"></script>
    </body>
</html>