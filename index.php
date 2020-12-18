<?php

declare(strict_types=1);

include_once 'Cart.class.php';


// initialise cart

$cart = new Cart;


// set up list of products

$products = [
    ["name" => "Sledgehammer", "price" => 125.75],
    ["name" => "Axe",          "price" => 190.50],
    ["name" => "Bandsaw",      "price" => 562.131],
    ["name" => "Chisel",       "price" => 12.9],
    ["name" => "Hacksaw",      "price" => 18.45],
];


// display list of products

if (!empty($products))
{
?>
<h3 class="product-header">Products</h3>
<div class="products">
    <table class="product-table">
        <th align="left">Name</th>
        <th align="left">Price</th>
        <th></th>
<?php
    foreach ($products as $product)
    {
?>
        <tr>
            <td class="product-name"><?php echo $product["name"]; ?></td>
            <td class="product-price"><?php echo number_format($product["price"], 2); ?></td>
            <td><a href="cartAction.php?action=addProduct&name=<?php echo $product["name"]; ?>&price=<?php echo $product["price"] ?>">Add to Cart</a></td>
        </tr>
<?php
    }
?>
    </table>
</div>
<a href="viewCart.php">View Cart</a>
<?php
}
?>
