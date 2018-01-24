var token = "";
var $loading = $(".loader").hide();

$(document).ajaxStart(function(){
	$loading.show();
}).ajaxStop(function(){
	$loading.hide();
});

function _login(){
	$.ajax({
		url: host + "login",
		method: "POST",
		data: {
			email: "admin@mpm.com",
			password: "admin"
		},
		success: function(response){
			if(response.success){
				token = response.data.token
			}
		}
	});
}

_login();