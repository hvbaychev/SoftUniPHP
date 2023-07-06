<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Person
 *
 * @author hrist
 */
class Person {
    public $name;
    public $age;
    
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    
    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setAge($age): void {
        $this->age = $age;
    }

    public function __toString() {
        return $this->name . ' ' . $this->age;
    }
    
}

$person = new Person("Pesho", 20);
$person2 = new Person("Stamat", 30);
$person3 = new Person("Petar", 40);
echo $person.PHP_EOL;
echo $person2.PHP_EOL;
echo $person3.PHP_EOL;

echo (count(get_object_vars($person)));