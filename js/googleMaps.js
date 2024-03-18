function initMap() {
   var location = {lat: parseFloat(mapData.lat), lng: parseFloat(mapData.lng)};
   var map = new google.maps.Map(document.getElementById('map'), {
      zoom: parseInt(mapData.zoom),
      center: location
   });
   var marker = new google.maps.Marker({
      position: location,
      map: map
   });
}