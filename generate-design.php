<?php
// Start the session
require ("db-data.php");
     $dictionaryBG["Home"] = "НАЧАЛО";
     $dictionaryBG["Welcome"] = "Добре дошъл";
     $dictionaryBG["Chat"] = "ЧАТ";
     $dictionaryBG["Cart"] = "КОЛИЧКА";
     $dictionaryBG["Checkout"] = "ПОРЪЧАЙ";
     $dictionaryBG["Login"] = "ВХОД";
     $dictionaryBG["Register"] = "РЕГИСТРАЦИЯ";
     $dictionaryBG["Language"] = "BG";
     $dictionaryBG["otherLanguage"] = "EN";
     $dictionaryBG["Contacts"] = "КОНТАКТИ";
     $dictionaryBG["AboutUS"] = "За НАС";
     $dictionaryBG["Policy"] = "ПОЛИТИКА НА САЙТА";
     $dictionaryBG["MyAccount"] = "МОЯТ АКАУНТ";
     $dictionaryBG["Offers"] = "ОФЕРТИ";
     $dictionaryBG["FAQ"] = "ЧЗВ";
     $dictionaryBG["Logout"] = "ИЗХОД";

     $dictionaryEN["Home"] = "HOME";
     $dictionaryEN["Welcome"] = "Welcome";
     $dictionaryEN["Chat"] = "CHAT";
     $dictionaryEN["Cart"] = "CART";
     $dictionaryEN["Checkout"] = "CHECKOUT";
     $dictionaryEN["Login"] = "LOGIN";
     $dictionaryEN["Register"] = "REGISTER";
     $dictionaryEN["Language"] = "EN";
     $dictionaryEN["otherLanguage"] = "BG";
     $dictionaryEN["Contacts"] = "CONTACTS";
     $dictionaryEN["AboutUS"] = "ABOUT US";
     $dictionaryEN["Policy"] = "SITE POLICY";
     $dictionaryEN["MyAccount"] = "MY ACCOUNT";
     $dictionaryEN["Offers"] = "OFFERS";
     $dictionaryEN["FAQ"] = "FAQ";
     $dictionaryEN["Logout"] = "LOG OUT";
  
    
    if (!isset( $_SESSION["lang"])){
        $_SESSION["lang"] = "EN";
        $_SESSION["userID"] = "";
        $_SESSION["username"] = "";
        $_SESSION["isLoged"] = "No";
        $_SESSION["cartValue"] = 0;
        $_SESSION["cartContents"] = array();
        //array_push( $_SESSION["cartContents"], array("productID" => "1", "productName"=> "productName1", "quantity" => 0));  

    } 

    if ($_SESSION["lang"] == "BG") {
        $_SESSION["dictionary"] = $dictionaryBG;
    }else {
        $_SESSION["dictionary"] = $dictionaryEN;
    
    }



function generateCategoriesMenu() {
    $categories = json_decode(getCategories(),true);
    foreach ($categories as &$category) {
        echo  '<li id="category'.$category["id"].'">
                 <a style="color: #f1ddcf" href="category.php?id='.$category["id"].' ">
                   <span  aria-hidden="true"></span> 
                     '.$category["name"].'
                 </a>
                </li>';
    }
    
}


function generateNavBar() {
    $dictionary = $_SESSION["dictionary"];

    echo <<<navBar
            <!DOCTYPE html>

            <html>
                <meta http-equiv="content-type" content="text/html" charset="utf-8"> 
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="css/bootstrap.min.css">
                <link rel="stylesheet" href="css/main.css">
            <head>
                <title>Сайт за колекционери</title>
                <link rel="icon" href="./images/icon.png">
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            </head>
            <body>
                <img src="./images/banner.png" width="100%"/>
                <nav class="navbar1 navbar-default navbar-static-top" style="border-bottom:solid; border-width:2px; border-bottom-color:#c9f15a;">
                    <div class="container-fluid">

                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav" id="categories-menu">
                                <li class="active2" id="home"><a style="color: #34282C" href="index.php">$dictionary[Home]</a></li>
                            
        navBar;
        generateCategoriesMenu();
        echo '</ul>';
}


