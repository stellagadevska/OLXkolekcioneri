<?php
    require ("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $firstName = 'Име:';
        $lastName = 'Фамилия:';
        $password = 'Парола:';
        $passwordAgain = 'Повтори паролата:';
        $createProfile = 'Създай профил!';
        $topText = "Направете своята регистрация: ";
    } 
    else {
        $firstName = 'First name:';
        $lastName = 'Last name:';
        $password = 'Password:';
        $passwordAgain = 'Password again:';
        $createProfile = 'Create profile!';
        $topText = "Create your account: ";
    }




$contentDivHTML = '


    <div class="container">

                            <h1 class="col-md-11 col-sm-4 col-xs-10" align="center" style="font-family: Cambria;">'.$topText.'</h1> 
                            <div class="col-md-7 col-sm-4 col-xs-10" align="right"> <br>
                <form id="createform" name="registration" action="wat.php" method="post">    
                    <label for="item1">'.$firstName.' </label>
                    <input id="firstName" type="text" name="firstname" value=""> 
                    <br>
                    <label for="item2">'.$lastName.' </label>
                    <input id="lastName" type="text" name="lastname" value="">
                    <br><br>
                    <label for="item3">Email address: </label>
                    <input id="email" type="email" name="email" value=""> 
                    <br><br>
                    <label for="item4">'.$password.' </label>
                    <input id="password" type="password" name="userpass" vlaue="New password">
                    <br>
                    <label for="item5">'.$passwordAgain.'  </label>
                    <input id="passwordAgain" type="password" name="userpass" vlaue="New password">
                    <br><br>
                <form name="registration" action="create-user.php" method="post">
                </div>
                    <br><br><br>
                                <div class="col-md-7 col-sm-4 col-xs-7" align="right" >
                                    <button type="button" onClick = "createDis()"> '.$createProfile.' </button>
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