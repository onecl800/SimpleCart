<?php

declare(strict_types=1);

include_once "Cart.class.php";


// initialise cart

$cart = new Cart;


// page to redirect to once action is performed

$redirect = "index.php";


// process requested action

if (isset($_REQUEST["action"]) && !empty($_REQUEST["action"]))
{
    if ($_REQUEST["action"] == "addProduct")
    {
        if (!empty($_REQUEST["name"]) && !empty($_REQUEST["price"]))
        {
            // add item to cart

            $cart->addProduct($_REQUEST["name"], (float) $_REQUEST["price"]);
        }
        else
        {
            // TODO handle missing parameters
        }

        // redirect

        $redirect = $insertItem ? "viewCart.php" : "index.php";
    }
    elseif($_REQUEST["action"] == "removeProduct")
    {
        if (!empty($_REQUEST["name"]))
        {
            // remove item from cart

            $cart->removeProduct($_REQUEST["name"]);
        }
        else
        {
            // TODO handle missing parameter
        }

        // redirect

        $redirect = "viewCart.php";
    }
    elseif($_REQUEST["action"] == "clearCart")
    {
        // destory session

        $cart->destroy();

        // redirect

        $redirect = "index.php";
    }
}

// redirect

header("Location: $redirect");
exit();