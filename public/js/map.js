// Initialize the map
var map = L.map("map").setView([-3.316694, 114.590111], 13); // Centered on Banjarmasin

// Add a tile layer (the base map)
L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    attribution:
        '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
}).addTo(map);

// Fetch and load GeoJSON data
fetch("/geojson/banjarmasin.geojson")
    .then((response) => response.json())
    .then((data) => {
        L.geoJSON(data, {
            onEachFeature: function (feature, layer) {
                if (feature.properties && feature.properties.popupContent) {
                    layer.bindPopup(feature.properties.popupContent);
                }
            },
        }).addTo(map);
    })
    .catch((error) => console.error("Gagal Memuat Peta Banjarmasin", error));

// Add click event listener to the map
map.on("click", function (e) {
    var latlng = e.latlng;
    var coordinatesInput = document.getElementById("coordinatesInput");
    coordinatesInput.value = latlng.lat + ", " + latlng.lng;
});

const icon = L.divIcon({
    html: `
    <div>
      <svg width="25px" height="41px" viewBox="0 0 32 52" version="1.1" xmlns="http://www.w3.org/2000/svg">
        <path d="M16,1 C7.7146,1 1,7.65636364 1,15.8648485 C1,24.0760606 16,51 16,51 C16,51 31,24.0760606 31,15.8648485 C31,7.65636364 24.2815,1 16,1 L16,1 Z"></path>
      </svg>
      <i id='markIcon' class="bi bi-circle-fill"></i>
    </div>`,
    iconSize: [25, 41],
    iconAnchor: [25 / 2, 41],
    className: "locationsMarkIcon",
});
// Ambil koordinat dari backend
fetch("/api/coordinates")
    .then((response) => response.json())
    .then((data) => {
        data.forEach((location) => {
            var marker = L.marker([location.latitude, location.longitude], {
                icon: icon,
            }).addTo(map);

            // Event listener untuk menampilkan modal saat marker diklik
            marker.on("click", function () {
                // Isi modal dengan informasi dari location
                document.getElementById("modalLocationName").textContent =
                    location.location_name;
                document.getElementById(
                    "modalImage"
                ).src = `storage/${location.image}`;
                document.getElementById("modalDescription").textContent =
                    location.description;
                document.getElementById(
                    "modalCoordinates"
                ).textContent = `${location.latitude}, ${location.longitude}`;

                // Tampilkan modal menggunakan jQuery (pastikan jQuery sudah dimuat sebelum kode ini)
                $("#locationModal").modal("show");
            });
        });
    })
    .catch((error) => console.error("Gagal Memuat Tanda Lokasi", error));
