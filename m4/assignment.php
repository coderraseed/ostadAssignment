<?php
//Write a PHP function to sort an array of strings by their length, in ascending order
echo "Write a PHP function to sort an array of strings by their length, in ascending order \n";
echo "============";
echo PHP_EOL;
function sort_by_length( array $strings ): array{
    usort( $strings, function ( $a, $b ) {
        return strlen( $a ) - strlen( $b );
    } );
    return $strings;
}
$strings       = ["banana", "apple", "orange", "strawberry", "kiwi"];
$sortedStrings = sort_by_length( $strings );
print_r( $sortedStrings );

//Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string.
echo "Write a PHP function to concatenate two strings, but with the second string starting from the end of the first string \n";
echo "============";
echo PHP_EOL;
function concatenateStrings( $str1, $str2 ) {
    $len1   = strlen( $str1 );
    $len2   = strlen( $str2 );
    $result = "";

    // Append the second string in reverse order
    for ( $i = $len2 - 1; $i >= 0; $i-- ) {
        $result .= $str2[$i];
    }

    // Append the first string
    $results = $str1 . " " . $result;

    return $results;
}
$str1   = "Hello";
$str2   = "world";
$result = concatenateStrings( $str1, $str2 );
echo $result;
echo PHP_EOL;
echo PHP_EOL;
echo PHP_EOL;

//Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.
echo "Write a PHP function to remove the first and last element from an array and return the remaining elements as a new array.";
echo "============";
echo PHP_EOL;

function removeFirstAndLastElement( array $array ): array{
    // Remove the first and last element of the array
    array_shift( $array );
    array_pop( $array );

    return $array;
}
$array    = ["apple", "banana", "orange", "pear"];
$newArray = removeFirstAndLastElement( $array );
print_r( $newArray );
echo PHP_EOL;
echo PHP_EOL;

//Write a PHP function to check if a string contains only letters and whitespace
echo "Write a PHP function to check if a string contains only letters and whitespace \n";
echo "============";
echo PHP_EOL;
function letters_whitespace( $str ) {
    return preg_match( '/^[a-zA-Z\s]+$/', $str );
}
echo PHP_EOL;
$str1 = "Hello world";
$str2 = "This is a sentence";
$str3 = "1234";
$str4 = "Hello, world!";

echo letters_whitespace( $str1 ) . "\n"; // Outputs 1
echo letters_whitespace( $str2 ) . "\n"; // Outputs 1
echo letters_whitespace( $str3 ) . "\n"; // Outputs 0
echo letters_whitespace( $str4 ) . "\n"; // Outputs 0
echo PHP_EOL;
echo PHP_EOL;
//Write a PHP function to find the second largest number in an array of numbers.
echo "Write a PHP function to find the second largest number in an array of numbers. \n";
echo "============";
echo PHP_EOL;
echo PHP_EOL;
function findSecondLargestNumber( array $arr ): int {
    // Sort the array in descending order
    rsort( $arr );

    // Return the second largest number
    return $arr[1];
}
$arr           = [1, 5, 3, 8, 4, 9];
$secondLargest = findSecondLargestNumber( $arr );
echo $secondLargest;