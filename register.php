<?php include './include/header.php' ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
   
</head>
<body>
    
    <main class="bg-main">
        <!-- Login Form -->
        <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
                <h3 class="text-center mb-4">Please Select a Option</h3>
                <div class="dropdown text-center">
                    <button class="btn btn-clrout dropdown-toggle p-4" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Select an option
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="Passregister.php"><i class="fas fa-user icon"></i> Passengers</a>
                        <a class="dropdown-item" href="Driverregister.php"><i class="fas fa-car icon"></i> Driver's</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include './include/footer.php' ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
