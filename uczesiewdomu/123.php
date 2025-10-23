<?php
// db_config.php
// Dostosuj dane jeżeli nie używasz domyślnego XAMPP (root bez hasła).
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = ''; // w XAMPP domyślnie puste
$DB_NAME = 'goetel';

$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

if ($mysqli->connect_errno) {
    // elegancki błąd, nie wyświetlaj hasła ani szczegółów w produkcji
    die("Błąd połączenia z bazą danych: " . $mysqli->connect_error);
}
