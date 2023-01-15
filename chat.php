<?php
    require ("generate-design.php");
        
    $articles = json_decode(getArticles());
        $contentDivHTML = '     <div class="content">

        <div class="container">

            <h1 class="toHide" align="center">

                <div class="row">

                    <div class="div-3 toHide col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">

                        
                        <p class="welcome-text"><b>'.$_SESSION["dictionary"]["Chat"].'</b></p>
                        <hr class="new1"><br>
                        <div class="row">';

        
        $nextColumn = "one";
        foreach ($articles as $key => $article) {
            $contentDivHTML.= '<div class="kol col-lg-4 col-md-6">';
            if ($nextColumn == "one") {                
                $nextColumn = "two";
            } else if ($nextColumn == "two"){
                $nextColumn = "three";
            } else if  ($nextColumn == "three") {
                $nextColumn = "one";
            }

        }    

         $contentDivHTML .='</div></div></div></h1></div>';

    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();

?>
