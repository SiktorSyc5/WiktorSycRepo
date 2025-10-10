<?php
//Inheritance - dziedziczenie

class Strawberry extends Fruit {

public function message() {

echo "Am I a fruit or a berry? ";

}

}

// Try to call all three methods from outside class

$strawberry = new Strawberry ("Strawberry", "red"); //

OK. construct() is public

$strawberry->message(); // OK. message() is public

$strawberry->intro(); // ERROR. intro() is protected
