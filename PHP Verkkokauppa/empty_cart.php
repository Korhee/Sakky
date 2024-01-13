<?php

require("lib/db.php");


$empty_cart = "DELETE FROM cart";

if ($sql->query($empty_cart)) {

    echo "Ostoskori tyhjennetty";
    header("Location: cart.php");
} else {
    echo "Virhe";
}
