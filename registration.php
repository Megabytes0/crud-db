<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registration Form</title>
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
</style>
</head>
<body>

<div class="container">
    <h2>Registration Form</h2>
    <form action="#" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>
        <div class="form-group">
            <a href="login.html"><input type="submit" value="Register"></a>
        </div>
    </form>
</div>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate password
    if ($password !== $confirm_password) {
        echo "<script>alert('Password do not match!')</script>";
        echo "<script>window.location='registration.php'</script>";
        exit;
    }

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

    // Insert user data into the database
    $sql = "INSERT INTO DataA (email, password) VALUES ('$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registered Successfully!')</script>";
        echo "<script>window.location='login.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>


</body>
</html>
