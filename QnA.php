<?php
    require ("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $FAQ = 'ЧЕСТО ЗАДАВАНИ ВЪПРОСИ';
        $profilePictureQuestion = "Как да си сложа снимка на профила? ";
        $profilePictureAnswer =  "Влезте в “Моят Акаунт”, отидете на “Детайли на профила” и там ще намерите опция за смяна на профилна снимка.";
        $antiquesQuestion = 'Какъв вид антики мога да качвам?';
        $antiquesAnswer = 'Можете да качвате всякакви предмети, които имат колекционерска стойност, като задължително условие е да напишете описание, както и да дадете информация за произхода на продукта.';
        $buyQuestion = "Как мога да купя артикул, който съм избрал?";
        $buyAnswer = "Когато сте харесали нечия обява - можете да пишете лично съобщение на собственика, където да се уговорите за лична среща или изпращане с куриер.
        <br> !!! Моля не давайте данни от свои банкови карти и не плащайте нищо онлайн!!!";
    } 
    else {
        $FAQ = 'FREQUENTLY ASKED QUESTIONS';
        $profilePictureQuestion = "How to set my profile picture?";
        $profilePictureAnswer =  "Log in to “My Account”, open “Profile Details” and there you will find an option to change your profile picture.";
        $antiquesAnswer = 'You can upload any items that have collectible value, as long as you write a description and give information about the origin of the product.';
        $antiquesQuestion = 'What kind of antiques can I upload?';
        $buyQuestion = "How can I buy an item that I have chosen?";
        $buyAnswer = "When you liked someone's ad - write a personal message to the owner, where you can arrange a personal meeting or send by courier.
        <br> !!!  Please do not give out your bank card details and do not pay anything online!!!";
    }

    $contentDivHTML = '
 <div class="content">

        <div class="container">

            <h1 class="toHide" align="center">

                <div class="row">

                    <div class="div-3" class="toHide" class="col-md-7 col-sm-4 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a">

                       <p class="welcome-text"><b>'.$FAQ.'</b></p>
                       <hr class="new1">

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                  <h4 style="color:#34282C"><b>'.$profilePictureQuestion.' </b><span></span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h4>
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">
                                <h4 class="qna"> '.$profilePictureAnswer.'
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                  <h4 style="color:#34282C"><b> '.$antiquesQuestion.' </b><span></span><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h4>
                                </a>
                              </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">                              
                                    <h4 class="qna" >'.$antiquesAnswer.'

                                    
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
                                  <h4 style="color:#34282C"><b> '.$buyQuestion.' </b><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></h4>
                                </a>
                              </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                              <div class="panel-body">     
                                <h4 class="qna">
                                    '.$buyAnswer.'
                                </h4>
                              </div>
                    </div>


                </div>

            </h1>

        </div>';



    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();

?>

