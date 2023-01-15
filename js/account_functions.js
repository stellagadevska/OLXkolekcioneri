$(document).ready(function(){
	updateUserData();
})

function updateUserData() {
	var ajaxCallToA = $.ajax({
		url: 'get-user-data.php',
		timeout: 2000,
		type: 'GET',
		success: function(data){ 												
			updateData(data);
		},
		error: function(data) {						
			//alert("problem");
	    } 
	});
}

function updateData(userData) {
    userDataJSON = JSON.parse(userData);



		$(".div-3").append('<div class="container1"><div class="column1 column-one kol">'+ userDataJSON.name
        + '</div><div class="column1 column-two kol"> '+ userDataJSON.email
        + ' </div><div class="column1 column-three kol">' + userDataJSON.totalOrders
        + ' BGN</div></div><br>');



    




	// categoryName = productDataJSON.name;
	// productsDataArray = productDataJSON.products;
	// categoryImage = productDataJSON.imagePath;
	// $(".welcome-text").html("Продукти " + categoryName);
	// $("#category-image").attr("src",categoryImage);

	// for (var i = 0; i < productsDataArray.length; i=i+3) {
	// 	$("#product-div").append(prepareContainer1Div(productsDataArray[i],productsDataArray[i+1],productsDataArray[i+2]));
	// }

	
}