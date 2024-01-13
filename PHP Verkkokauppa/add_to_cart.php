<?php
session_start();
require("lib/db.php");


if (isset($_GET['ostoskori'])) {

    $product = $_GET['ostoskori'];
    $sessionid = session_id();

    $sql_text = "INSERT INTO cart (product, adddate, sessionid) VALUES ('$product',NOW(), '$sessionid')"; 
        
        if ($sql->query($sql_text)) {
            echo "Päivitys onnistui";
            header("Location: products.php");
        } else {
            echo "Virhe!";
        }
    
}
