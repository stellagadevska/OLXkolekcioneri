<?php
    require ("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $adress = '98 Bulgaria blvd, Sofia,<br> ASTRA business center';
        $address_name = "Адрес";
        $phone_name = "Телефон";
    } 
    else {
        $adress = '98 Bulgaria blvd, Sofia,<br> ASTRA business center';
        $address_name = "Address";
        $phone_name = "Phone";
    }

    $contentDivHTML = '
        <div class="content">

            <div class="container">

                <div class="toHide" class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12" align="center">
                        <a style="color:#34282C" href = "https://goo.gl/maps/aGENEUzjseqb5k9v6" target="_blank"><h2><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>' .$address_name. '<h4 align="center"> '.$adress.'</h4></h2></a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12" align="center">
                        <h2 style="color:#34282C"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>'.$phone_name.'<h4 align="center" style="color:#34282C"> +359 88 666 2020 <br>OLX Колекционери</h4></h2>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12" align="center">
                        <a style="color:#34282C" href = "mailto: vyara.veselinova@gmail.com" target="_blank"><h2><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> E-mail <h4 align="center"> office@olxkolekcioneri.com <br> sales@olxkolekcioneri.com </h4></h2></a><br><br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <iframe
                          width="100%"
                          height="450"
                          frameborder="0" style="border:0"
                          src="https://www.google.com/maps/embed/v1/view?key=AIzaSyD_DZcOFXzs1Olw5jYPtYWXEgRcsMdZKjU&center=42.661905, 23.285308&zoom=16" allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="toHide" class="row">
                    <br><div class="col-md-6 col-sm-4 col-xs-12" align="center">
                        <a style="color:#34282C" href="https://www.facebook.com/vyara.vesselinova" target="_blank"><h2><i class="fa fa-facebook-square" style="font-size:36px"></i> Facebook <h4 align="center"> @olxkolekcioneri.com <br> OLX Колекционери</h4></h2></a>
                    </div>
                    <div class="col-md-6 col-sm-4 col-xs-12" align="center">
                        <a style="color:#34282C" href="https://www.instagram.com/vyaraivanov.a/" target="_blank"><h2><i class="fa fa-instagram" style="font-size:36px"></i> Instagram <h4 align="center"> @olxkolekcioneri.com <br> OLX Колекционери </h4></h2></a>
                    </div>
                    </div>
                </div>
            </div>

        </div>';



    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();

?>

