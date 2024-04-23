<?php
session_start()
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        .form-group input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .signup-link {
            margin-top: 10px;
            text-align: center;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Login Form</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <a href="index.php"><input type="submit" value="Login"></a>
                <div class="signup-link">
                    <span>Don't have an account?</span>
                    <a href="registration.php">Sign Up</a>
                </div>
            </div>
        </form>
    </div>
    <?php

    // Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Database connection
    $servername = "localhost"; // Change as per your database configuration
    $dbusername = "root"; // Change as per your database configuration
    $dbpassword = ""; // Change as per your database configuration
    $dbname = "DataB"; // Change as per your database configuration

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to fetch user data
    $stmt = $conn->prepare("SELECT * FROM DataA WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);

    // Execute query
    $stmt->execute();

    // Get result
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows > 0) {
        // User exists, redirect to dashboard or another page
        $_SESSION['email'] = $email; // Store user's email in session
        header("Location: index.php");
        exit;
    } else {
        // User does not exist or wrong credentials, display error message
        echo "<script>alert('Invalid email or password!')</script>";
        echo "<script>window.location='login.php'</script>";
    }

    // Close connections
    $stmt->close();
    $conn->close();
    }
    ?>

</body>
</html>