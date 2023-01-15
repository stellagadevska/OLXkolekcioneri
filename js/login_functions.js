function singIn(){
	$.post("singin.php",
    {
        username: $("#username").val(),
        password: $("#password").val()
    },
    function(data, status){
        
    	if (IsJsonString(data)) {
    		var result= JSON.parse(data);
    		 $("#dispatcher").html("<h1>Вписан Дежурен ръководител: "+result.name + "</h1>");
    		 $("#singintext").html("Вписването успешно ");
    	} else {
    		$("#singintext").html(data);
    	}
});
	$("#username").val("");
	$("#password").val("");
}

function logOut(){
	$.post("singout.php",function(data, status){
    	$("#dispatcher").html("<h1>Вписан Дежурен ръководител: Неизвестен </h1>");
    	$("#singouttext").html(data);
    	$("#singintext").html(" ");
    	$("#username").val("");
		$("#password").val("");
   	});
}

function IsJsonString(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}



function singInManager(){
    $.post("singinmanager.php",
    {
        username: $("#username").val(),
        password: $("#password").val()
    },
    function(data, status){
        
        if (IsJsonString(data)) {
            /*var result= JSON.parse(data);
             $("#dispatcher").html("<h1>Вписан Дежурен ръководител: "+result.name + "</h1>");
             $("#singintext").html("Вписването успешно "); */
            $("body").html('<div class="form" id="myForm"> <h1>Създай нов потребител</h1> <form name="registration" action="wat.php" method="post"> <input type="text" name="username" placeholder="Потребителско име" required /> <input type="password" name="password" placeholder="Парола" required /> <input type="text" name="name" placeholder="Име" required /> <button type="button" onclick="createDis()">Създай</button>/> </form> </div>');
            $("body").append('<br><h1>или премахни същестуващ</h1>');
            $("body").append('<select id="selector"><select>');
            $("body").append(' <button type="button" onclick="deleteDis()">Изтрий</button> ');
            $.get("getalldispatchers.php",function(dispatchers){
                if (IsJsonString(dispatchers)){
                result = JSON.parse(dispatchers)}
                $.each (result, function(index, value){
                    $('#selector').append($("<option></option>").attr("value",result[index].data.username).text(result[index].data.username));    
                }

                    )
            });
           

        } else {
            $("#singintext").html("Неуспешно вписване");
        }
});
    $("#username").val("");
    $("#password").val("");
}

function deleteDis(){
    var r = confirm ("Сигурни ли сте, че искате да изтриете " +  $( "#selector" ).val() + " ?");
    if (r==true){
        $.post("deletedispatcher.php",
                {
                username: $( "#selector" ).val(),
                },
                function(data, status){
                    alert(data);
                    $('#selector').html(" ");
                    $.get("getalldispatchers.php",function(dispatchers){
                        if (IsJsonString(dispatchers)){
                        result = JSON.parse(dispatchers)}
                        $.each (result, function(index, value){
                    $('#selector').append($("<option></option>").attr("value",result[index].data.username).text(result[index].data.username));    
                }

                    )
            });
                }
        )}
}

function createDis(){
    $.post("wat.php",
    {
        username: $("#myForm input[name=username]").val(),
        password: $("#myForm input[name=password]").val(),
        name: $("#myForm input[name=name]").val()
    },
    function(data, status){
        alert(data);
        $('#selector').html(" ");
        $.get("getalldispatchers.php",function(dispatchers){
            if (IsJsonString(dispatchers)){
            result = JSON.parse(dispatchers)}
            $.each (result, function(index, value){
            $('#selector').append($("<option></option>").attr("value",result[index].data.username).text(result[index].data.username));    
            })
        });
    });

}
