
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "goetel";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Utwórz tabelę users jeśli nie istnieje
$sql_create = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    login VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
if (!mysqli_query($conn, $sql_create)) {
    die("Error creating users table: " . mysqli_error($conn));
}

// Upewnij się, że masz tabelę users:
// CREATE TABLE IF NOT EXISTS users (id INT AUTO_INCREMENT PRIMARY KEY, login VARCHAR(100) UNIQUE NOT NULL, password VARCHAR(255) NOT NULL);
?>
<!-- prosty formularz rejestracji -->
<form action="register.php" method="post">
    Login: <input type="text" name="name" required><br>
    Password: <input type="password" name="haslo" required><br>
    <input type="submit" value="Zarejestruj">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $login = trim($_POST['name'] ?? '');
    $pass = $_POST['haslo'] ?? '';

    if ($login === '' || $pass === '') {
        echo "Wypełnij wszystkie pola.";
    } else {
        // użycie SHA1 zgodnie z prośbą (uwaga: SHA1 nie jest rekomendowany do haseł)
        $hash = sha1($pass);

        // uproszczone zapytanie bez prepared statements, ale z escapowaniem
        $login_esc = mysqli_real_escape_string($conn, $login);
        $hash_esc  = mysqli_real_escape_string($conn, $hash);

        $sql = "INSERT INTO users (login, password) VALUES ('$login_esc', '$hash_esc')";
        if (mysqli_query($conn, $sql)) {
            echo "Nowy użytkownik utworzony pomyślnie.";
        } else {
            echo "Błąd podczas tworzenia użytkownika: " . htmlspecialchars(mysqli_error($conn));
        }
    }
}

mysqli_close($conn);
?>
// ...existing code...