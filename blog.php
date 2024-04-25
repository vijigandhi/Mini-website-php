<?php 

require("navbar.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <style>
        body, h1, h2, p, ul, li, form, label, input, textarea, button {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            /* background-color: #f3f3f3; */
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            margin-top: 20px;
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
        }

        main {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px; 
            display: block;
        }

        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px; 
        }

        textarea {
            resize: vertical;
        }

        button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #007bff;
        }

        form {
            display: none;
        }

        .create-post-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .create-post-btn:hover {
            background-color: #007bff;
        }

        /* -------------------------- table ----------------------------- */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px; 
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f3f3f3;
        }

        tr:nth-child(odd) {
            background-color: #f3f3f3;;
        }

        tr:hover {
            background-color: #ddd;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px; 
        }
    </style>
</head>

<?php
    $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce","signup");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM posts";
    $result = $conn->query($sql);

    if ($result-> num_rows > 0) {
        echo "<h1 style='margin-top: 20px;'>Blogs</h1>";
        echo "<table>"; // Start a table
        echo "<tr><th>Id</th><th>Title</th><th>Content</th><th>Status</th><th>Author Name</th></tr>"; // Table header row

        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] ."</td>";
            echo "<td>" . $row["title"] . "</td>";
            echo "<td>" . $row["content"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "<td>" . $row["author"] . "</td>";
            echo "</tr>";
        }

        echo "</table><br><br>"; // End the table
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>


<?php

// session_start();

if (isset($_POST['insert'])) {

    // if(!isset($_SESSION['name']) || $_SESSION['name'] !== true) {
    //     header("Location: login.php");
    //     exit;
    // }

    $title = $_POST['title'];
    $content = $_POST['content'];
    $status = $_POST['status'];
    $author = $_POST['author'];

        $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "signup");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql_insert = "INSERT INTO posts (title, content, status, author)
                VALUES ('$title', '$content', '$status', '$author')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "<script>alert('your blog created successfully')</script>";
            $username = $email = $password = $confirm_password = '' ;
        } else {
            echo "<span class='error'>Error: " . $sql_insert . "<br>" . $conn->error . "</span>";
        }

        $conn->close();
    }

?>
<body>
    
    <main>

        <a href="#" id="toggleForm" class="create-post-btn">Create Your Blog</a>
        <br><br><br>

        <form id="blogForm" method="POST" action="blog.php">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Content:</label>
                <textarea id="content" name="content" rows="10" cols="30"></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <select id="status" name="status" required>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>

            <div class="form-group">
                <label for="author">Author:</label>
                <input type="text" id="author" name="author" required>
            </div>

            <button name='insert' type="submit">Add Post</button><br><br><br><br>
        </form>
    </main>

    <script>
        document.getElementById("toggleForm").addEventListener("click", function() {
            var form = document.getElementById("blogForm");
            form.style.display = (form.style.display === "none") ? "block" : "none";
        });
    </script>
</body>
</html>
