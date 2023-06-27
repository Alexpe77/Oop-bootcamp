<?php

class Product {
    public $name;
    public $quantity;
    public $price;
    public $tax;

    public function __construct(string $name, float $quantity, float $price, float $tax)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->price = $price;
        $this->tax = $tax;
    }

    public function getName() {
        return $this->name;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getTax() {
        return $this->tax;
    }

    public function getTotalPrice() {
        return $this->price * $this->quantity;
    }

    public function getTaxAmount() {
        return $this->getTotalPrice() * $this->tax;
    }

    private function isFruit() {
        $fruits = ['Bananas', 'Apples'];
        return in_array($this->name, $fruits);
    }

    public function getDiscountedPrice($discount, &$totalDiscount) {
        if ($this->isFruit()) {
            $discountAmount = $this->getTotalPrice() * $discount;
            $totalDiscount += $discountAmount;
            return $this->getTotalPrice() - $discountAmount;
        }
        return $this->getTotalPrice() ;
    }
}

$bananas = new Product ('Bananas', 6, 1, 0.06);
$apples = new Product ('Apples', 3, 1.5, 0.06);
$bottlesOfWine = new Product ('Bottles of wine', 2, 10, 0.21);

$cart = [$bananas, $apples, $bottlesOfWine];

$totalHT = 0;
$totalTax = 0;
$totalDiscount = 0;

$fruitDiscount = 0.5;

foreach ($cart as $item) {
    $totalHT += $item->getDiscountedPrice($fruitDiscount, $totalDiscount);
    $totalTax += $item->getTaxAmount();
    echo "Item: {$item->getName()} Quantity: {$item->getQuantity()} Price: {$item->getPrice()} € Tax: " . $item->getTax() * 100 . " %<br>";
}

$totalWithTax = $totalHT + $totalTax;

echo "Total (without tax): {$totalHT} €<br>";
echo "Tax amount: {$totalTax} €<br>";
echo "Total (with tax): {$totalWithTax} €<br>";
echo "Total discount: {$totalDiscount} €<br>";

?>