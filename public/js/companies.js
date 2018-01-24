$('.export').click(function(){

	$.ajax({
		url: host + "employees/export",
		type: "GET",
		headers:{
			'Authorization' : 'Bearer ' + token
		},
		success: function(response){
			if(response.success){
				$('.download-btn').attr("href", response.data.file);
				$('.download').removeClass("hidden");
			}else{
				alert("Error exporting file. Please check your S3 credentials.");
				console.log(response.error);
			}
		}
	});

});

$('.download-btn').click(function(){
	$('.download').addClass("hidden");
});

