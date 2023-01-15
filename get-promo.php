<?php
// Start the session
    session_start();

    //Connect to DB
    include 'db-connect.php';
    
    //Get product name, image path, short and long desription and price from the products table in the DB

    if ($_SESSION["lang"]=="BG") {
        $products = $conn->query("SELECT id, nameBG AS name, imagePath, shortDescriptionBG AS shortDesc, longDescriptionBG AS longDesc, price, categoryID FROM products WHERE isPromo=1 ORDER BY RAND() LIMIT 5")->fetch_all(MYSQLI_ASSOC);
    } else {
        $products = $conn->query("SELECT id, nameEN AS name, imagePath, shortDescriptionEN AS shortDesc, longDescriptionEN AS longDesc, price, categoryID FROM products WHERE isPromo=1 ORDER BY RAND() LIMIT 5")->fetch_all(MYSQLI_ASSOC);
    }
    
    foreach ($products as &$pr) {
        echo '<li><a href="product.php?id=' .$pr['id']. '">'.'<div class="card1">'.'<img class="img1234" src="'.$pr["imagePath"].'" style="width:100%">
                                                <h4>'.$pr["name"].'<br>
                                                    <b>'.$pr["price"].'лв.</b>
                                                    <button>
                                                        <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart
                                                    </button>
                                                </h4>
                                            </div>
                                        </a>
                                    </li>
                                        <br>';
    }
   
?>




