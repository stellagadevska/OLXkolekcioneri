<?php
    require ("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $title = 'Заглавие:';
        $description = 'Описание:';
        $shortDescription = 'Кратко описние:';
        $price = 'Цена:';
        $sale = 'Промоция';
        $publish = 'Публикувай!';
        $topText = "Добави обява: ";
    } 
    else {
        $title = 'Title:';
        $description = 'Description:';
        $shortDescription = 'Short description:';
        $price = 'Price:';
        $sale = 'Sale:';
        $publish = 'Publish!';
        $topText = "Add an offer: ";
    }

$contentDivHTML = '
    <div class="container">
                            <h1 class="col-md-11 col-sm-4 col-xs-10" align="center" style="font-family: Cambria;">'.$topText.'</h1> 
                            <div class="col-md-7 col-sm-4 col-xs-10" align="right"> <br>
                <form id="createform" name="registration" action="wat.php" method="post">    
                    <label for="item1">'.$title.' </label>
                    <input id="title" type="text" name="title" value=""> 
                    <br>
                    <label for="item2">'.$description.' </label>
                    <textarea id="" name="" rows="4" cols="50"></textarea>
                    <input id="description" type="text" name="description" value="">
                    <br>
                    <label for="item4">'.$shortDescription.' </label>
                    <input id="" type="text" name="userpass" vlaue="">
                    <br>
                    <label for="item5">'.$price.'  </label>
                    <input id="price" type="number" name="userpass" vlaue="">
                    <br>
                    <label for="item5">'.$sale.'  </label>
                    <br>
                <form name="registration" action="create-user.php" method="post">
                </div>
                    <br><br><br>
                                <div class="col-md-7 col-sm-4 col-xs-7" align="right" >
                                    <button type="button" onClick = "createDis()"> '.$publish.' </button>
                                </div>
                                <div id="result" class="col-md-7 col-sm-4 col-xs-7" align="right" >
                                    
                                </div>
                            </div>
                            </div><br>
        </div>';


    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();

?>