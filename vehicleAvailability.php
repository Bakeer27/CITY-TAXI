<?php 
require_once './include/header.php';
require_once './models/Vehicle.php';
require_once './config/config.php';
$vehicle = new Vehicle($pdo);
$vehicleDetails = $vehicle->getVehicleDetails();
?>
<main class="">
   <div class="container py-5">
        <h3 class="text-center mb-4">Your Vehicle Information</h3>
        <div class=" p-4 shadow" style="max-width: 600px; margin: 0 auto;">
            <h4 class="-title ">Vehicle Details</h4>
                <?php if ($vehicleDetails): ?>
                    <p class="-text">Vehicle Make: <?php echo htmlspecialchars($vehicleDetails['vehicle_model']); ?></p>
                    <p class="-text">License Plate: <?php echo htmlspecialchars($vehicleDetails['vehicle_plate_no']); ?></p>
                    <p class="-text">No of Seats: <?php echo htmlspecialchars($vehicleDetails['No_of_Seat']); ?></p>
                    <p class="-text">Status: <?php echo htmlspecialchars($vehicleDetails['vehicle_availability']); ?></p>
                    
                    <?php if ($vehicleDetails['vehicle_availability'] == false): ?>
                        <a href="#" class="btn  btn-block">Available</a>
                    <?php else: ?>
                        <a href="#" class="btn  btn-block">Busy</a>
                    <?php endif; ?>
                    <?php else: ?>
                        <p class="text ">Vehicle not found.</p>
                    <?php endif; ?>
        </div>
    </div>
</main>
<?php include './include/footer.php'?>