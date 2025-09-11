<?php

echo <<<'EOD'
Jakisik cosik fajny  ukosnicki /\ i bedzie git
EOD;
echo "<br>";

echo strlen ("<br>siema!"); //outputs 6

echo "<br>";

echo strlen ("<br>Łódź"); //outputs 7

echo "<br>";

echo mb_strlen ("<br>Łódź"); //outputs 4

echo "<br>";

echo str_word_count ("<br>siema swiecie"); //2

echo "<br>";

echo str_replace("World", "Dolly", "Hello world");

echo "<br>";

echo strpos ("hello world!", "world");

echo <"br">;

$tekst = "hello";

printf ("%s"\n, $tekst); //wypisze {hello}

printf ("%10s"\n, $tekst); //wypisze {          hello}
printf ("%-10s"\n, $tekst); //wypisze {hello         }
printf ("%.3s"\n, $tekst); //wypisze {hel}
printf ("%10.3s"\n, $tekst); //wypisze {          hel}
printf ("%-10.3s"\n, $tekst); //wypisze {hel          }


$n = 36346634;
printf ("%%d = '%d'\n", $n);
printf ("%%f = '%f'\n", $n);
printf ("%%e = '%e'\n", $n);
printf ("%%b = '%b'\n", $n);
printf ("%%o = '%o'\n", $n);
printf ("%%s = '%s'\n", $n);
printf ("%%x = '%x'\n", $n);
