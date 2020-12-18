<?php

declare(strict_types=1);

include_once "Cart.class.php";


// initialise cart

$cart = new Cart;

$cartList = $cart->getCartContents();


// display cart contents

if (! empty($cartList))
{
?>
<h3 class="cart-header">Cart</h3>
<div class="cart">
    <table class="product-table">
        <thead>
            <tr>
                <th align="left">Name</th>
                <th align="left">Price</th>
                <th align="left">Quantity</th>
                <th align="left">Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
<?php
    foreach ($cartList as $productName => $product)
    {
?>
            <tr>
                <td class="product-name"><?php echo $productName; ?></td>
                <td class="product-price"><?php echo number_format($product["price"], 2); ?></td>
                <td class="product-price"><?php echo $product["quantity"]; ?></td>
                <td class="product-price"><?php echo number_format($product["total"], 2); ?></td>
                <td><a href="cartAction.php?action=removeProduct&name=<?php echo $productName; ?>" class="btn btn-primary">Remove from Cart</a></td>
            </tr>
<?php
    }
?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td>Cart Total Price:</td>
                <td><?php echo number_format($cart->getCartTotal(), 2); ?></td>
                <td></td>
        </tfoot>
    </table>
</div>
<a href="cartAction.php?action=clearCart">Clear Cart</a>
<?php
}
else
{
?>
<h4>Cart is empty; Nothing to show</h4>
<?php
}
?>
<a href="index.php">Back to Products</a>
