<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of NumberInReversedOrder
 * Write a class DecimalNumber that has a method that prints all its digits in reversed order.
 * @author hrist
 */
class DecimalNumber {
    private $value;

    public function __construct($value) {
        $this->value = strval($value);
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($value): void {
        $this->value = strval($value);
    }

    public function reverseNumber(): string {
        $count = strlen($this->value);
        $newNumber = '';
        for ($i = $count - 1; $i >= 0; $i--) {
            $newNumber .= $this->value[$i];
        }
        return $newNumber;
    }
}

$n = floatval(readline());
$number = new DecimalNumber($n);
echo $number->reverseNumber();
