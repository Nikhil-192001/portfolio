function initMap() {
    // Swastik Bhawan Coordinates
    var swastikBhawan = { lat: 18.467135, lng: 73.943152 };

    // Initialize map
    var map = new google.maps.Map(document.getElementById("google-maps"), {
        zoom: 18,
        center: swastikBhawan,
        mapTypeId: 'roadmap' // or 'satellite'
    });

    // Marker
    var marker = new google.maps.Marker({
        position: swastikBhawan,
        map: map,
        title: "Swastik Bhawan"
    });
}