@extends('layout')

@section('content')
<div class="container">
    <h1 class="h1">Contact Us</h1>
    <div class="form-map-container" style="display: flex; gap: 20px;">
        <!-- Form -->
        <form class="form" action="{{ route('contacts.store') }}" method="POST" style="flex: 1;">
            @csrf
            <div class="form-group">
                <label class="label" for="name">Name:</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="label" for="email">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="label" for="message">Message:</label>
                <textarea name="message" class="form-control" required></textarea>
            </div>
            <!-- Input Hidden untuk Latitude dan Longitude -->
            <input type="hidden" name="latitude" id="latitude" required>
            <input type="hidden" name="longitude" id="longitude" required>

            <button type="submit" class="btn1 btn-success mt-3">Send Message</button>
        </form>

        <!-- Map -->
        <div id="map" style="flex: 1; height: 400px; border: 1px solid #ddd;"></div>
    </div>
</div>

<script>
    // Inisialisasi Peta
    var map = L.map('map').setView([-6.200000, 106.816666], 13); // Default Jakarta

    // Tambahkan Layer Peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 18,
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Marker Default
    var marker = L.marker([-6.200000, 106.816666], { draggable: true }).addTo(map);

    // Event Saat Marker Dipindahkan
    marker.on('dragend', function(e) {
        var lat = e.target.getLatLng().lat.toFixed(8);
        var lng = e.target.getLatLng().lng.toFixed(8);
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });

    // Event Klik Pada Peta
    map.on('click', function(e) {
        var lat = e.latlng.lat.toFixed(8);
        var lng = e.latlng.lng.toFixed(8);

        // Pindahkan Marker
        marker.setLatLng([lat, lng]);

        // Update Input Hidden
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });
</script>
@endsection
