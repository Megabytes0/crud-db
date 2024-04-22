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
<body>
    <h1>Edit User</h1>
    <form action="update.php" method="POST">
        <div class="inputss">
        <input type="hidden" name="edit_id" value="<?php echo $edit_id; ?>">
        <input type="text" name="username" value="<?php echo $username; ?>">
        <input type="text" name="fullname" value="<?php echo $fullname; ?>">
        <input type="text" name="course" value="<?php echo $course; ?>">
        <input type="email" name="email" value="<?php echo $email; ?>">
        <input type="text" name="contact" value="<?php echo $contact; ?>">
        <button type="submit" value="submit" name="submit">Save</button>
    </form>
    </div>

</body>
</html>
