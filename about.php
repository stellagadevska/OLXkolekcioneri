<?php
    require ("generate-design.php");
    if ($_SESSION["lang"] == "BG") {
        $headerText = "ЗА НАС";
        $description1 = 'Ние сме млад и динамичен екип от четири момичета, които искаха да създадат нещо изключително 
        интересно за ценители!' ;
        $description2 = 'Така се роди и нашия първи сайт - OLXKolekcioneri, чрез който ежедневно свързваме колекционери, които искат да разменят автентични 
        артикули с колекционерска стойност помежду си.';
        $description3 = 'Идеята да създадем този уеб сайт се зароди в следствие на желанието ни да помогнем на всички заинтересовани клиенти и по - конретно ценителите на антикварните предмети да открият търсения продукт от тях.';
        $description4 = 'В магазин OLXKolekcioneri поставяме корекността и личното внимание към клиента на първо място!';
    } 
    else {
        $headerText = "About us";
        $description1 = 'We are a young and dynamic team of four girls looking to create something extraordinary
        interesting for connoisseurs!';
        $description2 = 'This is how our first site was born - OLXKolekcioneri, through which we daily connect collectors who want to exchange authentic
        collectible items with each other.';
        $description3 = 'The idea to create this website was born out of a desire to help
        to all interested customers and more specific prices of antique items to find the product they are looking for.';
        $description4 = 'At the OLXKolekcioneri store, we put fairness and personal attention to the customer first!';
    }

    $contentDivHTML = '
    <div class="content">
            <h1 class="toHide" align="center">
                <div class="row">

                    <div class="div-3" class="toHide" class="col-md-7 col-sm-4 col-xs-12" style="border:solid; border-width:3px; border-color: #c9f15a ">

                        <p class="welcome-text"><b>'. $headerText. '</b></p>
                        <hr class="new1">
                        <p class="p12" align="center">'.$description1.'</p> 
                        <p class="p12" align="center">'.$description2.'</p>
                        <p class="p12" align="center">'.$description3.'</p>
                        <p class="p12" align="center">'.$description4.'</p>
                        <hr class="new1">

                        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="row">
                          <div class="kol col-lg-6 col-md-12">
                            <img src="./images/salina.jpg" style="width:75%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
                          </div>
                          <div class="kol col-lg-6 col-md-12">
                            <img src="./images/yoanna.jpg" style="width:75%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
                          </div>
                    </div><br>
                    <div class="row" align="center">
                          <div class="kol col-lg-6 col-md-12">
                            <img src="./images/stella.jpg" style="width:75%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
                          </div>
                          <div class="kol col-lg-6 col-md-12">
                            <img src="./images/vyara.jpg" style="width:75%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
                          </div>
                    </div>

                        <div id="myModal" class="modal">
                          <span class="close cursor" onclick="closeModal()">&times;</span>
                          <div class="modal-content">

                            <div class="mySlides3">
                              <div class="numbertext">1 / 5</div>
                              <img src="./images/salina.jpg" style="width:50%">
                            </div>

                            <div class="mySlides3">
                              <div class="numbertext">2 / 5</div>
                              <img src="./images/vyara.jpg" style="width:50%">
                            </div>

                            <div class="mySlides3">
                              <div class="numbertext">3 / 5</div>
                              <img src="./images/yoanna.jpg" style="width:50%">
                            </div>

                            <div class="mySlides3">
                              <div class="numbertext">4 / 5</div>
                              <img src="./images/stella.jpg" style="width:50%">
                            </div>

                            <div class="mySlides3">
                              <div class="numbertext">5 / 5</div>
                              <img src="./images/vladislav.jpg" style="width:50%">
                            </div>
                            
                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>

                            <div class="caption-container">
                              <p id="caption"></p>
                            </div>

                            <div class="column">
                              <img class="demo cursor" src="./images/salina.jpg" style="width:100%" onclick="currentSlide(1)" >
                            </div>
                            <div class="column">
                              <img class="demo cursor" src="./images/vyara.jpg" style="width:100%" onclick="currentSlide(2)" >
                            </div>
                            <div class="column">
                              <img class="demo cursor" src="./images/yoanna.jpg" style="width:100%" onclick="currentSlide(3)" >
                            </div>
                            <div class="column">
                              <img class="demo cursor" src="./images/stella.jpg" style="width:100%" onclick="currentSlide(4)" >
                            </div>
                            <div class="column">
                              <img class="demo cursor" src="./images/vladislav.jpg" style="width:100%" onclick="currentSlide(5)" >
                            </div>
                            
                        </div>

                        
                        </div>
                </div>
        </div>

<script>
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex1 = 1;
showSlides1(slideIndex1);

function plusSlides(n) {
  showSlides1(slideIndex1 += n);
}

function currentSlide(n) {
  showSlides1(slideIndex1 = n);
}

function showSlides1(n) {
  var i1;
  var slides1 = document.getElementsByClassName("mySlides3");
  var dots1 = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides1.length) {slideIndex1 = 1}
  if (n < 1) {slideIndex1 = slides1.length}
  for (i1 = 0; i1 < slides1.length; i1++) {
      slides1[i1].style.display = "none";
  }
  for (i1 = 0; i1 < dots1.length; i1++) {
      dots1[i1].className = dots1[i1].className.replace(" active", "");
  }
  slides1[slideIndex1-1].style.display = "block";
  dots1[slideIndex1-1].className += " active";
  captionText.innerHTML = dots1[slideIndex1-1].alt;
}
</script>

                    </div>

                </div>

            </h1>


        </div>

    </div>';



    generateNavBar();
    generateNavBarRight();
    echo $contentDivHTML;
    generateFooter();

?>

