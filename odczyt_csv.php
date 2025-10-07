<?php

$plik = "dane.txt";


if (file_exists($plik)) {
    $count = (int)file_get_contents($plik);
} else {
    $count = 0;
}


$count++;

file_put_contents($plik, $count);


echo "Odwiedzin: $count";

?>