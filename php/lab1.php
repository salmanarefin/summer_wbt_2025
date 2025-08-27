<?php

// 8

echo "<h3>1. Simple Interest</h3>";
$principal = 1000;
$rate = 5;
$time = 2;
$si = ($principal * $rate * $time) / 100;
echo "Principal: $principal, Rate: $rate%, Time: $time years<br>";
echo "Simple Interest = $si <br><br>";


// 9

echo "<h3>2. Swap Two Numbers</h3>";
$a = 10;
$b = 20;
echo "Before Swap: a = $a, b = $b<br>";
$a = $a + $b;
$b = $a - $b;
$a = $a - $b;
echo "After Swap: a = $a, b = $b<br><br>";


// 10

echo "<h3>3. Leap Year Check</h3>";
$year = 2024;
if (($year % 4 == 0 && $year % 100 != 0) || ($year % 400 == 0)) {
    echo "$year is a Leap Year<br><br>";
} else {
    echo "$year is NOT a Leap Year<br><br>";
}


// 11

echo "<h3>4. Factorial</h3>";
$num = 5;
$fact = 1;
for ($i = 1; $i <= $num; $i++) {
    $fact *= $i;
}
echo "Factorial of $num = $fact<br><br>";

// 12

echo "<h3>5. Prime Numbers (1 to 50)</h3>";
for ($i = 2; $i <= 50; $i++) {
    $isPrime = true;
    for ($j = 2; $j <= sqrt($i); $j++) {
        if ($i % $j == 0) {
            $isPrime = false;
            break;
        }
    }
    if ($isPrime) {
        echo $i . " ";
    }
}
echo "<br><br>";


// 13

echo "<h3>6. Patterns</h3>";

echo "<b>Pattern 1</b><br>";
for ($i = 5; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}
echo "<br>";

echo "<b>Pattern 2</b><br>";
for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}
echo "<br>";

echo "<b>Pattern 3</b><br>";
$char = 'A';
for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $char . " ";
    }
    $char++;
    echo "<br>";
}

?>
