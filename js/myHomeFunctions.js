$(document).ready(function(){
	//createCategoriesMenu();
	$("#change-language").click(changeLanguage);
	search();
	addToCartButtons();
})


function search(){
	
	$('#searchBar').keyup(function(){
		
		var Search = $('#searchBar').val();

		if(Search!=""){
			$.ajax({
				url:'search.php',
				timeout: 2000,
				method:'GET',
				data:{search:Search},
				success: function(data){
					$('#searchResults').html(data);
					$('#searchResults').css('display', 'block');

				}
			})
		}
		else{
			$('#searchResults').html('');
		}

		$(document).on('click', 'a', function(){
			$('#Search').val($(this).text());
			$('#searchResults').html('');
		})
	})
}


function changeLanguage() {
	var ajaxCallToA = $.ajax({
		url: 'set-language.php',
		timeout: 2000,
		type: 'GET',
		success: function(data){ 						
			location.reload();
		},
		error: function(data) {						
			console.log("Unable to retrieve data");
	    } 
	});
}

function addToCartButtons() {
	$(".addToCartButton").on('click', function(event){
    	event.stopPropagation();
    	event.stopImmediatePropagation();
    	id= $(this).attr('data-productID');
		var ajaxCallToA = $.ajax({
			url: 'add-to-cart.php?id='+id,
			timeout: 2000,
			type: 'POST',
			success: function(data){ 												
				// console.log(data);
				console.log(data);
			},
			error: function(data) {						
				//alert("problem");
		    } 
		});
	
    
	});
}


function createDis(){
     console.log($("#createform input[name=firstname]").val());
     console.log($("#createform input[name=lastname]").val());
     console.log($("#createform input[name=email]").val());
     console.log($("#createform input[name=userpass]").val());
    $.post("create-user.php",
    {
        firstname: $("#createform input[name=firstname]").val(),
        lastname: $("#createform input[name=lastname]").val(),
        email: $("#createform input[name=email]").val(),
        userpass: $("#createform input[name=userpass]").val(),
    },
    function(data, status){
        $('#result').html(data);

    });

}


function singIn(){
	// console.log ($("#email").val());
	// console.log ($("#password").val());
	$.post("singin.php",
    {
        email: $("#email").val(),
        userpass: $("#password").val()
    },
    function(data, status){
    	
    	$("#container").html('<h1 class="col-md-11 col-sm-4 col-xs-10" align="center" style="font-family: Cambria;">'+data+ '</h1>');


});
	$("#email").val("");
	$("#password").val("");
}


function logOut(){
	var ajaxCallToA = $.ajax({
		url: 'logout.php',
		timeout: 2000,
		type: 'GET',
		success: function(data){ 						
			location.reload();
		},
		error: function(data) {						
			console.log("Unable to logout");
	    } 
	});
}

