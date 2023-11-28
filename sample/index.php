<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    // single line comment
    # single line comment
    echo "Hello";
    echo "<br>";
    $num1 = 4;

    $num2 = 10;
    echo $num1 + $num2;
    echo "<hr>";
    $name = "Brad";
    
    define("PI", 3.14); // constant variable
    echo PI;
    $numbers = array(1,2,3,4,5); // array
    $list = [1,2,3,4,5]; // array

    for($i = 0; $i < count($numbers); $i++){
        echo $numbers[$i];
        echo "<br>";
    }

    foreach($numbers as $number){
        echo $number;
        echo "<br>";
    }
    /**S
     * 
     * multi line comment
     */
    ?>
</body>
</html>