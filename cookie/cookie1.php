<?php
//odczytujemy o podanej zazwie i ciastko o terminie ważnosci 1 doby
$cookie_name = "user";
$cookie_value = "john doe";
$cookie_expire = time() + (24*60*60);
setcookie($cookie_name, $cookie_value, $cookie_expire);
?>