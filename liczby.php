<?php

$liczba1 = 1;
print("Liczba to: " . $liczba1 . "<br>");

$liczbaOctalna = 042; // liczba ósemkowa (042 = 34 dziesiętnie)
print("Liczba to: " . $liczbaOctalna . "<br>");

$liczbaHex = 0x2A; // liczba szesnastkowa (0x2A = 42 dziesiętnie)
print("Liczba to: " . $liczbaHex . "<br>");

$liczbaBin = 0b1010101; // liczba binarna (0b1010101 = 85 dziesiętnie)
print("Liczba to: " . $liczbaBin . "<br>");

$liczbaDuza = 1_234_567; // zapis z podkreślnikiem dla czytelności (od PHP 7.4)
print("Liczba to: " . $liczbaDuza . "<br>");

$a= 1.234;
$b = 1.2e3 //1.2$*10**3;
$c = 7E-10//7*10***(-10);
$d = 1_234.567;

print("Liczba to: " . $a . "<br>");
print("Liczba to: " . $b . "<br>");
print("Liczba to: " . $c . "<br>");
print("Liczba to: " . $d . "<br>");