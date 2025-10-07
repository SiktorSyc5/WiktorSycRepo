<?php
    // sprawdzenie dnia tygodnia urodzenia
    $dataUrodzenia = "2006-10-11"; // format RRRR-MM-DD
    $timestamp = strtotime($dataUrodzenia);
    echo "Data urodzenia: $dataUrodzenia <br>";
    echo "Urodziłeś się w dniu: " . date("l", $timestamp); // l - pełna nazwa dnia tygodnia


    // za pomocą mktime()
    $dataUrodzenia2 = mktime(0, 0, 0, 10, 11, 2006); // 11 października 2006
    echo "<br>Data urodzenia: " . date("Y-m-d", $dataUrodzenia2) . " <br>";
    echo "Urodziłeś się w dniu: " . date("l", $dataUrodzenia2); // l - pełna nazwa dnia tygodnia
?>
