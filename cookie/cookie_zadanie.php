<?php

$imie = "Wiktor"; 
$nr_z_dziennika = 20; 


$czas_waznosci = time() + ($nr_z_dziennika * 24 * 60 * 60);
setcookie("uczen", $imie, $czas_waznosci, "/");


echo "<h2>Tworzenie ciasteczka:</h2>";
echo "Ciasteczko 'uczen' zostało utworzone (ważne $nr_z_dziennika dni).<br>";
echo "Odśwież stronę, żeby sprawdzić, czy istnieje.<hr>";


echo "<h2>Sprawdzenie ciasteczka:</h2>";
if (isset($_COOKIE["uczen"])) {
    echo " Ciasteczko 'uczen' istnieje!<br>";
    echo "Wartość: <b>" . $_COOKIE["uczen"] . "</b>";
} else {
    echo " Ciasteczko 'uczen' jeszcze nie istnieje (odśwież stronę).";
}
?>
