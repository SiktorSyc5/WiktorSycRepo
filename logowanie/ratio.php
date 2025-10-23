<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "goetel";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$lastname=$_POST["lastname"];

$fav_language= $_POST["fav_language"];

$sql = "INSERT INTO MyGuests (firstname, lastname, fav_language)

VALUES ('$firstname', '$lastname', '$fav_language')";

if (mysqli_query($conn, $sql)) {

echo "New record created successfully";

} else {

echo "Error: "

$sql. "<br>".

mysqli_error($conn)



}
