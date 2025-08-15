<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>👁️ Find Eye Care Near You</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Leaflet (OpenStreetMap) CSS/JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Leaflet.awesome-markers for colored icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.2/leaflet.awesome-markers.min.js"></script>

    <!--Fonts -->
    <style>
        @font-face {
            font-family: title_texte19;
            src: url(/Project_do_stage/Assets/Fonts/Anja\ Eliane\ accent002.ttf)
        }

        @font-face {
            font-family: big19;
            src: url(/Project_do_stage/Assets/Fonts/Heavitas.ttf)
        }

        @font-face {
            font-family: medium19;
            src: url(/Project_do_stage/Assets/Fonts/Coolvetica\ Rg.otf)
        }

        @font-face {
            font-family: small19;
            src: url(/Project_do_stage/Assets/Fonts/ComicNeueSansID.ttf)
        }
    </style>

    <style>
        :root {
            --primary-color19: #b5985a;
            --secondary-color19: #24262b;
            --accent-color19: #ffdd92ff;
            --light-accent19: #f8f1e0;
            --transition19: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --box-shadow19: 0 5px 15px rgba(0, 0, 0, 0.1);
            --box-shadow-hover19: 0 8px 25px rgba(0, 0, 0, 0.15);
            --border-radius19: 12px;
            --dark-color19: #24262b;
            --gray-color19: #6c757d;
        }

        #show-more-container19 {
            text-align: center;
            margin-top: 25px;
        }

        #show-more-btn19 {
            background-color: var(--light-accent19);
            color: var(--secondary-color19);
            border: 2px solid var(--primary-color19);
        }

        #show-more-btn19:hover {
            background-color: var(--primary-color19);
            color: white;
        }

        .upper_things19 {
            margin: 50px;
        }

        .container19 {
            max-width: 1000px;
            width: 100%;
            background: white;
            border-radius: var(--border-radius19);
            padding: 40px;
            box-shadow: var(--box-shadow19);
            margin: 0 auto 30px;
            text-align: center;
        }

        h1 {
            margin: 0 0 20px;
            color: var(--secondary-color19);
            font-size: 2.5rem;
            font-weight: 700;
            letter-spacing: -0.5px;
            text-align: center;
            font-family: big19;
        }

        .disclaimer19 {
            background-color: var(--light-accent19);
            color: var(--secondary-color19);
            padding: 20px;
            border-radius: var(--border-radius19);
            margin: 0 auto 40px;
            border-left: 5px solid var(--primary-color19);
            max-width: 900px;
            text-align: center;
            font-size: 1.05rem;
            box-shadow: var(--box-shadow19);
            font-family: small19;
        }

        .map-controls19 {
            margin: 20px 0;
            display: flex;
            justify-content: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        button {
            background-color: var(--primary-color19);
            border: none;
            color: white;
            padding: 14px 30px;
            font-size: 1rem;
            border-radius: var(--border-radius19);
            cursor: pointer;
            transition: var(--transition19);
            letter-spacing: 0.5px;
            box-shadow: var(--box-shadow19);
            font-family: big19;
        }

        button:hover:not(:disabled) {
            background-color: var(--secondary-color19);
            transform: translateY(-3px) scale(1.02);
            box-shadow: var(--box-shadow-hover19);
        }

        button:active:not(:disabled) {
            transform: translateY(1px);
        }

        button:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none !important;
        }

        #map19 {
            height: 500px;
            width: 100%;
            margin: 20px 0;
            border-radius: var(--border-radius19);
            border: 1px solid #ddd;
            box-shadow: var(--box-shadow19);
            z-index: 1;
        }

        #results19 {
            margin-top: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .result19 {
            background-color: white;
            padding: 20px;
            border-radius: var(--border-radius19);
            box-shadow: var(--box-shadow19);
            transition: var(--transition19);
            text-align: left;
        }

        .result19:hover {
            transform: translateY(-5px);
            box-shadow: var(--box-shadow-hover19);
        }

        .result19 strong {
            color: var(--secondary-color19);
            font-size: 1.1rem;
            display: block;
            margin-bottom: 8px;
            font-family: big19;
        }

        .result19 small {
            color: var(--primary-color19);
            font-weight: 600;
        }

        .distance19 {
            color: var(--primary-color19);
            font-weight: bold;
            display: inline-block;
            margin: 8px 0;
            font-family: small19;
        }

        .schedule19 {
            color: var(--gray-color19);
            font-size: 0.9em;
            margin-top: 10px;
            border-top: 1px solid #eee;
            padding-top: 10px;
            font-family: small19;
        }

        #loading19 {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 30px;
            border-radius: var(--border-radius19);
            z-index: 1000;
            text-align: center;
            box-shadow: var(--box-shadow-hover19);
        }

        .spinner19 {
            border: 4px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 4px solid var(--primary-color19);
            width: 40px;
            height: 40px;
            animation: spin19 1s linear infinite;
            margin: 0 auto 15px;
        }

        @keyframes spin19 {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .go-back19 {
            display: inline-flex;
            align-items: center;
            color: var(--primary-color19);
            text-decoration: none;
            margin-bottom: 20px;
            transition: var(--transition19);
            position: relative;
            font-family: big19;
        }

        .go-back19 i {
            margin-right: 8px;
            transition: var(--transition19);
        }

        .go-back19:hover {
            color: var(--secondary-color19);
            transform: translateX(-3px);
        }

        .go-back19:hover i {
            transform: translateX(-3px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .container19 {
                padding: 25px;
            }

            h1 {
                font-size: 2rem;
            }

            #map19 {
                height: 400px;
            }

            #results19 {
                grid-template-columns: 1fr;
            }
        }
    </style>

