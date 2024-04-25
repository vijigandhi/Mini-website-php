<?php 

require("navbar.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
</head>
<body>
    <style>

body, h1, h2, p, ul, li, form, label, input, textarea, button {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
}

header {
    margin-top: 5px;
    color: black;
    text-align: center;
    padding: 20px 0;
}

main {
    padding: 20px;
}

.contact-form {
    background-color: #f2f2f2;
    padding: 20px;
}

.contact-form h2 {
    text-align: center;
    margin-bottom: 20px;
}

.contact-form form {
    max-width: 500px;
    margin: 0 auto;
}

.contact-form label {
    display: block;
    margin-bottom: 10px;
}

.contact-form input[type="text"],
.contact-form input[type="email"],
.contact-form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.contact-form textarea {
    height: 150px;
}

.contact-form button {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #333;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.contact-form button:hover {
    background-color: #555;
}


    </style>
    <header>
        <h1>Contact Us</h1>
    </header>
    
    <main>
        <section class="contact-form">
            <form action="submit_contact.php" method="POST">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="">Send</button>
            </form>
        </section>
    </main>


</body>
</html>
