<title>Cari Lokasi</title>
<div class="hr-dashed"></div>
<div class="form-group">
  <div class="col-sm-12">
    <div id="map" style="width: 1070px; height:500px">
  </div>
</div>


  
 <script>
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15
        });
        var infoWindow = new google.maps.InfoWindow({map: map});

        // Try HTML5 geolocation.
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('<table><tr><td><h3>Lokasi Anda.</h3></td></tr>'+
              '<tr><td><h3>Latitude: </h3></td><td><h3><input type="text " name="lat" value="' + position.coords.latitude + '"></h3></td></tr>' +
              '<tr><td><h3>Longitude: </h3></td><td><h3><input type="text" name="lng" value="' + position.coords.longitude + '"></h3>           </td></tr></table><a class="btn btn-primary btn-sm" href="<?php echo base_url('operasi_setting/direct_operasi/'.$r->id_operasi_setting)?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>');
            map.setCenter(pos);
          }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
          });
        } else {
          // Browser doesn't support Geolocation
          handleLocationError(false, infoWindow, map.getCenter());
        }
      }

      function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
                              'Error: The Geolocation service failed.' :
                              'Error: Your browser doesn\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg-kxFmuG2zFvBijy_R8oX57TD_BcXNbg&callback=initMap">
    </script>