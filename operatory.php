<?php

$a = 3;

$b = &$a;

print "$a\n";
print "$b\n";

$a = 4;

print "$a\n";
print "$b\n";

echo "<h3>Postincrement</h3>";

echo "Should be 5:<br />\n";

$a = 5;
echo $a++ . "<br />\n";

echo "Should be 6: " . $a . "<br />\n";

echo "<h3>Preincrement</h3>";

$a = 5;

echo "Should be 6: " . ++$a . "<br />\n";

echo "Should be 6: " . $a . "<br />\n";

?>