<?php 
require_once './config/config.php';
require_once './models/Booking.php';

$booking = new Booking($pdo);

// Check if booking ID (bid) and vehicle ID (vid) are passed
if (isset($_GET['bid']) && isset($_GET['vid'])) {
    $bid = $_GET['bid'];
    $vid = $_GET['vid'];

    // Assign the vehicle and update the booking status
    $result = $booking->assignVehicle($bid, $vid);

    if ($result['success']) {
        echo "Booking assigned successfully!";
        // Redirect or show success message
    } else {
        echo $result['message']; // Error message
    }
} else {
    echo "Invalid booking or vehicle ID.";
}
?>
