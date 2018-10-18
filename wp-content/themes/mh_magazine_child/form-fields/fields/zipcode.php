<label class="customizer-field" for="<?php echo $field_name ?>"><?php echo $field_info['description'] ?><?php echo $required_label ?>
	<input type="text" name="<?php echo $field_name ?>" pattern="(\d{5}([\-]\d{4})?)" oninvalid="setCustomValidity('Please enter a 5 digit number')" onchange="try{setCustomValidity('')}catch(e){}" value="<?php echo ($post_id) ? get_field($field_name, $post_id) : '' ?>"<?php echo $required_input ?>>
</label>

<!--  Hacked the map into this field, ideally it would go elsewhere -->
<div id="map_instructions">
<p>
Drag the marker on the map to where your pet was lost:
</p>
</div>
<div id="map" style="height: 400px;"></div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCsda7YQmFkhuhyoIsqv6klKSTLXXkZJBs"></script>
<script>
defaultLatLong = {
  lat: 39.7684,
  lng: -86.158
};

var map = new google.maps.Map(document.getElementById('map'), {
  center: defaultLatLong,
  zoom: 10
});

var input = document.getElementById('street');

var marker = new google.maps.Marker({
  map: map,
  position: defaultLatLong,
  draggable: true,
  clickable: true
});

//Add circle overlay and bind to marker
var circle = new google.maps.Circle({
  map: map,
  radius: 2000,
  fillColor: '#AA0000'
});
circle.bindTo('center', marker, 'position');

google.maps.event.addListener(marker, 'dragend', function(marker) {
  var latLng = marker.latLng;
  currentLatitude = latLng.lat();
  currentLongitude = latLng.lng();

  //document.report_pet_status.lat.value = currentLatitude;
  //document.report_pet_status.lng.value = currentLongitude;
  var latlng = {
    lat: currentLatitude,
    lng: currentLongitude
  };
  var geocoder = new google.maps.Geocoder;
  geocoder.geocode({
    'location': latlng
  }, function(results, status) {
    if (status === 'OK') {
      if (results[0]) {
      	var parsedAddress = parseGoogleAddress(results[0].address_components)
		document.report_pet_status.nearest_county.value = parsedAddress.county;
        document.report_pet_status.nearest_city.value = parsedAddress.city;
        document.report_pet_status.nearest_intersection.value = parsedAddress.street;
        document.report_pet_status.zip_code.value = parsedAddress.zip;

      } else {
        window.alert('No results found');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });

  function parseGoogleAddress(components) {
  	var parsedAddress = {};

    for(var i = 0; i < components.length; i++) {
      if (components[i].types.includes("route")) {
        parsedAddress.street = components[i].long_name;
      }
      if (components[i].types.includes("administrative_area_level_2")) {
        parsedAddress.county = components[i].long_name;
      }
      if (components[i].types.includes("postal_code")) {
        parsedAddress.zip = components[i].long_name;
      }
	  if (components[i].types.includes("locality")) {
        parsedAddress.city = components[i].long_name;
      }
    }

    return parsedAddress;
  }
});
</script>
