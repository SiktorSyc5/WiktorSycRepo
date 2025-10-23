<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "goetel";

$conn = mysqli_connect($servername, $username, $password);
if(!conn){
    die("Connection failed: " . mysqli_connection_error());
}
else``{
    echo "Connected successfully<br>";
}   

<form action="register.php" method="post">
    Login: <input type="text" name="name" required><br>
    Password: <input type="password" name="haslo" required><br>
    <input type="submit" value="Zarejestruj">
</form>

