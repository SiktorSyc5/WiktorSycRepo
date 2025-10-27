<?php
$conn = new mysqli("localhost", "root", "", "kalendarz");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sierpniowy kalendarz</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id="baner1">
        <h1>Organizer: SIERPIEŃ</h1>
    </div>

    <div id="baner2">
        <form action="organizer.php" method="post">
            <label for="wydarzenie">Zapisz wydarzenie:</label>
            <input type="text" name="wydarzenie" id="wydarzenie">
            <button type="submit" name="send">OK</button>
        </form>
        <?php
        
        if (isset($_POST['send'])) {
            $wydarzenie = $_POST['wydarzenie'];
            $sql = "UPDATE zadania SET wpis = '$wydarzenie' WHERE dataZadania = '2020-08-09';";
            $result = $conn->query($sql);
        }
        ?>
    </div>

    <div id="baner3">
        <img src="logo2.png" alt="sierpień">
    </div>

    <main>
        <?php
        
        $sql = "SELECT dataZadania, wpis FROM zadania WHERE miesiac = 'sierpien';";
        $result = $conn->query($sql);

        while ($row = $result->fetch_array()) {
            echo "<div>";
            echo "<h5>".$row[0]."</h5>";
            echo "<p>".$row[1]."</p>";
            echo "</div>";
        }
        ?>
    </main>

    <footer>
        <p>Stronę wykonał: Wiktor</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>