<?php
    require ("generate-design.php");
    if ($_SESSION["lang"]=="BG") {
        $descriptionString = " Описание на продукта ";
        $specificationString  = " Спецификации ";
        $priceString = " Цена ";
        $title = "ОФЕРТИ";
        $promo_title = "Промоции";
        $most_viewed_title = "Най-разглеждани";
        $latest_title = "Последни";
    } else {
        $descriptionString = " Product descrption";
        $specificationString  = " Specifications ";
        $priceString = " Price ";
        $title = "OFFERS";
        $promo_title = "Promotions";
        $most_viewed_title = "Most Viewed";
        $latest_title = "Latest";
    }




    $contentDivHTML = '
    <div class="content">

        <div class="container">

            <h1 class="toHide" align="center">

                <div class="row">

                    <div class="div-3 toHide col-md-12 col-sm-12 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">

                       <p class="welcome-text"><b>'.$title.'</b></p>
                       <hr class="new1">


                        <div class="row">
                           <div class="kol col-lg-4 col-md-6">'.$promo_title.'
                           </div>
                           <div class="kol col-lg-4 col-md-6">'.$most_viewed_title.'
                           </div>
                           <div class="kol col-lg-4 col-md-6">'.$latest_title.'
                           </div>
                        </div>
                        <div class="row">
                           <div class="kol col-lg-4 col-md-6">
                               <ul class="no-bullets" id="promos">
                               </ul>
                           </div>
                           <div class="kol col-lg-4 col-md-6">
                                <ul class="no-bullets" id="most-sold">
                               </ul>
                           </div>
                           <div class="kol col-lg-4 col-md-6">
                                <ul class="no-bullets" id="last-added">
                               </ul>
                           </div>
                        </div>
                        <hr class="new1">
                    </div>
                </div>
            </h1>
        </div>
    ';
        
    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;

    generateFooter();
    echo '<script src="./js/promo_functions.js"></script>';
?>