</head>

<body>
    <!--Navigation Bar-->
    <header>
        <?php
        include("../NavBar/navbar.php")
        ?>
    </header>
    <div class="upper_things19">
        <a href="../home.php" class="go-back19">
            <i class="fas fa-arrow-left"></i>
            Go Back
        </a>
        <h1 class="title">Find Eye Care Near You</h1>
        <div class="disclaimer19">
            ⚠ This tool helps you locate nearby eye care providers. Results are approximate -
            always call ahead to confirm availability and services.
        </div>
    </div>
    <div class="container19">
        <div class="map-controls19">
            <button id="locate-btn19" onclick="getUserLocation19()">
                <i class="fas fa-map-marker-alt"></i> Use My Current Location
            </button>
            <button id="clear-btn19" onclick="clearMarkers19()">
                <i class="fas fa-trash-alt"></i> Clear Markers
            </button>
        </div>

        <!-- Interactive OpenStreetMap -->
        <div id="map19"></div>

        <!-- Loading indicator -->
        <div id="loading19">
            <div class="spinner19"></div>
            <p>Searching for nearby eye care providers...</p>
        </div>

        <!-- Results will load here -->
        <div id="results19"></div>

        <div id="show-more-container19" style="display: none; margin-top: 20px;">
            <button id="show-more-btn19" onclick="loadMorePlaces19()">
                <i class="fas fa-chevron-down"></i> Show More Places
            </button>
        </div>

    </div>

    <!--Footer section-->
    <footer>
        <?php
        include("../Footer/footer_css.html");
        ?>
    </footer>
</body>

