Welcome, <?php echo $_POST["name"]; ?><br>
Your email adress is: <?php echo $_POST["email"]; ?>


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

    $name = $_POST["name"];
    $email = $_POST["email"];

    // Wstawianie danych do tabeli
    $sql = "INSERT INTO MyGuests (firstname, email) VALUES ('$name', '$email');";
    echo $sql . "<br>";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully <br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }

    mysqli_close($conn);
?>