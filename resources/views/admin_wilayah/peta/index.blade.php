@extends('admin_wilayah.master')

@section('content')
    <style>
        #map {
            height: 100vh;
            width: 100%;
            position: absolute;
            top: 0;
            left: 0;
        }
    </style>

    <div id="map"></div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <script>
        var map = L.map('map').setView([-2.5, 120], 5);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        var monitoring = @json($monitoring);

        monitoring.forEach(function(data) {
            var markerIcon = L.icon({
                iconUrl: 'https://maps.google.com/mapfiles/ms/micons/red-dot.png',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
            });

            L.marker([data.latitude, data.longitude], { icon: markerIcon })
                .addTo(map)
                .bindPopup('<b>' + data.provinsi + '</b><br>' + data.deskripsi);
        });

    </script>
@endsection
