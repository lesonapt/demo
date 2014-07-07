<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Bicycling layer</title>
    <style>
      html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
      }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
    <script>
function initialize() {
  var myLatlng = new google.maps.LatLng(20.98981, 105.761604);
  var mapOptions = {
    zoom: 14,
    center: myLatlng,
    mapTypeId: google.maps.MapTypeId.SATELLITE
  };

  var map = new google.maps.Map(
      document.getElementById('map-canvas'),
      mapOptions);
  map.setTilt(90);
  var bikeLayer = new google.maps.BicyclingLayer();
  bikeLayer.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <div id="map-canvas"></div>
  </body>
</html>