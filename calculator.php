<?php

// Get user input
$num1 = $_POST['num1'];
$num2 = isset($_POST['num2']) ? $_POST['num2'] : null;
$operator = $_POST['operator'];

// Function for basic arithmetic operations
function calculate($num1, $num2, $operator) {
  if ($operator === '+' ) {
    return $num1 + $num2;
  } else if ($operator === '-') {
    return $num1 - $num2;
  } else if ($operator === '*') {
    return $num1 * $num2;
  } else if ($operator === '/') {
    if ($num2 === 0) {
      return "Error: Cannot divide by zero";
    } else {
      return $num1 / $num2;
    }
  } else {
    return "Invalid operator";
  }
}

// Function for exponentiation
function power($num1, $num2) {
  return $num1**$num2;
}

// Function for percentage calculation
function percentage($num1, $num2) {
  return ($num1 / 100) * $num2;
}

// Function for square root
function squareRoot($num) {
  return sqrt($num);  
}

// Function for logarithm (base 10)
function logarithm($num) {
  return log10($num);  
}

$result = null;

// Perform calculation based on operator
switch ($operator) {
  case '+':
  case '-':
  case '*':
  case '/':
    $result = calculate($num1, $num2, $operator);
    break;
  case '^':
    $result = power($num1, $num2);
    break;
  default:
    $result = "Invalid operation";
}

// Handle unary operations (percentage, square root, logarithm)
if ($num2 === null && ($operator === '%' || $operator === 'sqrt' || $operator === 'log')) {
  switch ($operator) {
    case '%':
      $result = percentage($num1, 100); // Calculate percentage of 100
      break;
    case 'sqrt':
      $result = squareRoot($num1);
      break;
    case 'log':
      $result = logarithm($num1);
      break;
  }
}

// Redirect to index.html with result
header("Location: index.html?result=" . urlencode($result));

?>
