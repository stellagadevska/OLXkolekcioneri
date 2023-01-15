<?php
    header('Content-Type: text/html; charset=UTF-8');
    require ("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $contentDivHTML = '   

                <div class="content">
                   <div class="container toHide text-center large-text">
                        <h1 class="toHide" align="center">
                            <div class="row">
                                  <div class="div-3 toHide col-md-12 col-sm-12 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">
                                    <p class="welcome-text"><b>WELCOME</b></p>
                                    <p class="p2" style="font-size:150%; color:#c9f15a; font-family:Brush Script MT" align="center">to OLXkolekcioneri.com</p>
                                    <p class="p12"><b>Благодарим ви, че избрахте нашия колекционерски сайт!</b></p> 
                                    <p class="p12">Сайтът за колекционери е онлайн магазин, през който може да закупите отдавна 
                                    търсена антикварна вещ или да продадете предмет с колекционерска стойност.
                                    Мисията ни е да улесним всеки един ценител на старинните вещи, предлагайки 
                                    предмети, които са изключително рядко срещани и на добри цени.</p>                               
                                    <img width="90%"src="./images/image1.png">
                                </div>
                            </div>
                        </h1>
                    </div>
                </div>';
    } 
    else {
        $contentDivHTML = '   
                <div class="content">
                    <div class="container toHide text-center large-text">
                        <h1 class="toHide" align="center">
                            <div class="row">
                                  <div class="div-3 toHide col-md-12 col-sm-12 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">
                                    <p class="welcome-text"><b>WELCOME</b></p>
                                    <p class="p2" style="font-size:150%; color:#c9f15a; font-family:Brush Script MT" align="center">to OLXkolekcioneri.com</p>
                                    <p class="p12"><b>Thank you for choosing our website!</b></p> 
                                    <p class="p12">
                                    The collector site is an online store from where you can buy a long time ago wanted antique or sell a collectors item. Our mission is to facilitate every single connoisseur of antiques by offering
                                    items that are extremely rare and at good prices. </p>                               
                                    <img width="90%"src="./images/image1.png">
                                </div>
                            </div>
                        </h1>
                    </div>
                </div>';
    }




    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();

?>

