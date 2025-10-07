<?php
    // Obliczenie dnia studniówki (100 dni przed maturą)
    $dataMatury = mktime(0, 0, 0, 5, 4, 2026); // 4 maja 2026
    $dataStudniowki = $dataMatury - (100 * 24 * 60 * 60); // odejmowanie 100 dni w sekundach
    echo "Studniówka wypada w dniu: " . date("d.m.Y", $dataStudniowki);
?>
