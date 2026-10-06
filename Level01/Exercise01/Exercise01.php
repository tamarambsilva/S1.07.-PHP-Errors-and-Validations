<?php

$num1 = 10;
$num2 = 0;

try {
    if ($num2 == 0) {
        throw new Exception("Cannot divide by zero");
    }

    $result = $num1 / $num2;

    echo "Result: " . $result;
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
