<?php

declare(strict_types=1);


// start session

if (! session_id())
{
    session_start();
}

/**
 * Simple cart class
 */
class Cart
{
    /**
     * @var array
     */
    protected $cart = [];

    public function __construct()
    {
        if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"]))
        {
            $this->cart = $_SESSION["cart"];
        }
    }

    /**
     * Get cart from session
     *
     * @return array
     */
    public function getCartContents(): array
    {
        return $this->cart;
    }

    /**
     * Set cart in session
     *
     * @param array $cart
     */
    public function setCartContents(array $cart): void
    {
        $_SESSION["cart"] = $cart;
    }

    /**
     * Add product to cart
     *
     * @param string $name
     * @param float $price
     */
    public function addProduct(string $name, float $price): void
    {
        $cart = $this->getCartContents();

        if (array_key_exists($name, $cart))
        {
            // update quantity of existing product

            $cart[$name]["quantity"] += 1;

            // update product total price

            $cart[$name]["total"] = ($cart[$name]["price"] * $cart[$name]["quantity"]);
        }
        else
        {
            // add product to cart

            $cart[$name]["price"] = $price;
            $cart[$name]["quantity"] = 1;

            // calculate product total price

            $cart[$name]["total"] = $price;
        }

        $this->setCartContents($cart);
    }

    /**
     * Remove given product from cart
     *
     * @param string $name
     */
    public function removeProduct(string $name): void
    {
        $cart = $this->getCartContents();

        if (array_key_exists($name, $cart))
        {
            // remove product completely from cart

            unset($cart[$name]);

            $this->setCartContents($cart);
        }
        else
        {
            // TODO handle product not found in cart, e.g. throw exception or return code or boolean
        }
    }

    /**
     * Get the total price for all products in this cart
     *
     * @return float
     */
    public function getCartTotal(): float
    {
        $total = 0;

        foreach ($this->getCartContents() as $name => $product)
        {
            $total += $product["total"];
        }

        return ($total);
    }

    /**
     * Destroy session
     */
    public function destroy(): void
    {
        $this->cart = [];

        unset($_SESSION["cart"]);
    }
}
