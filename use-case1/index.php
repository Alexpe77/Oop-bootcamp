<?php

$bananas = [
    'name' => 'Bananas',
    'quantity' => 6,
    'price' => 1,
    'tax' => 0.6
];

$apples = [
    'name' => 'Apples',
    'quantity' => 3,
    'price' => 1.5,
    'tax' => 0.6
];

$bottlesOfWine = [
    'name' => 'Bottles of wine',
    'quantity' => 2,
    'price' => 10,
    'tax' => 2.1
];

$cart = [$bananas, $apples, $bottlesOfWine];

foreach ($cart as $item) {
    echo "Item: {$item['name']} <br> Quantity: {$item['quantity']} <br> Price: {$item['price']} <br> € Tax: " . ($item['tax'] * 10) . " %<br>";
}

$total = 0;
foreach ($cart as $item) {
    $itemTotal = $item['quantity'] * $item['price'];
    $taxAmount = $itemTotal * $item['tax'];
    $itemTotalWithTax = $itemTotal + $taxAmount;
    $total += $itemTotalWithTax;
}
echo "Total (incl. taxes): " . $total . " €";

?>