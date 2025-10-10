<?php
$plik = "dane.txt";

// Sprawdź, czy plik istnieje
if (file_exists($plik)) {
    // Otwórz plik do odczytu
    $plik_licznik = fopen($plik, "r");
    $count = fgets($plik_licznik, 100);
    fclose($plik_licznik);
} else {
    // Jeśli plik nie istnieje, utwórz go i ustaw licznik na 0
    $count = 0;
    $plik_licznik = fopen($plik, "w");
    fputs($plik_licznik, $count);
    fclose($plik_licznik);
}

// Wyświetl liczbę odwiedzin
echo "Odwiedzin: $count";

// Zwiększ licznik i zapisz do pliku
$count++;
$plik_licznik = fopen($plik, "w");
fputs($plik_licznik, $count);
fclose($plik_licznik);
?>
