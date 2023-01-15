<?php
    require ("generate-design.php");
    $username = $_SESSION["username"];
    $cartValue = $_SESSION["cartValue"];
    $userID = $_SESSION["userID"];
    if ($_SESSION["userID"]==""){
            $userID ="0";

        }


    //echo $_SESSION["username"];
    //$query = "INSERT into `orders` (status, value, email) VALUES ('$_SESSION["username"]', '$_SESSION["cartValue"]', '$_SESSION["userID"]' )";
    $query = "INSERT into `orders` (status, value, userID) VALUES ('$username', '$cartValue', '$userID')";
    $conn->query($query);

    if ($_SESSION["lang"] == "BG") {
        
       $succesMessage = ' Вашата поръчка беше платена успешно';
    } 
    else {
        $succesMessage = 'Your order has been paid succesfully';
    }

    $contentDivHTML = '                
    			<div class="content">
                    <div class="container">
                        <h1 class="toHide" align="center">
                            <div class="row">
                                <div class="div-3" class="toHide" class="col-md-7 col-sm-4 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">
                                   <p class="p12"><b>'.$succesMessage.'</b></p>                              

                                </div>
                            </div>
                        </h1>
                    </div>
                </div>';


    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();
    $_SESSION["cartContents"] = array();
	$_SESSION["cartValue"] = 0;
    

?>
