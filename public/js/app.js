$(document).ready(function() {
    var container = $("#yelp_result");
    var pageLoading = $("#page_loading");

	$("#submit_button").on("click", function(e) {
		e.preventDefault();
		var category = $("#category").val();
		var zip = $("#zip").val();

		if ( category === '' || zip === '' ) {
			alert('Please fill out all fields.');
			return false;
		}

		container.html("&nbsp;");
		pageLoading.show();

		$.ajax({
			method: "GET",
			url: "/picker?category=" + category + "&zip=" + zip,
			success: function(result) {
				console.log(result);
				pageLoading.hide();
				container.html(result);
				container.show();
			},
			error: function() {
				console.log('failed');
				pageLoading.hide();
				container.html('No Options Available');
				container.show();
			}
		});	
	});
});