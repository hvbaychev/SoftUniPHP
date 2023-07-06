<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Largest Common End</title>
</head>
<body>
    <form method="get">
    First Array:<input type="text" name="text_one">
    Second Array:<input type="text" name="text_two">
    Submit:<input type="submit" name="submit">
    </form>
    <?php
    if (isset($_GET['submit'])){
        $inputFirst = explode(' ', $_GET['text_one']);
        $inputSecond = explode(' ', $_GET['text_two']);
        
        $compareArrays = array_intersect($inputFirst, $inputSecond);
        $count = 0;
        foreach ($compareArrays as $compare){
            $count++;
        }
        echo "<div>Number of common elements: " . $count . "</div>";
    }
    ?>
</body>
</html>

