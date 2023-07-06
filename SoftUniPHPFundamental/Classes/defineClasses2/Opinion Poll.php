<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Opinion Poll
 *
 * @author hrist
 */
class Person {
    private $name;
    private $age;
    private static $persons = [];

    public function __construct(string $name, int $age) {
        $this->name = $name;
        $this->age = $age;
        self::$persons[] = $this;
    }

    public static function getAllPersons() {
        return self::$persons;
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

    public static function printPersonsAboveAge($ageThreshold) {
        $personsAboveAge = [];
        foreach (self::$persons as $person) {
            if ($person->age >= $ageThreshold) {
                $personsAboveAge[] = $person;
            }
        }
        
        // Сортиране на персоните по име
        usort($personsAboveAge, function($person1, $person2) {
            return $person2->getAge() <=> $person1->getAge();
        });
        
        foreach ($personsAboveAge as $person) {
            echo "Name: " . $person->getName() . ", Age: " . $person->getAge() . PHP_EOL;
        }
    }
}

$lines = intval(readline());

while ($lines > 0) {
    list($name, $age) = explode(' ', readline());
    $person = new Person($name, $age);
    $lines--;
}

Person::printPersonsAboveAge(30);
