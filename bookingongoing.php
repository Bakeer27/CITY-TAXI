<?php
require_once './include/header.php';
require_once './config/config.php';
require_once './models/Booking.php';

$booking = new Booking($pdo);
if (!isset($_SESSION['user_id'])) {
    header("Location: home.php"); 
    exit();
}
$passengerId=$_SESSION['user_id'];
if ($passengerId) {
$BookingDetails = $booking->getBookingDetails($passengerId);
}
?>

<main class="">
     <!-- Cancel Booking Section -->
     <div class="container py-5">
        <h3 class="text-center mb-4">Your Ongoing Bookings</h3>
            <div class="row">
                <!---->
                <?php if (isset($BookingDetails['success']) && $BookingDetails['success']): ?>
                <?php foreach ($BookingDetails['data'] as $bookingDetails): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Booking #<?php echo htmlspecialchars($bookingDetails['bid']); ?></h5>
                                <p class="card-text">Username: <?php echo htmlspecialchars($bookingDetails['username']); ?></p>
                                <p class="card-text">ContactNO: <?php echo htmlspecialchars($bookingDetails['ContactNO']); ?></p>
                                <p class="card-text">Pickup Location: <?php echo htmlspecialchars($bookingDetails['pickup_location']); ?></p>
                                <p class="card-text">Drop-off Location: <?php echo htmlspecialchars($bookingDetails['dropoff_location']); ?></p>
                                <p class="card-text">Date: <?php echo htmlspecialchars(date('Y-m-d', strtotime($bookingDetails['pickup_time']))); ?></p>
                                <p class="card-text">Time: <?php echo htmlspecialchars(date('h:i A', strtotime($bookingDetails['pickup_time']))); ?></p>
                                <p class="card-text text-success">Status: <?php echo htmlspecialchars($bookingDetails['status']); ?></p>
                                
                                <!-- Form to Cancel Booking -->
                                <form action="cancelbooking.php" method="POST">
                                    <input type="hidden" name="bid" value="<?php echo htmlspecialchars($bookingDetails['bid']); ?>">
                                    <button type="submit" class="btn btn-danger btn-block">Cancel Booking</button>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-danger"><?php echo isset($BookingDetails['message']) ? htmlspecialchars($BookingDetails['message']) : 'No ongoing bookings found.'; ?></p>
                </div>
            <?php endif; ?>
                <!---->
        </div>
    </div>
</main>
<?php include './include/footer.php'?>