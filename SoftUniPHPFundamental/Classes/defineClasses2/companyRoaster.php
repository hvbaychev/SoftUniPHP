<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of companyRoaster
 * Define a class Employee that holds the following information: name, salary, position, department, email and age.
 *  The name, salary, position and department are mandatory while the rest are optional. 
 *  Your task is to write a program which takes N lines of employees from the console and calculates 
 * the department with the highest average salary and prints for each employee in that department his name, 
 * salary, email and age – sorted by salary in descending order. If an employee doesn’t have an email – 
 * in place of that field you should print “n/a” instead, if he doesn’t have an age – print “-1” instead. The salary 
 * should be printed to two decimal places after the seperator.
 *
 *
 * @author hrist
 */
class CompanyRoster {

    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;
    private $employees = [];

    public function __construct(string $name, float $salary, string $position, string $department, string $email = null, int $age = null) {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    public function addEmployee(CompanyRoster $employee) {
        $this->employees[] = $employee;
    }

    public function getName() {
        return $this->name;
    }

    public function getSalary() {
        return $this->salary;
    }

    public function getPosition() {
        return $this->position;
    }

    public function getDepartment() {
        return $this->department;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAge() {
        return $this->age;
    }

    public function getEmployees() {
        return $this->employees;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setSalary($salary): void {
        $this->salary = $salary;
    }

    public function setPosition($position): void {
        $this->position = $position;
    }

    public function setDepartment($department): void {
        $this->department = $department;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setAge($age): void {
        $this->age = $age;
    }

    public function setEmployees($employees): void {
        $this->employees = $employees;
    }

    public function checker() {
        if (isset($this->name)) {
            $this->name = $this->name;
        }
        if (isset($this->salary)) {
            $this->salary = $this->salary;
        }
        if (isset($this->position)) {
            $this->position = $this->position;
        }
        if (isset($this->department)) {
            $this->department = $this->department;
        }
        if (isset($this->email) && isset($this->age)) {
            $this->email = $this->email;
            $this->age = $this->age;
        } elseif (!isset($this->email) && !isset($this->age)) {
            $this->email = null;
            $this->age = null;
        } elseif (isset($this->email) && !isset($this->age)) {
            if (preg_match('/@/', $this->email)) {
                $this->email = $this->email;
                $this->age = null;
            }
            if (preg_match('/\d/', $this->email)) {
                $this->age = $this->email;
                $this->email = null;
            }
        }
    }

}

$line = intval(readline());
$employees = [];

while ($line > 0) {
    list($name, $salary, $position, $department, $email, $age) = explode(' ', readline());
    $salary = floatval($salary);

    $employee = new CompanyRoster($name, $salary, $position, $department, $email, $age);
    $employee->checker();

    $employees[] = $employee;
    $line--;
}



foreach ($employees as $employee) {
    echo $employee->getEmail() . PHP_EOL;
}

