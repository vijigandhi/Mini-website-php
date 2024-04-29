<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar</title>
</head>
<body>

<style>

    /*--------------- CSS for Navbar ---------------------------*/

    body {
        margin: 0;
    font-family: Arial, sans-serif;
    }

    .navbar {
        /* position: fixed; */
        background-color: black;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        height: 60px;
        align-items: center;
    }

    .menu {
        color: white;
        text-align: center;
        padding: 20px;
        text-decoration: none;
    }


    .menu:hover {
        background-color: #ddd;
        color: black;
    }

    .signup-btn:hover {
        background-color: #ddd;
        color: black;
    }

    .right-corner {
        margin-right: 20px;
    }

    .signup-btn {
        color: white;
        text-align: center;
        padding: 14px 20px;
        text-decoration: none;
        width: 2px;
        background-color: #007bff; 
        border: none;
        height: 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .signup-btn:hover {
        background-color: #0056b3;
    }

    #signup-form {
        display: none;
        margin-top: 20px;
    }

    #signup-form input {
        display: block;
        margin-bottom: 10px;
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    #signup-form button {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    a{
        color: white;
    }
    #signup-form button:hover {
        background-color: #0056b3;
    }

    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 10px 0;
        position: fixed;
        bottom: 0;
        width: 100%;
    }
    img{
        width: 40px;
        height: 40px;
        margin-top: 9px;
    }
    span{
        width: 10%;
        display: flex;
    }

</style>

<!--------------------- Navbar ---------------------->

<div class="navbar">
    <div class="nav-menus">
        <a class="menu" href="index.php">Dashboard</a>
        <a class="menu" href="about.php">About</a>
        <a class="menu" href="contact.php">Contact Us</a>
        <a class="menu" href="terms.php">Terms and Conditions</a>
        <a class="menu" href="blog.php">Blog</a>
    </div>

    <div class="right-corner">

    <!-- <a class='signup-btn' href='signup.php' id='signup-toggle'>Sign Up</a> -->
    <?php

        session_start();

        if(isset($_SESSION['name'])){
            echo "<span><a href='logout.php' class='menu'>Logout</a><img src='avatar-default-icon.png'></span>";
        } else {
            echo "<a href='signup.php' class='signup-btn' id='signup-toggle'>Signup</a>";
        }

    ?>

    </div>
</div>

<footer>
    <p>&copy; 2024 Your Website</p>
</footer>

</body>
</html>