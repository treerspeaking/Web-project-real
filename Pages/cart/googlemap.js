async function initMap() {
  const { Map, Marker } = await google.maps.importLibrary("maps");

  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      (position) => {
        const { latitude, longitude } = position.coords;
        map = new Map(document.getElementById("map"), {
          center: { lat: latitude, lng: longitude },
          zoom: 20,
        });

        // Add a marker at the current location
        var marker = new google.maps.Marker({
          position:  { lat: latitude, lng: longitude },
          title:"Hello World!"
        });
      
      // To add the marker to the map, call setMap();
          marker.setMap(map);
      },
      (error) => {
        console.error("Error getting current position:", error);
      }
    );
  } else {
    console.error("Geolocation is not supported by this browser.");
  }
}

initMap();