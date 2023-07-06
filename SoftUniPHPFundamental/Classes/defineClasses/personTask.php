<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of personTask
 *
 * @author hrist
 */
class personTask {
    public $name;
    public $age;
}

$person = new personTask();
echo count(get_object_vars($person));
