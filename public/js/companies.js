$('.export').click(function(){
	
	$.ajax({
		url: host + "employees/export",
		type: "GET",
		success: function(response){
			$('.download-btn').attr("href", response.data.file);
			$('.download').removeClass("hidden");
		}
	});

});

$('.download-btn').click(function(){
	$('.download').addClass("hidden");
});