<script>
    let map19;
    let markers19 = [];
    let userMarker19;
    let currentPosition19 = null;
    let clickMarker19 = null;
    let isLoading19 = false;
    let allPlaces19 = [];
    let visiblePlaces19 = 10;

    // Initialize the map
    function initMap19() {
        map19 = L.map('map19').setView([0, 0], 2); // Default world view

        // Add OpenStreetMap tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map19);

        // Try to get user's location automatically
        getUserLocation19();

        // Click listener to add markers
        map19.on("click", (event) => {
            if (isLoading19) return; // Prevent multiple clicks during loading

            // Remove user location marker when clicking map
            if (userMarker19) {
                map19.removeLayer(userMarker19);
                userMarker19 = null;
            }

            // Add click marker
            if (clickMarker19) map19.removeLayer(clickMarker19);
            clickMarker19 = L.marker(event.latlng, {
                icon: L.AwesomeMarkers.icon({
                    icon: 'map-marker',
                    markerColor: 'red',
                    prefix: 'fa'
                }),
                title: "Selected Location"
            }).addTo(map19);

            currentPosition19 = event.latlng;
            searchNearbyPlaces19(event.latlng.lat, event.latlng.lng);
        });
    }

    // Show loading indicator
    function showLoading19() {
        isLoading19 = true;
        document.getElementById('loading19').style.display = 'block';
        document.getElementById('locate-btn19').disabled = true;
        document.getElementById('clear-btn19').disabled = true;
    }

    // Hide loading indicator
    function hideLoading19() {
        isLoading19 = false;
        document.getElementById('loading19').style.display = 'none';
        document.getElementById('locate-btn19').disabled = false;
        document.getElementById('clear-btn19').disabled = false;
    }

    // Clear all markers
    function clearMarkers19() {
        markers19.forEach(marker => map19.removeLayer(marker));
        markers19 = [];
        if (clickMarker19) map19.removeLayer(clickMarker19);
        clickMarker19 = null;
        document.getElementById("results19").innerHTML = "";
    }

    // Get user's location via browser
    function getUserLocation19() {
        if (isLoading19) return;

        if (navigator.geolocation) {
            showLoading19();
            navigator.geolocation.getCurrentPosition(
                (position) => {
                    currentPosition19 = {
                        lat: position.coords.latitude,
                        lng: position.coords.longitude
                    };

                    // Add blue marker for user's location
                    if (userMarker19) map19.removeLayer(userMarker19);
                    userMarker19 = L.marker([currentPosition19.lat, currentPosition19.lng], {
                        icon: L.AwesomeMarkers.icon({
                            icon: 'user',
                            markerColor: 'blue',
                            prefix: 'fa'
                        }),
                        title: "Your Location"
                    }).addTo(map19);

                    // Remove click marker if exists
                    if (clickMarker19) {
                        map19.removeLayer(clickMarker19);
                        clickMarker19 = null;
                    }

                    // Center map and search nearby
                    map19.setView([currentPosition19.lat, currentPosition19.lng], 14);
                    searchNearbyPlaces19(currentPosition19.lat, currentPosition19.lng);
                },
                (error) => {
                    hideLoading19();
                    alert("Location access denied. Click the map to search manually.");
                    map19.setView([0, 0], 2); // Fallback world view
                }
            );
        } else {
            alert("Geolocation not supported. Click the map to search manually.");
        }
    }

    // Calculate distance between two coordinates in km
    function getDistance19(lat1, lon1, lat2, lon2) {
        const R = 6371; // Earth radius in km
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLon = (lon2 - lon1) * Math.PI / 180;
        const a =
            Math.sin(dLat / 2) * Math.sin(dLat / 2) +
            Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
            Math.sin(dLon / 2) * Math.sin(dLon / 2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
        return (R * c).toFixed(1);
    }

    // Generate random schedule
    function generateSchedule19() {
        const days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
        const hours = [
            "9:00 AM - 6:00 PM",
            "8:30 AM - 5:30 PM",
            "10:00 AM - 7:00 PM",
            "9:00 AM - 5:00 PM",
            "8:00 AM - 8:00 PM"
        ];
        let schedule = "";
        days.forEach(day => {
            schedule += `${day}: ${hours[Math.floor(Math.random() * hours.length)]}<br>`;
        });
        schedule += "Sun: Closed";
        return schedule;
    }

    // Search for eye care places using Overpass API
    function searchNearbyPlaces19(lat, lng) {
        showLoading19();
        const radius = 3000; // 3km radius
        const overpassUrl = `https://overpass-api.de/api/interpreter?data=[out:json];
        (
            node["amenity"="optician"](around:${radius},${lat},${lng});
            node["amenity"="doctors"]["doctor"="ophthalmologist"](around:${radius},${lat},${lng});
            node["amenity"="pharmacy"](around:${radius},${lat},${lng});
        );
        out center;`;

        fetch(overpassUrl)
            .then(response => response.json())
            .then(data => {
                allPlaces19 = data.elements;
                visiblePlaces19 = 30; // Reset to initial 10
                displayPlaces19();
                hideLoading19();
            })
            .catch(error => {
                console.error("Error fetching places:", error);
                document.getElementById("results19").innerHTML = `
                <div class="result19" style="grid-column: 1/-1; text-align: center;">
                    <p>Failed to load nearby places. Please try again later or check your internet connection.</p>
                </div>`;
                hideLoading19();
            });
    }

    function displayPlaces19() {
        clearMarkers19(); // Clear previous markers
        let resultsHTML = "";
        const placesToShow = allPlaces19.slice(0, visiblePlaces19);

        // Show/hide "Show More" button based on remaining places
        const showMoreContainer19 = document.getElementById("show-more-container19");
        showMoreContainer19.style.display = allPlaces19.length > visiblePlaces19 ? "block" : "none";

        placesToShow.forEach(element => {
            const type = element.tags?.amenity;
            const subType = element.tags?.doctor;
            const name = element.tags?.name || "Unnamed Place";
            const lat = element.lat || element.center?.lat;
            const lng = element.lon || element.center?.lng;

            if (!lat || !lng) return;

            // Determine category and color
            let category, color, icon;
            if (type === "optician") {
                category = "👓 Optical Store";
                color = "blue";
                icon = "glasses";
            } else if (type === "doctors" && subType === "ophthalmologist") {
                category = "👨‍⚕️ Eye Doctor";
                color = "green";
                icon = "user-md";
            } else if (type === "pharmacy") {
                category = "💊 Pharmacy";
                color = "purple";
                icon = "pills";
            } else {
                category = "🏥 Health Service";
                color = "red";
                icon = "hospital";
            }

            // Calculate distance
            const distance = currentPosition19 ?
                getDistance19(currentPosition19.lat, currentPosition19.lng, lat, lng) : "?";

            // Add marker
            const marker = L.marker([lat, lng], {
                icon: L.AwesomeMarkers.icon({
                    icon: icon,
                    markerColor: color,
                    prefix: 'fa'
                }),
                title: name
            }).addTo(map19);
            markers19.push(marker);

            // Add to results list
            resultsHTML += `
            <div class="result19">
                <strong>${name}</strong> <small>(${category})</small>
                <p>📍 ${element.tags?.addr_street || "Address not available"}</p>
                <span class="distance19">${distance} km away</span>
                <div class="schedule19">${generateSchedule19()}</div>
            </div>
        `;
        });

        if (placesToShow.length === 0) {
            resultsHTML = `<div class="result19" style="grid-column: 1/-1; text-align: center;">
            <p>No eye care providers found in this area. Try a different location or expand your search radius.</p>
        </div>`;
        }

        document.getElementById("results19").innerHTML = resultsHTML;
    }

    function loadMorePlaces19() {
        visiblePlaces19 += 5; // Show 10 more places
        displayPlaces19();
        
        // Scroll to the bottom of the new results
        setTimeout(() => {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth'
            });
        }, 100);
    }

    // Initialize the map when the page loads
    window.onload = initMap19;
</script>

</html>