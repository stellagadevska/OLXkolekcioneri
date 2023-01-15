<?php
    require("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $productsString = 'Продукти';
        $quanityString = 'Количество';
        $priceString = 'Цена';
        $logedInNeeded = "Само регистрирани потребители могат да праявт поръчки";
    } 
    else {
        $productsString = 'Products';
        $quanityString = 'Quantity';
        $priceString = 'Price'; 
        $logedInNeeded = "Checkout is available only for loggedIN users";  

    }

   if ($_SESSION["userID"] != "") {
        $logedInNeeded ="";
    } 

    $contentDivHTML = '<div class="content">

        <div class="container">

            <h1 class="toHide" align="center">

                <div class="row"> 

                    <div class="div-3" class="toHide" class="col-md-7 col-sm-4 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">
                      '.$logedInNeeded.' 
                     

                    </div>
                    

                </div>

            </h1>

        </div>


    </div>';


    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();
    if ($_SESSION["userID"] != "") {
        echo '<script src="https://www.paypalobjects.com/api/checkout.js"></script>';
        echo '<script src="./js/paypal.js"></script>';
        echo '<script src="./js/checkout_functions.js"></script>';
        echo '<script src="https://js.stripe.com/v3/"></script>';
        echo '<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>';
    } 


?>

