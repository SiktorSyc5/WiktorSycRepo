<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "goetel";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$login = $_POST["name"];
$haslo = sha1($_POST["haslo"]); // fixed: 'shal' → 'sha1'

$sql = "SELECT login, password FROM MyGuests WHERE login='$login'";

$result = mysqli_query($conn, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    if ($row && $haslo === $row['password']) {
        echo "Zalogowano pomyślnie";
    } else {
        echo "Błąd: nieprawidłowy login lub hasło.";
    }
} else {
    echo "Błąd zapytania: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
