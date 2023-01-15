$(document).ready(function(){
	createCartContent();
})

function createCartContent() {
	var ajaxCallToA = $.ajax({
		url: 'get-session-data.php',
		timeout: 2000,
		type: 'GET',
		success: function(data){ 												
			
			updateCartContent(data);
		},
		error: function(data) {						
			//alert("problem");
	    } 
	});
}

function updateCartContent(productsData) {
    productDataJSON = JSON.parse(productsData);
    productsDataArray = productDataJSON.cartContents
	console.log (productsDataArray);
    console.log (productsDataArray.length);
    console.log (typeof(productsDataArray));

    $("#cart-contents").html("");
 
    for (var i = 0; i < productsDataArray.length; i++) {
		addProdcuct(productsDataArray[i]);
	}

	$("#cart-contents").append('<div id="total" class="container1"><div class="column1 column-one kol"></div>'
        + '<div class="column1 column-two kol"></div><div class="column1 column-three kol"> Общо: ' + productDataJSON.cartValue.toFixed(2) + ' </div></div>');
    $("#cart-contents").append('<a id="checkOutButton" class="vhod" style="color: #34282C" href="checkout.php" ><button class="checkOutButton"  ><span class="glyphicon glyphicon-shopping-cart " aria-hidden="true" ></span> Checkout </button></a>');	

}

function addProdcuct(productData) {
	if (productDataJSON.lang=="BG") {
			productName = productData["productNameBG"];
			add = "Добави";
			remove = "Премахни";
		} else {
			productName = productData["productNameEN"];
			add = "Add";
			remove = "Remove";
		}

		
		$("#cart-contents").append('<div class="container1"><div class="column1 column-one kol">'+ productName
        + '</div><div class="column1 column-two kol"> '+ productData["quantity"]
        + ' </div><div class="column1 column-three kol">' + productData["price"]
        + ' </div><div class="column1 column-three kol" onClick="addToCart('+productData["productID"]+')">' + add
        + ' </div><div class="column1 column-three kol" onClick="removeFromCart('+productData["productID"]+')">' + remove
        + ' </div><br>');
}
    


function addToCart(id) {
	var ajaxCallToA = $.ajax({
			url: 'add-to-cart.php?id='+id,
			timeout: 2000,
			type: 'POST',
			success: function(data){ 												
				// console.log(data);
				
				// $("#total").html(" ");
				// $("#checkOutButton").html(" ");
				createCartContent();
			},
			error: function(data) {						
				//alert("problem");
		    } 
		});
}

function removeFromCart(id) {
		var ajaxCallToA = $.ajax({
			url: 'remove-from-cart.php?id='+id,
			timeout: 2000,
			type: 'POST',
			success: function(data){ 												

				createCartContent();
			},
			error: function(data) {						
				//alert("problem");
		    } 
		});
}