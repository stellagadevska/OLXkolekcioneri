<?php
    require ("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $login = 'Моля въведете свеото име и парола:';
        $password = 'Парола:';
        $login = 'Създай профил!';
    } 
    else {
        $login = 'Please enter your login details:';
        $password = 'password:';
    }




$contentDivHTML = '


    <div id="container" class="container">

                            <h1 class="col-md-11 col-sm-4 col-xs-10" align="center" style="font-family: Cambria;">'.$login.' </h1> 
                            <div class="col-md-7 col-sm-4 col-xs-10" align="right"> <br>
  

                    <label for="item3">Email address: </label>
                    <input id="email" type="email" name="email" value=""> 
                    <br><br>
                    <label for="item4">'.$password.' </label>
                    <input id="password" type="password" name="userpass" vlaue="New password">
                    
                    <br><br><br>
                                <div class="col-md-7 col-sm-4 col-xs-7" align="right" >
                                    <button type="button" onClick = "singIn()"> Login </button>
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