<?php

$filename = "webdictionary.txt";

// Otwórz plik do odczytu
$myfile = fopen($filename, "r") or die("Unable to open file!");

// Odczytaj zawartość pliku
echo fread($myfile, filesize($filename));

// Zamknij plik
fclose($myfile);

?>