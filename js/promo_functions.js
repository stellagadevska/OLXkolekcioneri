$(document).ready(function(){
    getPromo();
    getMostSold();
    getLastAdded();
})

function getPromo() {

	var ajaxCallToA = $.ajax({
		url: 'get-promo.php',
		timeout: 2000,
		type: 'GET',
		success: function(data){ 			
            $('#promos').html(data);
		},
		error: function(data) {						
			//alert("problem");
	    } 
	});
}

function getMostSold() {

	var ajaxCallToA = $.ajax({
		url: 'get-most_sold.php',
		timeout: 2000,
		type: 'GET',
		success: function(data){ 			
            $('#most-sold').html(data);
		},
		error: function(data) {						
			//alert("problem");
	    } 
	});
}

function getLastAdded() {

	var ajaxCallToA = $.ajax({
		url: 'get-last_added.php',
		timeout: 2000,
		type: 'GET',
		success: function(data){ 			
            $('#last-added').html(data);
		},
		error: function(data) {						
			//alert("problem");
	    } 
	});
}