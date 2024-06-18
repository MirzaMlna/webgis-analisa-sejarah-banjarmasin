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
    .catch((error) => console.error("Error loading the GeoJSON data:", error));

// Add click event listener to the map
map.on("click", function (e) {
    var latlng = e.latlng;
    var coordinatesInput = document.getElementById("coordinatesInput");
    coordinatesInput.value = latlng.lat + ", " + latlng.lng;
});
