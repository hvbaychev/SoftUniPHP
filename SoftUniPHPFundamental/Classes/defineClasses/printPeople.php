<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of printPeople
 *
 * @author hrist
 */
class printPeople {
    public $name;
    public $age;
    public $occupation;
    
    public function __construct($name, $age, $occupation) {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getOccupation() {
        return $this->occupation;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setAge($age): void {
        $this->age = $age;
    }

    public function setOccupation($occupation): void {
        $this->occupation = $occupation;
    }

    public function __toString() {
        return $this->name . " - age: " . $this->age . ", occupation: " . $this->occupation;

    }
    

}

$command = readline();
$data = [];

while ($command != "END"){
    $input = explode(' ', $command);
    list($name, $age, $occupation) = $input;
    $age = intval($age);
    
    $person = new printPeople($name, $age, $occupation);
    $data[] = $person;
    
    $command = readline();
}

usort($data, function($person1, $person2) {
    return $person1->getAge() <=> $person2->getAge();
});

foreach ($data as $person) {
    echo $person . PHP_EOL;
}