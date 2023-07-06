<?php
/*
Дефинирайте клас "Служител", който съдържа следната информация: име, заплата, позиция, отдел, имейл и възраст.
 Името, заплатата, позицията и отделът са задължителни, докато останалите са опционални.
Вашата задача е да напишете програма, която приема N реда със служители от конзолата 
и изчислява отдела с най-висока средна заплата и извежда за всеки служител от този отдел неговото име, 
заплата, имейл и възраст - подредени по заплата в низходящ ред. Ако служителят няма имейл - 
вместо това поле трябва да се отпечата "n/a", ако няма възраст - да се отпечата "-1". 
Заплатата трябва да се отпечата до две десетични цифри след разделителя.
*/

class employee{
    private $name;
    private $salary;
    private $position;
    private $department;
    private $email;
    private $age;
    

    public function __construct($name, $salary, $position, $department, $email = "n/a", $age = -1)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email;
        $this->age = $age;
    }

    public function getName(){
        return $this->name;
    }
    public function getSalary(){
        return $this->salary;
    }
    public function getPosition(){
        return $this->position;
    }
    public function getDepartment(){
        return $this->department;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getAge(){
        return $this->age;
    }
}
    $workers = array();

    $numberOfEmployee = intval(fgets(STDIN));
    for ($i = 0; $i < $numberOfEmployee; $i++){
        $infoForEmployee = trim(fgets(STDIN));
        list($name, $salary, $position, $department, $email, $age) = explode(' ', $infoForEmployee);
        if (is_numeric($email)){
            $age = $email;
            $email = "n/a";
        }
        if (is_string($email) && (!isset($age))){
            $age = -1;
        }
        $worker = new employee($name, $salary, $position, $department, $email, $age);
        array_push($workers, $worker);
    }
    var_dump($workers);
    
$departments = [];

foreach ($workers as $worker) {
    if (array_key_exists($worker->getDepartment(), $departments)){
         $departments[$worker->getDepartment()]++;
    }
    else{
        $departments[$worker->getDepartment()] = 1;
    }
}
$averageSalaries = [];
foreach ($departments as $department => $count) {
    $averageSalary = 0;
    foreach ($workers as $worker) {
        if ($worker->getDepartment() == $department){
            $averageSalary += $worker->getSalary();
        }
    }
    $averageSalary /= $count;
    $averageSalaries[$department] = $averageSalary;
}
$highestDep = array_search(max($averageSalaries), $averageSalaries);

echo "Highest average salary : " . $highestDep.PHP_EOL;



for ($i=0; $i < count($workers); $i++) { 
    if ($workers[$i]->getDepartment() == $highestDep){
        echo $workers[$i]->getName() . ' ' . number_format($workers[$i]->getSalary(), 2) . ' ' . $workers[$i]->getEmail() . ' ' . $workers[$i]->getAge().PHP_EOL;
    }
}