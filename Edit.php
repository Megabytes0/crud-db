<?php
include 'config.php';

// Check if edit_id parameter is provided
if(isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Fetch user data from dbziru table
    $result = mysqli_query($connection, "SELECT * FROM DataB WHERE user_id='$edit_id'");
    $row = mysqli_fetch_assoc($result);

    // Assign fetched data to variables
    $username = $row['username'];
    $fullname = $row['fullname'];
    $course = $row['course'];
    $email = $row['email'];
    $contact = $row['contact'];
} else {
    // Redirect if edit_id is not provided
    header("Location: Edit.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Edit User</title>
</head>
<style>body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

h1 {
    text-align: center;
}

.inputs {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 300px;
}

.inputs input {
    width: 100%;
    margin-bottom: 10px;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ccc;
}

.inputs button {
    width: 100%;
    padding: 8px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    cursor: pointer;
}

.inputs button:hover {
    background-color: #0056b3;
}
</style>
<body>
    <div>
    <h1>Edit User</h1>
    <div class="container">
    <form action="update.php" method="POST"></div>
        <div class="inputs">
            <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
            <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
            <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="Full Name">
            <input type="text" name="course" value="<?php echo $course; ?>" placeholder="Course">
            <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Email">
            <input type="text" name="contact" value="<?php echo $contact; ?>" placeholder="Contact">
            <button type="submit" value="submit" name="submit">Save</button>
        </div>
    </div>
    </form>
</body>
</html>

