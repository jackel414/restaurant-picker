$(document).ready(function() {
    var success_container = $("#results_container");
    var error_container = $("#error_container");
    var pageLoading = $("#page_loading");

	$("#submit_button").on("click", function(e) {
		e.preventDefault();
		var category = $("#category").val();
		var zip = $("#zip").val();

		if ( category === '' || zip === '' ) {
			alert('Please fill out all fields.');
			return false;
		}

		success_container.hide();
		error_container.hide();
		pageLoading.show();

		$.ajax({
			method: "GET",
			url: "/picker?category=" + category + "&zip=" + zip,
			success: function(result) {
				console.log(result);
				pageLoading.hide();
				success_container.html(
									`<p id='restaurant-title' class='lead' rel='` + result.url + `'>` + result.name + `</p>
							        <div class='row'>
							            <div class='col-xs-6 text-right'>
							                <img src='` + result.image_url + `' />
							            </div>
							            <div class='col-xs-6 text-left padding-top-small'>
							                <img src='` + result.rating_img_url + `' />
							                <p class='small'>` + result.review_count + ` Reviews</p>
							                <p class='small'>` + result.location.address[0] + `<br />` + result.location.city + `, ` + result.location.state_code + ` ` + result.location.postal_code + `</p>
							            </div>
							        </div>
							        <img id='yelp-logo' src='yelp_powered_btn_light.png' width='129' height='30' />`
							    );
				success_container.show();
			},
			error: function() {
				pageLoading.hide();
				error_container.show();
			}
		});	
	});

	success_container.on('click', function() {
		var url = $("#restaurant-title").attr("rel");
		console.log(url);
		window.open(url, '_blank');
	});
});