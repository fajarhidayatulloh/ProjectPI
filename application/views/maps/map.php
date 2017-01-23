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
            infoWindow.setContent('<form action="<?php echo base_url('maps'); ?>" method="post"><table><tr><td><h3>Lokasi Anda.</h3></td></tr>'+
		    		  '<tr><td><h3>Latitude: </h3></td><td><h3><input type="text " name="lat" value="' + position.coords.latitude + '"></h3></td></tr>' +
		    		  '<tr><td><h3>Longitude: </h3></td><td><h3><input type="text" name="lng" value="' + position.coords.longitude + '"></h3>           </td></tr></table><input type="submit" name="submit" value="Ambil Lokasi" class="btn btn-default btn-sm">&nbsp;<a class="btn btn-default btn-sm" href="<?php echo base_url('operasi_setting/direct_operasi')?>">Kembali</a></form>');
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
                              'Error: Pencarian Lokasi Error.' :
                              'Error: Browser Tidak\'t support geolocation.');
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBg-kxFmuG2zFvBijy_R8oX57TD_BcXNbg&callback=initMap">
    </script>