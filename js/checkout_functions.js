$(document).ready(function(){
	createCheckOutContetn();
})

function createCheckOutContetn() {
	var ajaxCallToA = $.ajax({
		url: 'get-session-data.php',
		timeout: 2000,
		type: 'GET',
		success: function(data){ 												
			updateCheckOutCOntetn(data);
		},
		error: function(data) {						
			//alert("problem");
	    } 
	});
}

function getPayPal(cartValue) {
  var ajaxCallToA = $.ajax({
    url: 'get-paypal-token.php',
    timeout: 2000,
    type: 'GET',
    success: function(data){                        
      rendePayPal(cartValue);
    },
    error: function(data) {           
      //alert("problem");
      } 
  });
}



function updateCheckOutCOntetn(sessionData) {
    sessionDataJSON = JSON.parse(sessionData);
    cartValue = sessionDataJSON.cartValue;
    cartValuePayPal = (cartValue/1.9558).toFixed(0).toString();
    cartValueStripe = cartValue*100;
    language = sessionDataJSON.lang;

    if (language == "BG") {
    	greetingString = "Стойността на вашата поръчка е ";
    	currencyString = "лв.";
      paymentString = "Моля изберете начина на плащане";
      payOnDelivery = "Наложен платеж";
    } else {
    	greetingString = "Your cart value is ";
    	currencyString = "BGN";
      paymentString = "Please select payment method";
      payOnDelivery = "Pay on delivery";
    }
    
    $(".div-3").append('<div class="container1"><div class="column1 column-one kol">'+ greetingString + cartValue.toFixed(2) + " " + currencyString  + "</br></br>" + paymentString +'</div></div><br>');

    if (cartValue<100) {
      $(".div-3").append('<div id="button-div" class="container1"><div class="column1 column-one kol">'+ 
                          '<a class="vhod" style="color: #34282C" href="success.php" ><button class="payButton"  ><span class="glyphicon glyphicon-shopping-cart " aria-hidden="true" ></span>'+ payOnDelivery +' </button></a>'+
                        '</div></div></div><br>');
  
    }   

      $(".div-3").append('<div id="button-div" class="container1"><div class="column1 column-one kol">' 
                             +'<a class="vhod" style="color: #34282C"  ><button id="card-button" class="payButton"  ><span class="glyphicon glyphicon-shopping-cart " aria-hidden="true" ></span>'+ "Visa/Maestro/MasterCard" +' </button></a>'
                             +'</div></div></div><br>');      


      $(".div-3").append('<div id="button-div" class="container1"><div class="column1 column-three kol">' 
                             +'<div id="paypal-button"></div>'
                             +'</div></div></div><br>');
  
      
      getPayPal(cartValuePayPal);
      renderStripe(cartValueStripe);
	
}