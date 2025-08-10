let directionsService;
let directionsRenderer;

async function init() {
    await customElements.whenDefined('gmp-map');

    const map = document.querySelector('gmp-map');
    const marker = document.querySelector('gmp-advanced-marker');
    const pickupPlacePicker = document.querySelector('#pickup');
    const dropoffPlacePicker = document.querySelector('#dropoff');
    const infowindow = new google.maps.InfoWindow();

    directionsService = new google.maps.DirectionsService();
    directionsRenderer = new google.maps.DirectionsRenderer({ map: map.innerMap });

    map.innerMap.setOptions({
        mapTypeControl: false
    });

    const updateRoute = () => {
        const pickupPlace = pickupPlacePicker.value;
        const dropoffPlace = dropoffPlacePicker.value;

        if (pickupPlace.location && dropoffPlace.location) {
            const request = {
                origin: pickupPlace.location,
                destination: dropoffPlace.location,
                travelMode: google.maps.TravelMode.DRIVING
            };

            directionsService.route(request, (result, status) => {
                if (status === google.maps.DirectionsStatus.OK) {
                    directionsRenderer.setDirections(result);
                    const totalDistanceValue = result.routes[0].legs[0].distance.value; // Distance in meters
                    const totalDistance = (totalDistanceValue / 1000).toFixed(2); // Convert to km
                    document.getElementById('totalDistance').innerText = totalDistance + ' km';

                    // Calculate total amount based on distance (example: $5 per km)
                    const totalAmount = (totalDistance * 5).toFixed(2); // Adjust rate as needed
                    document.getElementById('totalAmount').innerText = totalAmount + ' USD';

                    // Set hidden input values
                    document.getElementById('distance_km').value = totalDistance;
                    document.getElementById('cost').value = totalAmount;
                } else {
                    window.alert("Directions request failed due to " + status);
                }
            });
        }
    };

    pickupPlacePicker.addEventListener('gmpx-placechange', () => {
        const place = pickupPlacePicker.value;
        if (place.location) {
            marker.position = place.location;
            infowindow.setContent(
                `<strong>${place.displayName}</strong><br>
                 <span>${place.formattedAddress}</span>`
            );
            infowindow.open(map.innerMap, marker);
            // Set the hidden input value
            document.getElementById('hiddenPickup').value = place.displayName; // Set hidden input value
            updateRoute(); // Update route when pickup location changes
        }
    });

    dropoffPlacePicker.addEventListener('gmpx-placechange', () => {
        const place = dropoffPlacePicker.value;
        if (place.location) {
            marker.position = place.location;
            infowindow.setContent(
                `<strong>${place.displayName}</strong><br>
                 <span>${place.formattedAddress}</span>`
            );
            infowindow.open(map.innerMap, marker);
            // Set the hidden input value
            document.getElementById('hiddenDropoff').value = place.displayName; // Set hidden input value
            updateRoute(); // Update route when drop-off location changes
        }
    });
}

document.addEventListener('DOMContentLoaded', init);
