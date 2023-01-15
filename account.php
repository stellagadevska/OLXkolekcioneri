<?php
    require("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $title = "Mоят Акаунт";
        $nameString = 'Име';
        $emailString = 'Email';
        $totalString = 'Общо покупки';
    } 
    else {
        $title = "My account";
        $nameString = 'Name';
        $emailString = 'Email';
        $totalString = 'Total purchases';   

    }

    $contentDivHTML = '<div class="content">

        <div class="container">

            <h1 class="toHide" align="center">

                <div class="row">

                    <div class="div-3" class="toHide" class="col-md-7 col-sm-4 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">

                        
                        <p class="welcome-text"><b>'.$title.'</b></p>
                        <hr class="new1">
                        <div class="container1">
                           <div class="column1 column-one kol">'.$nameString.'
                           </div>
                           <div class="column1 column-two kol">'.$emailString.'
                           </div>
                           <div class="column1 column-three kol">'.$totalString.'
                           </div>
                        </div>
                        <hr class="new1">
                       

                    </div>


                </div>

            </h1>

        </div>


    </div>';


    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();
    echo '<script src="./js/account_functions.js"></script>';


?>