function generateNavBarRight () {
    $dictionary = $_SESSION["dictionary"];

    echo $_SESSION["userID"];
    if ($_SESSION["userID"] == "") {
        $loginButtons='
                        <li><a class="vhod" style="color: #34282C" href="login.php">'.$dictionary["Login"].'</a></li>
                       <li><a class="vhod" style="color: #34282C" href="registration.php">'.$dictionary["Register"].'</a></li>';
    }else {
        $loginButtons=' <li><a style="color: #f1ddcf" href="checkout.php"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span>' .$dictionary["Checkout"].'</a></li> 
                        <li><a class="vhod" style="color: #34282C" onClick= "logOut()">' .$dictionary["Logout"]. '</a></li>';
    
    }        
        echo <<<navBarRight
                                
                                <ul class="nav navbar-nav navbar-right">
                                
                                <li><a style="color:#c9f15a" href="chat.php"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> $dictionary[Chat]</a></li>
                                <div class="navbar-form navbar-left">
                                    <form method="GET">
                                        <input type="text" id="searchBar" class="form-control" placeholder="Search">
                                   </form>
                                   <div>
                                            <ul id="searchResults" class="list-group list-group-item-action" style="display:none; margin:0">
                                            </ul>  
                                    </div>
                                </div>
                                <li><a style="color: #f1ddcf" href="cart.php"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> $dictionary[Cart]</a></li>
                                
                                $loginButtons

                                <li class="nav-item dropdown">
                                    <a style="color: #f1ddcf" class="nav-link dropdown-toggle" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-bg"> </span> $dictionary[Language]</a>
                                    <div class="dropdown-menu" id="change-language" aria-labelledby="dropdown09">
                                        <a style="color: #34282C" class="dropdown-item" ><span  class="flag-icon flag-icon-us"> </span> $dictionary[otherLanguage]</a>

                                    </div>
                                </li>
                            </ul>

                        </div>

                        </div>

                    </div>

                </nav>

                            
        navBarRight;

}

function generateFooter() {
            $dictionary = $_SESSION["dictionary"];
                $username = $_SESSION["username"];
                if ($_SESSION["userID"] == "") {
                    $accountButton='';
                }else {
                     $accountButton=' <li id="username"><a style="color: #f1ddcf" ></span> Welcome, '.$username.'</a></li>
                     <li><a style="color: #c9f15a" href="account.php"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>'.$dictionary["MyAccount"].'</a></li>';
    
                }  


            $username = $_SESSION["username"];
            echo <<<footer
                                <div class="footer">
                    <nav class="navbar1 navbar-default navbar-static-top" style="border-top:solid; border-width:2px; border-top-color: #c9f15a">
                    <div class="container-fluid">

                        <div class="navbar-footer">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-left">
                                <li><a style="color: #f1ddcf" href="contacts.php"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> $dictionary[Contacts]</a></li>
                                <li><a style="color: #f1ddcf" href="about.php"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> $dictionary[AboutUS]</a></li>
                                <li><a style="color: #f1ddcf" href="policy.php"><span class="glyphicon glyphicon-briefcase" aria-hidden="true"></span> $dictionary[Policy]</a></li>
                            </ul>

                             <ul class="nav navbar-nav navbar-right">
                                
                                $accountButton
                                <li><a style="color: #f1ddcf" href="offers.php"><span class="glyphicon glyphicon-gift" aria-hidden="true"></span> $dictionary[Offers]</a></li>
                                <li><a style="color: #f1ddcf" href="QnA.php"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> $dictionary[FAQ]</a></li>
                            </ul>
                        </div>

                        </div>
                    </div>
                </nav>
                </div>

            <script src = "js/jquery-3.3.1.min.js" ></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/myHomeFunctions.js"></script>
            </body>
            </html>
            footer;
}

             


    


   
?>

