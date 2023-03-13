<?php 
// Answer to the NO-1 
function even_odd($number) {
    if ($number % 2 == 0) {
        return "The number is Even Number";
    } else {
        return "The number in Odd Number";
    }
}

echo even_odd(10);

echo PHP_EOL;
// Answer to the NO-2 

$summation = 0;
for ($i=0; $i <=100 ; $i++) {
    $summation += $i;
}
echo "1+2+3...…….100 summation of the series is: {$summation} ";


?>