

<form action="login.php" method="post">
Login: <input type="text" name="login"><br>
Hasło: <input type="password" name="haslo"><br>
<input type ="submit">
</form>
<?php
$servername = "localhost";
$username = "root";   // "root"
$password = "";   // "" 
$dbname = "goetel";
// Utwórz połączenie
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// przetwarzaj tylko gdy metoda POST (unika undefined index)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login = $_POST['login'] ?? '';
    $password = isset($_POST['haslo']) ? sha1($_POST['haslo']) : '';

    if ($login === '' || $password === '') {
        echo "Podaj login i hasło.";
    } else {
        // sprawdź czy kolumna 'login' istnieje w MyGuests, żeby nie dostać fatal error
        $colCheck = mysqli_query($conn, "SHOW COLUMNS FROM MyGuests LIKE 'login'");
        if ($colCheck === false) {
            echo "Błąd sprawdzania struktury tabeli: " . mysqli_error($conn);
        } elseif (mysqli_num_rows($colCheck) === 0) {
            mysqli_free_result($colCheck);
            echo "Tabela MyGuests nie zawiera kolumny 'login'. Użyj właściwej tabeli/kolumny.";
        } else {
            mysqli_free_result($colCheck);

            // escapowanie loginu przed wstawieniem do zapytania (bez stmt zgodnie z życzeniem)
            $login_esc = mysqli_real_escape_string($conn, $login);

            $sql="SELECT login, password FROM MyGuests WHERE login='$login_esc'";
            if($result = mysqli_query($conn, $sql)){
                $row = mysqli_fetch_assoc($result);
                if ($row && $password == $row['password']){
                    echo "Zalogowano pomyślnie";
                } else {
                    echo "Błędne hasło lub użytkownik nie istnieje";
                }
                mysqli_free_result($result);
            } else {
                echo "Błąd zapytania: " . mysqli_error($conn);
            }
        }
    }
}

mysqli_close($conn);
?>
// ...existing code...