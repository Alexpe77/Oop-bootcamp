<?php

$bananas = [
    'name' => 'Bananas',
    'quantity' => 6,
    'price' => 1,
    'tax' => 0.06
];

$apples = [
    'name' => 'Apples',
    'quantity' => 3,
    'price' => 1.5,
    'tax' => 0.06
];

$bottlesOfWine = [
    'name' => 'Bottles of wine',
    'quantity' => 2,
    'price' => 10,
    'tax' => 0.21
];

$cart = [$bananas, $apples, $bottlesOfWine];

$totalHT = 0;
$totalTax = 0;

foreach ($cart as $item) {
    $totalHT += $item['price'] * $item['quantity'];
    $taxAmount = ($item['price'] * $item['quantity']) * (1 + $item['tax']);
    $totalTax += $taxAmount - ($item['price'] * $item['quantity']);
    echo "Item: {$item['name']} Quantity: {$item['quantity']} Price: {$item['price']} € Tax: " . $item['tax'] * 100 . " %<br>";
}

$totalWithTax = $totalHT + $totalTax;

echo "Total (without tax): {$totalHT} €<br>";
echo "Tax amount: {$totalTax} €<br>";
echo "Total (with tax): {$totalWithTax} €<br>";

?>