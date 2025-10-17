Welcome <?php echo $_POST["name"]; ?><br>
Your email address is: <?php echo $_POST["email"]; ?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "goetel";


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";


$name = mysqli_real_escape_string($conn, $_POST["name"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);


$sql = "INSERT INTO MyGuests (firstname, email) VALUES ('$name', '$email')";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>