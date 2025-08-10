<?php
require_once './config/config.php';
require_once './models/Booking.php';

$booking = new Booking($pdo);

// Check if a booking ID is passed through POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['bid'])) {
    $bid = $_POST['bid'];

    // Update booking status to "Cancelled"
    $result = $booking->cancelBooking2($bid);

    if ($result['success']) {
        header("Location: bookingongoing2.php"); // Redirect to ongoing bookings page after cancellation
        exit();
    } else {
        echo $result['message']; // Show error message if cancellation fails
    }
} else {
    echo "Invalid request.";
}
?>
