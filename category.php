<?php
    require ("generate-design.php");
    
    $categoryID = $_GET["id"];
    $categoryData = json_decode(getCateogryData($categoryID));

        $contentDivHTML = '   
            <div class="content">
                <div class="container">    
                    <h1 class="toHide" align="center">
                        <div class="row">
                            <div class="div-3" class="toHide" class="col-md-12 col-sm-12 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">
                                <p class="welcome-text"><b>'.$categoryData->name.'</b></p>
                                <hr class="new1">
                                <img width="60%" src='.$categoryData->imagePath.'><br>
                                <hr class="new1">
                                <br>
                                <div class="row">';

        $nextColumn = "one";                    
        foreach ($categoryData->products as $key => $product) {
            $contentDivHTML.= '<div class="kol col-lg-4 col-md-6">';
            if ($nextColumn == "one") {                
                $nextColumn = "two";
            } else if ($nextColumn == "two"){
                $nextColumn = "three";
            } else if  ($nextColumn == "three") {
                $nextColumn = "one";
            }
            
            $contentDivHTML.='<a class="a12 a13" href="product.php?id='.$product->id.'">
                                <div class="card">
                                      <img class="img1234" src="'.$product->imagePath.'" alt="Tefal" style="width:100%">
                                      <h2>'.$product->name.'</h2><br>';
                                            if ($_SESSION["lang"]=="BG") {
                                                $contentDivHTML.='<p class="price"><b>Цена: '.$product->price.'лв.</b></p>';
                                            } else {
                                                $contentDivHTML.='<p class="price"><b>Price: '.$product->price.'BGN.</b></p>';
                                            }
            $contentDivHTML.= '       
                                      <p class="p15"><br>'.$product->shortDescription.'<br></p>
                                      <p><button class="addToCartButton" data-productID="'.$product->id.'"><span class="glyphicon glyphicon-shopping-cart" " aria-hidden="true"></span> Add to Cart</button></p>
                                </div>
                                </a>
                           </div>'; 
        }

        $contentDivHTML.='</div></div></div></h1></div></div>';


    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;

    generateFooter();

?>

