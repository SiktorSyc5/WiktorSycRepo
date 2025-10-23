<?php
    $servername = "localhost"; // lokalny serwer
    $username = "root"; // Zmień na swoją nazwę użytkownika | domyślnie root
    $password = ""; // Zmień na swoje hasło | domyślnie puste
    $database = "goetel"; // nazwa bazy danych

    // Tworzenie połączenia
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Sprawdzanie połączenia
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error() . "<br>");
    }
    echo "Connected successfully <br>";

    $login = $_POST["login"];
    $password = sha1($_POST["password"]); // Szyfrowanie hasła

    $sql = "INSERT INTO MyGuests (login, password) VALUES ('$login', '$password');";
    echo $sql . "<br>";

    if (mysqli_query($conn, $sql)) {
        echo "New user created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
?>