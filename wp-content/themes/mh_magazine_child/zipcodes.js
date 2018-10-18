jQuery(function($) {
	function getGoogleLatLng() {
		var $zipCode = $('#zipcode').html();
		$.getJSON('https://maps.googleapis.com/maps/api/geocode/json?address=' + $zipCode, function(data) {
			return {
				lat: data.results[0].geometry.location.lat,
				lng: data.results[0].geometry.location.lng
			};
		});
	}

	// $('.gform_button[type="submit"]').before(
	// 	'<a id="submit-placeholder">Submit</a>'
	// ).css('visibility', 'hidden');

	// $('#submit-placeholder').click(function(){
	// 	if($('.gform_button[type="submit"]').attr('value') == 'Uploading' && $('.itsg_single_ajax').children('.progress.uploading').length > 0){
	// 		console.log('Uploading');
	// 		$(this).after('<span style="color:red; margin-left:10px">Images uploading, please try again when upload is complete</span>');
	// 	} else {
	// 		$('.gform_button[type="submit"]').click();
	// 	}
	// });
});