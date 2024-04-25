<?php


session_start();

$error = '';

$username = $password = '';
$usernameError = $passwordError = '';

function validateRequired($value)
{
if (trim($value) == '') {
    return 'This is required';
}
return false;
}

function validatePasswordLength($value, $minLength = 6) {
if (strlen($value) < $minLength) {
    return 'Password must be at least ' . $minLength . ' characters';
}
return false;
}


if (isset($_POST['submit'])) {
    $conn = new mysqli("localhost", "dckap", "Dckap2023Ecommerce", "signup");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate username
    $username = $_POST['username'];
    $usernameError = validateRequired($username);

    // Validate password
    $password = $_POST['password'];
    $passwordError = validateRequired($password);

    if (empty($usernameError) && empty($passwordError)) {
        $password = md5($password);

        $query = "SELECT id FROM sign_up_details WHERE username = '$username' and password='$password'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $_SESSION['name'] = $username;
                header("location: index.php");
            }
        } else {
            $error = 'Invalid username or password';
        }
    }
    $conn->close(); 
}
?>



<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            margin: 50px auto;
            width: 400px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
        }
        .error {
            color: red;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 15px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>



<div class="container">
    <h2>Login Form</h2>
    <form method="post" action="">
            Username <input type="text" name="username">
            <span class="error"><?php echo $usernameError; ?></span><br><br>
        <br>
        Password: <input type="password" name="password">
        <span class="error"><?php echo $passwordError; ?></span><br><br>
        <br>
        <input type="submit" name="submit" value="Login">
    </form>
</div>

</body>
</html>
