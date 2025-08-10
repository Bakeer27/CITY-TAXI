<?php include './include/header.php'; ?>
<?php include './config/config.php'; ?>

<?php
// Assume the logged-in user's ID is stored in the session
$passenger_id = $_SESSION['user_id']; // Adjust if you store the user ID in another way

// Query to fetch the booking history for the logged-in user
$query = "SELECT bookings.*, users.email, users.username, users.ContactNO 
          FROM bookings 
          INNER JOIN users ON bookings.passenger_id = users.id 
          WHERE bookings.passenger_id = :passenger_id";
$stmt = $pdo->prepare($query);
$stmt->execute(['passenger_id' => $passenger_id]);
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<main class="">
  <!-- Booking History Section -->
  <div class="container py-5">
    <h3 class="text-center mb-4">Your Booking History</h3>
    <div class="row">

      <?php if (!empty($bookings)): ?>
        <?php foreach ($bookings as $booking): ?>
          <!-- Dynamic Booking History Card -->
          <div class="col-md-4 mb-4">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Booking #<?php echo htmlspecialchars($booking['bid']); ?></h5>
                <p class="card-text">Pickup Location: <?php echo htmlspecialchars($booking['pickup_location']); ?></p>
                <p class="card-text">Drop-off Location: <?php echo htmlspecialchars($booking['dropoff_location']); ?></p>
                <p class="card-text">Date: <?php echo date('Y-m-d', strtotime($booking['pickup_time'])); ?></p>
                <p class="card-text">Time: <?php echo date('H:i A', strtotime($booking['pickup_time'])); ?></p>
                <p class="card-text text-<?php echo $booking['status'] == 'Completed' ? 'success' : 'warning'; ?>">
                  Status: <?php echo htmlspecialchars($booking['status']); ?>
                </p>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="col-md-12 text-center">
          <p>You have no booking history.</p>
        </div>
      <?php endif; ?>

    </div>
  </div>
</main>

<?php include './include/footer.php'; ?>