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

    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $fav_language = $_POST["fav_language"];

    $sql = "INSERT INTO MyGuests (firstname, lastname, fav_language) VALUES ('$firstName', '$lastName', '$fav_language');";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }