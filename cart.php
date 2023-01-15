<?php
    require("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $productsString = 'Продукти';
        $quanityString = 'Количество';
        $priceString = 'Цена';
        $title = "Моята количка";
    } 
    else {
        $productsString = 'Products';
        $quanityString = 'Quantity';
        $priceString = 'Price';   
        $title = "Shopping cart";

    }

    $contentDivHTML = '<div class="content">

        <div class="container">

            <h1 class="toHide" align="center">

                <div class="row">

                    <div class="div-3" class="toHide" class="col-md-7 col-sm-4 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">

                        
                        <p class="welcome-text"><b>'.$title.'</b></p>
                        <hr class="new1">
                        <div class="container1">
                           <div class="column1 column-one kol">'.$productsString.'
                           </div>
                           <div class="column1 column-two kol">'.$quanityString.'
                           </div>
                           <div class="column1 column-three kol">'.$priceString.'
                           </div>
                           <div class="column1 column-three kol">
                           </div>
                           <div class="column1 column-three kol">
                           </div>
                        </div>
                        <hr class="new1">

                       <div id="cart-contents"> </div>

                    </div>


                </div>

            </h1>

        </div>


    </div>';


    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();
    echo '<script src="./js/cart_functions.js"></script>';


?>

