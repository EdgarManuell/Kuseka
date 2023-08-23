<!DOCTYPE html>
<html>
<head>
    <title>Mostrar rota no Google Maps</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQxWCemJpiYz1AVC7zR1Emd8VRA4JnA3o"></script>
    <script>
        function initMap() {
            var directionsService = new google.maps.DirectionsService();
            var directionsRenderer = new google.maps.DirectionsRenderer();
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: -8.818840, lng: 13.234678} // São Paulo como exemplo
            });
            directionsRenderer.setMap(map);
            var start = new google.maps.LatLng(-8.818840, 13.234678);
            var end = new google.maps.LatLng(-8.849759,  13.249237); // substituir por coordenadas reais de partida e destino
            var request = {
                origin: start,
                destination: end,
                travelMode: 'DRIVING' // pode ser DRIVING, WALKING, BICYCLING ou TRANSIT
            };
            directionsService.route(request, function(result, status) {
                if (status == 'OK') {
                    directionsRenderer.setDirections(result);
                }
            });
        }
    </script>
</head>
<body onload="initMap()">
    <div id="map" style="height: 500px;"></div>
</body>
</html>
