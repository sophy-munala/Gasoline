<?php
include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
    header('location:login.php');
}

if (isset($_GET['delete'])) {
    // code...
    $delete_id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM `station` WHERE id = '$delete_id'")or die('query failed');
    header('location:admin_station.php');
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

        <section class="station">
            <h1 class="heading"> View Fuel stations</h1>
            <div class="box-container">
                <?php 
                $select_station = mysqli_query($conn, "SELECT * FROM `station`")or die('query failed');
                if (mysqli_num_rows($select_station) >0) {
                    // code...
                    while($fetch_station = mysqli_fetch_assoc($select_station)){
                 ?>
                 <div class="box">
                    <p>station number: <span><?php echo $fetch_station['id'] ?></span></p>
                     <p>name: <span><?php echo $fetch_station['name'] ?></span></p>
                     <p>email: <span><?php echo $fetch_station['email'] ?></span></p>
                        
                     <a href="admin_station.php?update=<?php echo $fetch_station['id'];?>" class= "btn">update</a>
                        <a href="admin_station.php?delete=<?php echo $fetch_station['id'];?>" onclick = "return confirm('delete this station?');" class="delete-btn">delete</a>
                 </div>
                 <?php 
             };
                     }else{
                        echo '<p class="empty">you do not have any stations yet!!</p>';
                     }
                  ?>
                
            </div>
            
        </section>


       







        <script src="admin_script.js"></script>
    </body>
</html>