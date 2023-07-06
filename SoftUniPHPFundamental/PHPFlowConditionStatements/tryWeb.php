<html>
    <head>
        <title>calculation</title>
    </head>
    <body>
        <form method="get">
            <div>
                Operation:
                <select name ="operation">
                    <option value ="sum">SUM</option>
                    <option value ="sub">SUB</option>
                </select> 
            </div>
            <div>
                Number 1:
                <input type="text" name="number_one"/>
            </div>
            <div>
                Number 2:
                <input type="text" name="number_two"/>
            </div>
            <div>
                <input type="submit" name="calculate" value ="Calculate!"/>
            </div>
            <?php
            $operation = '';
            if (isset($_GET['calculate'])){
                $operation = $_GET['operation'];
                if (!is_numeric($numberOne = $_GET['number_one'])){
                    throw new Exception("Number one is string, shut be number", 1);
                }
                else{
                    $numberOne = $_GET['number_one'];
                }
                if (!is_numeric($numberTwo = $_GET['number_two'])){
                    throw new Exception("Number two is string, shut be number", 2); 
                }
                else{
                    $numberOne = $_GET['number_one'];     
            echo "<ul>";      
            }
            if ($operation === "sum"){
                echo "<li style='color: red'>" . ($numberOne + $numberTwo) . "</li>";
            }
            elseif ($operation === 'sub'){
                echo "<li style='color: red'>" . ($numberOne - $numberTwo) . "</li>";
            }
            echo "</ul>";
        }
            ?>
        </form>
    </body>
</html>
