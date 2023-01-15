<?php
    require ("generate-design.php");
    if ($_SESSION["lang"]=="BG") {
        $descriptionString = " Описание на продукта ";
        $specificationString  = " Спецификации ";
        $priceString = " Цена ";
    } else {
        $descriptionString = " Product descrption";
        $specificationString  = " Specifications ";
        $priceString = " Price ";
    }


    $productId = $_GET["id"];
    $productData = json_decode(getProductData($productId));


    $contentDivHTML = '     <div class="content">

                    <div class="container">

                        <h1 class="toHide" align="center">

                            <div class="row">

                        <div class="div-3" class="toHide" class="col-md-7 col-sm-4 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">

                       <p class="welcome-text2"><b>'.$productData->name.'</b></p>
                        <hr class="new1"><br>
                            <div class="row">
                            <div class="kol col-lg-6 col-md-12">
                                    <img src="'.$productData->imagePath.'"/ width="90%">
                            </div>
                            <div class="kol col-lg-6 col-md-12"">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          <h4 style="color:#34282C"><b>'.$descriptionString.'</b><span></span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h4>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">
                                        <h4 class="qna1">'.$productData->longDescription.'
                                        </h4>           
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                  <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                      <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseOne">
                                          <h4 style="color:#34282C"><b>'.$specificationString.'</b><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h4>
                                        </a>
                                      </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                      <div class="panel-body">     
                                        <h4 class="qna1">'.$productData->shortDescription.'
                                            
                                        </h4>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Buton -->
                                  <div class="card12">
                                    <p class="price1"><b>'.$priceString.' '.$productData->price.'лв.</b></p>
                                    <p><button class="addToCartButton" data-productID="'.$productData->id.'"><span class="glyphicon glyphicon-shopping-cart " aria-hidden="true"></span> Add to Cart</button></p>
                                  </div>
                                <!-- Buton -->
                            </div>
                          </div></br>'; 
    $nextColumn = "one";  
    $contentDivHTML .= '<hr class="new1">
                        <p class="welcome-text1"><b>Потребителите, които разглеждат този<br>продукт, харесват също ...<br><br></b></p>
                        <div class="row">';
        foreach ($productData->similarProducts as $key => $product) {
            $contentDivHTML.= '<div class="kol col-lg-6 col-md-6">';
            if ($nextColumn == "one") {                
                $nextColumn = "two";
            } else if ($nextColumn == "two"){
                $nextColumn = "three";
            } else if  ($nextColumn == "three") {
                $nextColumn = "one";
            }
            
            

            $contentDivHTML.= '<a class="a12 a13" href="product.php?id='.$product->id.'">
                                    <div class="card1">
                                      <img class="img1234" src="'.$product->imagePath.'" alt="Cif" style="width:100%">
                                      <h3>'.$product->name.'</h3>
                                      <p><b>'.$priceString.' '.$product->price.'лв.</b><button class="addToCartButton" data-productID="'.$productData->id.'"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Add to Cart</button></p>
                                    </div>
                                </a>
                            </div>';
        }


  
  $contentDivHTML .= '';



  $contentDivHTML .= '</div></div></div></h1></div>';

                                              





       






    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;

    generateFooter();

?>

