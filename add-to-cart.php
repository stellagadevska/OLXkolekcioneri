<?php
    require 'db-data.php';

// Start the session
    $productID = $_GET["id"];

    
//Get product name, image path, price from the products table in the DB


    echo  addToCart($productID);
    
?>
