<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of creatingConstruct
 *
 * @author hrist
 */
class creatingConstruct {
    public $name;
    public $age;
    
    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
        echo $this->name . " " . $this->age;
    }
}

$name = readline();
$age = intval(readline());

$person = new creatingConstruct($name, $age);
