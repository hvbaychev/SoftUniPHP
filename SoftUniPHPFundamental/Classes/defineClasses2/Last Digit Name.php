<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Last Digit Name
 *
 * @author hrist
 */
class LastDigitName {
    /*
     * @var int
     */
    public $number;

    public function __construct(int $number) {
        $this->number = $number;
    }
    
    public function lastNumber(): string {
        $lastNumber = $this->number % 10;

        if ($lastNumber === 0) {
            return "zero";
        } elseif ($lastNumber === 1) {
            return "one";
        } elseif ($lastNumber === 2) {
            return "two";
        } elseif ($lastNumber === 3) {
            return "three";
        } elseif ($lastNumber === 4) {
            return "four";
        } elseif ($lastNumber === 5) {
            return "five";
        } elseif ($lastNumber === 6) {
            return "six";
        } elseif ($lastNumber === 7) {
            return "seven";
        } elseif ($lastNumber === 8) {
            return "eight";
        } elseif ($lastNumber === 9) {
            return "nine";
        }
    }

}

$n = intval(readline());
$number = new LastDigitName($n);
echo $number->lastNumber();
