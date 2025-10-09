<?php

setcookie("uczen", "", time() - 3600, "/");
echo "<h2>Usuwanie ciasteczka:</h2>";
echo "Ciasteczko 'uczen' zostało usunięte (ustawiono czas w przeszłości).<hr>";


echo "<h2>Sprawdzenie po usunięciu:</h2>";
if (isset($_COOKIE["uczen"])) {
    echo " Ciasteczko 'uczen' nadal istnieje!<br>";
    echo "Wartość: <b>" . $_COOKIE["uczen"] . "</b>";
} else {
    echo "Ciasteczko 'uczen' zostało pomyślnie usunięte!";
}
?>
