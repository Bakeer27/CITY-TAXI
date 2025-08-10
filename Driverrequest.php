<?php 
include './include/header.php';
include './config/config.php';
require_once './models/Booking.php';

$booking = new Booking($pdo); // Initialize the Booking class

// Fetch all pending bookings
$bookings = $booking->getAllPendingBookings();

?>

<main class="">
    <!-- View Requested Trips Section -->
    <div class="container py-5">
        <h3 class="text-center mb-4">Manage Requested Trips</h3>
        <div class="row">
            <?php if (!empty($bookings)): ?>
                <?php foreach ($bookings as $trip): ?>
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Trip Request #<?php echo $trip['bid']; ?></h5>
                                <p class="card-text">Pickup Location: <?php echo htmlspecialchars($trip['pickup_location']); ?></p>
                                <p class="card-text">Drop-off Location: <?php echo htmlspecialchars($trip['dropoff_location']); ?></p>
                                <p class="card-text">Date: <?php echo htmlspecialchars($trip['pickup_time']); ?></p>
                                <p class="card-text">Time: <?php echo date('h:i A', strtotime($trip['pickup_time'])); ?></p>
                                
                                <!-- Accept and Decline buttons -->
                                <a href="accept_trip.php?bid=<?php echo $trip['bid']; ?>&vid=<?php echo $trip['vehicle_id']; ?>" class="btn btn-success btn-block">Accept</a>
                                <a href="cancelbooking.php?bid=<?php echo $trip['bid']; ?>" class="btn btn-danger btn-block">Decline</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-12">
                    <p class="text-center">No pending trips at the moment.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php include './include/footer.php'; ?>
