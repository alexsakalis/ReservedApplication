<?php
require 'database.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Reservation View</title>
</head>
<body>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Reservations
                            <a href="admin_page.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                <?php

                    if(isset($_GET['r_id']))
                    {
                        $reservation_id = mysqli_real_escape_string($conn, $_GET['r_id']);

                        $query = "SELECT * FROM reservations WHERE id='$reservation_id'";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $reservation = mysqli_fetch_array($query_run);
                    ?>
                            
                                <div class="mb-3">
                                    <label>Full Name</label>
                                    <p class="form-control">
                                        <?=$reservation['fullname'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <p class="form-control">
                                        <?=$reservation['email'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Phone Number</label>
                                    <p class="form-control">
                                        <?=$reservation['phone'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Date</label>
                                    <p class="form-control">
                                        <?=$reservation['date'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Time</label>
                                    <p class="form-control">
                                        <?=$reservation['time'];?>
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <label>Party Size</label>
                                    <p class="form-control">
                                        <?=$reservation['party_size'];?>
                                    </p>
                                </div>
                            <?php
                        }
                        else
                        {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    }                        


                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>