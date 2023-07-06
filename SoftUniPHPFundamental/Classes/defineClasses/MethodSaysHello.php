<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of MethodSaysHello
 *
 * @author hrist
 */
class MethodSaysHello {
    public $name;
    
    public function __construct($name) {
        $this->name = $name;
    }
    public function __toString() {
        return $this->name . ' ' . 'says "Hello"!';
    }
}

$name = readline();
$person = new MethodSaysHello($name);
echo $person;