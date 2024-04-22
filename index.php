
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Stundent Entry</title>
</head>
<body>
    <div class="container">
 <form action="#" method="post">
    <div class="row">
                <div class="inputs">
                    <h2>Entries</h2>
					<input type="text" name="username" placeholder="Username">
					<input type="text" name="fullname" placeholder="Full Name">
                    <input type="text" name="course" placeholder="Course">
                    <input type="email" name="email" placeholder="Email">
					<input type="text" name="contact" placeholder="Contact">
                    <button type="submit" value="submit" name="submit">Save</button>
                </div>
          </div>
        </div>
  <div class="column2">
  <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            margin: 50px;
            border: 2px solid black;
            padding: 8px;
        }
        th {
            background-color: gray;
        }
    </style>


<?php
include 'config.php';

$sql = "SELECT * FROM DataB";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr> <th>username</th> <th>fullname</th> <th>course</th> <th>email</th> <th>contact</th> </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["username"] . "</td>";
        echo "<td>" . $row["fullname"] . "</td>";
        echo "<td>" . $row["course"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["contact"] . "</td>";
        echo "<td><a href='delete.php?delete_id=" . $row["user_id"] . "'>Delete</a></td>";
        echo "<td><a href='edit.php?edit_id=" . $row["user_id"] . "'>Edit</a></td>";
        echo "</tr>";
    }
}
$connection->close();

?>
    
</div>
</div>


<?php
include 'config.php';
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $course = $_POST['course'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $sql = "INSERT INTO DataB (username, fullname, course, email, contact) VALUES ('$username', '$fullname', '$course', '$email', '$contact')";
    
    if(mysqli_query($connection, $sql)) {
        echo "<script>alert('Saved Successfully!')</script>";
        echo "<script>window.location='Index.php'</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}
?>
</form>
</body>
</html>