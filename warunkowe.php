<?php
$hour = date("H"); // get the current hour
if ($hour < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
}
echo "<br>";
$c = 2;
$d = 1;

if ($c > $d) {
    echo "c is bigger than d";
}
echo "<br>";

$liczba=10;

$wynik=($liczba>=0)?"dodatnia":"ujemna";

echo $wynik;
echo "<br>";    

$favcolor = "red";

switch ($favcolor) {

case "red":

echo "Your favorite color is red!";

break;

case "blue":

echo "Your favorite color is blue!";

break;

default:

echo "Your favorite color is neither red, blue, nor green!";

}

?>