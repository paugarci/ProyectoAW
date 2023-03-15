<!DOCTYPE html>
<html>
<head>
  <title>Google Maps API Example</title>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9GE3d4rTQaEMO02CuGCIE4tgIcqKs45M"></script>
</head>
<body>
  <div class="container">
    <div id="map"></div>
  </div>
<?php 
// Código PHP para obtener la ubicación deseada
$lat = 40.452776278219496;
$lng = -3.7335067213426227;
?>
<script>
  function initMap() {
    // Obtener la ubicación deseada de PHP
    var myLatLng = {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>};
    var map = new google.maps.Map(document.getElementById('map'), {
      center: myLatLng,
      zoom: 12
    });

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      title: 'Zeus-Airsoft'
    });
  }
  google.maps.event.addDomListener(window, 'load', initMap);
</script>


</body>