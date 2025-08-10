<?php

require_once './config/config.php'; // Include your database configuration
require_once './models/Booking.php'; // Include your Booking model

$booking = new Booking($pdo); // Create a new instance of the Booking class

// Check if the user is logged in
/*
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php"); 
    exit();
}
*/
// Check if the booking ID is provided
if (isset($_POST['bid'])) {
    $bookingId = $_POST['bid']; // Get the booking ID from the form

    // Call the cancelBooking method
    $result = $booking->cancelBooking($bookingId);

    // Set session message based on the result
    $_SESSION['message'] = $result['message'];

    // Redirect back to the bookings page or to a success page
    header("Location: bookingongoing.php"); 
    exit();
} else {
    // Handle the case where no booking ID is provided
    $_SESSION['message'] = 'Booking ID not provided.';
    header("Location: bookingongoing.php"); 
    exit();
}
?>
