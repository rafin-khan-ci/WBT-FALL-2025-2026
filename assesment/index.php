<?php
$length = 10;
$width = 5;
$area = $length * $width;
$perimeter = 2 * ($length + $width);
echo "Area:  $area <br> ";
echo "Perimeter: $perimeter <br>";
?>
<br>
<br>

<?php
$amount = 500; 
$vat = $amount * 0.15; 
echo "Amount: $" . $amount . "<br>";
echo "VAT (15%): $" . $vat . "<br>";
?>
<br>
<br>

<?php
$number = 7; 

if ($number % 2 == 0) {
    echo $number . " is Even";
} else {
    echo $number . " is Odd";
}
?>
<br>
<br>
<?php
$num1 = 15;
$num2 = 8;
$num3 = 22;

if ($num1 >= $num2 && $num1 >= $num3) {
    $largest = $num1;
} elseif ($num2 >= $num1 && $num2 >= $num3) {
    $largest = $num2;
} else {
    $largest = $num3;
}

echo "Numbers: " . $num1 . ", " . $num2 . ", " . $num3 . "<br>";
echo "Largest number is: " . $largest;
?>
<br>
<br>
<?php
echo "Odd numbers between 10 and 100:<br>";

for($i = 10; $i <= 100; $i++) {
    if($i % 2 != 0) {
        echo $i . " ";
    }
}
?>
<br>
<br>
<?php
$numbers = [10, 20, 30, 40, 50];
$search = 30;

for($i = 0; $i < count($numbers); $i++) {
    if($numbers[$i] == $search) {
        echo "$search found at index " . ($i);
        break;
    }
}
?>
<br>
<br>
<?php
echo "Triangle <br>";
for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= $i; $j++) {
        echo "* ";
    }
    echo "<br>";
}

echo "Number <br>";
for($i = 3; $i >= 1; $i--) {
    for($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}

echo "Alphabet <br>";
$letter = 'A';
for($i = 1; $i <= 3; $i++) {
    for($j = 1; $j <= $i; $j++) {
        echo $letter . " ";
        $letter++;
    }
    echo "<br>";
}
?>