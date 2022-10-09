<?php

session_start();

  // include("connect.php");
 // include("functions.php");

 // $user_data = check_login($con);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Your Gasoline Partner</title>
        <link rel="stylesheet" href="">

        <style type="text/css" media = "screen">
            *{
                margin: 0; padding: 0;
                box-sizing: border-box;
            }
            :root{
                --color: #cc9900;
            }
            body{
                height: 100vh;
                background: url(oil.jpg) no-repeat;
                background-size: 100% 140 px;
                background-position: 0 750px; 
                overflow: hidden;
                font-family: arial;
            }
            header{
                position: fixed;
                top: 1px;
                left: 0;
                height: 40%;
                width: 100%;
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            header .navbar{
                transition:.3s linear;
            }
            header .logo{
              display: flex;
              align-items: center;

            }
            header .logo > img{
                height: 55px;
                margin: 0 10px;
            }
            header .navbar ul{
                list-style-type: none;
                display: flex;
                align-items: center;
                width: 750px;
                justify-content: space-around;
            }
            header .navbar ul li{
                font-size: 30px;
            }
            header .navbar ul li:hover{
                color: var(--color);
                cursor: pointer;
            }
            input{
                display: none;
            }
            label{
               z-index: 2;
               position: absolute;
               top: 30px; right: 10px;
               cursor: pointer; 
               display: none;
            }
            label span{
                display: block;
                height: 3px;
                width: 30px;
                background: var(--color);
                margin: 5px 0;
                transition:.3s;
            }
            label span:nth-child(1){
                margin-left: 20px;
            }
            label span:nth-child(2){
                width: 50px;
            }
            #toggle:checked ~ label > span:nth-child(1){
                background: #fff;
                transform: rotatez(45deg);
                width: 30px;
                margin-top: 10px;
            }
            #toggle:checked ~ label > span:nth-child(2){
                background: #fff;
                transform: rotatez(-45deg);
                width: 30px;
                margin-top:-8px;
                margin-left:19px;
            }
            #toggle:checked ~ header .navbar{
                left:0;
            }

            .container{
                margin: 100px auto;
            }
            .container .content{
                position: relative;
            }
            .container .content .info{
                position: absolute;
                top: 200px; left: 160px;
                width: 500px;
                text-align: justify;

            }
            .container .content .info h1{
                font-size: 70px;
            }
            .container .content .info button{
                height: 70px;
                width: 170px;
                background: var(--color);
                outline: none;
                border: none;
                border-radius: 10px;
                margin-top: 150px;
                cursor: pointer;
                transition: all 0.4s ease;
            }
            .container .content .info p{
                color: black;
                font-size: 15px;
            }
            .container .content .info button: hover{
                
                 background: #494848;
                  
            }
            .container .content .info button a{
                text-decoration: none;
                color: white;
                font-size: 20px;
            }
            .container .content .image > img{
                height: 400px;
                width: 700px;
                float: right;
                margin-top: 200px;
            }
            .icon{
                position: fixed;
                display: flex;
                flex-flow: column-wrap;
                top: 88%; left: 20px;
            }
            .icon i{
                font-size: 25px;
                margin-top: 10px;
                margin: 0 10px;
            }
            .icon i:hover{
                color: var(--color);
                cursor: pointer;
            }
            @media(max-width: 1250px){
                .container .content .info p{
                padding: 0 150px 0 0;}
            }
            @media (max-width: 1100px){
                .container .content .image > img{
                height: 350px;
                width: 500px;  
             }
            }
            @media (max-width: 978px){
                 .container .content .image > img{
                    display: none;
                 }
                label{
                    display: block;
                }
                header .navbar{
                    height: 100vh;
                    width: 100vw;
                    position: fixed;
                    top: 0 ; left: 100%;
                    background: black;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }
                header .navbar ul{
                    height: 100vh;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    flex-flow: column wrap;
                }
                header .navbar ul li{
                    margin: 10px 0;
                    font-size: 44px;
                    color: #fff;
                }
                header .navbar ul li:hover{
                    background: #fff;
                    border-radius: 50px;
                    padding: 0 50px;
                    transition: 2s;
                }
                .container .content .info{
                    left: 50%;
                    transform: translateX(-50%);
                    text-align: center;
                }
                .container .content .info p{
                    padding: 0;
                }
                header{
                    z-index: 1;
                    justify-content: center
                }
            }
            @media(max-width: 650px){
                .container .content .info{
                    width: 450px;
                }
                .container .content .info p{
                    padding: 0 20px;
                }
            }
            @media(max-width: 470px){
                .container .content .info{
                    width: 400px;
                }
                header{
                    justify-content: flex-start;
                }
                .icon{
                    top: 450px;
                    left: 50%;
                    transform: translateX(-50%);
                    flex-flow: row wrap;

                }
                .icon i{
                    margin: 0 20px;
                }
            }
            @media(max-width: 380px){
               .container .content .info{
                    width: 250px;
                }
                .container .content .info h1{
                    font-size: 50px;

                }
                .icons{
                    width: 200px;
                }
                header .logo h2{
                    font-size: 15px;
                }
                header .logo > img{
                    height: 35px;
                }
            }

        </style>

    </head>
    <body>
        <input type="checkbox" id="toggle" name="">
        <label for="toggle">
            <span></span>
            <span></span>
        </label>
        <header>
            <div class="logo">
                <img src="logo.png">
                <h2>Your favourite gasoline partner</h2>
            </div>
            <div class="navbar">
                <ul>
                    <li>Home</li>
                    <li>About</li>
                    <li>Product</li>
                    <li>Review</li>
                    <li>Contact</li>
                </ul>
            </div>
            <div class="icons"></div>
        </header>
        <div class="container">
            <div class="content">
                <div class="info">
                    <h1>Welcome</h1>
                    <p>sdfgdhsbfdscbzxm,chjdsb nhuygvnhwbjnqksadiuhkygvew bnqjdkshukygvnewb wedfyughdbvjhu guygjhbdyuctuyguergfufegdiowejdlkwebhjdit7wfdhgbdhvhjdhhdvjhfgvhjdds</p>
                    <button type="button" name="button"><a href="customer_login.php">Order Now</a></button>
                </div>
                <div class="image">
                    <img src="fuel.jpg">
                </div>
            </div>
        </div>

        <div class="icon">
            <i class="fab fa-facebook"></i>
            <i class="fab fa-instagram-square"></i>
            <i class="fab fa-youtube"></i>
        </div>
            
            
    </body>




let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let shoppingCart = document.querySelector('.shopping-cart');

document.querySelector('#cart-btn').onclick = () =>{
    shoppingCart.classList.toggle('active');
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}
window.onscroll = () =>{
    searchForm.classList.remove('active');
    shoppingCart.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

<php
$select_cart_number = mysqli_query($conn, "SELECT * FROM 'cart' WHERE customer_id = '$customer_id'") or die('query failed');
            $cart_rows_number = mysqli_num_rows($select_cart_number);
             ?>