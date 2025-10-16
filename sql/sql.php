
<?php
 
$servername = "localhost";
$username = "root";
$password = "";
$database = "goetel";

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully<br>";

if (!mysqli_select_db($conn, $database)) {
    die("Error selecting database: " . mysqli_error($conn));
}
echo "Database $database selected<br>";

// Utwórz tabelę jeśli nie istnieje
$sql = "CREATE TABLE IF NOT EXISTS MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!mysqli_query($conn, $sql)) {
    die("Error creating table: " . mysqli_error($conn));
}

// Wstaw przykładowe dane tylko jeśli tabela jest pusta
$resultCount = mysqli_query($conn, "SELECT COUNT(*) AS cnt FROM MyGuests");
if (!$resultCount) {
    die("Query error: " . mysqli_error($conn));
}
$rowCount = mysqli_fetch_assoc($resultCount);
mysqli_free_result($resultCount);

if ($rowCount['cnt'] == 0) {
    $sql = "
        INSERT INTO MyGuests (firstname, lastname, email) VALUES
        ('John', 'Doe', 'john@example.com'),
        ('Mary', 'Moe', 'mary@example.com'),
        ('Julie', 'Dooley', 'julie@example.com')
    ";
    if (!mysqli_query($conn, $sql)) {
        echo "Insert error: " . mysqli_error($conn) . "<br>";
    } else {
        echo "Sample records inserted<br>";
    }
}

// Pobierz dane (jedno zapytanie)
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query error: " . mysqli_error($conn));
}

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (count($rows) > 0) {
    echo "<table border='1'><tr><th>id</th><th>firstname</th><th>lastname</th></tr>";
    foreach ($rows as $r) {
        echo "<tr><td>".htmlspecialchars($r['id'])."</td><td>".htmlspecialchars($r['firstname'])."</td><td>".htmlspecialchars($r['lastname'])."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results<br>";
}



$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<ul>";
    while ($row = mysqli_fetch_row($result)) {
        echo "<li>" . htmlspecialchars($row[0]) . " " . htmlspecialchars($row[1]) . " " . htmlspecialchars($row[2]) . "</li>";
    }
    echo "</ul>";
} else {
    echo "Brak wyników";
}


mysqli_free_result($result);
mysqli_close($conn);
?>
